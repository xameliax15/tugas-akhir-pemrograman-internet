-- Membuat database (jika belum ada)
CREATE DATABASE IF NOT EXISTS db_hijaiyah;
USE db_hijaiyah;

-- Tabel Badge
CREATE TABLE IF NOT EXISTS badge (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(100),
    deskripsi TEXT,
    icon VARCHAR(100)
);

-- Tabel Pengguna
CREATE TABLE IF NOT EXISTS pengguna (
    P_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    Nama VARCHAR(100),
    Password VARCHAR(100),
    role VARCHAR(30) DEFAULT 'user', -- user atau admin
    last_login DATETIME,
    created_at DATETIME
);

-- Tabel Belajar Log
CREATE TABLE IF NOT EXISTS belajar_log (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    user_id INT(11),
    huruf_id INT(11),
    waktu_belajar DATETIME
);

-- Tabel Huruf Hijaiyah
CREATE TABLE IF NOT EXISTS huruf_hijaiyah (
    Hh_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    Huruf_1 VARCHAR(10),
    Huruf_2 VARCHAR(35),
    H_sound VARCHAR(50),
    H_cbg VARCHAR(15),
    H_text TEXT,
    Tgl_input DATE,
    Deskripsi MEDIUMTEXT
);

-- Tabel Pengaturan
CREATE TABLE IF NOT EXISTS pengaturan (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    nama_pengaturan VARCHAR(100) NOT NULL,
    nilai TEXT
);

-- Tabel Quiz Log
CREATE TABLE IF NOT EXISTS quiz_log (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    user_id INT(11),
    skor INT(11),
    total_soal INT(11),
    benar INT(11),
    salah INT(11),
    waktu_mulai DATETIME,
    waktu_selesai DATETIME,
    detail_jawaban TEXT,
    tanggal DATE
);

-- Tabel User Badge
CREATE TABLE IF NOT EXISTS user_badge (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    user_id INT(11),
    badge_id INT(11),
    tanggal_didapat DATETIME
); 