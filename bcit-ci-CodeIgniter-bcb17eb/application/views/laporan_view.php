<!DOCTYPE html>
<html>
<head>
    <title>Laporan</title>
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
        .main-content { flex: 1; display: flex; flex-direction: column; background: #f8fafc; padding-left: 40px; padding-right: 40px; }
        .header { background: #fff; padding: 18px 36px; border-bottom: 1px solid #e5e9f2; display: flex; justify-content: space-between; align-items: center; }
        .header .title { font-size: 1.3em; font-weight: 600; color: #232946; }
        .header .logout { background: #e74c3c; color: #fff; padding: 8px 18px; border-radius: 4px; text-decoration: none; font-weight: 500; border: none; cursor: pointer; transition: background 0.2s; }
        .header .logout:hover { background: #c0392b; }
        .main-laporan-container { width: 100%; max-width: none; margin: 40px 0 0 0; padding: 0; }
        .laporan-card { background: #fff; border-radius: 14px; box-shadow: 0 2px 12px rgba(0,0,0,0.07); padding: 32px 32px 32px 32px; width: auto; max-width: none; min-width: 320px; margin: 32px 32px 0 32px; box-sizing: border-box; display: flex; gap: 32px; }
        .laporan-title { font-size: 1.35em; font-weight: bold; color: #232946; margin-bottom: 24px; }
        .laporan-row { display: flex; gap: 40px; flex-wrap: wrap; }
        .laporan-col { flex: 1; min-width: 320px; }
        .form-label { font-weight: 500; color: #232946; margin-bottom: 8px; display: block; }
        .laporan-select, .laporan-btn { width: 100%; padding: 12px 10px; border-radius: 7px; border: 1px solid #e5e9f2; font-size: 1.08em; margin-bottom: 18px; }
        .laporan-btn { background: #2563eb; color: #fff; font-weight: 500; border: none; margin-bottom: 0; cursor: pointer; transition: background 0.2s; }
        .laporan-btn:hover { background: #1741a6; }
        .recent-title { font-weight: 600; color: #232946; margin-bottom: 12px; }
        .recent-list { list-style: none; padding: 0; margin: 0; }
        .recent-item { background: #f7faff; border-radius: 8px; padding: 16px 18px; display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px; }
        .recent-info { display: flex; flex-direction: column; }
        .recent-name { font-weight: 500; color: #232946; }
        .recent-time { color: #7b809a; font-size: 0.97em; margin-top: 2px; }
        .recent-download { color: #2563eb; text-decoration: none; font-weight: 500; font-size: 1em; transition: color 0.2s; }
        .recent-download:hover { text-decoration: underline; color: #1741a6; }
        @media (max-width: 900px) { .laporan-card { flex-direction: column; padding: 18px 4vw 18px 4vw; margin: 18px 2vw; } }
    </style>
</head>
<body>
<?php $user_name = isset($user['Nama']) ? $user['Nama'] : 'Admin User'; $initial = strtoupper(substr($user_name, 0, 1)); ?>
<div class="dashboard-container">
    <div class="sidebar">
        <div>
            <div class="logo">Admin Panel<br><span style='font-size:0.7em;font-weight:400;'>Belajar Hijaiyah</span></div>
            <nav>
                <a href="<?php echo site_url('dashboard'); ?>">Dashboard</a>
                <a href="<?php echo site_url('dashboard/pengguna'); ?>">Manajemen User</a>
                <a href="<?php echo site_url('dashboard/hijaiyah'); ?>">Konten Pembelajaran</a>
                <!--<a href="<?php echo site_url('dashboard/analytics'); ?>">Analytics</a>-->
                <a href="<?php echo site_url('dashboard/laporan'); ?>" class="active">Laporan</a>
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
            <div class="title">Laporan</div>
            <a href="<?php echo site_url('auth/logout'); ?>" class="logout">Logout</a>
        </div>
        <div class="main-laporan-container">
            <div class="laporan-card">
                <div class="laporan-title">Laporan</div>
                <div class="laporan-row">
                    <div class="laporan-col">
                        <div class="form-label">Jenis Laporan</div>
                        <select class="laporan-select">
                            <option>User Activity Report</option>
                            <option>Learning Progress</option>
                            <option>Quiz Results</option>
                        </select>
                        <div class="form-label">Periode</div>
                        <select class="laporan-select">
                            <option>7 Hari Terakhir</option>
                            <option>30 Hari Terakhir</option>
                            <option>1 Tahun Terakhir</option>
                        </select>
                        <button class="laporan-btn">Generate Report</button>
                    </div>
                    <div class="laporan-col">
                        <div class="recent-title">Recent Reports</div>
                        <ul class="recent-list">
                            <li class="recent-item">
                                <div class="recent-info">
                                    <span class="recent-name">User Activity - January 2024</span>
                                    <span class="recent-time">Generated 2 hours ago</span>
                                </div>
                                <a href="#" class="recent-download">Download</a>
                            </li>
                            <li class="recent-item">
                                <div class="recent-info">
                                    <span class="recent-name">Learning Progress - December 2023</span>
                                    <span class="recent-time">Generated 1 day ago</span>
                                </div>
                                <a href="#" class="recent-download">Download</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html> 