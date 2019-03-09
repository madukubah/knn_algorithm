<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kepemilikan extends CI_Model{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function create( $data_kepemilikan )
    {
        return $this->db->insert('kepemilikan', $data_kepemilikan);
    }
    public function update( $data )
    {
        return  $this->db->update('kepemilikan', $data, array(
            'kepemilikan_id' => $data['kepemilikan_id']
        ));
    }
    
    public function select_column_name($db) {
        $query = $this->db->query("select COLUMN_NAME
                              from INFORMATION_SCHEMA.COLUMNS
                              where TABLE_SCHEMA='$db' and TABLE_NAME='log'");
        return $query->result();
    }

    public function getData( $user_id )
    {
        $sql = "
            SELECT a.*, b.user_username FROM kost a left JOIN user b on b.user_id=a.user_id
            where b.user_id = '$user_id'
        ";
        return $query = $this->db->query($sql)->result();

    }
}