<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Admin_Controller {

  public function __construct(){
      parent::__construct();
      // $this->output->enable_profiler(TRUE);
    $this->load->model("m_user");
    $this->load->model("m_log");
    $this->load->helper('array');
    $this->load->library("pagination");
    $this->load->library('upload');
    $this->load->library('form_validation'); 
  } 


  public function index() 
  {
    $data['page_title'] = "Profile ";
    
        $data['user'] = $this->m_user->getUser( $this->session->userdata('user_id') );
        $this->load->view("_admin/_template/header");
        $this->load->view("_admin/_template/sidebar_menu");
            $this->load->view("_admin/profile/View",$data);
        $this->load->view("_admin/_template/footer");
     
  }

  public function edit() 
  {
    $data['page_title'] = "edit ";
     $this->form_validation->set_rules('user_profile_fullname','user_profile_fullname','trim|required');
     $this->form_validation->set_rules('user_profile_email','user_profile_email','trim|required');
     $this->form_validation->set_rules('user_profile_address','user_profile_address','trim|required');
     $this->form_validation->set_rules('user_profile_phone','user_profile_phone','trim|required');
     
     $message="lengkapi semua form !!";
     if ($this->form_validation->run() === true) 
     {  
        $data_user_profile['user_profile_fullname'] = $this->input->post('user_profile_fullname');
        $data_user_profile['user_profile_email'] = $this->input->post('user_profile_email');
        $data_user_profile['user_profile_address'] = $this->input->post('user_profile_address');
        $data_user_profile['user_profile_phone'] = $this->input->post('user_profile_phone');
        
        // echo var_dump( $data_store );
        $name= $_FILES['document_file']['name'];        
        $size= $_FILES['document_file']['size'];
        $type= $_FILES['document_file']['type'];
        $tmp_name = $_FILES['document_file']['tmp_name'];

        $data_user_profile['user_profile_image_path'] = $this->input->post('user_old_images') ;

        $location = './upload/user/';
        $source_file = $location.$data_user_profile['user_profile_image_path'];
        $im = ImageCreateFromJpeg($source_file); 
        
        $message="terjadi kesalahan saat mengirim data)";
        if(!empty( $name ) && $size  < 16777216 ){
                $location = './upload/user/';
                $data_user_profile['user_profile_image_path'] =time()."-".$name;
                if(move_uploaded_file($tmp_name, $location.$data_user_profile['user_profile_image_path']))
                {
                        $old_photo = $this->input->post('user_old_images') ;
                        @unlink($location.$old_photo );
                }else{
                        if( $result )
                        {
                                $this->session->set_flashdata('info', array(
                                'from' => 0,
                                'message' =>  'foto tidak terupload'
                                ));
                                redirect(site_url('admin/profile'));
                                return;
                        }
                }
        }
        

        $data_user_profile_param['user_id'] = $this->session->userdata('user_id');

        if( !empty( $this->input->post('user_password') ) )
        {
            $data_user['user_password'] = md5(  $this->input->post('user_password') );
            $this->m_user->update( $data_user, $data_user_profile_param );
        }
        $result = $this->m_user->update_profile( $data_user_profile, $data_user_profile_param );
        if( $result )
        {
                $data = array(
                        'user_profile_fullname' => $data_user_profile['user_profile_fullname'],
                        'user_profile_image_path' => $data_user_profile['user_profile_image_path']
                );
                    #Set value ke session
                $this->session->set_userdata($data);

                $this->session->set_flashdata('info', array(
                'from' => 1,
                'message' =>  'data berhasil diubah'
                ));
                redirect(site_url('admin/profile'));
                return;
        }

        $this->session->set_flashdata('info', array(
                'from' => 0,
                'message' =>  $message
                ));
                redirect(site_url('admin/profile'));
     }else{
        
        $data['user'] = $this->m_user->getUser( $this->session->userdata('user_id') );
        $this->load->view("_admin/_template/header");
        $this->load->view("_admin/_template/sidebar_menu");
            $this->load->view("_admin/profile/View_edit",$data);
        $this->load->view("_admin/_template/footer");
     }
  }
}