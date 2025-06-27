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
} 