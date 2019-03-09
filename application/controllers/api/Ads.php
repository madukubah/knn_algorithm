<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ads extends CI_Controller {

  function __construct() {

    parent::__construct();

    $this->load->model("m_kamar");

    $this->load->model("m_user");

    $this->load->model("m_kost");

    $this->load->model("m_ads");

    $this->load->model("m_kepemilikan");

    $this->load->helper('array');

  }

  public function get_ads()
  {
    header("Access-Control-Allow-Origin: *");

    header("Content-Type: application/json; charset=UTF-8");

    http_response_code(200);

    echo json_encode($this->m_ads->get_ads() );
  }

  public function get_mobile_version()
  {
    header("Access-Control-Allow-Origin: *");

    header("Content-Type: application/json; charset=UTF-8");

    http_response_code(200);

    echo json_encode($this->m_ads->get_mobile_version() );
  }

  public function get_mobile_version_pemilik()
  {
    header("Access-Control-Allow-Origin: *");

    header("Content-Type: application/json; charset=UTF-8");

    http_response_code(200);

    echo json_encode($this->m_ads->get_mobile_version_pemilik() );
  }

}