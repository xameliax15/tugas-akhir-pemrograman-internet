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