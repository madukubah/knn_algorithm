<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kost extends Admin_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model("m_login");
    $this->load->model("m_document");
    $this->load->model("m_kamar");
    $this->load->model("m_user");
    $this->load->model("m_kost");
    $this->load->model("m_kepemilikan");
    $this->load->helper('array');
    $this->load->library('upload');
    $this->load->model("m_log");
    
  }
  public function index($id_user = 1) {

        // $this->load->helper('form');
        $this->load->library('form_validation'); 
        $config = array(
          array(
                 'field' => 'kost_name',
                  'label' => 'Kamar',
                  'rules' =>  'trim|required',
                  'errors' => array(
                          'required' => 'No Kamar harus di isi'
                  ),
          ),
          array(
                  'field' => 'kost_address',
                  'label' => 'Harga',
                  'rules' => 'required',
                  'errors' => array(
                          'required' => 'Harga harus di isi',
                  ),
          ),
          array(
                  'field' => 'kost_latitude',
                  'label' => 'Panjang',
                  'rules' => 'required',
                  'errors' => array(
                          'required' => 'Panjang Kamar harus di isi',
                  ),
          ),
         array(
                  'field' => 'kost_langitude',
                  'label' => 'Lebar',
                  'rules' => 'required',
                  'errors' => array(
                          'required' => 'Lebar Kamar harus harus di isi',
                  ),
          ),
          array(
                  'field' => 'kost_keterangan',
                  'label' => 'Keterangan',
                  'rules' => 'required',
                  'errors' => array(
                          'required' => 'Keterangan harus harus di isi',
                  ),
          ),
       );
      $this->form_validation->set_rules($config);    
      $log['log_datetime'] = date("Y-m-d H:i:s");
      $log['log_message'] = "ADD DOCUMENT (".$this->input->post('document_title').") :  user => ".$this->session->userdata('user_username')."( id = ".$this->session->userdata('user_id').") ; result => ";
      $log['user_id'] = $this->session->userdata('user_id');
       if ($this->form_validation->run() === true) {
        // echo "berhasil";
        // echo var_dump();
           $name= $_FILES['document_file']['name'];        
           $size= $_FILES['document_file']['size'];
           $type= $_FILES['document_file']['type'];
          if(!empty( $name ) && $size  < 16777216 )
          {
              $data_kost['user_id'] = $this->session->userdata('user_id');
              $data_kost['kost_name'] = $this->input->post('kost_name');
              $data_kost['kost_address'] = $this->input->post('kost_address');
              $data_kost['kost_latitude'] = $this->input->post('kost_latitude');
              $data_kost['kost_langitude'] = $this->input->post('kost_langitude');
              $data_kost['kost_keterangan'] = $this->input->post('kost_keterangan');
              $data_kost['kost_photo'] = date('Y-m-d-h-i-s').$name;
              $tmp_name = $_FILES['document_file']['tmp_name'];
              $location = './upload/kost/';
              if(move_uploaded_file($tmp_name, $location.$data_kost['kost_photo']))
              {
                // echo "berhasilAAA";
                  $result = $this->m_kost->create( $data_kost );
                  if( $result )
                  {
                    $this->session->set_flashdata('add', array(
                      'from' => 1,
                      'message' =>  'Kost berhasil ditambah'
                    ));
                    $log['log_message'] .= "true";
                    $this->m_log->inserLog( $log );
                    redirect(site_url('/kost'));
                  }else{
                    $this->session->set_flashdata('add', array(
                      'from' => 0,
                      'message' =>  'terjadi kesalahan saat mengirim data'
                    ));
                    $log['log_message'] .= "false = ".'SQL INPUT ERROR';
                    $this->m_log->inserLog( $log );
                    redirect(site_url('/kost'));
                  }               
              }else{
                $this->session->set_flashdata('add', array(
                  'from' => 0,
                  'message' =>  'terjadi kesalahan saat mengupload file'
                ));
                $log['log_message'] .= "false =  ".'MOVE APLOADED FILE ERROR';
                $this->m_log->inserLog( $log );
                redirect(site_url('/kost'));
              }
          }else{
            $this->session->set_flashdata('add', array(
              'from' => 0,
              'message' =>  'terjadi kesalahan saat mengupload file'
            ));
            $log['log_message'] .= "false  = ".'DATA VALIDATION ERROR';
            $this->m_log->inserLog( $log );
            redirect(site_url('/kost'));
          }
       }else{
        $log['log_message'] .= "VIEW; ";
        $this->m_log->inserLog( $log );
          $data = array();
          $this->load->view("_template/header");
          $this->load->view("_template/sidebar_menu");
              $this->load->view("View_add_kost",$data);
          $this->load->view("_template/footer");  
       }
  }
  public function detail_kost( $kost_id =null )
  {   
    if( $kost_id == null )
      redirect(site_url(''));


      $data['files'] = $this->m_kamar->get_kamar_by_id( $kost_id );
      $data[ "kosts" ] = $this->m_kost->getData( $this->session->userdata('user_id') );
      $data[ "info_kost" ] = $this->m_kost->get_kost_by_id( $kost_id );
      $data[ "facilities" ] = $this->m_kost->get_facility(  );
      // echo var_dump( $data );
      $this->load->view("_template/header");
      $this->load->view("_template/sidebar_menu");
          $this->load->view("View_detail_kost",$data);
      $this->load->view("_template/footer");  
  }
  public function edit_kamar(  )
  {
        $this->load->helper('form');
        $this->load->library('form_validation'); 
        $config = array(
          array(
                  'field' => 'kamar_type',
                  'label' => 'Kamar',
                  'rules' =>  'trim|required',
                  'errors' => array(
                          'required' => 'No Kamar harus di isi'
                  ),
          ),
          array(
                  'field' => 'kamar_harga',
                  'label' => 'Harga',
                  'rules' => 'required',
                  'errors' => array(
                          'required' => 'Harga harus di isi',
                  ),
          ),
          array(
                  'field' => 'kamar_panjang',
                  'label' => 'Panjang',
                  'rules' => 'required',
                  'errors' => array(
                          'required' => 'Panjang Kamar harus di isi',
                  ),
          ),
          array(
                  'field' => 'kamar_lebar',
                  'label' => 'Lebar',
                  'rules' => 'required',
                  'errors' => array(
                          'required' => 'Lebar Kamar harus harus di isi',                         
                  ),
          )
      );
      $this->form_validation->set_rules($config);     
      $log['log_datetime'] = date("Y-m-d H:i:s");
      $log['log_message'] = "ADD DOCUMENT (".$this->input->post('document_title').") :  user => ".$this->session->userdata('user_username')."( id = ".$this->session->userdata('user_id').") ; result => ";
      $log['user_id'] = $this->session->userdata('user_id');
      if ($this->form_validation->run() === true) 
      {
        if( !empty( $_FILES['document_file']['name'] ) )
        {
              // // @unlink($filename);
          $name= $_FILES['document_file']['name'];
          $size= $_FILES['document_file']['size'];
          $type= $_FILES['document_file']['type'];
          if(!empty( $name ) && $size  < 16777216 )
          {
            $data_kamar['kamar_foto'] = date('Y-m-d-h-i-s').$name;
            $tmp_name = $_FILES['document_file']['tmp_name'];
            $location = './upload/kamar/';
            if(move_uploaded_file($tmp_name, $location.$data_kamar['kamar_foto']))
            {
              @unlink($location.$this->input->post('kamar_old_photo'));
            }
          }
        }else{
        }
        $data_kamar['kamar_id'] = $this->input->post('kamar_id');
        $data_kamar['kamar_type'] = $this->input->post('kamar_type');
        $data_kamar['kamar_harga'] = $this->input->post('kamar_harga');
        $data_kamar['kamar_panjang'] = $this->input->post('kamar_panjang');
        $data_kamar['kamar_lebar'] = $this->input->post('kamar_lebar');
        $data_kamar['kamar_quantity'] = $this->input->post('kamar_quantity');
        $data_kamar['kamar_facility'] = implode( ";", $this->input->post('kamar_facility[]') );
        // $data_kepemilikan['kepemilikan_status'] = $this->input->post('kepemilikan_status');
        $data_kepemilikan['kepemilikan_id'] = $this->input->post('kepemilikan_id');
        // echo var_dump($data_kamar);
        $result = $this->m_kamar->update( $data_kamar );
        $result = $this->m_kepemilikan->update( $data_kepemilikan );
        if( $result )
        { 
          // echo "berhasil";
          $this->session->set_flashdata('edit_kamar', array(
              'from' => 1,
              'message' =>  'Kamar berhasil ubah'
            ));
            redirect(site_url('/kost/detail_kost')."/".$this->input->post('kost_id') );
        }else{
          // echo "gagal";            
          $this->session->set_flashdata('edit_kamar', array(
            'from' => 0,
            'message' =>  'terjadi kesalahan saat mengirim data'
          ));
          redirect(site_url('/kost/detail_kost')."/".$this->input->post('kost_id') );
        }
        // echo "tidak ada file";
      }else{
        // echo "gagal";
        $this->session->set_flashdata('edit_kamar', array(
          'from' => 0,
          'message' =>  'terjadi kesalahan saat mengirim data'
        ));
        $data['files'] = $this->m_kamar->get_kamar_by_id( $this->input->post('kost_id') );
        $data[ "kosts" ] = $this->m_kost->getData( $this->session->userdata('user_id') );
        $data[ "info_kost" ] = $this->m_kost->get_kost_by_id( $this->input->post('kost_id') ); 
       // echo var_dump( $data );
        $this->load->view("_template/header");
        $this->load->view("_template/sidebar_menu");
            $this->load->view("View_detail_kost",$data);
        $this->load->view("_template/footer");  
      }
  }
  public function delete_kamar()
  {
      $location = './upload/kamar/';
      $filename =  $this->input->post('kamar_foto');
      $filename = explode(";", $filename );
      $data_kamar['kamar_id'] = $this->input->post('kamar_id');
      $data_kepemilikan['kost_id'] = $this->input->post('kost_id');
      $data_kepemilikan['kepemilikan_id'] = $this->input->post('kepemilikan_id');
      $result = $this->m_kamar->delete($data_kamar, $data_kepemilikan);
      if( $result )
      {
          $this->session->set_flashdata('edit_kamar', array(
            'from' => 1,
            'message' =>  'Kamar berhasil dihapus'
          ));
          foreach( $filename as $image )
          {
              @unlink($location.$image);
          }
          redirect(site_url('/kost/detail_kost')."/".$this->input->post('kost_id') );
      }else{
          $this->session->set_flashdata('edit_kamar', array(
            'from' => 0,
            'message' =>  'terjadi kesalahan saat menghapus data'
          ));
          redirect(site_url('/kost/detail_kost')."/".$this->input->post('kost_id') );
      }
  }

  public function edit_kost()
  {
    if( !empty( $_FILES['document_file']['name'] ) )
    {
          // // @unlink($filename);
      $name= $_FILES['document_file']['name'];
      $size= $_FILES['document_file']['size'];
      $type= $_FILES['document_file']['type'];
      if(!empty( $name ) && $size  < 16777216 )
      {
        $data_kost['kost_photo'] = date('Y-m-d-h-i-s').$name;
        $tmp_name = $_FILES['document_file']['tmp_name'];
        $location = './upload/kost/';
        if(move_uploaded_file($tmp_name, $location.$data_kost['kost_photo']))
        {
          @unlink($location.$this->input->post('kost_old_photo'));
        }
      }
    }else{
    }
    $data_kost['kost_id'] = $this->input->post('kost_id');
    $data_kost['kost_name'] = $this->input->post('kost_name');
    $data_kost['kost_address'] = $this->input->post('kost_address');
    $data_kost['kost_keterangan'] = $this->input->post('kost_keterangan');
    $data_kost['kost_latitude'] = $this->input->post('kost_latitude');
    $data_kost['kost_langitude'] = $this->input->post('kost_langitude');
    // echo var_dump( $data_kost );

    if( $this->m_kost->update( $data_kost ) )
    {
      $this->session->set_flashdata('document', array(
        'from' => 1,
        'message' =>  'Kost berhasil diubah'
      ));

      redirect(site_url('') );
    }else{
      $this->session->set_flashdata('document', array(
        'from' => 0,
        'message' =>  'terjadi kesalahan saat mengedit data'
      ));
      redirect(site_url('') );
    }

  }

  public function delete_kost()
  {
    $data_kost['kost_id'] = $this->input->post('kost_id');
    // echo var_dump( $data_kost );
    $location = './upload/kost/';

    $filename = $this->input->post('kost_photo');
    if(
     ! @unlink($location.$filename)
    ){
      $this->session->set_flashdata('document', array(
        'from' => 0,
        'message' =>  'terjadi kesalahan saat menghapus data'

      ));
      redirect(site_url('') );
      return;
    }
    if( $this->m_kost->delete( $data_kost ) )
    {

      $this->session->set_flashdata('document', array(
        'from' => 1,
        'message' =>  'Kost berhasil Hapus'
      ));

      redirect(site_url('') );
    }else{
      $this->session->set_flashdata('document', array(
        'from' => 0,
        'message' =>  'terjadi kesalahan saat menghapus data'
      ));
      redirect(site_url('') );
    }
  }
}