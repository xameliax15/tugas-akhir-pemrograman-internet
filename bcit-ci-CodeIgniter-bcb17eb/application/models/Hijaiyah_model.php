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

    // Ambil riwayat belajar user
    public function get_riwayat_belajar($user_id, $limit = 20) {
        $this->db->select('belajar_log.*, huruf_hijaiyah.Huruf_1, huruf_hijaiyah.Huruf_2');
        $this->db->from('belajar_log');
        $this->db->join('huruf_hijaiyah', 'belajar_log.huruf_id = huruf_hijaiyah.Hh_id', 'left');
        $this->db->where('belajar_log.user_id', $user_id);
        $this->db->order_by('belajar_log.waktu_belajar', 'DESC');
        $this->db->limit($limit);
        return $this->db->get()->result_array();
    }
} 