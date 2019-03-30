<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_uji_normalized extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function create( $data_testing )
    {
        return $this->db->insert_batch('data_uji_normalized', $data_testing);
    }
    public function read( $data_id = -1, $mode = "object" )
    {
        $sql = "
            SELECT a.*, b.* from data_uji_normalized a
            left join user_profile b on b.user_id = a.user_id
        ";
        if( $data_id != -1 ){
            $sql .= "
                where a.data_id = '$data_id'
            ";  
        }
        if( $mode == "array" )
            return $query = $this->db->query($sql)->result_array();
        else
            return $query = $this->db->query($sql)->result();
    }
    public function update( $data_testing, $data_testing_param )
    {
        return  $this->db->update('data_uji_normalized', $data_testing, $data_testing_param);
    }
    public function delete(  $data_testing_param )
    {
        return $this->db->delete( "data_uji_normalized" , $data_testing_param);
    }
    public function clear(   )
    {
        return $query = $this->db->query( " TRUNCATE data_uji_normalized " );
    }

}