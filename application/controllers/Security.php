<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Security extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Visitor_model');
    }

    public function dashboard()
    {

        // 🔐 Security login check
        if ($this->session->userdata('role') != 'Security') {
            redirect('login');
        }

        $data['visitors'] = $this->Visitor_model->today_visitors();
        $this->load->view('security/dashboard', $data);
    }
}
