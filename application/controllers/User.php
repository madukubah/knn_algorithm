<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
	{
        parent::__construct();
        $this->load->model("m_user");
        $this->load->model("m_log");
        $this->load->model("m_login");
        $this->load->model("m_register");
    }

    public function login() 
    {
        $log['log_message'] ="";
        if($_POST)
        {
            $message = 'Username atau password salah!';
            $data_user['user_username'] = $this->input->post('user_username');
            $data_user['user_password'] = md5($this->input->post('user_password'));
            $result           = $this->m_login->login($data_user);
            if (!empty($result)) 
            {
                // echo var_dump(  $result->user_status );
                $result = $result[0];
                if( $result->user_status != 0 )
                {
                        $data = array(
                                'user_id' => $result->user_id,
                                'user_username' => $result->user_username,
                                'user_profile_fullname' => $result->user_profile_fullname,
                                'user_level' => $result->user_level,
                                'user_status' => $result->user_status,
                                'user_profile_image_path' => $result->user_profile_image_path
                        );
                    #Set value ke session
                    $this->session->set_userdata($data);
                    $log['log_message'] .= "true";
                    $log['user_id'] = $result->user_id;
                    $this->m_log->inserLog( $log );

                    redirect(site_url(''));
                }
                $message = "anda belum di aktivasi !!!!";
            }
            // TIDAK ADA DATA
            $this->session->set_flashdata('login', array(
                'from' => 0,
                'message' =>  $message
            ));
            $log['log_message'] .= "false =>".'Username atau password salah!';
            $this->m_log->inserLog( $log );

            redirect(site_url('/user/login'));

        }else{
            $this->load->view("login_page");
        }
    }
    
    public function register() {
        $this->load->helper('form');  
       $this->load->library('form_validation'); 
       $result = $this->m_register->getData();   
        $config = array(
          array(   
                  'field' => 'user_profile_fullname',
                  'label' => 'Full Name',
                  'rules' =>  'trim|required',    
                  'errors' => array(
                          'required' => 'nama harus di isi'   
                  ),
          ),
          array(
                  'field' => 'user_profile_email',
                  'label' => 'Email',   
                  'rules' => 'required',
                  'errors' => array(  
                          'required' => 'email harus di isi',
                          // 'min_length' => 'password minimal 5 karakter'
                  ),
          ),
        //   array(
        //           'field' => 'user_profile_address',
        //           'label' => 'Address',
        //           'rules' => 'required',
        //           'errors' => array(
        //                   'required' => 'alamat harus di isi',
        //                   // 'min_length' => 'password minimal 5 karakter'
        //           ),
        //   ),
          array(
                  'field' => 'user_username',
                  'label' => 'Username',
                  'rules' => 'required',
                  'errors' => array(
                          'required' => 'username harus harus di isi',
                          // 'min_length' => 'password minimal 5 karakter'
                  ),
          ),
          array(
                  'field' => 'user_password',
                  'label' => 'Password',
                  'rules' => 'required|min_length[5]',
                  'errors' => array(
                          'required' => 'password harus di isi',
                          'min_length' => 'password minimal 5 karakter'
                  ),
          ),
        //   array(
        //     'field' => 'user_profile_phone',
        //     'label' => 'Phone',
        //     'rules' => 'required|min_length[12]',
        //     'errors' => array(
        //             'required' => 'no hp harus di isi',
        //             'min_length' => 'no hp harus 12 digit',
        //     ),
        //   )
       );
    
       $this->form_validation->set_rules($config);
      $log['log_datetime'] = date("Y-m-d H:i:s");
      $log['log_message'] = "a person REGISTER in system ; result =>";
        if ($this->form_validation->run() === true) {
                if( strpos( $this->input->post('user_username') ," ") ){
                        $this->session->set_flashdata('register', 'username tidak boleh mengandung spasi');
                        redirect(site_url('/user/register'));
                }
                $dataProfile['user_profile_fullname'] = $this->input->post('user_profile_fullname');
                $dataProfile['user_profile_email'] = $this->input->post('user_profile_email');
                $dataProfile['user_profile_address'] = "";
                $dataProfile['user_profile_phone'] = "";
                $data['user_username'] = str_ireplace(" ", "", $this->input->post('user_username') );
                $data['user_password'] = md5($this->input->post('user_password'));
                $result = $this->m_register->register($data, $dataProfile);
                if( $result['status'] ){
                        $this->session->set_flashdata('login', array(
                        'from' => 1,
                        'message' => 'registrasi berhasil, silahkan login'
                        ));
                        $log['log_message'] .= "true";
                        $this->m_log->inserLog( $log );
                        redirect(site_url('/user/login'));
                }else{
                        $this->session->set_flashdata('register', $result['message'] );
                        $log['log_message'] .= "false; ".$result['message'];
                        $this->m_log->inserLog( $log );
                        redirect(site_url('/user/register'));
                }
        }else{
                $data['positions'] = $result[0];
                $data['groups'] = $result[1];
                $log['log_message'] .= "false";
                $this->m_log->inserLog( $log );
                $this->load->view("register_page", $data);
        }
    }

    public function logout() {
        
        $this->session->sess_destroy();
        redirect('' . base_url() );
      }
}