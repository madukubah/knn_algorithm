<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_uji extends Admin_Controller {

  public function __construct(){
      parent::__construct();
      // $this->output->enable_profiler(TRUE);
    $this->load->model("m_login");
    $this->load->model("m_data_testing");
    $this->load->model("m_data_uji");
    $this->load->model("m_data_testing_normalized");
    $this->load->model("m_data_uji_normalized");
    $this->load->model("m_register");
    $this->load->model("m_admin");
    $this->load->model("m_user");
    $this->load->model("m_log");
    $this->load->helper('array');
    $this->load->library("pagination");
    $this->load->library('form_validation'); 
  } 


  public function index() 
  {
      $log['log_datetime'] = date("Y-m-d H:i:s");
      $log['log_message'] = "HOMEPAGE :  user => ".$this->session->userdata('user_username')."( id = ".$this->session->userdata('user_id').") ; result => ";
      $log['user_id'] = $this->session->userdata('user_id');
      $log['log_message'] .= "true";
      $this->m_log->inserLog( $log );
    
      $data['page_name'] = "Data Uji";
      $data['user'] = $this->m_user->getUser( $this->session->userdata('user_id') )[0];
      $data['files'] = $this->m_data_uji->read(  );
      $data['files_normalized'] = $this->m_data_uji_normalized->read(  );
      $this->load->view("_admin/_template/header");
      $this->load->view("_admin/_template/sidebar_menu");
          $this->load->view("_admin/data_uji/View_list",$data);
      $this->load->view("_admin/_template/footer");  
  }

  public function edit( $data_id = null )
  {     
        $data['page_name'] = "Edit Data Testing";
        $inpust =  ( $this->input->post('data_name[]') == null )? array(): $this->input->post('data_name[]')  ;
        // echo var_dump( $inpust );
        foreach($inpust as $ind=>$val) 
        {
            if(  !empty( $this->input->post('data_name')[$ind] ) ){
                $this->form_validation->set_rules('data_name['.$ind.']','data_name','trim|required');
                $this->form_validation->set_rules('data_semester['.$ind.']','data_semester','trim|required');
                $this->form_validation->set_rules('data_IPK['.$ind.']','data_IPK','trim|required');
                $this->form_validation->set_rules('data_gaji_ortu['.$ind.']','data_gaji_ortu','trim|required');
                $this->form_validation->set_rules('data_UKT['.$ind.']','data_UKT','trim|required');
                $this->form_validation->set_rules('data_tanggungan['.$ind.']','data_tanggungan','trim|required');
            }
            
        }

        

        if ($this->form_validation->run() == true) 
        {
            $data_testing = array();
            $inpust =  ( $this->input->post('data_name[]') == null )? array(): $this->input->post('data_name[]')  ;
            foreach($inpust as $ind=>$val) 
            {
                $data = array();
                if(  !empty( $this->input->post('data_name')[$ind] ) ){
                    $data["data_name"] = $this->input->post('data_name')[$ind] ;
                    $data["data_semester"] = $this->input->post('data_semester')[$ind] ;
                    $data["data_IPK"] = $this->input->post('data_IPK')[$ind] ;
                    $data["data_gaji_ortu"] = $this->input->post('data_gaji_ortu')[$ind] ;
                    $data["data_UKT"] = $this->input->post('data_UKT')[$ind] ;
                    $data["data_tanggungan"] = $this->input->post('data_tanggungan')[$ind] ;

                    // array_push($data_testing, $data) ;
                }
            }

            // echo var_dump( $data_testing );
            $data_param['data_id'] = $this->input->post('data_id');

            if( $this->m_data_testing->update( $data, $data_param ) ){
                $this->session->set_flashdata('info', array(
                    'from' => 1,
                    'message' =>  'item berhasil diubah'
                  ));
                  redirect(site_url('/data_testing'));
                  return;
            }
            $this->session->set_flashdata('info', array(
                'from' => 0,
                'message' =>  'terjadi kesalahan saat mengirim data'
              ));
              redirect(site_url('/data_testing'));

        }else{
            if( $data_id == null ) redirect(site_url('/data_testing'));

            $data['files'] = $this->m_data_testing->read( $data_id );
            $data['user'] = $this->m_user->getUser( $this->session->userdata('user_id') );
            $this->load->view("_template/header");
            $this->load->view("_template/sidebar_menu");
                $this->load->view("data_testing/View_edit",$data);
            $this->load->view("_template/footer");  
        }
  }

  public function import(  )
  {
    $data['page_name'] = "import Data Testing";
    // if( !($_POST) ) redirect(site_url(''));  

    $this->load->library('upload'); // Load librari upload
    $filename = "excel";
    $config['upload_path'] = './upload/datatestingexcel/';
    $config['allowed_types'] = "xls|xlsx";
    $config['overwrite']="true";
    $config['max_size']="2048";
    $config['file_name'] = ''.$filename;
    $this->upload->initialize($config);

    if( $this->upload->do_upload("document_file") )
    {
        $filename = $this->upload->data()["file_name"];
        // echo $filename;
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel.php';
        
        $excelreader = new PHPExcel_Reader_Excel2007();
        $loadexcel = $excelreader->load('upload/datatestingexcel/'.$filename); // Load file yang telah diupload ke folder excel
        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
        
        // Buat sebuah vari
        $data_testing = array();
        $numrow = 1;
        foreach($sheet as $row){
            // Cek $numrow apakah lebih dari 1
            // Artinya karena baris pertama adalah nama-nama kolom
            // Jadi dilewat saja, tidak usah diimport
            if($numrow > 1){
                $data_test["data_name"] = $row['A'] ;
                $data_test["data_IPK"] = $row['B'];
                $data_test["data_semester"] = $row['C'];
                $data_test["data_gaji_ortu"] = $row['D'];
                $data_test["data_tanggungan"] = $row['E'];
                $data_test["data_UKT"] = $row['F'];
                $data_test["data_label"] = $row['G'];
                
                // Kita push (add) array data ke variabel data
                array_push($data_testing, $data_test ) ;
            }
            
            $numrow++; // Tambah 1 setiap kali looping
        }

        // echo var_dump( $data_testing );
        if( $this->m_data_testing->create( $data_testing ) ){
            $this->session->set_flashdata('info', array(
                'from' => 1,
                'message' =>  'item berhasil diimport'
              ));
              redirect(site_url('/data_testing'));
              return;
        }
        $this->session->set_flashdata('info', array(
            'from' => 0,
            'message' =>  'terjadi kesalahan saat mengirim data'
          ));
          redirect(site_url('/data_testing'));

    }else{
        echo  $this->upload->display_errors();
        $this->load->view("_template/header");
        $this->load->view("_template/sidebar_menu");
            $this->load->view("data_testing/View_import",$data);
        $this->load->view("_template/footer");  
    }
  }

  public function normalize(  )
  {
        $this->m_data_uji_normalized->clear( );//kosongka normalisasi
        $files = $this->m_data_uji->read_normalize( );

        $min_max = $this->m_data_testing->get_min_max( );

        if( empty( $min_max ) || empty( $files ) ) {
            redirect(site_url('/data_uji'));
            return;
        }
        // echo json_encode( $min_max );

        for( $i=0; $i< count( $files ); $i++ )
        {
            // echo round( $files[ $i ]->data_UKT,3)."<br>";
            $len = $min_max["max_data_semester"] -  $min_max["min_data_semester"];
            $files[ $i ]->data_semester  =  ( ( $files[ $i ]->data_semester - $min_max["min_data_semester"] )/( $len ) )* 1 + 0 ;
            $files[ $i ]->data_semester = round( $files[ $i ]->data_semester, 4 );

            $len = $min_max["max_data_IPK"] -  $min_max["min_data_IPK"];
            $files[ $i ]->data_IPK  =  ( ( $files[ $i ]->data_IPK - $min_max["min_data_IPK"] )/( $len ) )* 1 + 0 ;
            $files[ $i ]->data_IPK = round( $files[ $i ]->data_IPK, 4 );

            $len = $min_max["max_data_gaji_ortu"] -  $min_max["min_data_gaji_ortu"];
            $files[ $i ]->data_gaji_ortu  =  ( ( $files[ $i ]->data_gaji_ortu - $min_max["min_data_gaji_ortu"] )/( $len ) )* 1 + 0 ;
            $files[ $i ]->data_gaji_ortu = round( $files[ $i ]->data_gaji_ortu, 4 );

            $len = $min_max["max_data_UKT"] -  $min_max["min_data_UKT"];
            $files[ $i ]->data_UKT  =  ( ( $files[ $i ]->data_UKT - $min_max["min_data_UKT"] )/( $len ) )* 1 + 0 ;
            $files[ $i ]->data_UKT = round( $files[ $i ]->data_UKT, 4 );

            $len = $min_max["max_data_tanggungan"] -  $min_max["min_data_tanggungan"];
            $files[ $i ]->data_tanggungan  =  ( ( $files[ $i ]->data_tanggungan - $min_max["min_data_tanggungan"] )/( $len ) )* 1 + 0 ;
            $files[ $i ]->data_tanggungan = round( $files[ $i ]->data_tanggungan, 4 );
        }
        
        if( $this->m_data_uji_normalized->create( $files ) ){
            $this->session->set_flashdata('info', array(
                'from' => 1,
                'message' =>  'item berhasil di normalisasi'
              ));
              redirect(site_url('admin/data_uji'));
              return;
        }
        $this->session->set_flashdata('info', array(
            'from' => 0,
            'message' =>  'terjadi kesalahan saat mengirim data'
          ));
          redirect(site_url('admin/data_uji'));

  }

  public function uji(  )
  {
        // if( !($_POST) ) redirect(site_url('admin/data_uji'));  

        $data_uji = $this->m_data_uji_normalized->read( -1, "array" );
        $data_testing = $this->m_data_testing_normalized->read( -1, "array" );

        $min_max = $this->m_data_testing->get_min_max( );

        if(  empty( $data_uji ) ) {
            redirect(site_url('/data_uji'));
            return;
        }
        // echo json_encode( $data_testing );
        $DISTANCES = array(
        );
        for( $i=0; $i< count( $data_uji ); $i++ )
        {
            for( $j=0; $j< count( $data_testing ); $j++ )
            {
                $dist['distances'] = $this->distance($data_uji[ $i ], $data_testing[ $j ] );
                $dist['data_label'] = $data_testing[ $j ]['data_label'];
                // $dist= "a";
                // echo json_encode( $dist ).'<br>';
                array_push($DISTANCES , $dist) ;
            }
            sort($DISTANCES);//mengurutkan distance dari terdekat
            echo json_encode( $DISTANCES ).'<br>';

            $K_VALUE = $this->input->post('k_value');
            $NEIGHBOUR = array();
            for( $i=0; $i< $K_VALUE ; $i++ )
            {
                if( !isset( $NEIGHBOUR[ $DISTANCES[ $i ]['data_label'] ] ) )
                    $NEIGHBOUR[ $DISTANCES[ $i ]['data_label'] ] = array();
                
                array_push($NEIGHBOUR[ $DISTANCES[ $i ]['data_label'] ] , $DISTANCES[ $i ]) ;
                // $NEIGHBOUR[ $DISTANCES[ $i ]['data_label'] ] = $DISTANCES[ $i ] ;
            }
            echo json_encode( $NEIGHBOUR );

        }
        
  }

    //   fungsi untuk menghitung jarak
  private function distance($data_uji, $data_testing )
  {     
        $attrs = array(
            'data_semester', 'data_IPK', 'data_gaji_ortu', 'data_UKT', 'data_tanggungan'
        );
        $value = 0;
        foreach( $attrs as $attr )
        {
            // echo $attr." ".pow( ( $data_uji[ $attr ] - $data_testing[ $attr ] ), 2 )."<br>";
            $value+= pow( ( $data_uji[ $attr ] - $data_testing[ $attr ] ), 2 );
        }
        // echo $value."<br>";
        return round( sqrt( $value ), 6 );
  }
}