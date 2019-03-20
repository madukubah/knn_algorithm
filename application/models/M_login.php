<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function login($data) {
        $username = $data[ "user_username" ];
        $pass = $data[ "user_password" ];
        $sql ="
            SELECT a.user_profile_fullname,  a.user_profile_image_path, b.user_status , b.user_level , b.user_id, b.user_username
            from user_profile a
            LEFT JOIN user b on b.user_id = a.user_id
            WHERE b.user_username = '$username'
            and b.user_password = '$pass'
        ";

        $result = $this->db->query($sql)->result();

        return $result;
        // echo var_dump($result);
    }
    

    function __destruct() {
        $this->db->close();
    }

    // API
    public function loginAPI($data) {
        $username = $data[ "user_username" ];
        $pass = $data[ "user_password" ];
        $sql ="
            SELECT a.*, b.user_status , b.user_level , b.user_id, b.user_username
            from user_profile a
            LEFT JOIN user b on b.user_id = a.user_id
            WHERE b.user_username = '$username'
            and b.user_password = '$pass'
        ";

        $result = $this->db->query($sql)->result();

        return $result;
    }
}

