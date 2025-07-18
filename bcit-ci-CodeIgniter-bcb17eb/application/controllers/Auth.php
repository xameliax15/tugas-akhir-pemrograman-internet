<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->model('User_model');
        // Maintenance mode check: hanya blokir akses ke halaman lain, bukan login
        // (Pengecekan setelah login akan dilakukan di method login)
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
        $this->load->model('User_model');
        $user = $this->User_model->get_by_username($username);
        if ($user) {
            if (password_verify($password, $user['Password'])) {
                $this->session->set_userdata('logged_in', true);
                $this->session->set_userdata('user', $user);
                $this->load->model('Pengaturan_model');
                $maintenance = $this->Pengaturan_model->get('maintenance_mode');
                if ($maintenance === '1' && $user['role'] !== 'admin') {
                    // User login saat maintenance: tampilkan halaman maintenance
                    include APPPATH.'views/maintenance_view.php';
                    exit;
                }
                if ($user['role'] === 'admin') {
                redirect(site_url('dashboard'));
                } else {
                    redirect(site_url('dashboard/user'));
                }
            } else {
                $data['error'] = 'Password salah!';
                $this->load->view('login_view', $data);
            }
        } else {
            $data['error'] = 'Username tidak ditemukan!';
            $this->load->view('login_view', $data);
        }
    }

    public function logout() {
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user');
        redirect('auth');
    }

    public function signup() {
        // Jika form disubmit
        if ($this->input->method() === 'post') {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $password2 = $this->input->post('password2');

            // Validasi sederhana
            if ($password !== $password2) {
                $data['error'] = 'Konfirmasi password tidak cocok!';
                $this->load->view('signup_view', $data);
                return;
            }

            // Cek username sudah ada
            $this->load->model('User_model');
            $user = $this->User_model->get_by_username($username);
            if ($user) {
                $data['error'] = 'Username sudah terdaftar!';
                $this->load->view('signup_view', $data);
                return;
            }

            // Simpan user baru
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $this->User_model->insert_user($username, $hash);
            $data['success'] = 'Pendaftaran berhasil! Silakan login.';
            $this->load->view('login_view', $data);
        } else {
            // Tampilkan form signup
            $this->load->view('signup_view');
        }
    }
} 