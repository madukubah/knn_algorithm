<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ads extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_ads(  )

    {

        $sql = "

            SELECT * FROM advertise

        ";



        if( $result = $query = $this->db->query($sql)->result() ){

            return array(

                "status" => 1,

                "value" => $result

            );

        }else{

            return array(

                "status" => 0,

                "value" => array()

            );

        }

    }

    public function get_mobile_version(  )
    {
        $sql = "
            SELECT * FROM mobile
        ";
        if( $result = $query = $this->db->query($sql)->result() ){
            return array(
                "status" => 1,
                "value" => $result
            );
        }else{
            return array(
                "status" => 0,
                "value" => array()
            );
        }
    }

    public function get_mobile_version_pemilik(  )
    {
        $sql = "
            SELECT * FROM mobile_pemilik
        ";
        if( $result = $query = $this->db->query($sql)->result() ){
            return array(
                "status" => 1,
                "value" => $result
            );
        }else{
            return array(
                "status" => 0,
                "value" => array()
            );
        }
    }
}