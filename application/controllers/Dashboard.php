<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Hijaiyah_model');
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
    }

    public function index() {
        $this->load->view('dashboard_view');
    }

    public function hijaiyah() {
        $data['huruf'] = $this->Hijaiyah_model->get_all();
        $this->load->view('hijaiyah_view', $data);
    }
} 