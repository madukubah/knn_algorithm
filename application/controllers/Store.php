<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends Admin_Controller {

  public function __construct(){
      parent::__construct();
      // $this->output->enable_profiler(TRUE);
    
    $this->load->model("m_user");
    $this->load->model("m_store");
    $this->load->model("m_log");
    $this->load->helper('array');
    $this->load->library("pagination");
    $this->load->library('upload');
    $this->load->library('form_validation'); 
  } 


  public function index() 
  {
    $data['page_title'] = "Tambah ";
    $config = array(
        array(
               'field' => 'store_name',
                'label' => 'Kamar',
                'rules' =>  'trim|required',
                'errors' => array(
                        'required' => 'Nama  harus di isi'
                ),
        ),
        array(
                'field' => 'store_address',
                'label' => 'Harga',
                'rules' => 'required',
                'errors' => array(
                        'required' => 'Alamat di isi',
                ),
        ),
        array(
                'field' => 'store_description',
                'label' => 'Panjang',
                'rules' => 'required',
                'errors' => array(
                        'required' => 'Keterangan harus di isi',
                ),
        ),
       array(
                'field' => 'store_latitude',
                'label' => 'Lebar',
                'rules' => 'required',
                'errors' => array(
                        'required' => 'Latitude harus di isi',
                ),
        ),
        array(
                'field' => 'store_langitude',
                'label' => 'Keterangan',
                'rules' => 'required',
                'errors' => array(
                        'required' => 'Langitude harus di isi',
                ),
        ),
     );
     $this->form_validation->set_rules($config);    
     if ($this->form_validation->run() === true) 
     {  
        

        $data_store['user_id'] =$this->session->userdata('user_id');
        $data_store['store_name'] = $this->input->post('store_name');
        $data_store['store_address'] = $this->input->post('store_address');
        $data_store['store_description'] = $this->input->post('store_description');
        $data_store['store_latitude'] = $this->input->post('store_latitude');
        $data_store['store_langitude'] = $this->input->post('store_langitude');
        
        // echo var_dump( $data_store );
        $name= $_FILES['document_file']['name'];        
        $size= $_FILES['document_file']['size'];
        $type= $_FILES['document_file']['type'];
        $tmp_name = $_FILES['document_file']['tmp_name'];

        $data_store['store_images'] =time()."-".$name;
        $message="terjadi kesalahan saat mengunggah gambar (gambar rusak/ terlalu besar)";
        if(!empty( $name ) && $size  < 16777216 ){
                $location = './upload/store/';
                if(move_uploaded_file($tmp_name, $location.$data_store['store_images']))
                {
                        $result = $this->m_store->create( $data_store );
                        if( $result )
                        {
                                $this->session->set_flashdata('info', array(
                                'from' => 1,
                                'message' =>  'data berhasil ditambah'
                                ));
                                redirect(site_url('/store'));
                        }
                        $message="terjadi kesalahan saat mengirim data";

                }
        }
        $this->session->set_flashdata('info', array(
                'from' => 0,
                'message' =>  $message
                ));
        redirect(site_url('/store'));
     }else{
        $data['user'] = $this->m_user->getUser( $this->session->userdata('user_id') )[0];
        $this->load->view("_template/header");
        $this->load->view("_template/sidebar_menu");
            $this->load->view("store/View_add",$data);
        $this->load->view("_template/footer");
     }
  }

  public function edit_store() 
  {
        if( !($_POST) ) redirect(site_url(''));  
    $data['page_title'] = "edit ";
    $config = array(
        array(
               'field' => 'store_name',
                'label' => 'Kamar',
                'rules' =>  'trim|required',
                'errors' => array(
                        'required' => 'Nama  harus di isi'
                ),
        ),
        array(
                'field' => 'store_address',
                'label' => 'Harga',
                'rules' => 'required',
                'errors' => array(
                        'required' => 'Alamat di isi',
                ),
        ),
        array(
                'field' => 'store_description',
                'label' => 'Panjang',
                'rules' => 'required',
                'errors' => array(
                        'required' => 'Keterangan harus di isi',
                ),
        ),
       array(
                'field' => 'store_latitude',
                'label' => 'Lebar',
                'rules' => 'required',
                'errors' => array(
                        'required' => 'Latitude harus di isi',
                ),
        ),
        array(
                'field' => 'store_langitude',
                'label' => 'Keterangan',
                'rules' => 'required',
                'errors' => array(
                        'required' => 'Langitude harus di isi',
                ),
        ),
     );
     $this->form_validation->set_rules($config);  
     $message="lengkapi semua form !!";
     if ($this->form_validation->run() === true) 
     {  
        $data_store['user_id'] =$this->session->userdata('user_id');
        $data_store['store_name'] = $this->input->post('store_name');
        $data_store['store_address'] = $this->input->post('store_address');
        $data_store['store_description'] = $this->input->post('store_description');
        $data_store['store_latitude'] = $this->input->post('store_latitude');
        $data_store['store_langitude'] = $this->input->post('store_langitude');
        
        // echo var_dump( $data_store );
        $name= $_FILES['document_file']['name'];        
        $size= $_FILES['document_file']['size'];
        $type= $_FILES['document_file']['type'];
        $tmp_name = $_FILES['document_file']['tmp_name'];

        
        $message="terjadi kesalahan saat mengirim data)";
        if(!empty( $name ) && $size  < 16777216 ){
                $location = './upload/store/';
                $data_store['store_images'] =time()."-".$name;
                if(move_uploaded_file($tmp_name, $location.$data_store['store_images']))
                {
                        $old_photo = $this->input->post('store_old_images') ;
                        @unlink($location.$old_photo );
                }else{
                        if( $result )
                        {
                                $this->session->set_flashdata('info', array(
                                'from' => 0,
                                'message' =>  'foto tidak terupload'
                                ));
                                redirect(site_url(''));
                                return;
                        }
                }
        }

        $data_store_param['store_id'] = $this->input->post('store_id');
        $result = $this->m_store->update( $data_store, $data_store_param );
        if( $result )
        {
                $this->session->set_flashdata('info', array(
                'from' => 1,
                'message' =>  'data berhasil diubah'
                ));
                redirect(site_url(''));
                return;
        }

        $this->session->set_flashdata('info', array(
                'from' => 0,
                'message' =>  $message
                ));
        redirect(site_url(''));
     }else{
        $this->session->set_flashdata('info', array(
                'from' => 0,
                'message' =>  $message
                ));
        redirect(site_url(''));
     }
  }

  public function delete_store()
  {
        if( !($_POST) ) redirect(site_url(''));  
        $data['files'] = $this->m_store->read( $this->session->userdata('user_id') );
        if( count( $data['files'] ) <= 1  ){
                $this->session->set_flashdata('info', array(
                'from' => 0,
                'message' =>  "minimal punya 1 store"
                ));
                redirect(site_url(''));
                return;
        }
        $message="terjadi kesalahan saat menghapus data)";
        $data_store_param['store_id'] = $this->input->post('store_id');

        $result = $this->m_store->delete( $data_store_param );
        if( $result )
        {
                $location = './upload/store/';
                $store_images = $this->input->post('store_images') ;
                @unlink($location.$store_images );
                
                $this->session->set_flashdata('info', array(
                'from' => 1,
                'message' =>  'data berhasil dihapus'
                ));
                redirect(site_url(''));
                return;
        }
        
        $this->session->set_flashdata('info', array(
                'from' => 0,
                'message' =>  $message
                ));
        redirect(site_url(''));
  }       
}