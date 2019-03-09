<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class My404 extends CI_Controller {
  function __construct() {
    parent::__construct();
  }
  
  public function index() {
    if (!($this->session->userdata('user_id'))) {
      $this->load->view("login_page");
    } else {
      #Generate Template...
      $this->load->view('_template/header');
      $this->load->view('_template/sidebar_menu');
      $this->load->view('errors/error_404');
      $this->load->view('_template/footer');
      
    }
  }
}
?>