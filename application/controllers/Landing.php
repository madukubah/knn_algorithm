<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

  public function __construct(){
      parent::__construct();
      // $this->output->enable_profiler(TRUE);
    $this->load->model("m_login");
    $this->load->model("m_register");
    $this->load->model("m_data_uji");
    $this->load->model("m_admin");
    $this->load->model("m_user");
    $this->load->model("m_log");
    $this->load->helper('array');
    $this->load->library("pagination");
    $this->load->library('form_validation'); 
  } 


  public function index() 
  {
    $this->load->view("_user/landing_page/View");
  }

  public function add_biodata() 
  {
        $this->form_validation->set_rules('user_profile_fullname','user_profile_fullname','trim|required');
        $this->form_validation->set_rules('user_profile_address','user_profile_address','trim|required');
        $this->form_validation->set_rules('user_profile_phone','user_profile_phone','trim|required');
        $this->form_validation->set_rules('data_semester','data_semester','trim|required');
        $this->form_validation->set_rules('data_IPK','data_IPK','trim|required');
        $this->form_validation->set_rules('data_gaji_ortu','data_gaji_ortu','trim|required');
        $this->form_validation->set_rules('data_tanggungan','data_tanggungan','trim|required');
        $this->form_validation->set_rules('data_UKT','data_UKT','trim|required');

        if ($this->form_validation->run() == true) 
        {
            $data_profile["user_profile_fullname"] = $this->input->post('user_profile_fullname');
            $data_profile["user_profile_address"] = $this->input->post('user_profile_address');
            $data_profile["user_profile_phone"] = $this->input->post('user_profile_phone');
            
            $identitas = time();
            $data['user_username'] = $identitas;
            $data['user_password'] = md5( $identitas );
            $result = $this->m_register->register($data, $data_profile);
            if( $result['status'] ){
                echo var_dump( $result );

                $data_uji["user_id"] = $result['message']['user_id'];

                $data_uji["data_semester"] = $this->input->post('data_semester');
                $data_uji["data_IPK"] = $this->input->post('data_IPK');
                $data_uji["data_gaji_ortu"] = $this->input->post('data_gaji_ortu');
                $data_uji["data_tanggungan"] = $this->input->post('data_tanggungan');
                $data_uji["data_UKT"] = $this->input->post('data_UKT');
                $data_uji["data_label"] = -1;

                $data_uji = array( $data_uji );
                if( $this->m_data_uji->create( $data_uji ) )
                {
                    $this->session->set_flashdata('info', array(
                        'from' => 1,
                        'message' =>  'Data berhasil di input'
                      ));
                      // is_admin
                      if(
                        ($this->session->userdata('user_id')) || 
                        $this->session->userdata('user_level') == 1
                      )
                      {
                        redirect(site_url('admin/user_management'));
                      }
                      redirect(site_url('landing'));
                      return;
                }
            }
            $this->session->set_flashdata('info', array(
            'from' => 0,
            'message' =>  'terjadi kesalahan saat mengirim data'
            ));
            redirect(site_url('landing'));

        }else{
            $this->load->view("_user/_template/header");
                $this->load->view("_user/biodata/View_create");
            $this->load->view("_user/_template/footer");  
        }    
  }

}