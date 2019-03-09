<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_category extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getData(  )
    {
        $sql = "

        SELECT * FROM `category`

        ";

        // Where category_id != 0

        return $this->db->query( $sql )->result();
    }
    public function get_data_by_id( $category_id  )
    {
        $sql = "

        SELECT * FROM `category`
        where category_id = '$category_id'

        ";

        return $this->db->query( $sql )->result()[0];
    }

    public function insert( $data_category )
    {

        $this->db->insert('category', $data_category);
        $sql = "

        SELECT * FROM `category`
        ORDER BY `category`.`category_id` DESC

        ";

        $id = $this->db->query( $sql )->result()[0]->category_id;
        $data_category_relation["category_relation_parent"] = 0;
        $data_category_relation["category_relation_child"] = $id;

        return $this->db->insert('category_relation', $data_category_relation);
    }

    public function insert_new_child( $data_category, $data_category_relation1 )
    {

        $this->db->insert('category', $data_category);
        $sql = "

        SELECT * FROM `category`
        ORDER BY `category`.`category_id` DESC

        ";

        $id = $this->db->query( $sql )->result()[0]->category_id;
        $data_category_relation["category_relation_parent"] = $data_category_relation1["category_relation_parent"];
        $data_category_relation["category_relation_child"] = $id;

        return $this->db->insert('category_relation', $data_category_relation);
    }

    public function update( $data_category, $data_category_param )
    {
        return  $this->db->update('category', $data_category, $data_category_param);
    }

    public function delete( $data_category )
    {
        $current = $data_category['category_id'];
        
        $sql = "
        SELECT * FROM `category_relation`
        where category_relation_parent = '$current'
        ";
          
            $childs = $this->db->query( $sql )->result();

        $sql = "
        SELECT * FROM `category_relation`
        where category_relation_child = '$current'
        ";
          
            $parent = $this->db->query( $sql )->result()[0];

        foreach( $childs as $child )
        {
            $data_category_relation["category_relation_parent"] = $parent->category_relation_parent;
            $data_category_relation["category_relation_child"] = $child->category_relation_child ;

            $this->db->insert('category_relation', $data_category_relation);

            $this->db->delete( "category_relation" , array(

                'category_relation_id' => $child->category_relation_id
    
            )); 
        }
        
        $this->db->delete( "category_relation" , array(

            'category_relation_id' => $parent->category_relation_id

        )); 

        return $this->db->delete( "category" , array(

            'category_id' => $data_category['category_id']

        )); 
    }

}
