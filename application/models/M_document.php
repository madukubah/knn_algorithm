<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_document extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function getDocumentPublic( $user ){
        
        $sql = '
        SELECT a.* , b.category_name, c.position_name, d.user_group_name , e.user_profile_fullname 
            FROM document a 
            left join category b 
            on a.categori_id = b.category_id 
            left join position c
            on a.position_id = c.position_id 
            left join user_group d
            on a.user_group_id  = d.user_group_id 
            left join user_profile e
            on a.user_id   = e.user_id  
        where a.document_status = 1 and ( ( ';
        if( $user['position_id'] == 1 ){
            
        }else{
            $sql .= " a.position_id = '".$user['position_id']."' and  ";
        }
        
        $sql .= "a.user_group_id <= '".$user['user_group_id']."'
         ) or ( a.position_id = '1' and a.user_group_id <= '".$user['user_group_id']."' )  )
        order by a.user_group_id desc";
        $document =  $this->db->query($sql)->result();
        // PERBAIKI : SQL MENYELEKSI SEMUA DOKUMEN PUBLIC ; HARUS DITAMBAH PENYARING AGAR LEBIH SPESIFIK
        $sql = "SELECT count( document_type ) as num, document_type from document  where document_status = 1 GROUP by document_type";
        $kind_of_document = $this->db->query( $sql )->result();
        return array (
            $document, $kind_of_document, $this->getCategory()
        );
    }
    public function getDocument( $user ){
        $sql = '
            SELECT a.* , b.category_name, c.position_name, d.user_group_name  FROM document a 
            left join category b 
            on a.categori_id = b.category_id 
            left join position c
            on a.position_id = c.position_id 
            left join user_group d
            on a.user_group_id  = d.user_group_id 
            where user_id = "'.$user.'" 
            order by a.user_group_id desc';
        // $document =  $this->db->query($sql)->result();
        
        $sql = "SELECT count( document_type ) as num, document_type from document  where user_id = '".$user."' GROUP by document_type";
        $kind_of_document = $this->db->query( $sql )->result();
        return array (
            // $document, 
            $kind_of_document, $this->getCategory()
        );
    }
    public function getGroupAndPosition(){
        return array(
            $all_position = $this->db->get('position')->result(),
            $all_group = $this->db->get('user_group')->result(),
        );
    }
    public function getCategory(){
        return $this->db->get('category')->result();
    }
    public function setDocument( $data ){
        return $this->db->insert('document', $data);
    }
    public function addCategory($data){
        return $this->db->insert('category', $data);
    }
    public function editCategory($data){
        return  $this->db->update('category', $data, array(
            'category_id' => $data['category_id']
        ));
    }
    public function deleteCategory($data){
        return $this->db->delete( "category" , array(
            'category_id' => $data['category_id']
        ));
    }
    public function editDocument($data){
        return  $this->db->update('document', $data, array(
            'document_id' => $data['document_id']
        ));
    }
    public function deleteDocument($data){
        return $this->db->delete( "document" , array(
            'document_id' => $data['document_id']
        ));
    }

    public function record_count(){
        // HARUS COUNT SPESIFIK; MENYEBABKAN GANGGUAN DI BAGIAN PAGINATION
        return $this->db->count_all("document");
    }
    public function fetch_document($limit, $start, $user){
        $sql = '
            SELECT a.* , b.category_name, c.position_name, d.user_group_name  FROM document a 
            left join category b 
            on a.categori_id = b.category_id 
            left join position c
            on a.position_id = c.position_id 
            left join user_group d
            on a.user_group_id  = d.user_group_id 
            where user_id = "'.$user.'" 
            order by a.user_group_id desc '.
            "LIMIT ".$limit." OFFSET ".$start.""
            ;
        // $sql = "
        //     SELECT a.* , b.user_profile_fullname FROM log a 
        //     left join user_profile b 
        //     on a.user_id = b.user_id 
        //     LIMIT ".$limit." OFFSET ".$start."
        // ";
        return $query = $this->db->query($sql)->result();
    }
    public function select_column_name($db) {
        $query = $this->db->query("select COLUMN_NAME
                              from INFORMATION_SCHEMA.COLUMNS
                              where TABLE_SCHEMA='$db' and TABLE_NAME='document'");
        return $query->result();
    }

}