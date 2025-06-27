<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    public function login($nama, $password) {
        $this->db->where('Nama', $nama);
        $this->db->where('Password', $password);
        $query = $this->db->get('pengguna');
        return $query->row_array();
    }

    public function get_by_username($nama) {
        $this->db->where('Nama', $nama);
        $query = $this->db->get('pengguna');
        return $query->row_array();
    }

    public function insert_user($nama, $password_hash) {
        $data = array(
            'Nama' => $nama,
            'Password' => $password_hash
        );
        return $this->db->insert('pengguna', $data);
    }

    public function count_all() {
        return $this->db->count_all('pengguna');
    }
} 