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
        $user = $this->session->userdata('user');
        if (!$user || $user['role'] !== 'admin') {
            redirect('dashboard/user');
            return;
        }
        $this->load->model('User_model');
        $data['total_pengguna'] = $this->User_model->count_all();
        $this->load->model('Hijaiyah_model');
        $this->load->database();
        $kuis = $this->db->get('quiz_log')->result_array();
        $data['kuis_total'] = count($kuis);
        $data['kuis_perfect'] = 0; $data['kuis_baik'] = 0; $data['kuis_cukup'] = 0;
        $user_kuis = [];
        foreach($kuis as $k) {
            if ($k['skor'] == 10) $data['kuis_perfect']++;
            else if ($k['skor'] >= 7) $data['kuis_baik']++;
            else if ($k['skor'] >= 5) $data['kuis_cukup']++;
            $user_kuis[$k['user_id']] = true;
        }
        $data['kuis_penyelesaian'] = $data['total_pengguna'] > 0 ? round(count($user_kuis)/$data['total_pengguna']*100) : 0;
        // Aktif hari ini
        $today = date('Y-m-d');
        $data['aktif_hari_ini'] = $this->db->where('DATE(last_login)', $today)->count_all_results('pengguna');
        // User growth per bulan (6 bulan terakhir)
        $growth = [];
        for ($i = 5; $i >= 0; $i--) {
            $bulan = date('Y-m', strtotime("-$i month"));
            $count = $this->db->where('DATE_FORMAT(created_at, "%Y-%m") =', $bulan)->count_all_results('pengguna');
            $growth[] = $count;
        }
        $data['user_growth'] = $growth;
        $data['learning_progress'] = [3, 2, 5];
        $data['user'] = $this->session->userdata('user');
        $this->load->view('dashboard_view', $data);
    }

    public function hijaiyah() {
        $this->load->model('Hijaiyah_model');
        if ($this->input->post('add_huruf')) {
            $huruf1 = $this->input->post('huruf1');
            $huruf2 = $this->input->post('huruf2');
            $h_sound = $this->input->post('h_sound');
            $this->Hijaiyah_model->insert_huruf($huruf1, $huruf2, $h_sound);
            redirect('dashboard/hijaiyah');
        }
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
        $user_id = $data['user']['P_id'];
        $this->load->database();
        $kuis = $this->db->get_where('quiz_log', ['user_id' => $user_id])->result_array();
        $data['kuis_selesai'] = count($kuis);
        $data['skor_terbaik'] = 0;
        $data['total_poin'] = 0;
        foreach($kuis as $k) {
            if ($k['skor'] > $data['skor_terbaik']) $data['skor_terbaik'] = $k['skor'];
            $data['total_poin'] += $k['skor'];
        }
        $this->load->model('Hijaiyah_model');
        $data['huruf_total'] = count($this->Hijaiyah_model->get_all());
        // Huruf dipelajari real
        $data['huruf_dipelajari'] = $this->db->distinct()->where('user_id', $user_id)->count_all_results('belajar_log');
        // Ambil riwayat belajar user
        $data['riwayat_belajar'] = $this->Hijaiyah_model->get_riwayat_belajar($user_id, 10);
        // Ambil leaderboard
        $this->load->model('User_model');
        $data['leaderboard'] = $this->User_model->get_leaderboard(10);
        // Ambil badge user
        $data['badges'] = $this->User_model->get_badges_by_user($user_id);
        $this->load->view('dashboard_user_view', $data);
    }

    public function belajar() {
        $this->load->model('Hijaiyah_model');
        $data['huruf'] = $this->Hijaiyah_model->get_all();
        $data['user'] = $this->session->userdata('user');
        $this->load->view('belajar_view', $data);
    }

    public function quiz() {
        $data['user'] = $this->session->userdata('user');
        $this->load->view('quiz_view', $data);
    }

    public function seed_huruf_hijaiyah() {
        $user = $this->session->userdata('user');
        if (!$user || $user['role'] !== 'admin') { show_404(); return; }
        $this->load->model('Hijaiyah_model');
        $huruf = [
            ['ا','Alif','a'],['ب','Ba','ba'],['ت','Ta','ta'],['ث','Tsa','tsa'],['ج','Jim','ja'],['ح','Ha','ha'],['خ','Kha','kha'],
            ['د','Dal','da'],['ذ','Dzal','dza'],['ر','Ra','ra'],['ز','Zai','za'],['س','Sin','sa'],['ش','Syin','sya'],['ص','Shad','sha'],
            ['ض','Dhad','dha'],['ط','Tha','tha'],['ظ','Zha','zha'],['ع','Ain','a'],['غ','Ghain','gha'],['ف','Fa','fa'],['ق','Qaf','qa'],
            ['ك','Kaf','ka'],['ل','Lam','la'],['م','Mim','ma'],['ن','Nun','na'],['و','Wau','wa'],['ه','Ha','ha'],['ي','Ya','ya']
        ];
        foreach($huruf as $h) {
            $this->Hijaiyah_model->insert_huruf($h[0], $h[1], $h[2]);
        }
        echo 'Berhasil menambahkan 28 huruf hijaiyah!';
    }

    public function save_quiz_result() {
        if (!$this->session->userdata('logged_in')) { show_404(); return; }
        $user = $this->session->userdata('user');
        $data = [
            'user_id' => $user['P_id'],
            'skor' => $this->input->post('skor'),
            'total_soal' => $this->input->post('total_soal'),
            'benar' => $this->input->post('benar'),
            'salah' => $this->input->post('salah'),
            'waktu_mulai' => $this->input->post('waktu_mulai'),
            'waktu_selesai' => $this->input->post('waktu_selesai'),
            'detail_jawaban' => $this->input->post('detail_jawaban'),
            'tanggal' => date('Y-m-d')
        ];
        $this->db->insert('quiz_log', $data);
        echo json_encode(['success'=>true]);
    }

    public function quiz_log_admin() {
        $this->load->database();
        $this->db->select('quiz_log.*, pengguna.Nama');
        $this->db->from('quiz_log');
        $this->db->join('pengguna', 'quiz_log.user_id = pengguna.P_id', 'left');
        $this->db->order_by('quiz_log.waktu_selesai', 'DESC');
        $data['quiz_logs'] = $this->db->get()->result_array();
        $data['user'] = $this->session->userdata('user');
        $this->load->view('quiz_log_view', $data);
    }

    public function belajar_huruf_log() {
        if (!$this->session->userdata('logged_in')) { show_404(); return; }
        $user = $this->session->userdata('user');
        $huruf_id = $this->input->post('huruf_id');
        $this->load->database();
        // Cek jika sudah pernah belajar huruf ini
        $exists = $this->db->get_where('belajar_log', ['user_id'=>$user['P_id'], 'huruf_id'=>$huruf_id])->num_rows() > 0;
        if (!$exists) {
            $this->db->insert('belajar_log', [
                'user_id'=>$user['P_id'],
                'huruf_id'=>$huruf_id,
                'waktu_belajar'=>date('Y-m-d H:i:s')
            ]);
        }
        echo json_encode(['success'=>true]);
    }
} 