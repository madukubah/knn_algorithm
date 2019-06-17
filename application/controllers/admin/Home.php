<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Admin_Controller {

  public function __construct(){
      parent::__construct();
      // $this->output->enable_profiler(TRUE);
    $this->load->model("m_login");
    $this->load->model("m_register");
    $this->load->model("m_admin");
    $this->load->model("m_user");
    $this->load->model("m_data_uji");
    $this->load->model("m_data_testing");
    $this->load->model("m_log");
    $this->load->helper('array');
    $this->load->library("pagination");
  } 


  public function index() 
  {
      $data['page_name'] = "Beranda";
      $log['log_datetime'] = date("Y-m-d H:i:s");
      $log['log_message'] = "HOMEPAGE :  user => ".$this->session->userdata('user_username')."( id = ".$this->session->userdata('user_id').") ; result => ";
      $log['user_id'] = $this->session->userdata('user_id');
      $log['log_message'] .= "true";
      $this->m_log->inserLog( $log );
    //   $data=$this->m_kost->getData( $this->session->userdata('user_id') );
      $data['data_testing_count'] = $this->m_data_testing->count() ;
      $data['data_uji_count'] = $this->m_data_uji->count() ;
      $data['user'] = $this->m_user->getUser( $this->session->userdata('user_id') )[0];
      $this->load->view("_admin/_template/header");
      $this->load->view("_admin/_template/sidebar_menu");
          $this->load->view("_admin/_template/content",$data);
      $this->load->view("_admin/_template/footer");  
  }
}