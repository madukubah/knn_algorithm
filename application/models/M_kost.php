<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class M_kost extends CI_Model{



    function __construct() {

        parent::__construct();

        $this->load->database();

    }



    public function create( $data_kost )

    {

        return $this->db->insert('kost', $data_kost);

    }

    public function update( $data_kost )

    {

        return  $this->db->update('kost', $data_kost, array(

            'kost_id' => $data_kost['kost_id']

        ));

    }

    public function delete( $data_kost )
    {
        $location = './upload/kamar/';

        $kost_id = $data_kost[ "kost_id" ];
        $sql = "

                SELECT * from kepemilikan

                WHERE kost_id = '$kost_id'

            ";

        $kamar = $this->db->query($sql)->result();

        foreach( $kamar as $k )
        {
            $sql = "
                SELECT * from kamar
                WHERE kamar_id = '$k->kamar_id'
            ";

            $kamar_photos = $this->db->query($sql)->result();
            foreach( $kamar_photos as $kamar_photo )
            {
                $filename =  $kamar_photo->kamar_foto;
                $filename = explode(";", $filename );
                foreach( $filename as $image )
                {
                    @unlink($location.$image);
                }
            }
            $this->db->delete( "kamar" , array(

                'kamar_id' => $k->kamar_id

            ));
        }

        $this->db->delete( "kepemilikan" , array(

            'kost_id' => $kost_id

        ));
        
        return $this->db->delete( "kost" , array(

            'kost_id' => $kost_id

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



    public function getData( $user_id )

    {

        $sql = "

            SELECT a.*, b.user_username FROM kost a left JOIN user b on b.user_id=a.user_id

            where b.user_id = '$user_id'

        ";

        return $query = $this->db->query($sql)->result();



    }

    public function get_kost_by_id( $kost_id )

    {

        $sql = "

            SELECT a.* FROM kost a 

            where a.kost_id = '$kost_id'



        ";

        return $query = $this->db->query($sql)->result();



    }

    public function get_kost(  )
    {
        $sql = "
            SELECT * FROM `kost`
            ORDER BY kost_id DESC LIMIT 1
        ";
        return $query = $this->db->query($sql)->result();
    }


    // API
    public function get_all_kost( $kost_id = -1 , $start)

    {

        $sql = "

            SELECT a.*, b.* FROM kost a 

            LEFT JOIN user_profile b ON b.user_id = a.user_id

            LEFT JOIN user z ON z.user_id = a.user_id

        ";

        if( $kost_id != -1 )
        {
            $sql.= " WHERE a.kost_id = $kost_id 
                    AND z.user_status != 0
            ";
        }else{
            $sql.= " 
                    WHERE z.user_status != 0
                    limit $start , 7
            ";
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



    public function get_kost_by_name( $name )

    {

        $sql = "

            SELECT a.*, b.* FROM kost a 

            LEFT JOIN user_profile b ON b.user_id = a.user_id

            LEFT JOIN user z ON z.user_id = a.user_id

            WHERE a.kost_name LIKE '%$name%'

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



    public function get_kost_by_address( $address )

    {

        $sql = "

            SELECT a.*, b.* FROM kost a 

            LEFT JOIN user_profile b ON b.user_id = a.user_id

            LEFT JOIN user z ON z.user_id = a.user_id

            WHERE a.kost_address  LIKE '%$address%'

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

    public function kost_by_userid( $user_id )

    {

        $sql = "

            SELECT a.*, b.* FROM kost a 

            LEFT JOIN user_profile b ON b.user_id = a.user_id

            LEFT JOIN user z ON z.user_id = a.user_id

            WHERE z.user_id = '$user_id'

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

    public function get_facility(  )
    {
        $sql = "

        SELECT * FROM `facility`

        ";

        return $query = $this->db->query($sql)->result();
    }


    public function search_kost( $query )

    {

        $sql = "

            SELECT a.*, b.* FROM kost a 

            LEFT JOIN user_profile b ON b.user_id = a.user_id

            LEFT JOIN user z ON z.user_id = a.user_id

            WHERE (

                a.kost_address  LIKE '%$query%' OR

                a.kost_name LIKE '%$query%'

            ) 

            AND z.user_status != 0

            GROUP BY a.kost_id

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
}