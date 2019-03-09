<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Add extends Admin_Controller {
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
  public function index($id_user = null) 
  {
      $this->load->helper('form');
      $this->load->library('form_validation'); 
      $config = array(
        array(
                'field' => 'kamar_type',
                'label' => 'Kamar',
                'rules' =>  'trim|required',
                'errors' => array(
                        'required' => 'Tipe Kamar harus di isi'
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
        ),
        array(
                'field' => 'kamar_quantity',
                'label' => 'jumlah',
                'rules' => 'required',
                'errors' => array(
                        'required' => 'Jumlah kamar harus harus di isi',                       
                ),
        ),
      );
      $this->form_validation->set_rules($config);
     if ($this->form_validation->run() === true) 
      {
          if( empty($this->input->post('kost_id')) ){
            $this->session->set_flashdata('add', array(
              'from' => 0,
              'message' =>  'isi kost terlebih dahulu!!'
            ));
              redirect(site_url('/add'));
          }
          $location = './upload/kamar/';
          $data_kamar['kamar_type'] = $this->input->post('kamar_type');
          $data_kamar['kamar_harga'] = $this->input->post('kamar_harga');
          $data_kamar['kamar_panjang'] = $this->input->post('kamar_panjang');
          $data_kamar['kamar_lebar'] = $this->input->post('kamar_lebar');
          $data_kamar['kamar_quantity'] = $this->input->post('kamar_quantity');
          $data_kamar['kamar_facility'] = implode( ";", $this->input->post('kamar_facility[]') );
          // $data_kamar['kamar_foto'] = date('Y-m-d-h-i-s').$name;
          $photo = "";
          $photo_file_name = array();
          for( $i = 0 ; $i < count( $_FILES['document_file']['name'] ) ; $i++ )
            {
                $name0 =  $_FILES['document_file']['name'][ $i ];
                $name1 =  str_ireplace(" ", "", $data_kamar['kamar_type'] ); 
                $name= date('Y-m-d-h-i-s').$name1.$i.substr($name0, strpos($name0, '.') );
                $size= $_FILES['document_file']['size'][ $i ];
                $type= $_FILES['document_file']['type'][ $i ];
                $type= strtolower(substr($type, 0, strpos($type, '/')));
                // echo $size;
                // echo "<br>";
                $tmp_name = $_FILES['document_file']['tmp_name'][ $i ];
                if( ( $size  > 540001 ) || ( $type != "image" ) )
                    continue;
                if(move_uploaded_file($tmp_name, $location.$name ))
                {
                    array_push($photo_file_name, $name );
                }
            }
            $photo = implode( ";", $photo_file_name );
            // echo $photo;
            $data_kamar['kamar_foto']  = $photo;
            $result = $this->m_kamar->create( $data_kamar );
            if( $result )
            {
                $data_kepemilikan[ "kost_id" ] = $this->input->post('kost_id');
                $data_kepemilikan[ "kamar_id" ] =$this->m_kamar->get_kamar( )[ 0 ]->kamar_id;
                $data_kepemilikan[ "kepemilikan_status" ] = 1 ;
                $this->m_kepemilikan->create( $data_kepemilikan );
                $this->session->set_flashdata('add', array(
                  'from' => 1,
                  'message' =>  'Kamar berhasil ditambah'
                ));
                redirect(site_url('kost/detail_kost/').$this->input->post('kost_id') );
            }else{
                $this->session->set_flashdata('add', array(
                  'from' => 0,
                  'message' =>  'terjadi kesalahan saat mengirim data'
                ));
                redirect(site_url('/add'));
            }
      }else{
          $data[ "kosts" ] = $this->m_kost->getData( $this->session->userdata('user_id') );
          $data[ "facilities" ] = $this->m_kost->get_facility(  );
          $this->load->view("_template/header");
          $this->load->view("_template/sidebar_menu");
              $this->load->view("View_add",$data);
          $this->load->view("_template/footer");  
      }
  }
}