<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Log extends CI_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model("m_login");
    $this->load->model("m_register");
    $this->load->model("m_document");
    $this->load->model("m_log");
    $this->load->helper('array');
    $this->load->library("pagination");
    // $this->load->library('excel');
    // $this->load->library('upload');
    
  }
  
  public function index() {
    if (!($this->session->userdata('user_level') == 1 )) {
        #Tampilkan Halaman Login Pertama kali
        $this->session->sess_destroy();
        $this->session->set_flashdata('login', array(
            'from' => 0,
            'message' =>  'Anda bukan 4dm1n!!!'
          ));
          $log['log_datetime'] = date("Y-m-d H:i:s");
          $log['log_message'] = 'access ADMIN : NOT ADMIN BY'."user => ".$this->session->userdata('user_username')."( id = ".$this->session->userdata('user_id').") ";
          $log['user_id'] = $this->session->userdata('user_id');
          $this->m_log->inserLog( $log );
          redirect(site_url('/'));
      }else{

      $this->session->unset_userdata('sess_cari_image');
      $this->session->unset_userdata('sess_cari_image2');
      #set Limit
      $a =0;
      if ($this->uri->segment(3-$a) != "") {
        $limit = $this->uri->segment(3-$a);
      } else {
        $limit = 20;
      }
      
      #Config for pagination...@
      $config                = array();
      $config["base_url"]    = site_url() . "log/index/" . $limit;
      $config["total_rows"]  = $this->m_log->record_count();
      $config["per_page"]    = $limit;
      $config["uri_segment"] = 4-$a;
      
      #Config css for pagination...
      $config['full_tag_open']   = '<ul class="pagination">';
      $config['full_tag_close']  = '</ul>';
      $config['first_link']      = "First";
      $config['last_link']       = "Last";
      $config['first_tag_open']  = '<li>';
      $config['first_tag_close'] = '</li>';
      $config['prev_link']       = '&laquo';
      $config['prev_tag_open']   = '<li class="prev">';
      $config['prev_tag_close']  = '</li>';
      $config['next_link']       = '&raquo';
      $config['next_tag_open']   = '<li>';
      $config['next_tag_close']  = '</li>';
      $config['last_tag_open']   = '<li>';
      $config['last_tag_close']  = '</li>';
      $config['cur_tag_open']    = '<li class="active"><a href="#">';
      $config['cur_tag_close']   = '</a></li>';
      $config['num_tag_open']    = '<li>';
      $config['num_tag_close']   = '</li>';
      
      #Check Page in Segement 3...
      if ($this->uri->segment(4-$a) == "") {
        $data['number'] = 0;
      } else {  
        $data['number'] = $this->uri->segment(4-$a);
      }
      
      #Generate Pagination...
      $this->pagination->initialize($config);
      $page           = ($this->uri->segment(4-$a)) ? $this->uri->segment(4-$a) : 0;
      $data["logs"]  = $this->m_log->fetch_log($config["per_page"], $page);
      $data["column"] = $this->m_log->select_column_name($this->db->database);
      $data["links"]  = $this->pagination->create_links();
      
    //   echo var_dump($page  );
    //   echo var_dump($data["logs"] );
      #Generate Template...

        $this->load->view("_template/header");
        $this->load->view("_template/sidebar_menu");
        $this->load->view("View_logging", $data);  
        $this->load->view("_template/footer");  
      }
  }

}