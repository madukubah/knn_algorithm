<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_testing extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function create( $data_testing )
    {
        return $this->db->insert_batch('data_testing', $data_testing);
    }
    public function read( $data_id = -1 )
    {
        $sql = "
            SELECT * from data_testing
        ";
        if( $data_id != -1 ){
            $sql .= "
                where data_id = '$data_id'
            ";  
        }
        return $query = $this->db->query($sql)->result();
    }
    public function update( $data_testing, $data_testing_param )
    {
        return  $this->db->update('data_testing', $data_testing, $data_testing_param);
    }
    public function delete(  $data_testing_param )
    {
        return $this->db->delete( "data_testing" , $data_testing_param);
    }
    public function count(  )
    {
        return $this->db->count_all("data_testing");
    }

    public function get_min_max(  )
    {
        $sql = "
            SELECT * from data_testing
        ";
         $query = $this->db->query($sql)->result();
         if( empty(  $query ) ){
            return array();
         }
        return array(
            "min_data_semester" => $this->db->query("SELECT a.data_semester FROM data_testing a ORDER BY a.data_semester ASC LIMIT 1")->result(  )[0]->data_semester,
            "max_data_semester" => $this->db->query("SELECT a.data_semester FROM data_testing a ORDER BY a.data_semester DESC LIMIT 1")->result(  )[0]->data_semester,
            "min_data_IPK" => $this->db->query("SELECT a.data_IPK FROM data_testing a ORDER BY a.data_IPK ASC LIMIT 1")->result(  )[0]->data_IPK,
            "max_data_IPK" => $this->db->query("SELECT a.data_IPK FROM data_testing a ORDER BY a.data_IPK DESC LIMIT 1")->result(  )[0]->data_IPK,
            "min_data_gaji_ortu" => $this->db->query("SELECT a.data_gaji_ortu FROM data_testing a ORDER BY a.data_gaji_ortu ASC LIMIT 1")->result(  )[0]->data_gaji_ortu,
            "max_data_gaji_ortu" => $this->db->query("SELECT a.data_gaji_ortu FROM data_testing a ORDER BY a.data_gaji_ortu DESC LIMIT 1")->result(  )[0]->data_gaji_ortu,
            "min_data_UKT" => $this->db->query("SELECT a.data_UKT FROM data_testing a ORDER BY a.data_UKT ASC LIMIT 1")->result(  )[0]->data_UKT,
            "max_data_UKT" => $this->db->query("SELECT a.data_UKT FROM data_testing a ORDER BY a.data_UKT DESC LIMIT 1")->result(  )[0]->data_UKT,
            "min_data_tanggungan" => $this->db->query("SELECT a.data_tanggungan FROM data_testing a ORDER BY a.data_tanggungan ASC LIMIT 1")->result(  )[0]->data_tanggungan,
            "max_data_tanggungan" => $this->db->query("SELECT a.data_tanggungan FROM data_testing a ORDER BY a.data_tanggungan DESC LIMIT 1")->result(  )[0]->data_tanggungan
        );
         
    }

}