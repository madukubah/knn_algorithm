<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function read( $user_id = -1 )
    {
        $sql = "
        SELECT  a.*, b.*, c.* , b.user_id as user_id FROM user_profile a 
        LEFT JOIN user b ON b.user_id = a.user_id 
        LEFT JOIN data_uji c ON c.user_id = b.user_id 
        WHERE b.user_level != 1 
        ";
        if( $user_id != -1 ){
            $sql .= "
                and b.user_id = '$user_id'
            ";  
        }
        // $sql .= " GROUP BY b.user_id ";
        return $this->db->query( $sql )->result();
    }

    public function editUser( $data_user , $data_user_profile)
    {
        $this->db->update('user_profile', $data_user_profile, array(
            'user_id' => $data_user['user_id']
        ));
        return  $this->db->update('user', $data_user, array(
            'user_id' => $data_user['user_id']
        ));
    }

    public function deleteUser( $data_user_param )
    {
        $this->db->delete( "data_uji" , $data_user_param );
        $this->db->delete( "data_uji_normalized" , $data_user_param );
        $this->db->delete( "user_profile" , $data_user_param );
        return $this->db->delete( "user" , $data_user_param );
    }
}