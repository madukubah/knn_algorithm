<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_category_relation extends CI_Model
{
    public  $relation_tree = array();

    public  $COUNT = 0;

    function __construct() {

        parent::__construct();

        $this->load->database();

    }

    public function getData(  )
    {
        $sql = "

        SELECT base.*, parent.category_name as parentName, child.category_name as childName 
        FROM category_relation base
        LEFT JOIN category parent ON parent.category_id = base.category_relation_parent
        LEFT JOIN category child ON child.category_id = base.category_relation_child

        ORDER BY `base`.`category_relation_parent` ASC

        ";

        return $this->db->query( $sql )->result();
    }

    public function insert( $data_category_relation )
    {
        //echo $data_category_relation["category_relation_child"] ;
        //echo "<br>";
        if( $this->searchUp( $data_category_relation["category_relation_child"] , $data_category_relation["category_relation_parent"] ) )
        {
            return false;
        }

        $child = $data_category_relation["category_relation_child"];
        $sql = "
            SELECT * FROM `category_relation`
            Where category_relation_child  = '$child'
            ORDER BY `category_relation`.`category_relation_id` ASC
        ";
         if( count( $results =  $this->db->query( $sql )->result() ) >= 1 )
         {
             for( $i=0; $i< count($results) ; $i++ )
             {
                $this->db->delete( "category_relation" , array(
                    'category_relation_id' => $results[$i]->category_relation_id
                )); 
             }
         }   
         return $this->db->insert('category_relation', $data_category_relation);
        
    }

    private function searchUp( $target, $current )
    {
        $sql = "
            SELECT * FROM `category_relation`
            Where category_relation_child  = '$current'
        ";
        $results = $this->db->query( $sql )->result();
        if( empty( $results ) )
        {
            return false;
        }

        foreach( $results as $result )
        {
            if( $result->category_relation_parent ==  $target )
            {
                return true;
            }

            return $this->searchUp( $target, $result->category_relation_parent );
        }
    }
    public function get_sub_category( $category_id = 0 )
    {
        $this->relation_tree = array();

        $sql = "
            SELECT a.*, child.* FROM category_relation a 
            LEFT JOIN category child ON child.category_id = a.category_relation_child 
            WHERE a.category_relation_parent = '$category_id'
            ORDER BY `child`.`category_order` ASC
        ";
        $results = $this->db->query( $sql )->result();
        if( !empty( $results ) )
        {
            $this->relation_tree = $results;
        }

        for( $i=0; $i< count( $this->relation_tree ); $i++ )
        {
            $id = $this->relation_tree[ $i ]->category_id;
            $sql = "
                SELECT a.* FROM category_relation a 
                WHERE a.category_relation_parent = '$id'
            ";
            $this->relation_tree[ $i ]->child  = "".count(  $this->db->query( $sql )->result() );
        }

        return $this->relation_tree;
    }

    public function get_relation_tree( $id = 0 )
    {
        $this->relation_tree = array();

        $this->relation_tree = $this->get_tree( $id ) ;

        return $this->relation_tree;
    }

    public function get_tree( $parent )
    {
        $this->COUNT++;

        if( $this->COUNT > 1000 )
            return array() ;

        $sql = "
            SELECT a.*, child.* FROM category_relation a 
            LEFT JOIN category child ON child.category_id = a.category_relation_child 
            WHERE a.category_relation_parent = '$parent'
            ORDER BY `child`.`category_name` ASC
        ";
        $results = $this->db->query( $sql )->result();

        $ARRAY = array();
        if( !empty( $results ) )
        {
            $ARRAY = $results;

            for( $i=0; $i< count( $ARRAY ); $i++ )
            {
                $ARRAY[ $i ]->child = array();
                $ARRAY[ $i ]->child  = $this->get_tree( $results[ $i ]->category_relation_child ) ;
                $ARRAY[ $i ]->length  = count( $ARRAY[ $i ]->child ) ; 
            }
        }
        return $ARRAY;
    }

    public function get_relation_tree_by_id( $category_id )
    {

        $this->relation_tree = array();

        $this->relation_tree = $this->get_tree( 0 ) ;

        $sql = "
            SELECT * FROM `place` 
            WHERE category_id = '$parent'
        ";
        $result0 = $this->db->query( $sql )->result();

        $data->id= 0;
        $data->places = array();
        if( !empty( $result0 ) )
        {
            $data->places = $result0;
        }
        $data->child = $this->relation_tree;
        return $data;
    }
    public function get_tree_and_places( $parent )
    {
        $this->COUNT++;

        if( $this->COUNT > 1000 )
            return array() ;

        $sql = "
            SELECT a.*, child.* FROM category_relation a 
            LEFT JOIN category child ON child.category_id = a.category_relation_child 
            WHERE a.category_relation_parent = '$parent'
            ORDER BY `child`.`category_name` ASC
        ";
        $results = $this->db->query( $sql )->result();

        $ARRAY = array();
        if( !empty( $results ) )
        {
            $ARRAY = $results;

            for( $i=0; $i< count( $ARRAY ); $i++ )
            {
                $idx = $results[ $i ]->category_relation_child;
                // 
                $sql = "
                    SELECT * FROM `place` 
                    WHERE category_id = '$idx'
                ";
                $ARRAY[ $i ]->places = array();
                $result0 = $this->db->query( $sql )->result();
                if( !empty( $result0 ) )
                {
                    $ARRAY[ $i ]->places = $result0;
                }
                // 
                $ARRAY[ $i ]->child = array();
                $ARRAY[ $i ]->child  = $this->get_tree( $results[ $i ]->category_relation_child ) ;
                $ARRAY[ $i ]->length  = count( $ARRAY[ $i ]->child ) ; 
            }
        }

        return $ARRAY;
    }

    public function delete( $data_category_relation )
    {
        return $this->db->delete( "category_relation" , array(
            'category_relation_id' => $data_category_relation['category_relation_id']
        )); 
    }
}