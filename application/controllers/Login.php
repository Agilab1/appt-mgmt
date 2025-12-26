<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    // 🔐 Login page
    public function index()
    {
        $this->load->view('incld/header');
        $this->load->view('Login/login');
        $this->load->view('incld/jslib');
        $this->load->view('incld/script');
        $this->load->view('incld/footer');
    }

    // 🔑 Login submit (IMPORTANT)
    public function auth()
    {

        $email = $this->input->post('mail_id');
        $pass  = $this->input->post('pass_wd');

        $user = $this->db
            ->where('email', $email)
            ->where('password', $pass)
            ->where('status', 'Active')
            ->get('users')
            ->row();

        if ($user) {

            // ✅ Session set
            $this->session->set_userdata([
                'user_id'   => $user->id,
                'email'     => $user->email,
                'role'      => $user->role,
                'logged_in' => true
            ]);

            // 🔁 Role based redirect
            if ($user->role == 'Host') {
                redirect('host/dashboard');
            } elseif ($user->role == 'Security') {
                redirect('security/dashboard');
            } elseif ($user->role == 'Admin') {
                redirect('admin/dashboard');
            } else {
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('error', 'Invalid Email or Password');
            redirect('login');
        }
    }

    // 🚪 Logout
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

    // 📝 Register page (as you had)
    public function register()
    {
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
