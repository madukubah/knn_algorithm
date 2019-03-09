<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Download extends CI_Controller {
  function __construct() {
    parent::__construct();
    
  }
  
  public function index() {
    $this->load->helper('download');
    // $location = './upload/document/';
    // $location = './application/upload/document/';
    echo $filename = $this->uri->segment(3);
    // $data = file_get_contents(base_url('/upload/document/'.$filename));
    // $data = './upload/document/'.$filename;
    // $data = "C:\xampp\htdocs\SIDocs\upload\document".$filename;
    // echo base64_encode($data);
    redirect(base_url( '/upload/document/'.$filename ));
  }
}