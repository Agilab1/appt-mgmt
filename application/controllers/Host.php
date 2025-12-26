<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Host extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Visitor_model');
        $this->load->model('User_model');
    }

    public function dashboard()
    {

        // 🔐 Host login check
        if ($this->session->userdata('role') != 'Host') {
            redirect('login');
        }


        $host_id = $this->session->userdata('user_id');

        $data['visitors'] = $this->Visitor_model->get_by_host($host_id);

        $this->load->view('host/dashboard', $data);
    }

    public function update_status($id, $status)
    {

        if (!in_array($status, ['Approved', 'Rejected'])) {
            show_error('Invalid Action');
        }

        $this->Visitor_model->update_status($id, $status);
        redirect('host/dashboard');
    }
}
