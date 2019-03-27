<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_testing_normalized extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function create( $data_testing )
    {
        return $this->db->insert_batch('data_testing_normalized', $data_testing);
    }
    public function read( $data_id = -1 )
    {
        $sql = "
            SELECT * from data_testing_normalized
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
        return  $this->db->update('data_testing_normalized', $data_testing, $data_testing_param);
    }
    public function delete(  $data_testing_param )
    {
        return $this->db->delete( "data_testing_normalized" , $data_testing_param);
    }
    public function clear(   )
    {
        return $query = $this->db->query( " TRUNCATE data_testing_normalized " );
    }

}