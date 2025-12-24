<?php 
defined ('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct()
    {
         parent::__construct();
    }

    public function index(){
        $this->load->view('incld/header');
        $this->load->view('Login/login');
        $this->load->view('incld/jslib');
        $this->load->view('incld/script');
        $this->load->view('incld/footer');
    }

    public function register(){
        $this->load->view('incld/header');
        $this->load->view('incld/top_menu');
        $this->load->view('incld/side_menu');
        $this->load->view('Admin/dashboard');
		$this->load->view('Login/form');
        $this->load->view('incld/jslib');
        $this->load->view('incld/script');
        $this->load->view('incld/footer');
	}
    
}