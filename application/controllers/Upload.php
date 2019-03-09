<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Upload extends CI_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model("m_login");
    $this->load->model("m_register");
    $this->load->model("m_document");
    $this->load->helper('array');
    $this->load->library("pagination");
  }
  
  public function index() {
    // if (!($this->session->userdata('user_id'))) {
    //   #Tampilkan Halaman Login Pertama kali
    //   $this->load->view("login_page");
    // }else{
        echo 'aaaa';
    // }
 }
}