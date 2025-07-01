<!DOCTYPE html>
<html>
<head>
    <title>Konten Pembelajaran</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { background: #f8fafc; font-family: 'Segoe UI', Arial, sans-serif; margin: 0; padding: 0; }
        .dashboard-container { display: flex; min-height: 100vh; }
        .sidebar { width: 250px; background: #6c2eb7; color: #fff; display: flex; flex-direction: column; justify-content: space-between; }
        .sidebar .logo { font-size: 1.5em; font-weight: bold; color: #fff; padding: 32px 0 24px 32px; letter-spacing: 1px; }
        .sidebar nav { flex: 1; }
        .sidebar nav a { display: flex; align-items: center; padding: 14px 32px; color: #fff; text-decoration: none; font-size: 1.08em; border-left: 4px solid transparent; transition: background 0.2s, border 0.2s; margin-bottom: 2px; }
        .sidebar nav a.active, .sidebar nav a:hover { background: #5a2497; border-left: 4px solid #fff; color: #fff; }
        .sidebar .user-info { background: #5a2497; padding: 24px 32px; display: flex; align-items: center; gap: 16px; color: #fff; }
        .sidebar .user-info .avatar { width: 44px; height: 44px; background: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.3em; color: #6c2eb7; font-weight: bold; }
        .sidebar .user-info .details { display: flex; flex-direction: column; }
        .sidebar .user-info .details .name { font-weight: 600; color: #fff; }
        .sidebar .user-info .details .role { font-size: 0.95em; color: #e0d7f7; }
        .main-content { flex: 1; display: flex; flex-direction: column; background: #f8fafc; }
        .header { background: #fff; padding: 18px 36px; border-bottom: 1px solid #e5e9f2; display: flex; justify-content: space-between; align-items: center; }
        .header .title { font-size: 1.3em; font-weight: 600; color: #232946; }
        .header .logout { background: #e74c3c; color: #fff; padding: 8px 18px; border-radius: 4px; text-decoration: none; font-weight: 500; border: none; cursor: pointer; transition: background 0.2s; }
        .header .logout:hover { background: #c0392b; }
        .content-row { display: flex; gap: 30px; flex-wrap: wrap; margin: 0; }
        .card-panel { background: #fff; border-radius: 14px; box-shadow: 0 2px 12px rgba(0,0,0,0.07); padding: 32px 32px 32px 32px; flex: 1; min-width: 320px; max-width: 900px; margin: 0; display: flex; flex-direction: column; }
        .panel-title { font-size: 1.18em; font-weight: bold; color: #232946; margin-bottom: 18px; }
        .item-list { display: flex; flex-direction: column; gap: 12px; margin-bottom: 18px; }
        .item-card { background: #f7faff; border-radius: 8px; padding: 14px 18px; display: flex; align-items: center; justify-content: space-between; }
        .item-info { display: flex; flex-direction: column; }
        .item-title { font-weight: 600; color: #232946; font-size: 1.08em; }
        .item-desc { color: #7b809a; font-size: 0.98em; margin-top: 2px; }
        .item-edit { color: #2563eb; text-decoration: none; font-weight: 500; font-size: 1em; transition: color 0.2s; }
        .item-edit:hover { text-decoration: underline; color: #1741a6; }
        .add-btn { width: 100%; padding: 12px 0; border-radius: 7px; border: none; font-size: 1.08em; font-weight: 500; margin-top: 8px; cursor: pointer; transition: background 0.2s; }
        .add-huruf { background: #2563eb; color: #fff; }
        .add-huruf:hover { background: #1741a6; }
        .add-kuis { background: #22c55e; color: #fff; }
        .add-kuis:hover { background: #16a34a; }
        @media (max-width: 900px) { .content-row { flex-direction: column; gap: 18px; } .main-content { padding: 0 2vw; } }
    </style>
</head>
<body>
    <?php $user_name = isset($user['Nama']) ? $user['Nama'] : 'Admin User'; $initial = strtoupper(substr($user_name, 0, 1)); ?>
    <div class="dashboard-container">
        <div class="sidebar">
            <div>
                <div class="logo">Admin Panel</div>
                <nav>
                    <a href="<?php echo site_url('dashboard'); ?>">Dashboard</a>
                    <a href="<?php echo site_url('dashboard/pengguna'); ?>">Manajemen User</a>
                    <a href="<?php echo site_url('dashboard/hijaiyah'); ?>" class="active">Konten Pembelajaran</a>
                    <!--<a href="<?php echo site_url('dashboard/analytics'); ?>">Analytics</a>-->
                    <a href="<?php echo site_url('dashboard/laporan'); ?>">Laporan</a>
                    <a href="<?php echo site_url('dashboard/pengaturan'); ?>">Pengaturan</a>
                </nav>
            </div>
            <div class="user-info">
                <div class="avatar"><?php echo $initial; ?></div>
                <div class="details">
                    <div class="name"><?php echo htmlspecialchars($user_name); ?></div>
                    <div class="role">Super Admin</div>
                </div>
            </div>
        </div>
        <div class="main-content">
            <div class="header">
                <div class="title">Konten Pembelajaran</div>
                <a href="<?php echo site_url('auth/logout'); ?>" class="logout">Log Out</a>
            </div>
            <div style="max-width:1200px;margin:40px auto;">
                <div class="content-row">
                    <div class="card-panel">
                        <div class="panel-title">Huruf Hijaiyah</div>
                        <form method="post" style="margin-bottom:18px;display:flex;gap:12px;align-items:flex-end;flex-wrap:wrap;">
                            <input type="hidden" name="add_huruf" value="1" />
                            <div>
                                <label style="font-size:0.98em;color:#232946;font-weight:500;">Huruf Arab</label><br>
                                <input type="text" name="huruf1" maxlength="2" required style="padding:8px 12px;border-radius:7px;border:1px solid #e5e9f2;font-size:1.1em;width:60px;" />
                            </div>
                            <div>
                                <label style="font-size:0.98em;color:#232946;font-weight:500;">Nama</label><br>
                                <input type="text" name="huruf2" maxlength="20" required style="padding:8px 12px;border-radius:7px;border:1px solid #e5e9f2;font-size:1.1em;width:120px;" />
                            </div>
                            <div>
                                <label style="font-size:0.98em;color:#232946;font-weight:500;">Bunyi</label><br>
                                <input type="text" name="h_sound" maxlength="10" required style="padding:8px 12px;border-radius:7px;border:1px solid #e5e9f2;font-size:1.1em;width:80px;" />
                            </div>
                            <button type="submit" class="add-btn add-huruf" style="margin-top:0;">+ Tambah Huruf</button>
                        </form>
                        <div class="item-list">
                            <?php foreach($huruf as $i => $h): ?>
                            <div class="item-card">
                                <div class="item-info">
                                    <div class="item-title"><?= htmlspecialchars($h['Huruf_1']); ?> <span style="font-weight:400; color:#7b809a; margin-left:8px; font-size:0.97em;"> <?= htmlspecialchars($h['Huruf_2']); ?> </span></div>
                                    <div class="item-desc">Huruf ke-<?= $i+1; ?></div>
                                </div>
                                <a href="#" class="item-edit">Edit</a>
                            </div>
        <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="card-panel">
                        <div class="panel-title">Kuis & Latihan</div>
                        <div class="item-list">
                            <div class="item-card">
                                <div class="item-info">
                                    <div class="item-title">Kuis Huruf Dasar</div>
                                    <div class="item-desc">10 soal &bull; Tingkat Pemula</div>
                                </div>
                                <a href="#" class="item-edit">Edit</a>
                            </div>
                            <div class="item-card">
                                <div class="item-info">
                                    <div class="item-title">Latihan Menulis</div>
                                    <div class="item-desc">Interaktif &bull; Semua level</div>
                                </div>
                                <a href="#" class="item-edit">Edit</a>
                            </div>
                            <div class="item-card">
                                <div class="item-info">
                                    <div class="item-title">Kuis Lanjutan</div>
                                    <div class="item-desc">15 soal &bull; Tingkat Menengah</div>
                                </div>
                                <a href="#" class="item-edit">Edit</a>
                            </div>
                        </div>
                        <button class="add-btn add-kuis">+ Tambah Kuis</button>
                    </div>
                </div>
            </div>
            <?php if (isset($this->session->userdata('user')['role']) && $this->session->userdata('user')['role'] === 'admin'): ?>
            <button id="seedHurufBtn" class="btn btn-success mb-3">Isi Otomatis Huruf Hijaiyah Standar</button>
            <div id="seedHurufMsg"></div>
            <script>
              document.getElementById('seedHurufBtn').onclick = function() {
                if (!confirm('Yakin ingin mengisi huruf hijaiyah standar? Data yang sama tidak akan diduplikasi.')) return;
                fetch('<?= site_url('dashboard/seed_huruf_hijaiyah') ?>')
                  .then(r => r.text())
                  .then(txt => document.getElementById('seedHurufMsg').innerHTML = '<div class="alert alert-info">'+txt+'</div>')
                  .catch(() => alert('Gagal melakukan seed huruf.'));
              };
            </script>
            <?php endif; ?>
        </div>
    </div>
</body>
</html> 