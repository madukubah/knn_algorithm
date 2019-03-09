<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Shared extends CI_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model("m_login");
    $this->load->model("m_register");
    $this->load->model("m_document");
    $this->load->helper('array');
    $this->load->library("pagination");
  }
  
  public function index() {
    if (!($this->session->userdata('user_id'))) {
      #Tampilkan Halaman Login Pertama kali
      $this->load->view("login_page");
    }else{
      $user['user_group_id'] = $this->session->userdata('user_group_id');
      $user['position_id'] = $this->session->userdata('position_id');
        $result =  $this->m_document->getDocumentPublic( $user );
        $data['total'] = count($result[0]);
        $data['num_files'] = $result[1];
        $data['files'] = $result[0];
        $data['categories'] = $result[2];
        // echo site_url();
        $this->load->view("_template/header");
        $this->load->view("_template/sidebar_menu");
        $this->load->view("view_shared", $data);
        $this->load->view("_template/footer");  
    }
 }
}