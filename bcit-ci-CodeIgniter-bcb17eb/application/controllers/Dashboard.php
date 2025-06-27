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
        // Total pengguna
        $this->load->model('User_model');
        $data['total_pengguna'] = $this->User_model->count_all();

        // Total huruf per kategori
        $this->load->model('Hijaiyah_model');
        $data['total_fathah'] = $this->Hijaiyah_model->count_by_kategori('Fathah');
        $data['total_kasroh'] = $this->Hijaiyah_model->count_by_kategori('Kasroh');
        $data['total_dhommah'] = $this->Hijaiyah_model->count_by_kategori('Dhommah');
        $data['total_tanwin_fathah'] = $this->Hijaiyah_model->count_by_kategori('Tanwin Fathah');
        $data['total_tanwin_kasroh'] = $this->Hijaiyah_model->count_by_kategori('Tanwin Kasroh');
        $data['total_tanwin_dhommah'] = $this->Hijaiyah_model->count_by_kategori('Tanwin Dhommah');
        $data['total_tajwid'] = $this->Hijaiyah_model->count_by_kategori('Tajwid');

        $this->load->view('dashboard_view', $data);
    }

    public function hijaiyah() {
        $data['huruf'] = $this->Hijaiyah_model->get_all();
        $this->load->view('hijaiyah_view', $data);
    }
} 