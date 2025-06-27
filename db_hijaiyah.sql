-- Membuat database (jika belum ada)
CREATE DATABASE IF NOT EXISTS db_hijaiyah;
USE db_hijaiyah;

-- Tabel Pengguna
CREATE TABLE IF NOT EXISTS pengguna (
    P_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    Nama VARCHAR(100),
    Password VARCHAR(50)
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