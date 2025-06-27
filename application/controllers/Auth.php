<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
            redirect('dashboard');
        }
        $this->load->view('login_view');
    }

    public function login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        // User dan password statis
        if ($username === 'admin' && $password === 'admin123') {
            $this->session->set_userdata('logged_in', true);
            redirect('dashboard');
        } else {
            $data['error'] = 'Username atau password salah!';
            $this->load->view('login_view', $data);
        }
    }

    public function logout() {
        $this->session->unset_userdata('logged_in');
        redirect('auth');
    }
} 