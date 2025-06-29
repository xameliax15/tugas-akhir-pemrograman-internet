<!DOCTYPE html>
<html>
<head>
    <title>Konten Pembelajaran</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { background: #f8fafc; font-family: 'Segoe UI', Arial, sans-serif; margin: 0; padding: 0; }
        .dashboard-container { display: flex; min-height: 100vh; }
        .sidebar { width: 250px; background: #fff; border-right: 1px solid #e5e9f2; display: flex; flex-direction: column; justify-content: space-between; }
        .sidebar .logo { font-size: 1.5em; font-weight: bold; color: #3b3f5c; padding: 32px 0 24px 32px; letter-spacing: 1px; }
        .sidebar nav { flex: 1; }
        .sidebar nav a { display: flex; align-items: center; padding: 14px 32px; color: #3b3f5c; text-decoration: none; font-size: 1.08em; border-left: 4px solid transparent; transition: background 0.2s, border 0.2s; margin-bottom: 2px; }
        .sidebar nav a.active, .sidebar nav a:hover { background: #f0f4fa; border-left: 4px solid #4a69bd; color: #4a69bd; }
        .sidebar .user-info { background: #f4f6fb; padding: 24px 32px; display: flex; align-items: center; gap: 16px; }
        .sidebar .user-info .avatar { width: 44px; height: 44px; background: #dbeafe; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.3em; color: #4a69bd; font-weight: bold; }
        .sidebar .user-info .details { display: flex; flex-direction: column; }
        .sidebar .user-info .details .name { font-weight: 600; color: #3b3f5c; }
        .sidebar .user-info .details .role { font-size: 0.95em; color: #7b809a; }
        .main-content { flex: 1; display: flex; flex-direction: column; background: #f8fafc; }
        .header { background: #fff; padding: 18px 36px; border-bottom: 1px solid #e5e9f2; display: flex; justify-content: space-between; align-items: center; }
        .header .title { font-size: 1.3em; font-weight: 600; color: #3b3f5c; }
        .header .logout { background: #e74c3c; color: #fff; padding: 8px 18px; border-radius: 4px; text-decoration: none; font-weight: 500; border: none; cursor: pointer; transition: background 0.2s; }
        .header .logout:hover { background: #c0392b; }
        .content-row { display: flex; gap: 30px; flex-wrap: wrap; }
        .card-panel { background: #fff; border-radius: 14px; box-shadow: 0 2px 12px rgba(0,0,0,0.07); padding: 32px 32px 32px 32px; flex: 1; min-width: 520px; max-width: 800px; display: flex; flex-direction: column; }
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
                    <a href="#">Analytics</a>
                    <a href="#">Laporan</a>
                    <a href="#">Pengaturan</a>
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
                        <div class="item-list">
                            <?php foreach($huruf as $i => $h): ?>
                            <div class="item-card">
                                <div class="item-info">
                                    <div class="item-title"><?= htmlspecialchars($h['huruf']); ?> <span style="font-weight:400; color:#7b809a; margin-left:8px; font-size:0.97em;"> <?= htmlspecialchars($h['nama']); ?> </span></div>
                                    <div class="item-desc">Huruf ke-<?= $i+1; ?></div>
                                </div>
                                <a href="#" class="item-edit">Edit</a>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <button class="add-btn add-huruf">+ Tambah Huruf</button>
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
        </div>
    </div>
</body>
</html> 