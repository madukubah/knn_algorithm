<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

  public function __construct(){
      parent::__construct();
      // $this->output->enable_profiler(TRUE);
    
    $this->load->model("m_category");
    $this->load->model("m_item");
    $this->load->model("m_category_relation");
    $this->load->helper('array');
    $this->load->library("pagination");

  } 


    public function index() 
    {

    }

    public function category_tree( $category_place_id = null ) 
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        http_response_code(200);

        if( !isset( $category_place_id) ||  $category_place_id == null ) 
            $category_place_id = 0;

        $data["relation_tree"] = $this->m_category_relation->get_relation_tree( $category_place_id );

        echo json_encode( array(
            "length" => count( $data["relation_tree"] ) ,
            "data" => $data["relation_tree"]
        )  );
    }

    public function sub_category( $category_id = null ) 
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        http_response_code(200);

        if( !isset( $category_id) ||  $category_id == null ) 
            $category_id = 0;

        $data["relation_tree"] = $this->m_category_relation->get_sub_category( $category_id );

        echo json_encode( array(
            "length" => count( $data["relation_tree"] ) ,
            "data" => $data["relation_tree"]
        )  );
    }
    
}