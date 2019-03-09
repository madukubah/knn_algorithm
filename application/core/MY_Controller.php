<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public function __construct()
    {
       parent::__construct();

    }
}
class Admin_Controller extends MY_Controller
{
   public function __construct()
    {
       parent::__construct();
        if(
            !($this->session->userdata('user_id')) || 
            $this->session->userdata('user_status') == 0 
        )
        {
            redirect(site_url('/user/login'));
        }
        // echo $this->session->userdata('user_id');
        // $this->session->sess_destroy();
    }

}
class User_Controller extends MY_Controller
{
  public function __construct()
    {
       parent::__construct();
    }
}