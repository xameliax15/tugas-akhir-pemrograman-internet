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

    public function pengaturan() {
        $this->load->model('Pengaturan_model');
        $this->load->model('User_model');
        $data['user'] = $this->session->userdata('user');
        // Tambah admin
        if ($this->input->post('add_admin')) {
            $nama = $this->input->post('admin_nama');
            $password = $this->input->post('admin_password');
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $this->User_model->insert_admin($nama, $password_hash);
            $data['success'] = 'Admin baru berhasil ditambahkan!';
        }
        // Hapus admin
        if ($this->input->get('delete_admin')) {
            $id = $this->input->get('delete_admin');
            $this->User_model->delete_admin($id);
            $data['success'] = 'Admin berhasil dihapus!';
        }
        // Simpan pengaturan
        if ($this->input->post('site_name')) {
            $this->Pengaturan_model->set('site_name', $this->input->post('site_name'));
            $this->Pengaturan_model->set('max_users', $this->input->post('max_users'));
            $this->Pengaturan_model->set('enable_registration', $this->input->post('enable_registration') ? '1' : '0');
            $this->Pengaturan_model->set('maintenance_mode', $this->input->post('maintenance_mode') ? '1' : '0');
            $data['success'] = 'Pengaturan berhasil disimpan!';
        }
        // Ambil data pengaturan
        $data['site_name'] = $this->Pengaturan_model->get('site_name') ?: 'Hijaiyah Learning Platform';
        $data['max_users'] = $this->Pengaturan_model->get('max_users') ?: '100';
        $data['enable_registration'] = $this->Pengaturan_model->get('enable_registration') === '1';
        $data['maintenance_mode'] = $this->Pengaturan_model->get('maintenance_mode') === '1';
        // Ambil semua admin
        $data['admins'] = $this->User_model->get_all_admins();
        $this->load->view('pengaturan_view', $data);
    }

    public function user() {
        $data['user'] = $this->session->userdata('user');
        $this->load->view('dashboard_user_view', $data);
    }
} 