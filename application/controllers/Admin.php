<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model("m_admin");
    $this->load->helper('array');
    $this->load->model("m_log");
    $this->load->library("pagination");
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
          $u_id = ( $this->session->userdata('user_id')  ) ? $this->session->userdata('user_id') : "-1";
          $log['log_message'] = 'access ADMIN : NOT ADMIN BY'."user => ".$this->session->userdata('user_username')."( id = ".$u_id.") ";
          $log['user_id'] = $u_id ; 
          $this->m_log->inserLog( $log );
          redirect(site_url('/'));
      }else{

        $log['log_datetime'] = date("Y-m-d H:i:s");
        $log['log_message'] = 'access ADMIN : VIEW '."user => ".$this->session->userdata('user_username')."( id = ".$this->session->userdata('user_id').") ";
        $log['user_id'] = $this->session->userdata('user_id');
        $this->m_log->inserLog( $log );
       $data['users'] = $this->m_admin->getData();
        $data['mobiles'] = $this->m_admin->get_mobile();
       $data['Advertisements'] = $this->m_admin->get_Advertisement();
        $this->load->view("_template/header");
        $this->load->view("_template/sidebar_menu");
        $this->load->view("admin/View_admin", $data);
        $this->load->view("_template/footer");  

      }

  }



  public function editUser(){

    $log['log_datetime'] = date("Y-m-d H:i:s");

    $log['log_message'] = "EDIT USER (".$this->input->post('user_username').") BY (".$this->input->post('category_name')."):  user => ".$this->session->userdata('user_username')."( id = ".$this->session->userdata('user_id').") ; result => ";

    $log['user_id'] = $this->session->userdata('user_id');


    if( !empty( $this->input->post('user_password') ) )
    {
      $data_user['user_password'] = md5(  $this->input->post('user_password') );
    }

    $data_user['user_id'] = $this->input->post('user_id');

    $data_user['user_username'] = $this->input->post('user_username');

    $data_user['user_level'] = $this->input->post('user_level');

    $data_user['user_status'] = $this->input->post('user_status');

    $data_user_profile['user_profile_fullname'] = $this->input->post('user_profile_fullname');

    $data_user_profile['user_profile_phone'] = $this->input->post('user_profile_phone');



    $result = $this->m_admin->editUser( $data_user , $data_user_profile);

    // // // // // // echo var_dump($data);

    // // // // // echo var_dump($result);

    if( $result ){

      $this->session->set_flashdata('admin', array(

        'from' => 1,

        'message' =>  "Data user berhasil di Edit !!",

      ));

      $log['log_message'] .= "true";

      $this->m_log->inserLog( $log );



      redirect(site_url('/admin'));

    }else{

      $this->session->set_flashdata('admin', array(

        'from' => 0,

        'message' =>  "terjadi kesalahan saat mengedit data",

      ));

      $log['log_message'] .= "false = "."terjadi kesalahan saat mengedit data";

      $this->m_log->inserLog( $log );

      redirect(site_url('/admin'));

    }



  }

  public function deleteUser(){

    $log['log_datetime'] = date("Y-m-d H:i:s");

    $log['log_message'] = "DELETE USER (".$this->input->post('user_username').") BY (".$this->input->post('category_name')."):  user => ".$this->session->userdata('user_username')."( id = ".$this->session->userdata('user_id').") ; result => ";

    $log['user_id'] = $this->session->userdata('user_id');



    $data_user['user_id'] = $this->input->post('user_id');

    // $data['user_username'] = $this->input->post('user_username');

    // // // // echo var_dump( $data );

    $result = $this->m_admin->deleteUser( $data_user );

    // // // // echo $result;

    if( $result ){

      $this->session->set_flashdata('admin', array(

        'from' => 1,

        'message' =>  "Data user berhasil di hapus !!",

      ));

      $log['log_message'] .= "true";

      $this->m_log->inserLog( $log );



      redirect(site_url('/admin'));

    }else{

      $this->session->set_flashdata('admin', array(

        'from' => 0,

        'message' =>  "terjadi kesalahan saat menghapus data",

      ));

      $log['log_message'] .= "false = "."terjadi kesalahan saat menghapus data";

      $this->m_log->inserLog( $log );



      redirect(site_url('/admin'));

    }

  }
  // FACILITIES
  public function add_facility(  )
  {
    $data_facility["facility_name"] = $this->input->post('facility_name');

    if( $result = $this->m_admin->create_facility( $data_facility ) )
    {
        $this->session->set_flashdata('admin', array(

          'from' => 1,

          'message' =>  "Data Facility berhasil di tambah !!",

        ));

        redirect(site_url('/admin'));
    }else{
        $this->session->set_flashdata('admin', array(

          'from' => 0,

          'message' =>  "terjadi kesalahan saat menambah data !!",

        ));

        redirect(site_url('/admin'));
    }
  }

  public function edit_facility(  )
  {
    $data_facility["facility_name"] = $this->input->post('facility_name');
    $data_facility["facility_id"] = $this->input->post('facility_id');

    if( $result = $this->m_admin->update_facility( $data_facility ) )
    {
        $this->session->set_flashdata('admin', array(

          'from' => 1,

          'message' =>  "Data Facility berhasil di ubah !!",

        ));

        redirect(site_url('/admin'));
    }else{
        $this->session->set_flashdata('admin', array(

          'from' => 0,

          'message' =>  "terjadi kesalahan saat merubah data !!",

        ));

        redirect(site_url('/admin'));
    }
  }

  public function delete_facility(  )
  {
    $data_facility["facility_id"] = $this->input->post('facility_id');

    if( $result = $this->m_admin->delete_facility( $data_facility ) )
    {
        $this->session->set_flashdata('admin', array(

          'from' => 1,

          'message' =>  "Data Facility berhasil di hapus !!",

        ));

        redirect(site_url('/admin'));
    }else{
        $this->session->set_flashdata('admin', array(

          'from' => 0,

          'message' =>  "terjadi kesalahan saat menghapus data !!",

        ));

        redirect(site_url('/admin'));
    }
  }

  // MOBILE VERSION
  public function edit_mobile_version(  )
  {
    $data_mobile["mobile_id"] = $this->input->post('mobile_id');
    $data_mobile["mobile_version"] = $this->input->post('mobile_version');

    if( $result = $this->m_admin->update_mobile( $data_mobile ) )
    {
        $this->session->set_flashdata('admin', array(

          'from' => 1,

          'message' =>  "Data Mobile berhasil di ubah !!",

        ));

        redirect(site_url('/admin'));
    }else{
        $this->session->set_flashdata('admin', array(

          'from' => 0,

          'message' =>  "terjadi Mobile saat merubah data !!",

        ));

        redirect(site_url('/admin'));
    }
  }

  public function edit_mobile_version_pemilik(  )
  {
    $data_mobile["mobile_pemilik_id"] = $this->input->post('mobile_pemilik_id');
    $data_mobile["mobile_pemilik_version"] = $this->input->post('mobile_pemilik_version');

    if( $result = $this->m_admin->update_mobile_pemilik( $data_mobile ) )
    {
        $this->session->set_flashdata('admin', array(

          'from' => 1,

          'message' =>  "Data Mobile Pemilik berhasil di ubah !!",

        ));

        redirect(site_url('/admin'));
    }else{
        $this->session->set_flashdata('admin', array(

          'from' => 0,

          'message' =>  "terjadi Mobile Pemilik saat merubah data !!",

        ));

        redirect(site_url('/admin'));
    }
  }

  // ADVERTISEMENT
  public function add_Advertisement(  )
  {

    if( !empty( $_FILES['document_file']['name'] ) )
    {
      $name= $_FILES['document_file']['name'];

      $size= $_FILES['document_file']['size'];

      $type= $_FILES['document_file']['type'];

      if(!empty( $name ) && $size  < 16777216 ){
        $data_advertise['advertise_photo'] = date('Y-m-d-h-i-s').$name;
        $data_advertise['advertise_desc'] = $this->input->post('advertise_desc');

        $tmp_name = $_FILES['document_file']['tmp_name'];

        $location = './upload/iklan/';

        if(move_uploaded_file($tmp_name, $location.$data_advertise['advertise_photo']))
        {
          if( $result = $this->m_admin->create_Advertisement( $data_advertise ) )
          {
            $this->session->set_flashdata('admin', array(

              'from' => 1,
    
              'message' =>  "Data iklan berhasil ditambah !!",
    
            ));
    
            redirect(site_url('/admin'));
          }else{
            $this->session->set_flashdata('admin', array(

              'from' => 0,
      
              'message' =>  "terjadi kesalahan saat menambah data !!",
      
            ));
      
            redirect(site_url('/admin'));  
          }
        }else{
          $this->session->set_flashdata('admin', array(

            'from' => 0,
    
            'message' =>  "terjadi kesalahan saat menambah data !!",
    
          ));
    
          redirect(site_url('/admin'));
        }

      }else{
        $this->session->set_flashdata('admin', array(

          'from' => 0,
  
          'message' =>  "terjadi kesalahan saat menambah data !!",
  
        ));
  
        redirect(site_url('/admin'));
      }

    }else{
      $this->session->set_flashdata('admin', array(

        'from' => 0,

        'message' =>  "terjadi kesalahan saat menambah data !!",

      ));

      redirect(site_url('/admin'));
    }
  }

  public function edit_Advertisement(  )
  {
    if( !empty( $_FILES['document_file']['name'] ) )

    {

          // // @unlink($filename);
      $name= $_FILES['document_file']['name'];

      $size= $_FILES['document_file']['size'];

      $type= $_FILES['document_file']['type'];

      if(!empty( $name ) && $size  < 16777216 )
      {
        $data_advertise['advertise_photo'] = date('Y-m-d-h-i-s').$name;
        $tmp_name = $_FILES['document_file']['tmp_name'];

        $location = './upload/iklan/';
        // echo var_dump( $data_advertise );
        // return ; 
        if(move_uploaded_file($tmp_name, $location.$data_advertise['advertise_photo']))
        {
          @unlink($location.$this->input->post('advertise_old_photo'));
        }
      }
    }else{


    }
    $data_advertise["advertise_id"] = $this->input->post('advertise_id');
    $data_advertise["advertise_desc"] = $this->input->post('advertise_desc');

    if( $result = $this->m_admin->update_Advertisement( $data_advertise ) )
    {
        $this->session->set_flashdata('admin', array(

          'from' => 1,

          'message' =>  "Data iklan berhasil di ubah !!",

        ));

        redirect(site_url('/admin'));
    }else{
        $this->session->set_flashdata('admin', array(

          'from' => 0,

          'message' =>  "terjadi kesalahan saat merubah data !!",

        ));

        redirect(site_url('/admin'));
    }
  }

  public function delete_Advertisement(  )
  {
    $location = './upload/iklan/';
    $data_advertise["advertise_id"] = $this->input->post('advertise_id');

    $filename = $this->input->post('advertise_photo');
    if( @unlink($location.$filename) )
    { 
        $result = $this->m_admin->delete_Advertisement( $data_advertise ) ;
        $this->session->set_flashdata('admin', array(

          'from' => 1,

          'message' =>  "Data iklan berhasil di hapus !!",

        ));

        redirect(site_url('/admin'));
    }else{
        $this->session->set_flashdata('admin', array(

          'from' => 0,

          'message' =>  "terjadi kesalahan saat menghapus data !!",

        ));

        redirect(site_url('/admin'));
    }
  }
}