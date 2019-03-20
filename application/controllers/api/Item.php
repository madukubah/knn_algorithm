<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

    public function __construct(){
        parent::__construct();
        // $this->output->enable_profiler(TRUE);
        
        $this->load->model("m_category");
        $this->load->model("m_item");
        $this->load->model("m_category_relation");
        $this->load->helper('array');
        $this->load->library("pagination");

    } 

    public function items( $category_id = null ) 
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        http_response_code(200);

        if( !isset( $category_id) ||  $category_id == null ) 
            $category_id = -1;

        $start = $this->input->get('start', TRUE);
        if( $start == null )
              $start = 0;

        $data["items"] = $this->m_item->get_data_limit( $category_id, $start );

        echo json_encode( array(
            "length" => count( $data["items"] ) ,
            "data" => $data["items"]
        )  );
    }
    
    public function items_by_store_id( $store_id = null )
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        http_response_code(200);

        if( !isset( $store_id) ||  $store_id == null ) {
            echo json_encode( array(
                "length" => 0 ,
                "data" => array()
            )  );
            return;
        }

        $start = $this->input->get('start', TRUE);
        if( $start == null )
              $start = 0;

        $data["items"] = $this->m_item->get_data_limit_by_store_id( $store_id, $start );

        echo json_encode( array(
            "length" => count( $data["items"] ) ,
            "data" => $data["items"]
        )  );
    }

    public function search( $query = "" )
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        http_response_code(200);

        $query = str_ireplace( "%20", " ", $query );

        $start = $this->input->get('start', false);
        if( $start == null )
              $start = 0;

        $data["results"] = $this->m_item->search( $query , $start);

        echo json_encode( array(
            "length" => count( $data["results"] ) ,
            "data" => $data["results"]
        )  );
    }
}