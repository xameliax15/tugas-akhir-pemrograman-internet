<p align="center">
  <img src="assets/img/logo.jpg" alt="Velvet Cake Logo" width="180"/>
</p>

# Velvet Cake Project
// dummy commit for testing git identity

Aplikasi toko kue berbasis CodeIgniter, mendukung manajemen produk, pesanan, transaksi, promo, dan review, dengan peran Admin, Kasir, dan Customer.

## Daftar Isi
- [Fitur Utama](#fitur-utama)
- [Struktur Folder](#struktur-folder)
- [Instalasi & Setup](#instalasi--setup)
- [Konfigurasi Database](#konfigurasi-database)
- [Akun & Role](#akun--role)
- [Teknologi & Dependensi](#teknologi--dependensi)
- [Catatan UI](#catatan-ui)
- [Lisensi](#lisensi)
- [Tampilan Aplikasi](#tampilan-aplikasi)

---

## Fitur Utama

### Untuk Admin
- Dashboard statistik penjualan, pesanan, user baru, produk stok menipis, promo aktif, grafik penjualan, produk terlaris.
- CRUD Produk: tambah, edit, hapus, upload gambar, kategori.
- CRUD User: tambah, edit, hapus user (admin, kasir, customer).
- CRUD Promo: tambah, edit, hapus promo diskon (berdasarkan produk/kategori/semua).
- Manajemen pesanan: lihat, detail, hapus pesanan.
- Review produk: moderasi, approve/reject review.

### Untuk Kasir
- Dashboard transaksi harian: total transaksi, pendapatan, produk terjual, stok menipis.
- CRUD Produk (khusus kasir): tambah, edit, hapus produk.
- Transaksi penjualan langsung (tanpa user/customer).
- Riwayat transaksi harian, detail transaksi, cetak struk.
- Edit dan hapus transaksi.

### Untuk Customer/User
- Registrasi & login.
- Browsing produk berdasarkan kategori.
- Promo aktif otomatis diterapkan.
- Favorit produk.
- Keranjang belanja, checkout, pembayaran, dan tracking pesanan.
- Riwayat pesanan, detail order, review produk.
- Sistem diskon otomatis (promo).

### Fitur Umum
- Responsive UI (Bootstrap 5, Google Fonts, Animate.css, FontAwesome, Bootstrap Icons).
- Session & autentikasi (login, register, remember me).
- Manajemen database manual (tanpa migration).
- Notifikasi & validasi form.

---

## Struktur Folder

- `application/`
  - `controllers/` : Logic utama (Admin, Kasir, User, Auth, Landing)
  - `models/` : Model database (Product, Order, User, Promo, Review)
  - `views/` : Halaman (admin, kasir, user, landing, auth)
  - `config/` : Konfigurasi CodeIgniter & database
- `assets/`
  - `img/` : Gambar produk, logo, ilustrasi, dsb.
- `system/` : Core CodeIgniter (jangan diubah)
- `database.sql` / `cakeshop.sql` : Struktur & data awal database

---

## Instalasi & Setup

1. **Clone repository:**
   ```bash
   git clone https://github.com/xameliax15/velvet-cake-project.git
   ```
2. **Install dependensi PHP (opsional, jika pakai composer):**
   ```bash
   composer install
   ```
3. **Import database:**
   - Import file `database.sql` atau `cakeshop.sql` ke MySQL Anda.
4. **Konfigurasi koneksi database:**
   - Edit `application/config/database.php` sesuai setting MySQL Anda.
5. **Jalankan di localhost:**
   - Gunakan XAMPP/Laragon, akses via browser ke `http://localhost/velvet-cake-project/`.

---

## Konfigurasi Database

- Struktur tabel utama: `users`, `products`, `orders`, `order_items`, `transactions`, `promo`, `product_reviews`.
- Role user: `admin`, `kasir`, `customer`.
- Update database dilakukan manual (tanpa migration).

---

## Akun & Role

- **Admin:** Kelola produk, user, promo, pesanan, review.
- **Kasir:** Transaksi penjualan langsung, kelola produk, riwayat transaksi.
- **Customer:** Belanja, checkout, review, tracking order, favorit produk.

Akun dapat dibuat melalui halaman register atau langsung di database.

---

## Teknologi & Dependensi

- **Framework:** CodeIgniter 3.x
- **PHP:** >= 5.3.7
- **Database:** MySQL/MariaDB
- **Frontend:** Bootstrap 5, Google Fonts, Animate.css, FontAwesome, Bootstrap Icons
- **Composer:** (opsional) untuk dependency management

---

## Catatan UI

- Warna utama: blush pink (#F9E5E5), deep plum (#4A001F), ivory white (#FFFCF2)
- Desain modern, responsif, dan ramah pengguna.

---

## Lisensi

MIT License. Lihat file `license.txt` untuk detail.

---

## Tampilan Aplikasi

![Landing Page](assets/img/Landing%20Page/landing%20page.jpeg)

---

© 2025 Velvet Cake Project 