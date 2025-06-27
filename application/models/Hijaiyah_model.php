<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hijaiyah_model extends CI_Model {
    public function get_all() {
        return [
            ['huruf' => 'ا', 'nama' => 'Alif'],
            ['huruf' => 'ب', 'nama' => 'Ba''],
            ['huruf' => 'ت', 'nama' => 'Ta'],
            ['huruf' => 'ث', 'nama' => 'Tsa'],
            ['huruf' => 'ج', 'nama' => 'Jim'],
            ['huruf' => 'ح', 'nama' => 'Ha'],
            ['huruf' => 'خ', 'nama' => 'Kho'],
            // Tambahkan huruf lain sesuai kebutuhan
        ];
    }
} 