<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_setting extends CI_Model {
  function __construct() {
    parent::__construct();
  }
  
  public function show_setting($key) {
    $query = $this->db->query("select * from setting_tbl where setting_key='$key'");
    return $query->result();
  }
  
  #Edit data sesuai ID terpilih
  public function edit($data) {
    #update data
    $this->db->update('setting_tbl', $data, array(
      'setting_id' => $data['setting_id']
    ));
  }
  
  #Delete data sesuai ID terpilih
  public function delete($id) {
    #delete data
    $this->db->delete('setting_tbl', array(
      'setting_id' => $id
    ));
  }
}
?>