<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends User_Controller {
  // class Home extends CI_Controller {

  public function __construct(){
      parent::__construct();
      // $this->output->enable_profiler(TRUE);
    $this->load->model("m_login");
    $this->load->model("m_register");
    $this->load->model("m_admin");
    $this->load->model("m_user");
    $this->load->model("m_log");
    $this->load->helper('array');
    $this->load->library("pagination");
  }

  public function index() 
  {
    if(
        $this->session->userdata('user_level') == 1
    )
    {
        redirect(site_url('/admin/home'));
    }
      $data['page_name'] = "Beranda";
    
      $data['user'] = $this->m_user->getUser( $this->session->userdata('user_id') );
      $data['data_uji'] = $this->m_user->getUser( $this->session->userdata('user_id') );
      $this->load->view("_user/_template/header1");
    //   $this->load->view("_user/_template/sidebar_menu");
          $this->load->view("_user/_template/content",$data);
      $this->load->view("_user/_template/footer");  
  }
}