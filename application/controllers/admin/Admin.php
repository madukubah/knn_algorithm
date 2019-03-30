<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Admin_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model("m_admin");
    $this->load->helper('array');
    $this->load->model("m_log");
    $this->load->library("pagination");
  }
  public function index() {
    if (!($this->session->userdata('user_level') == 1 )) {
        #Tampilkan Halaman Login Pertama kali
        $this->session->sess_destroy();
        $this->session->set_flashdata('login', array(
            'from' => 0,
            'message' =>  'Anda bukan 4dm1n!!!'
          ));
          $log['log_datetime'] = date("Y-m-d H:i:s");
          $u_id = ( $this->session->userdata('user_id')  ) ? $this->session->userdata('user_id') : "-1";
          $log['log_message'] = 'access ADMIN : NOT ADMIN BY'."user => ".$this->session->userdata('user_username')."( id = ".$u_id.") ";
          $log['user_id'] = $u_id ; 
          $this->m_log->inserLog( $log );
          redirect(site_url('/'));
      }else{
        $data['page_name'] = "User Management";
        $log['log_datetime'] = date("Y-m-d H:i:s");
        $log['log_message'] = 'access ADMIN : VIEW '."user => ".$this->session->userdata('user_username')."( id = ".$this->session->userdata('user_id').") ";
        $log['user_id'] = $this->session->userdata('user_id');
        $this->m_log->inserLog( $log );
        $data['users'] = $this->m_admin->getData();

        $this->load->view("_admin/_template/header");
        $this->load->view("_admin/_template/sidebar_menu");
        $this->load->view("_admin/admin/View_admin", $data);
        $this->load->view("_admin/_template/footer");  

      }

  }



  public function editUser(){
    $log['log_datetime'] = date("Y-m-d H:i:s");
    $log['log_message'] = "EDIT USER (".$this->input->post('user_username').") BY (".$this->input->post('category_name')."):  user => ".$this->session->userdata('user_username')."( id = ".$this->session->userdata('user_id').") ; result => ";
    $log['user_id'] = $this->session->userdata('user_id');

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
      $log['log_message'] .= "true";
      $this->m_log->inserLog( $log );

     redirect(site_url('admin/admin'));
    }else{
      $this->session->set_flashdata('info', array(
        'from' => 0,
        'message' =>  "terjadi kesalahan saat mengedit data",
      ));
      $log['log_message'] .= "false = "."terjadi kesalahan saat mengedit data";
      $this->m_log->inserLog( $log );
     redirect(site_url('admin/admin'));

   }

  }
   public function deleteUser(){
    $log['log_datetime'] = date("Y-m-d H:i:s");
    $log['log_message'] = "DELETE USER (".$this->input->post('user_username').") BY (".$this->input->post('category_name')."):  user => ".$this->session->userdata('user_username')."( id = ".$this->session->userdata('user_id').") ; result => ";
    $log['user_id'] = $this->session->userdata('user_id');

   $data_user['user_id'] = $this->input->post('user_id');
    
    $result = $this->m_admin->deleteUser( $data_user );
    if( $result ){
     $this->session->set_flashdata('info', array(
          'from' => 1,
          'message' =>  "Data user berhasil di hapus !!",
        ));
        $log['log_message'] .= "true";
        $this->m_log->inserLog( $log );

        redirect(site_url('admin/admin'));
    }else{
        $this->session->set_flashdata('info', array(
          'from' => 0,

          'message' =>  "terjadi kesalahan saat menghapus data",

        ));
      $log['log_message'] .= "false = "."terjadi kesalahan saat menghapus data";
        $this->m_log->inserLog( $log );
        redirect(site_url('admin/admin'));

    }

  }
  // MOBILE VERSION
  public function edit_mobile_version(  )
  {
    $data_mobile["mobile_id"] = $this->input->post('mobile_id');
    $data_mobile["mobile_version"] = $this->input->post('mobile_version');

    if( $result = $this->m_admin->update_mobile( $data_mobile ) )
    {
        $this->session->set_flashdata('admin', array(

          'from' => 1,

          'message' =>  "Data Mobile berhasil di ubah !!",

        ));

        redirect(site_url('admin/admin'));
    }else{
        $this->session->set_flashdata('admin', array(

          'from' => 0,

          'message' =>  "terjadi Mobile saat merubah data !!",

        ));
        redirect(site_url('admin/admin'));
    }
  }
}