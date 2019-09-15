<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function inserLog( $data ){
        $this->db->insert('log', $data);
    }
    public function record_count(){
        return $this->db->count_all("log");
    }
    public function fetch_log($limit, $start){
        // $this->db->select('a.*, b.user_profile_fullname ');
        $sql = "
            SELECT a.* , b.user_profile_fullname FROM log a 
            left join user_profile b 
            on a.user_id = b.user_id 
            LIMIT ".$limit." OFFSET ".$start."
        ";
        return $query = $this->db->query($sql)->result();
    }
    public function select_column_name($db) {
        $query = $this->db->query("select COLUMN_NAME
                              from INFORMATION_SCHEMA.COLUMNS
                              where TABLE_SCHEMA='$db' and TABLE_NAME='log'");
        return $query->result();
    }

    public function getUser($id)
    {
        $sql = "
            SELECT a.*, b.* FROM user a 
            left join user_profile b on b.user_id = a.user_id
            WHERE a.user_id=$id;
        ";
        return $query = $this->db->query($sql)->result();
    }
    public function update_profile( $data_user_profile, $data_user_profile_param )
    {
        return  $this->db->update('user_profile', $data_user_profile, $data_user_profile_param);
    }
    public function update( $data_user, $data_user_param )
    {
        return  $this->db->update('user', $data_user, $data_user_param);
    }

    public function delete_all( $curr_user_id )
    {
        $sql = "select user_id from user where user_id != '$curr_user_id' ";
        $user_ids = $this->db->query($sql)->result();
        $ids = array();
        foreach( $user_ids as $item )
        {
            $ids []= $item->user_id;
        }
        // echo var_dump( $ids );

        $this->db->where_in('user.user_id', $ids );
        $this->db->delete( "user" );
        $this->db->where_in('user_profile.user_id', $ids );
        $this->db->delete( "user_profile" );
        $this->db->where_in('data_uji.user_id', $ids );
        $this->db->delete( "data_uji" );

    }
}