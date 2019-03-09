<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_menu extends CI_Model {
  function __construct() {
    parent::__construct();
  }

  #Get Nama Kolom
  public function select_column_name($db) {
    $query = $this->db->query("select COLUMN_NAME
                              from INFORMATION_SCHEMA.COLUMNS
                              where TABLE_SCHEMA='$db' and TABLE_NAME='menu_tbl'");
    return $query->result();
  }

  #Export Data
  public function export() {
    $query = $this->db->query("select * from menu_tbl");
    return $query->result();
  }

  #Hitung Jumlah user
  public function record_count() {
    return $this->db->count_all("menu_tbl");
  }

  #tampilkan data
  public function fetch_menu($limit, $start) {
    $this->db->select('*');
    $this->db->from('menu_tbl');
    $this->db->limit($limit, $start);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  #Hitung data yang di cari
  public function record_count_search($key, $column_name) {
    if ($column_name == "") {
      $this->db->like("menu_name", $key);
      $this->db->or_like("menu_position", $key);
      //$this->db->or_like("user_status", $key);
    } else {
      $this->db->like($column_name, $key);
    }
    return $this->db->count_all_results("menu_tbl");
  }

  #Tampilkan data yang dicari
  public function fetch_menu_search($limit, $start, $key, $column_name) {
    $this->db->select('*');
    $this->db->from('menu_tbl');

    if ($column_name == "") {
      $this->db->like("menu_name", $key);
      $this->db->or_like("menu_position", $key);
      //$this->db->or_like("user_status", $key);
    } else {
      $this->db->like($column_name, $key);
    }

    $this->db->limit($limit, $start);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return null;

  }

  #Masukkan data ke DB
  public function input($data) {
    #insert data
    $this->db->insert('menu_tbl', $data);
  }

  #Edit data sesuai ID terpilih
  public function edit($data) {
    #update data
    $this->db->update('menu_tbl', $data, array(
      'menu_id' => $data['menu_id']
    ));
  }

  #Delete data sesuai ID terpilih
  public function delete($id) {
    #delete data
    $this->db->delete('menu_tbl', array(
      'menu_id' => $id
    ));
  }
}
?>
