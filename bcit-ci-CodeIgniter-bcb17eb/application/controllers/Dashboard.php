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

        // Dummy: total user per bulan (Jan-Jun)
        $data['user_growth'] = [2, 3, 5, 7, 8, 10];
        // Dummy: progress belajar
        $data['learning_progress'] = [3, 2, 5]; // selesai, belajar, belum mulai

        // Ambil data user yang login
        $data['user'] = $this->session->userdata('user');

        $this->load->view('dashboard_view', $data);
    }

    public function hijaiyah() {
        $data['huruf'] = $this->Hijaiyah_model->get_all();
        $this->load->view('hijaiyah_view', $data);
    }

    public function pengguna() {
        $this->load->model('User_model');
        $data['pengguna'] = $this->User_model->get_all();
        $data['user'] = $this->session->userdata('user');
        $this->load->view('pengguna_view', $data);
    }

    public function edit_pengguna($id = null) {
        $this->load->model('User_model');
        if ($this->input->method() === 'post') {
            $nama = $this->input->post('nama');
            $username = $this->input->post('username');
            $this->User_model->update_user($id, $nama, $username);
            redirect('dashboard/pengguna');
        } else {
            $data['pengguna'] = $this->User_model->get_by_id($id);
            $this->load->view('edit_pengguna_view', $data);
        }
    }

    public function analytics() {
        $data['user'] = $this->session->userdata('user');
        $this->load->view('analytics_view', $data);
    }

    public function laporan() {
        $data['user'] = $this->session->userdata('user');
        $this->load->view('laporan_view', $data);
    }
} 