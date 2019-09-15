<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_management extends Admin_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model("m_admin");
    $this->load->model("m_user");
    $this->load->model("m_data_uji");

    $this->load->helper('array');
    $this->load->model("m_log");
    $this->load->library("pagination");
    $this->load->library('form_validation'); 
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

  public function editUser( $user_id )
  {
    $this->form_validation->set_rules('user_profile_fullname','user_profile_fullname','trim|required');
    $this->form_validation->set_rules('user_profile_address','user_profile_address','trim|required');
    $this->form_validation->set_rules('user_profile_phone','user_profile_phone','trim|required');
    $this->form_validation->set_rules('data_semester','data_semester','trim|required');
    $this->form_validation->set_rules('data_IPK','data_IPK','trim|required');
    $this->form_validation->set_rules('data_gaji_ortu','data_gaji_ortu','trim|required');
    $this->form_validation->set_rules('data_tanggungan','data_tanggungan','trim|required');
    $this->form_validation->set_rules('data_UKT','data_UKT','trim|required');

    if ($this->form_validation->run() == true) 
    {
      $data_profile["user_profile_fullname"] = $this->input->post('user_profile_fullname');
      $data_profile["user_profile_address"] = $this->input->post('user_profile_address');
      $data_profile["user_profile_phone"] = $this->input->post('user_profile_phone');

      $data_uji["data_semester"] = $this->input->post('data_semester');
      $data_uji["data_IPK"] = $this->input->post('data_IPK');
      $data_uji["data_gaji_ortu"] = $this->input->post('data_gaji_ortu');
      $data_uji["data_tanggungan"] = $this->input->post('data_tanggungan');
      $data_uji["data_UKT"] = $this->input->post('data_UKT');

      $this->m_user->update_profile( $data_profile , ["user_id" => $user_id ] );

      $this->m_data_uji->update( $data_uji , ["user_id" => $user_id ] );


      $this->session->set_flashdata('info', array(
        'from' => 1,
        'message' =>  "Data user berhasil di Edit !!",
      ));

      redirect(site_url('admin/user_management'));
    }
    else{
      $data['users'] = $this->m_admin->read( $user_id );
      $this->load->view("_admin/_template/header");
      $this->load->view("_admin/_template/sidebar_menu");
      $data['page_name'] = "Edit";
      $this->load->view("_admin/user_management/View_edit", $data);

      $this->load->view("_admin/_template/footer");  
    }

    
    return;
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

  public function delete_all()
   {
    $curr_user_id = $this->session->userdata( "user_id" );
    $this->m_user->delete_all( $curr_user_id );
    // echo $curr_user_id; return;
    
    $result = true;// $this->m_admin->deleteUser( $data_user );
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