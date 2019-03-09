<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class M_kamar extends CI_Model{



    function __construct() {

        parent::__construct();

        $this->load->database();

    }



    public function create( $data )

    {

        return $this->db->insert('kamar', $data);

    }

    public function update( $data )

    {

        return  $this->db->update('kamar', $data, array(

            'kamar_id' => $data['kamar_id']

        ));

    }



    public function delete($data_kamar, $data_kepemilikan)

    {

        if(

            $this->db->delete( "kepemilikan" , array(

                'kepemilikan_id' => $data_kepemilikan['kepemilikan_id']

            ))

        )

        return $this->db->delete( "kamar" , array(

            'kamar_id' => $data_kamar['kamar_id']

        ));

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

    public function get_kamar( )

    {

        $sql = "

            SELECT * FROM `kamar`ORDER BY kamar_id DESC LIMIT 1

        ";

        return $query = $this->db->query($sql)->result();

    }

    public function getData($id)

    {

        $sql = "
            SELECT a.*, b.*, c.kost_name FROM kepemilikan a
            LEFT JOIN kamar b on b.kamar_id=a.kamar_id
            LEFT JOIN kost c on c.kost_id=a.kost_id
            WHERE user_id=$id;
        ";

        return $query = $this->db->query($sql)->result();



    }



    public function get_kamar_by_id( $kost_id )

    {

        $sql = "
            SELECT a.*, b.*, c.* FROM kepemilikan a 
            LEFT JOIN kamar b on b.kamar_id = a.kamar_id 
            LEFT JOIN kost c on c.kost_id = a.kost_id
            WHERE a.kost_id = '$kost_id'
        ";

        return $query = $this->db->query($sql)->result();

    }



    public function get_all_kamar(  )

    {

        $sql = "
            SELECT a.*, b.*, c.*, d.* FROM kepemilikan a
            LEFT JOIN kamar b on b.kamar_id = a.kamar_id
            LEFT JOIN kost c on c.kost_id = a.kost_id
            LEFT JOIN user_profile d on d.user_id = c.user_id
        ";

        if( $result = $query = $this->db->query($sql)->result() ){

            return array(
                "status" => 1,
                "value" => $result
            );

        }else{

            return array(
                "status" => 0,
                "value" => array()
            );

        }

    }


    // API
    public function get_kamar_by_kost_id( $kost_id )

    {

        $sql = "

            SELECT a.*, b.*, c.*, d.* FROM kepemilikan a

            LEFT JOIN kamar b on b.kamar_id = a.kamar_id

            LEFT JOIN kost c on c.kost_id = a.kost_id

            LEFT JOIN user_profile d on d.user_id = c.user_id

            LEFT JOIN user z ON z.user_id = c.user_id

            WHERE c.kost_id = '$kost_id'

            AND z.user_status != 0

        ";



        if( $result = $query = $this->db->query($sql)->result() ){

            return array(

                "status" => 1,

                "value" => $result

            );

        }else{

            return array(

                "status" => 0,

                "value" => array()

            );

        }

    }



    public function get_kamar_detail( $kamar_id )

    {

        $sql = "

            SELECT a.*, b.*, c.*, d.* FROM kepemilikan a

            LEFT JOIN kamar b on b.kamar_id = a.kamar_id

            LEFT JOIN kost c on c.kost_id = a.kost_id

            LEFT JOIN user_profile d on d.user_id = c.user_id

            LEFT JOIN user z ON z.user_id = c.user_id

            WHERE b.kamar_id = '$kamar_id'

            AND z.user_status != 0

        ";



        if( $result = $query = $this->db->query($sql)->result() ){

            return array(

                "status" => 1,

                "value" => $result

            );

        }else{

            return array(

                "status" => 0,

                "value" => array()

            );

        }

    }



    public function get_kamar_available( $order = -1 , $start)

    {
        $ORDER = array(
            // murah
            "
            order by b.kamar_harga asc
            limit $start , 5
            ",
            // mahal
            "
            order by b.kamar_harga desc
            limit $start , 5
            "
        );
        $sql = "

            SELECT a.*, b.*, c.*, d.* FROM kepemilikan a

            LEFT JOIN kamar b on b.kamar_id = a.kamar_id

            LEFT JOIN kost c on c.kost_id = a.kost_id

            LEFT JOIN user_profile d on d.user_id = c.user_id

            LEFT JOIN user z ON z.user_id = c.user_id

            WHERE b.kamar_quantity >= 1

            AND z.user_status != 0

        ";

        if( $order != -1 )
        {
            $sql = $sql . $ORDER[ $order ];
        }

        if( $result = $query = $this->db->query($sql)->result() ){

            return array(

                "status" => 1,

                "value" => $result

            );

        }else{

            return array(

                "status" => 0,

                "value" => array()

            );

        }

    }

    public function hit_kamar( $kamar_id )

    {

        $sql = "

            SELECT * FROM kamar

            WHERE kamar_id = '$kamar_id'

        ";


        if( $result = $query = $this->db->query($sql)->result() ){

            $data_kamar["kamar_hit"] = ++$result[0]->kamar_hit;
            $data_kamar["kamar_id"] = $result[0]->kamar_id;

            $this->db->update('kamar', $data_kamar, array(

                'kamar_id' => $data_kamar['kamar_id']
    
            ));

            return array(

                "status" => 1,

                "value" => array()

            );

        }else{

            return array(

                "status" => 0,

                "value" => array()

            );

        }

    }

}