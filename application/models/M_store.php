<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_store extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function create( $data_store )
    {
        $data_store['create_date'] =  date("Y-m-d");
        return $this->db->insert('store', $data_store);
    }
    public function read( $user_id )
    {
        $sql = "
            SELECT a.*, b.user_username FROM store a 
            left JOIN user b on b.user_id=a.user_id
            where b.user_id = '$user_id'
        ";
        return $query = $this->db->query($sql)->result();
    }
    public function read_by_store_id( $store_id )
    {
        $sql = "
            SELECT a.*, b.user_username FROM store a 
            left JOIN user b on b.user_id=a.user_id
            where a.store_id = '$store_id'
        ";
        return $query = $this->db->query($sql)->result();
    }
    public function update( $data_store, $data_store_param )
    {
        return  $this->db->update('store', $data_store, $data_store_param);
    }

    public function delete( $data_store_param )
    {
        $location = './upload/item/';//hapus item dulu
        $store_id = $data_store_param[ "store_id" ];
        $sql = "
                SELECT * from store_item
                WHERE store_id = '$store_id'
            ";
        $items = $this->db->query($sql)->result();
        foreach( $items as $k )
        {
                $sql = "
                SELECT * from item
                WHERE item_id = '$k->item_id'
            ";
            $item_images = $this->db->query($sql)->result();
            foreach( $item_images as $item_image )
            {
                $filename =  $item_image->item_images;
                $filename = explode(";", $filename );
                foreach( $filename as $image )
                {
                    @unlink($location.$image);
                }
            }
            $this->db->delete( "item" , array(
                    'item_id' => $k->item_id
                ));
        }
        $this->db->delete( "store_item" , array(
            'store_id' => $store_id
        ));
      
        return $this->db->delete( "store" , array(
                'store_id' => $store_id
        )); 
    }

}