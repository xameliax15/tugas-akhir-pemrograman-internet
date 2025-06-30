<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hijaiyah_model extends CI_Model {
    public function get_all() {
        return $this->db->get('huruf_hijaiyah')->result_array();
    }

    public function count_by_kategori($kategori) {
        $this->db->where('H_cbg', $kategori);
        return $this->db->count_all_results('huruf_hijaiyah');
    }

    public function insert_huruf($huruf1, $huruf2, $h_sound, $h_cbg = '', $h_text = '', $tgl_input = null, $deskripsi = '') {
        // Cek apakah huruf sudah ada
        $this->db->where('Huruf_1', $huruf1);
        $exists = $this->db->get('huruf_hijaiyah')->num_rows() > 0;
        if ($exists) return false;
        $data = [
            'Huruf_1' => $huruf1,
            'Huruf_2' => $huruf2,
            'H_sound' => $h_sound,
            'H_cbg' => $h_cbg,
            'H_text' => $h_text,
            'Tgl_input' => $tgl_input ?: date('Y-m-d'),
            'Deskripsi' => $deskripsi
        ];
        return $this->db->insert('huruf_hijaiyah', $data);
    }
} 