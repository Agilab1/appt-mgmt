<?php 
defined ('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct(){
         parent::__construct();
    }
    public function dashboard(){
        $this->load->view('incld/header');
        $this->load->view('incld/top_menu');
        $this->load->view('incld/side_menu');
        $this->load->view('User/dashboard');
        $this->load->view('incld/jslib');
        $this->load->view('incld/script');
        $this->load->view('incld/footer');
        
    }
}