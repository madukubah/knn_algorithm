<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_item extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function create( $data )
    {
        $data["create_date"] = date("Y-m-d");
        return $this->db->insert('item', $data);
    }
    public function get_last( )
    {
        $sql = "
            SELECT * FROM `item`ORDER BY item_id DESC LIMIT 1
        ";
        return $query = $this->db->query($sql)->result();
    }

    public function update( $data_item, $data_item_param )
    {
        return  $this->db->update('item', $data_item, $data_item_param );
    }

    public function delete($data_item, $data_store_item)
    {
        if(
            $this->db->delete( "store_item" , array(
                'store_item_id' => $data_store_item['store_item_id']
            ))
        )
        return $this->db->delete( "item" , array(
            'item_id' => $data_item['item_id']
        ));
    }
    
    // API
    public function get_data_limit( $category_id = -1, $start = 0 )
    {
        $sql = "
            SELECT a.*, x.*,y.*, z.category_name FROM item a
            LEFT JOIN store y on y.store_id = a.store_id
            LEFT JOIN category z on z.category_id = a.category_id 
            LEFT JOIN user_profile x on x.user_id = y.user_id     
        ";
        if( $category_id != -1 )
        {
            $sql .= "
                WHERE a.category_id = '$category_id'               
            ";  
        }
        $sql .= "
                limit $start , 5
            "; 
        return $this->db->query( $sql )->result();
    }
    
    public function get_data_limit_by_store_id( $store_id = -1, $start = 0 )
    {
        $sql = "
            SELECT a.*, x.*,y.*, z.category_name FROM item a
            LEFT JOIN store y on y.store_id = a.store_id
            LEFT JOIN category z on z.category_id = a.category_id 
            LEFT JOIN user_profile x on x.user_id = y.user_id     
        ";
        if( $store_id != -1 )
        {
            $sql .= "
                WHERE a.store_id = '$store_id'               
            ";  
        }
        $sql .= "
                limit $start , 5
            "; 
        return $this->db->query( $sql )->result();
    }

    public function search( $query = ""  , $start = 0 )
    {
        $sql = "
            SELECT a.*, b.*, x.*, y.* , z.category_name FROM item a
            LEFT JOIN store y on y.store_id = a.store_id
            LEFT JOIN category z on z.category_id = a.category_id 
            LEFT JOIN user_profile x on x.user_id = y.user_id       
            LEFT JOIN category b on b.category_id = a.category_id

            WHERE a.item_name LIKE '%$query%'
            OR a.item_description LIKE '%$query%'
            OR b.category_name LIKE '%$query%'
            OR y.store_name LIKE '%$query%'
            OR y.store_address LIKE '%$query%'
            OR x.user_profile_fullname LIKE '%$query%'            
        ";

        $sql .= "
                limit $start , 5
            "; 
        return $this->db->query( $sql )->result();
    }

}