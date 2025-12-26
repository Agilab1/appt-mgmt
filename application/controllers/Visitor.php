<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Visitor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Visitor_model');
        $this->load->model('User_model');
        $this->load->library('form_validation');
        $this->load->database();
    }

    // QR scan → visitor form open
    public function register()
    {
        $data['hosts'] = $this->User_model->get_hosts();
        $this->load->view('visitor/register', $data);
    }

    // Save visitor & redirect to status page
    public function save()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('purpose', 'Purpose', 'required');
        $this->form_validation->set_rules('host_id', 'Host', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->register();
            return;
        }

        // ✅ Prepare data
        $data = [
            'name'       => $this->input->post('name'),
            'phone'      => $this->input->post('phone'),
            'email'      => $this->input->post('email'),
            'purpose'    => $this->input->post('purpose'),
            'host_id'    => $this->input->post('host_id'),
            'status'     => 'Pending',
            'created_at' => date('Y-m-d H:i:s')
        ];

        // ✅ Insert visitor
        $this->db->insert('visitors', $data);

        // ✅ Get inserted visitor ID
        $visitor_id = $this->db->insert_id();

        // ✅ Redirect visitor to status page
        redirect('visitor/status/' . $visitor_id);
    }

    // Visitor status page
    public function status($id)
    {
        $data['visitor'] = $this->db
            ->where('id', $id)
            ->get('visitors')
            ->row();

        if (!$data['visitor']) {
            show_404();
        }

        $this->load->view('visitor/status', $data);
    }
}
    