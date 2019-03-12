<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Admin_Controller {

  public function __construct(){
      parent::__construct();
      // $this->output->enable_profiler(TRUE);
    $this->load->model("m_login");
    $this->load->model("m_register");
    $this->load->model("m_store");
    $this->load->model("m_user");
    $this->load->model("m_store_item");
    $this->load->model("m_log");
    $this->load->helper('array');
    $this->load->library("pagination");

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
      $data['user'] = $this->m_user->getUser( $this->session->userdata('user_id') )[0];
      $data['files'] =$this->m_store->read( $this->session->userdata('user_id') );
      $this->load->view("_template/header");
      $this->load->view("_template/sidebar_menu");
          $this->load->view("_template/content",$data);
      $this->load->view("_template/footer");  
  }

  //   DETAIL
  public function detail_store( $store_id  )
  {
          $data['files'] = $this->m_store_item->read_by_store_id( $store_id );
          $data[ "kosts" ] =array();// $this->m_kost->getData( $this->session->userdata('user_id') );
          $data[ "store_info" ] = $this->m_store->read_by_store_id( $store_id );
          $data[ "facilities" ] = array();//$this->m_kost->get_facility(  );

          $data['page_title'] = "Detail ";
          $data['user'] = $this->m_user->getUser( $this->session->userdata('user_id') )[0];
          $this->load->view("_template/header");
          $this->load->view("_template/sidebar_menu");
              $this->load->view("store/View_detail",$data);
          $this->load->view("_template/footer");
  }
}