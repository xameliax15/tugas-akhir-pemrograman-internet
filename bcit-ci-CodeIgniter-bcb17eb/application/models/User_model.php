<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    public function login($nama, $password) {
        $this->db->where('Nama', $nama);
        $this->db->where('Password', $password);
        $query = $this->db->get('pengguna');
        $user = $query->row_array();
        if ($user) {
            $this->db->where('P_id', $user['P_id']);
            $this->db->update('pengguna', ['last_login' => date('Y-m-d H:i:s')]);
        }
        return $user;
    }

    public function get_by_username($nama) {
        $this->db->where('Nama', $nama);
        $query = $this->db->get('pengguna');
        return $query->row_array();
    }

    public function insert_user($nama, $password_hash) {
        $data = array(
            'Nama' => $nama,
            'Password' => $password_hash,
            'Role' => 'user',
            'created_at' => date('Y-m-d H:i:s')
        );
        return $this->db->insert('pengguna', $data);
    }

    public function count_all() {
        return $this->db->count_all('pengguna');
    }

    public function get_all() {
        return $this->db->get('pengguna')->result_array();
    }

    public function get_by_id($id) {
        return $this->db->get_where('pengguna', ['P_id' => $id])->row_array();
    }

    public function update_user($id, $nama, $username) {
        $data = [
            'Nama' => $nama,
            'Username' => $username
        ];
        $this->db->where('P_id', $id);
        return $this->db->update('pengguna', $data);
    }

    // Ambil semua admin
    public function get_all_admins() {
        return $this->db->get_where('pengguna', ['Role' => 'admin'])->result_array();
    }

    // Tambah admin baru
    public function insert_admin($nama, $password_hash) {
        $data = array(
            'Nama' => $nama,
            'Password' => $password_hash,
            'Role' => 'admin',
            'created_at' => date('Y-m-d H:i:s')
        );
        return $this->db->insert('pengguna', $data);
    }

    // Update admin
    public function update_admin($id, $nama, $password_hash = null) {
        $data = array('Nama' => $nama);
        if ($password_hash) $data['Password'] = $password_hash;
        $this->db->where('P_id', $id);
        $this->db->where('Role', 'admin');
        return $this->db->update('pengguna', $data);
    }

    // Hapus admin
    public function delete_admin($id) {
        $this->db->where('P_id', $id);
        $this->db->where('Role', 'admin');
        return $this->db->delete('pengguna');
    }
} 