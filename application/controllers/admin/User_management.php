<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_management extends Admin_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model("m_admin");
    $this->load->helper('array');
    $this->load->model("m_log");
    $this->load->library("pagination");
  }
  public function index( $user_id = -1 ) 
  {
        $data['page_name'] = "User Management";
        // $data['users'] = $this->m_admin->read( $user_id );
        
        $data['users'] = $this->m_admin->read( $user_id );
        // echo json_encode( $data['users'] );return;

        $this->load->view("_admin/_template/header");
        $this->load->view("_admin/_template/sidebar_menu");
        if( $user_id == -1 )
          $this->load->view("_admin/user_management/View_list", $data);
        else{
          $data['page_name'] = "Detail";
          $this->load->view("_admin/user_management/View_detail", $data);
        }         

        $this->load->view("_admin/_template/footer");  
  }

  public function editUser()
  {

   if( !empty( $this->input->post('user_password') ) )
   {
     $data_user['user_password'] = md5(  $this->input->post('user_password') );
   }
    $data_user['user_id'] = $this->input->post('user_id');
    $data_user['user_username'] = $this->input->post('user_username');
    $data_user['user_level'] = $this->input->post('user_level');
    $data_user['user_status'] = $this->input->post('user_status');
    $data_user_profile['user_profile_fullname'] = $this->input->post('user_profile_fullname');
    $data_user_profile['user_profile_phone'] = $this->input->post('user_profile_phone');

    $result = $this->m_admin->editUser( $data_user , $data_user_profile);
    if( $result ){
      $this->session->set_flashdata('info', array(
        'from' => 1,
        'message' =>  "Data user berhasil di Edit !!",
      ));

     redirect(site_url('admin/user_management'));
    }else{
      $this->session->set_flashdata('info', array(
        'from' => 0,
        'message' =>  "terjadi kesalahan saat mengedit data",
      ));
      
     redirect(site_url('admin/user_management'));

   }

  }
   public function deleteUser()
   {
   $data_user['user_id'] = $this->input->post('user_id');
    
    $result = $this->m_admin->deleteUser( $data_user );
    if( $result ){
     $this->session->set_flashdata('info', array(
          'from' => 1,
          'message' =>  "Data user berhasil di hapus !!",
        ));

        redirect(site_url('admin/user_management'));
    }else{
        $this->session->set_flashdata('info', array(
          'from' => 0,
          'message' =>  "terjadi kesalahan saat menghapus data",
        ));
        redirect(site_url('admin/user_management'));
    }

  }
}