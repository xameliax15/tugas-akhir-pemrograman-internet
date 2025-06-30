<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan_model extends CI_Model {
    // Ambil nilai pengaturan berdasarkan nama
    public function get($nama_pengaturan) {
        $query = $this->db->get_where('pengaturan', ['nama_pengaturan' => $nama_pengaturan]);
        if ($row = $query->row()) {
            return $row->nilai;
        }
        return null;
    }

    // Set/update nilai pengaturan
    public function set($nama_pengaturan, $nilai) {
        $query = $this->db->get_where('pengaturan', ['nama_pengaturan' => $nama_pengaturan]);
        if ($query->num_rows() > 0) {
            $this->db->where('nama_pengaturan', $nama_pengaturan);
            return $this->db->update('pengaturan', ['nilai' => $nilai]);
        } else {
            return $this->db->insert('pengaturan', [
                'nama_pengaturan' => $nama_pengaturan,
                'nilai' => $nilai
            ]);
        }
    }

    // Ambil semua pengaturan
    public function get_all() {
        return $this->db->get('pengaturan')->result_array();
    }
} 