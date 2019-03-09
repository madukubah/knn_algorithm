<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model("m_user");
        $this->load->model("m_login");
        $this->load->model("m_register");
        $this->load->model("m_admin");
        $this->load->helper('array');
      }

    public function login()
    {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    http_response_code(200);

    $message = "";
    if( ! $_POST )
    {
        $message = "";
        echo json_encode(
            array( 
                "status" => 0,
                "data" => array(),
                "message" => $message,
                )
        );
        return ;
    }
    
        $data_user['user_username'] = $this->input->post('user_username');
        $data_user['user_password'] = md5($this->input->post('user_password'));

        $result           = $this->m_login->loginAPI($data_user);
        if (!empty($result)) 
        {
            $result = $result[0];
            if( $result->user_status != 0 )
            {
                echo json_encode(
                    array( 
                        "status" => 1,
                        "data" => array(
                            $result
                        ),
                        "message" => "benar",
                        )
                );
                return;
            }
            $message = "anda belum di aktivasi";      
        }else{
            $message = "username dan password salah";
        }

        echo json_encode(
            array( 
                "status" => 0,
                "data" => array(),
                "message" => $message,
                )
        );
        return ;
    }

    public function register()
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        http_response_code(200);

        $message = "";
        if( ! $_POST )
        {
            $message = "";
            echo json_encode(
                array( 
                    "status" => 0,
                    "data" => array(),
                    "message" => $message,
                    )
            );
            return ;
        }

        $dataProfile['user_profile_fullname'] = $this->input->post('user_profile_fullname');
        $dataProfile['user_profile_email'] = $this->input->post('user_profile_email');
        $dataProfile['user_profile_address'] = $this->input->post('user_profile_address');
        $dataProfile['user_profile_phone'] = $this->input->post('user_profile_phone');
        $data['user_username'] = str_ireplace(" ", "", $this->input->post('user_username') );
        $data['user_password'] = md5($this->input->post('user_password'));

        $result = $this->m_register->register($data, $dataProfile);
        if( $result['status'] )
        {

            $message = "registrasi berhasil, silahkan silahkan melakukan aktivasi akun dengan menghubungi admin ( 0813-4298-9185 )";
            echo json_encode(
                array( 
                    "status" => 1,
                    "data" => array(),
                    "message" => $message,
                    )
            );
            return ;
        }else{
            $message = "registrasi gagal";
            echo json_encode(
                array( 
                    "status" => 0,
                    "data" => array(),
                    "message" => $message,
                    )
            );
            return ;
        }
    }

    public function edit_user()
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        http_response_code(200);

        $message = "";
        if( ! $_POST )
        {
            $message = "";
            echo json_encode(
                array( 
                    "status" => 0,
                    "data" => array(),
                    "message" => $message,
                    )
            );
            return ;
        }
        
        $data_user['user_id'] = $this->input->post('user_id');
        
        $data_user_profile['user_profile_fullname'] = $this->input->post('user_profile_fullname');
        $data_user_profile['user_profile_address'] = $this->input->post('user_profile_address');
        $data_user_profile['user_profile_phone'] = $this->input->post('user_profile_phone');
        $data_user_profile['user_profile_email'] = $this->input->post('user_profile_email');

        $result = $this->m_admin->editUserAPI( $data_user , $data_user_profile);
        if (!empty($result)) 
        {
            $message = "Data berhasil diedit";      
            $result = $result[0];
            if( $result->user_status != 0 )
            {
                echo json_encode(
                    array(
                        "status" => 1,
                        "data" => array(
                            $result
                        ),
                        "message" => $message,
                        )
                );
                return;
            }
            $message = "anda belum di aktivasi";      
        }else{
            $message = "Edit User Gagal!";
        }

        echo json_encode(
            array( 
                "status" => 0,
                "data" => array(),
                "message" => $message,
                )
        );
        return ;
    }
}