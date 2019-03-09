<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';

class Document extends REST_Controller{
  function __construct($config = 'rest') {
    parent::__construct($config);
    $this->load->database();  
    $this->load->model("m_document");
  }
  function index() {
          echo $id=$this->get('id');
          $result =  $this->m_document->getDocument( $id );
          echo json_encode($result);
  }

}