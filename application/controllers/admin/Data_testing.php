<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_testing extends Admin_Controller {

  public function __construct(){
      parent::__construct();
      // $this->output->enable_profiler(TRUE);
    $this->load->model("m_login");
    $this->load->model("m_data_testing");
    $this->load->model("m_data_testing_normalized");
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
    //   $data=$this->m_kost->getData( $this->session->userdata('user_id') );
    //   $data['files'] = $data;
      $data['page_name'] = "Data Testing";
      $data['user'] = $this->m_user->getUser( $this->session->userdata('user_id') )[0];
      $data['files'] = $this->m_data_testing->read( );
      $data['files_normalized'] = $this->m_data_testing_normalized->read(  );
      $this->load->view("_admin/_template/header");
      $this->load->view("_admin/_template/sidebar_menu");
          $this->load->view("_admin/data_testing/View_list",$data);
      $this->load->view("_admin/_template/footer");  
  }

  public function create()
  {     
        $data['page_name'] = "Tambah Data Testing";
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
                $this->form_validation->set_rules('data_label['.$ind.']','data_label','trim|required');
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
                    $data_test["data_name"] = $this->input->post('data_name')[$ind] ;
                    $data_test["data_semester"] = $this->input->post('data_semester')[$ind] ;
                    $data_test["data_IPK"] = $this->input->post('data_IPK')[$ind] ;
                    $data_test["data_gaji_ortu"] = $this->input->post('data_gaji_ortu')[$ind] ;
                    $data_test["data_UKT"] = $this->input->post('data_UKT')[$ind];
                    $data_test["data_tanggungan"] = $this->input->post('data_tanggungan')[$ind] ;
                    $data_test["data_label"] = $this->input->post('data_label')[$ind] ;

                    array_push($data_testing, $data_test) ;
                }
            }

            // echo var_dump( $data_testing );
            if( $this->m_data_testing->create( $data_testing ) ){
                $this->session->set_flashdata('info', array(
                    'from' => 1,
                    'message' =>  'item berhasil ditambah'
                  ));
                  redirect(site_url('admin/data_testing'));
                  return;
            }
            $this->session->set_flashdata('info', array(
                'from' => 0,
                'message' =>  'terjadi kesalahan saat mengirim data'
              ));
              redirect(site_url('admin/data_testing'));

        }else{
            $data['files'] = $this->m_data_testing->read(  );
            $data['user'] = $this->m_user->getUser( $this->session->userdata('user_id') );
            $this->load->view("_admin/_template/header");
            $this->load->view("_admin/_template/sidebar_menu");
                $this->load->view("_admin/data_testing/View_create",$data);
            $this->load->view("_admin/_template/footer");  
        }
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
                  redirect(site_url('admin/data_testing'));
                  return;
            }
            $this->session->set_flashdata('info', array(
                'from' => 0,
                'message' =>  'terjadi kesalahan saat mengirim data'
              ));
              redirect(site_url('admin/data_testing'));

        }else{
            if( $data_id == null ) redirect(site_url('admin/data_testing'));

            $data['files'] = $this->m_data_testing->read( $data_id );
            $data['user'] = $this->m_user->getUser( $this->session->userdata('user_id') );
            $this->load->view("_admin/_template/header");
            $this->load->view("_admin/_template/sidebar_menu");
                $this->load->view("_admin/data_testing/View_edit",$data);
            $this->load->view("_admin/_template/footer");  
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
            if($numrow > 1 &&  !empty( $row['A'] ) ){
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
              redirect(site_url('admin//data_testing'));
              return;
        }
        $this->session->set_flashdata('info', array(
            'from' => 0,
            'message' =>  'terjadi kesalahan saat mengirim data'
          ));
          redirect(site_url('admin/data_testing'));

    }else{
        echo  $this->upload->display_errors();
        $this->load->view("_admin/_template/header");
        $this->load->view("_admin/_template/sidebar_menu");
            $this->load->view("_admin/data_testing/View_import",$data);
        $this->load->view("_admin/_template/footer");  
    }

  }

  public function normalize(  )
  {
        $this->m_data_testing_normalized->clear( );//kosongka normalisasi
        $files = $this->m_data_testing->read(  );
        $min_max = $this->m_data_testing->get_min_max(  );

        if( empty( $min_max ) ) {
            redirect(site_url('admin/data_testing'));
            return;
        }
        // echo json_encode( $min_max );
        // prosedur untuk menormalisasi
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
        
        if( $this->m_data_testing_normalized->create( $files ) ){
            $this->session->set_flashdata('info', array(
                'from' => 1,
                'message' =>  'item berhasil di normalisasi'
              ));
              redirect(site_url('admin/data_testing'));
              return;
        }
        $this->session->set_flashdata('info', array(
            'from' => 0,
            'message' =>  'terjadi kesalahan saat mengirim data'
          ));
          redirect(site_url('admin/data_testing'));

  }

  public function delete( $data_id = null )
  {
    if( $data_id == null ) redirect(site_url('admin/data_testing'));

    $data_param['data_id'] = $data_id;
    if( $this->m_data_testing->delete(  $data_param ) ){
        $this->session->set_flashdata('info', array(
            'from' => 1,
            'message' =>  'item berhasil diubah'
          ));
          redirect(site_url('admin/data_testing'));
          return;
    }
    $this->session->set_flashdata('info', array(
        'from' => 0,
        'message' =>  'terjadi kesalahan saat mengirim data'
      ));
      redirect(site_url('admin/data_testing'));

  }


}