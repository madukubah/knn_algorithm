<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends Admin_Controller {

  public function __construct(){
      parent::__construct();
      // $this->output->enable_profiler(TRUE);
    $this->load->model("m_login");
    $this->load->model("m_register");
    $this->load->model("m_user");
    $this->load->model("m_category");
    $this->load->model("m_category_relation");
    $this->load->model("m_log");
    $this->load->helper('array');
    $this->load->library("pagination");

  } 


  public function index() 
  {
    $data['page_title'] = "kategori";

        $log['log_datetime'] = date("Y-m-d H:i:s");
        $log['log_message'] = "HOMEPAGE :  user => ".$this->session->userdata('user_username')."( id = ".$this->session->userdata('user_id').") ; result => ";
        $log['user_id'] = $this->session->userdata('user_id');
        $log['log_message'] .= "true";
        $this->m_log->inserLog( $log );
    
      
      $data['user'] = $this->m_user->getUser( $this->session->userdata('user_id') )[0];
      $data['categories'] = $this->m_category->getData();
      $data['category_relations'] =$this->m_category_relation->getData();

      $this->load->view("_template/header");
      $this->load->view("_template/sidebar_menu");
          $this->load->view("category/List_category_view",$data);
      $this->load->view("_template/footer");  
  }

  public function add_category() 
  {
    if( !($_POST) ) redirect(site_url('/category'));  
    
    $data_category['category_name'] = $this->input->post('category_name');
    $data_category['category_description'] = $this->input->post('category_description');

    if( $this->m_category->insert( $data_category ) )
    {
      $this->session->set_flashdata('info', array(
        'from' => 1 ,
        'message' =>  "data berhasil ditambah !!",
      ));
      redirect(site_url('/category'));  
    }else{
      $this->session->set_flashdata('admin', array(
        'from' => 0,
        'message' =>  "terjadi kesalahan saat menambah data !!",
      ));
      redirect(site_url('/category'));  
    }
  }
  public function edit_category()
  {
    if( !($_POST) ) redirect(site_url('/category'));  
      

    $data_category['category_id'] = $this->input->post('category_id');
    $data_category['category_name'] = $this->input->post('category_name');
    $data_category['category_description'] = $this->input->post('category_description');

    $data_category_param['category_id'] = $data_category['category_id'];

    // echo var_dump( $data_category );
    if( $this->m_category->update( $data_category, $data_category_param ) )
    {
      $this->session->set_flashdata('info', array(
        'from' => 1 ,
        'message' =>  "data berhasil diubah !!",
      ));
      redirect(site_url('/category'));   
    }else{
      $this->session->set_flashdata('info', array(
        'from' => 0,
        'message' =>  "terjadi kesalahan saat mengubah data !!",
      ));
        redirect(site_url('/category'));  
    }
  }

  public function delete_category()
  {
    if( !($_POST) ) 
      redirect(site_url('/admin'));  

    $data_category_param['category_id'] = $this->input->post('category_id');
    if( $this->m_category->delete( $data_category_param ) )
    {
      $this->session->set_flashdata('info', array(
        'from' => 1 ,
        'message' =>  "data berhasil hapus !!",
      ));

      redirect(site_url('/category'));  
    }else{
      $this->session->set_flashdata('info', array(

        'from' => 0,

        'message' =>  "terjadi kesalahan saat menghapus data !!",

      ));

      redirect(site_url('/category'));  
    }
  }

//   RELATION
    public function add_category_relation(  )
    {
        if( !($_POST) ) redirect(site_url('/category'));   

        $data_category_relation['category_relation_parent'] = $this->input->post('category_relation_parent');
        $data_category_relation['category_relation_child'] = $this->input->post('category_relation_child');
        if( 
            $data_category_relation['category_relation_parent'] == $data_category_relation['category_relation_child'] ||
            $data_category_relation['category_relation_child'] == 0
            )
        {
            $this->session->set_flashdata('info', array(
            'from' => 0,
            'message' =>  "terjadi kesalahan saat menambah data !!",
            ));
            redirect(site_url('/category'));  
            return;
        }
        // echo var_dump( $data_category_relation );
        if( $this->m_category_relation->insert( $data_category_relation ) )
        {
            $this->session->set_flashdata('info', array(
            'from' => 1 ,
            'message' =>  "data berhasil ditambah !!",
            ));
            redirect(site_url('/category'));  
        }else{
            $this->session->set_flashdata('info', array(
            'from' => 0,
            'message' =>  "terjadi kesalahan saat menambah data !!",
            ));
            redirect(site_url('/category'));  
        }
    }

    public function delete_category_relation(  )
    {
        if( !($_POST) ) redirect(site_url('/category'));   

        $data_category_relation['category_relation_id'] = $this->input->post('category_relation_id');

        if( $this->m_category_relation->delete( $data_category_relation ) )
        {
            $this->session->set_flashdata('info', array(
            'from' => 1 ,
            'message' =>  "data berhasil dihapus !!",
            ));

            redirect(site_url('/category'));   
        }else{
            $this->session->set_flashdata('info', array(
            'from' => 0,
            'message' =>  "terjadi kesalahan saat menghapus data !!",
            ));

            redirect(site_url('/category'));   
        }
    }

    public function add_category_relation_Add_new_child(  )
    {
        if( !($_POST) ) redirect(site_url('/category'));   

        $data_category_relation['category_relation_parent'] = $this->input->post('category_relation_parent');
        $data_category['category_name'] = $this->input->post('category_name');
        $data_category['category_description'] = $this->input->post('category_description');

        if( $this->m_category->insert_new_child( $data_category, $data_category_relation ) )
        {
        $this->session->set_flashdata('info', array(
            'from' => 1 ,
            'message' =>  "data berhasil ditambah !!",
        ));
        redirect(site_url('/category'));   
        }else{
        $this->session->set_flashdata('info', array(
            'from' => 0,
            'message' =>  "terjadi kesalahan saat menambah data !!",
        ));
        redirect(site_url('/category'));   
        }
    }
}