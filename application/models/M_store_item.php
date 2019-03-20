<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_store_item extends CI_Model{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function create( $data_store_item )
    {
        return $this->db->insert('store_item', $data_store_item);
    }

    public function read_by_store_id( $store_id )
    {
        $sql = "
            SELECT a.*, b.*, c.*, z.category_name FROM store_item a 
            LEFT JOIN item b on b.item_id = a.item_id 
            LEFT JOIN store c on c.store_id = a.store_id
            LEFT JOIN category z on z.category_id = b.category_id 
            WHERE a.store_id = '$store_id'
        ";

        return $query = $this->db->query($sql)->result();
    }
}