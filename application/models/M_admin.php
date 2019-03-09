<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class M_admin extends CI_Model{

    function __construct() {

        parent::__construct();

        $this->load->database();

    }

    public function getData(){

        $userid = $this->session->userdata('user_id');

        $sql = "

            SELECT a.*, b.* FROM user_profile a
            LEFT JOIN user b ON b.user_id = a.user_id
            WHERE b.user_level != 1

        ";

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

    public function editUserAPI( $data_user , $data_user_profile)
    {
        $user_id = $data_user['user_id'];
        $this->db->update('user_profile', $data_user_profile, array(
            'user_id' => $data_user['user_id']
        ));

        $this->db->update('user', $data_user, array(
            'user_id' => $data_user['user_id']
        ));

        $sql = "

            SELECT a.*, b.user_status , b.user_level , b.user_id, b.user_username
            from user_profile a
            LEFT JOIN user b on b.user_id = a.user_id
            WHERE b.user_id = '$user_id'

        ";

        return $this->db->query( $sql )->result();

    }

    public function deleteUser( $data_user )
    {
        $user_id = $data_user["user_id"];

        $sql = "

                SELECT * from kost

                WHERE user_id = '$user_id'

            ";

        $kosts = $this->db->query($sql)->result();
        foreach( $kosts as $kost )
        {
            $sql = "

                SELECT * from kepemilikan

                WHERE kost_id = '$kost->kost_id'

            ";

            $kamar = $this->db->query($sql)->result();
            foreach( $kamar as $k )
            {
                $this->db->delete( "kamar" , array(

                    'kamar_id' => $k->kamar_id

                ));
            }

            $this->db->delete( "kepemilikan" , array(

                'kost_id' => $kost->kost_id

            ));
            
            $this->db->delete( "kost" , array(

                'kost_id' => $kost->kost_id

            )); 
        }

        $this->db->delete( "user_profile" , array(

            'user_id' => $user_id

        )); 

        return $this->db->delete( "user" , array(

            'user_id' => $user_id

        )); 
    }

    // FACILITIES
    public function get_facility(  )
    {
        $sql = "

        SELECT * FROM `facility`

        ";

        return $query = $this->db->query($sql)->result();
    }

    public function create_facility( $data_facility )

    {

        return $this->db->insert('facility', $data_facility);

    }

    public function update_facility( $data_facility )

    {

        return  $this->db->update('facility', $data_facility, array(

            'facility_id' => $data_facility['facility_id']

        ));

    }

    public function delete_facility( $data_facility )
    {
        
        return $this->db->delete( "facility" , array(

            'facility_id' => $data_facility['facility_id']

        )); 
    }

    // MOBILE_VERSION
    public function get_mobile(  )
    {
        $sql = "

        SELECT * FROM `mobile`

        ";

        return $query = $this->db->query($sql)->result();
    }
    public function get_mobile_pemilik(  )
    {
        $sql = "

        SELECT * FROM `mobile_pemilik`

        ";

        return $query = $this->db->query($sql)->result();
    }
    
    // public function create_facility( $data_facility )

    // {

    //     return $this->db->insert('facility', $data_facility);

    // }

    public function update_mobile( $data_mobile )

    {

        return  $this->db->update('mobile', $data_mobile, array(

            'mobile_id' => $data_mobile['mobile_id']

        ));

    }

    public function update_mobile_pemilik( $data_mobile )

    {

        return  $this->db->update('mobile_pemilik', $data_mobile, array(

            'mobile_pemilik_id' => $data_mobile['mobile_pemilik_id']

        ));

    }
    

    // public function delete_facility( $data_facility )
    // {
        
    //     return $this->db->delete( "facility" , array(

    //         'facility_id' => $data_facility['facility_id']

    //     )); 
    // }

    // ADVERTISEMENT

    public function get_Advertisement(  )
    {
        $sql = "

        SELECT * FROM `advertise`

        ";

        return $query = $this->db->query($sql)->result();
    }

    public function create_Advertisement( $data_advertise )

    {

        return $this->db->insert('advertise', $data_advertise);

    }

    public function update_Advertisement( $data_advertise )

    {

        return  $this->db->update('advertise', $data_advertise, array(

            'advertise_id' => $data_advertise['advertise_id']

        ));

    }

    public function delete_Advertisement( $data_advertise )
    {
        
        return $this->db->delete( "advertise" , array(

            'advertise_id' => $data_advertise['advertise_id']

        )); 
    }

}