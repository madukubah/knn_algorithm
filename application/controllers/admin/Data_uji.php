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
      $data['data_testing']  = $this->m_data_testing_normalized->read(  );
      $this->load->view("_admin/_template/header");
      $this->load->view("_admin/_template/sidebar_menu");
          $this->load->view("_admin/data_uji/View_list",$data);
      $this->load->view("_admin/_template/footer");  
  }


  public function normalize(  )
  {
        $this->m_data_uji_normalized->clear( );//kosongka normalisasi
        $files = $this->m_data_uji->read_normalize( );

        $min_max = $this->m_data_testing->get_min_max( );

        if( empty( $min_max ) || empty( $files ) ) {
            redirect(site_url('admin/data_uji'));
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
        if( !($_POST) ) redirect(site_url('admin/data_uji'));  

        $data_id = $this->input->post('data_id');
        // $data_uji = $this->m_data_uji_normalized->read_single_table( $data_id , "array" );
        $data_uji = $this->m_data_uji_normalized->read( $data_id , "array" );
        $data_testing = $this->m_data_testing_normalized->read( -1, "array" );

        $min_max = $this->m_data_testing->get_min_max( );
        // echo json_encode( $data_uji ).'<br>' ;
        // return;
        if(  empty( $data_uji ) || empty( $data_testing ) ) {
            redirect(site_url('admin/data_uji'));
            return;
        }

        if(  empty( $data_uji ) ) {
            redirect(site_url('/data_uji'));
            return;
        }
        $DISTANCES = array();

        for( $i=0; $i< count( $data_uji ); $i++ )
        {
            $DISTANCES = array();
            for( $j=0; $j< count( $data_testing ); $j++ )
            {
                $dist['distance'] = $this->distance( $data_uji[ $i ], $data_testing[ $j ] );
                $dist['data_label'] = $data_testing[ $j ]['data_label'];
                $dist['data_name'] = $data_testing[ $j ]['data_name'];
                // echo json_encode( $dist ).'<br>' ;
                
                array_push($DISTANCES , $dist) ;
            }
            sort($DISTANCES);//mengurutkan distance dari terdekat
            // echo json_encode( $DISTANCES ).'<br>' ;

            $K_VALUE = $this->input->post('k_value');
            $NEIGHBOUR = array();
            for( $k=0; $k< $K_VALUE ; $k++ ) //memetakan tetangga
            {
                if( !isset( $NEIGHBOUR[ $DISTANCES[ $k ]['data_label'] ] ) )
                    $NEIGHBOUR[ $DISTANCES[ $k ]['data_label'] ] = array();
                
                array_push( $NEIGHBOUR[ $DISTANCES[ $k ]['data_label'] ] , $DISTANCES[ $k ]) ;
            }
            // echo 'NEIGHBOUR'.json_encode( $NEIGHBOUR ).'<br>' ;
            

            $terbesar =  array();//mencari tetangga terbesar
            foreach(array_keys($NEIGHBOUR) as $paramName)
            {
                
                if(  count( $NEIGHBOUR[ $paramName ] )  > count( $terbesar ) )
                {
                    $terbesar = $NEIGHBOUR[ $paramName ];
                    // echo json_encode( $terbesar ).'<br>' ;
                }
            }
            // echo 'terbesar'.json_encode( $terbesar ).'<br>' ;
            
            $data_uji[ $i ]['data_label'] = $terbesar[0]['data_label'];//update nilai label (lulus / tidak lulus)
        }
        
        $data["K_VALUE"] = $K_VALUE;
        $data["NEIGHBOURS"] = $NEIGHBOUR;
        
        $data["distances"] = $DISTANCES;
        //ubah ke array object
        foreach( $data["distances"]  as  $ind=>$val )
        {   
            $data["distances"][ $ind ] = (object) $data["distances"][ $ind ];
        }
        $data["data_uji"] = $data_uji;
        //ubah ke array object
        foreach( $data["data_uji"]  as  $ind=>$val )
        {   
            $data["data_uji"][ $ind ] = (object) $data_uji[ $ind ];
            unset( $data_uji[ $ind ]['user_profile_fullname'] );
        }
        // echo json_encode( $data_uji ).'<br>' ;

        // update data uji
        $this->m_data_uji_normalized->_update_batch( $data_uji );

        $data['page_name'] = "Hasil Data Uji";
        $this->load->view("_admin/_template/header");
        $this->load->view("_admin/_template/sidebar_menu");
            $this->load->view("_admin/data_uji/View_detail_uji",$data);
        $this->load->view("_admin/_template/footer");  
  }

  public function uji_batch(  )
  {
        if( !($_POST) ) redirect(site_url('admin/data_uji'));  

        $data_uji = $this->m_data_uji_normalized->read_single_table( -1, "array" );
        $data_testing = $this->m_data_testing_normalized->read( -1, "array" );

        $min_max = $this->m_data_testing->get_min_max( );
        // echo json_encode( $data_testing ).'<br>' ;
        // return;

        if(  empty( $data_uji ) || empty( $data_testing ) ) {
            redirect(site_url('admin/data_uji'));
            return;
        }
        // echo json_encode( $data_testing );
        

        for( $i=0; $i< count( $data_uji ); $i++ )
        {
            $DISTANCES = array();
            for( $j=0; $j< count( $data_testing ); $j++ )
            {
                $dist['distances'] = $this->distance( $data_uji[ $i ], $data_testing[ $j ] );
                $dist['data_label'] = $data_testing[ $j ]['data_label'];
                // echo json_encode( $dist ).'<br>' ;
                
                array_push($DISTANCES , $dist) ;
            }
            sort($DISTANCES);//mengurutkan distance dari terdekat
            // echo "DISTANCES".json_encode( $DISTANCES ).'<br>' ;

            $K_VALUE = $this->input->post('k_value');
            $NEIGHBOUR = array();
            for( $k=0; $k< $K_VALUE ; $k++ ) //memetakan tetangga
            {
                if( !isset( $NEIGHBOUR[ $DISTANCES[ $k ]['data_label'] ] ) )
                    $NEIGHBOUR[ $DISTANCES[ $k ]['data_label'] ] = array();
                
                array_push( $NEIGHBOUR[ $DISTANCES[ $k ]['data_label'] ] , $DISTANCES[ $k ]) ;
            }
            // echo 'NEIGHBOUR'.json_encode( $NEIGHBOUR ).'<br>' ;
            

            $terbesar =  array();
            foreach(array_keys($NEIGHBOUR) as $paramName)
            {
                
                if(  count( $NEIGHBOUR[ $paramName ] )  > count( $terbesar ) )
                {
                    $terbesar = $NEIGHBOUR[ $paramName ];
                    // echo json_encode( $terbesar ).'<br>' ;
                }
            }
            // echo 'terbesar'.json_encode( $terbesar ).'<br>' ;
            
            $data_uji[ $i ]['data_label'] = $terbesar[0]['data_label'];//update nilai label (lulus / tidak lulus)
        }

        foreach( $data_uji  as  $ind=>$val )
        {   
            unset( $data_uji[ $ind ]['user_profile_fullname'] );
        }
        // echo json_encode( $data_uji );
        if(  $this->m_data_uji_normalized->_update_batch( $data_uji ) )
        {
            $this->session->set_flashdata('info', array(
                'from' => 1,
                'message' =>  'item berhasil di di uji'
              ));
              redirect(site_url('admin/data_uji'));
              return;
        }else{
            $this->session->set_flashdata('info', array(
                'from' => 0,
                'message' =>  'terjadi kesalahan saat menguji data'
              ));
              redirect(site_url('admin/data_uji'));
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