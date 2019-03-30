<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_register extends CI_Model{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function getData(){
        return $result =array(
            array(),
            array()
        ) ;
    }

    public function register($data, $dataProfile) {
        $data['user_level'] = 2;
        $data['user_status'] = 1;
        $data['create_date'] = date("Y-m-d");
        $this->db->where('user_username', $data['user_username']);
        $result = $this->db->get('user')->row();
            // echo var_dump($result);
        if(empty($result) ){
            if( $this->db->insert('user', $data) ){
                    $this->db->where('user_username', $data['user_username']);
                    $this->db->where('user_password', $data['user_password']);
                    $result = $this->db->get('user')->row();
                    // echo var_dump($result);
                    $datasession = array(
                        'user_id' => $result->user_id,
                        'user_username' => $data['user_username'],
                        'user_level' => $data['user_level'],
                        'user_profile_fullname' => $dataProfile['user_profile_fullname'],
                    );
                    $dataProfile['user_id'] = $result->user_id;
                    
                    if( $this->db->insert('user_profile', $dataProfile)){
                        return $data = array(
                            'status' => 1,
                            'message' => $datasession
                        );
                    }else{
                        return $data = array (
                            'status' => 0,
                            'message' => "terjadi kesalahan input"
                        );
                    }
                }
        }else{
            return $data = array (
                'status' => 0,
                'message' => "username sudah di gunakan, gunakan username lain"
            );
        }
            
        
    }

    function __destruct() {
        $this->db->close();
    }
}
?>
