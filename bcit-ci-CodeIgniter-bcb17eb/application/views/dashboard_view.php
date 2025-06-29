<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin - Hijaiyah</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            background: #f8fafc;
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 250px;
            background: #fff;
            border-right: 1px solid #e5e9f2;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .sidebar .logo {
            font-size: 1.5em;
            font-weight: bold;
            color: #3b3f5c;
            padding: 32px 0 24px 32px;
            letter-spacing: 1px;
        }
        .sidebar nav {
            flex: 1;
        }
        .sidebar nav a {
            display: flex;
            align-items: center;
            padding: 14px 32px;
            color: #3b3f5c;
            text-decoration: none;
            font-size: 1.08em;
            border-left: 4px solid transparent;
            transition: background 0.2s, border 0.2s;
            margin-bottom: 2px;
        }
        .sidebar nav a.active, .sidebar nav a:hover {
            background: #f0f4fa;
            border-left: 4px solid #4a69bd;
            color: #4a69bd;
        }
        .sidebar .user-info {
            background: #f4f6fb;
            padding: 24px 32px;
            display: flex;
            align-items: center;
            gap: 16px;
        }
        .sidebar .user-info .avatar {
            width: 44px;
            height: 44px;
            background: #dbeafe;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3em;
            color: #4a69bd;
            font-weight: bold;
        }
        .sidebar .user-info .details {
            display: flex;
            flex-direction: column;
        }
        .sidebar .user-info .details .name {
            font-weight: 600;
            color: #3b3f5c;
        }
        .sidebar .user-info .details .role {
            font-size: 0.95em;
            color: #7b809a;
        }
        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            background: #f8fafc;
        }
        .header {
            background: #fff;
            padding: 18px 36px;
            border-bottom: 1px solid #e5e9f2;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header .title {
            font-size: 1.3em;
            font-weight: 600;
            color: #3b3f5c;
        }
        .header .logout {
            background: #e74c3c;
            color: #fff;
            padding: 8px 18px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            border: none;
            cursor: pointer;
            transition: background 0.2s;
        }
        .header .logout:hover {
            background: #c0392b;
        }
        .dashboard-row {
            display: flex;
            gap: 32px;
            padding: 32px 36px 0 36px;
            flex-wrap: wrap;
        }
        .card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.07);
            padding: 28px 24px 24px 24px;
            flex: 1;
            min-width: 320px;
            margin-bottom: 24px;
        }
        .card h3 {
            margin: 0 0 18px 0;
            font-size: 1.15em;
            color: #3b3f5c;
        }
        .stats {
            display: flex;
            gap: 32px;
            margin-bottom: 24px;
            flex-wrap: wrap;
        }
        .stat-box {
            background: #f4f6fb;
            border-radius: 10px;
            padding: 18px 24px;
            text-align: center;
            min-width: 120px;
            flex: 1;
        }
        .stat-label {
            font-size: 1em;
            color: #222f3e;
            margin-bottom: 6px;
        }
        .stat-value {
            font-size: 1.7em;
            font-weight: bold;
            color: #4a69bd;
        }
        .recent-activity {
            margin-top: 12px;
        }
        .activity-item {
            background: #f4f6fb;
            border-radius: 8px;
            padding: 16px 18px;
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 12px;
        }
        .activity-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2em;
        }
        .activity-icon.user { background: #e3eafe; color: #4a69bd; }
        .activity-icon.check { background: #d1fae5; color: #10b981; }
        .activity-icon.target { background: #fde68a; color: #f59e42; }
        .activity-content {
            flex: 1;
        }
        .activity-title {
            font-weight: 500;
            color: #3b3f5c;
        }
        .activity-time {
            font-size: 0.95em;
            color: #7b809a;
        }
        @media (max-width: 900px) {
            .dashboard-row { flex-direction: column; gap: 0; padding: 24px 8px 0 8px; }
            .card { min-width: unset; }
        }
        @media (max-width: 600px) {
            .sidebar { width: 100px; }
            .sidebar .logo, .sidebar .user-info .details { display: none; }
            .sidebar .user-info { padding: 16px; }
            .main-content { padding-left: 0; }
        }
    </style>
</head>
<body>
<div class="dashboard-container">
    <div class="sidebar">
        <div>
            <div class="logo">Admin Panel</div>
            <nav>
                <a href="<?php echo site_url('dashboard'); ?>" class="active">Dashboard</a>
                <a href="<?php echo site_url('dashboard/pengguna'); ?>">Manajemen User</a>
                <a href="#">Konten Pembelajaran</a>
                <a href="#">Analytics</a>
                <a href="#">Laporan</a>
                <a href="#">Pengaturan</a>
            </nav>
        </div>
        <div class="user-info">
            <div class="avatar">
                <?php
                $user_name = isset($user['Nama']) ? $user['Nama'] : 'Admin User';
                $initial = strtoupper(substr($user_name, 0, 1));
                echo $initial;
                ?>
            </div>
            <div class="details">
                <div class="name"><?php echo htmlspecialchars($user_name); ?></div>
                <div class="role">Super Admin</div>
            </div>
        </div>
    </div>
    <div class="main-content">
        <div class="header">
            <div class="title">Dashboard</div>
            <a href="<?php echo base_url('auth/logout'); ?>" class="logout">Log Out</a>
        </div>
        <div class="dashboard-row">
            <div class="card" style="flex:2;">
                <h3>User Growth</h3>
                <canvas id="userGrowthChart" height="120"></canvas>
            </div>
            <div class="card" style="max-width:350px;">
                <h3>Learning Progress</h3>
                <canvas id="learningProgressChart" height="120"></canvas>
                <div style="display:flex; gap:12px; margin-top:18px;">
                    <div style="display:flex;align-items:center;gap:6px;"><span style="width:12px;height:12px;background:#10b981;display:inline-block;border-radius:2px;"></span> Selesai</div>
                    <div style="display:flex;align-items:center;gap:6px;"><span style="width:12px;height:12px;background:#f59e42;display:inline-block;border-radius:2px;"></span> Sedang Belajar</div>
                    <div style="display:flex;align-items:center;gap:6px;"><span style="width:12px;height:12px;background:#ef4444;display:inline-block;border-radius:2px;"></span> Belum Mulai</div>
                </div>
            </div>
        </div>
        <div class="dashboard-row">
            <div class="card" style="max-width:600px;">
                <h3>Recent Activity</h3>
                <div class="recent-activity">
                    <div class="activity-item">
                        <div class="activity-icon user">&#128100;</div>
                        <div class="activity-content">
                            <div class="activity-title">User baru mendaftar: Ahmad Rizki</div>
                            <div class="activity-time">2 menit yang lalu</div>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon check">&#10003;</div>
                        <div class="activity-content">
                            <div class="activity-title">Siti Aminah menyelesaikan pelajaran Huruf Ba</div>
                            <div class="activity-time">5 menit yang lalu</div>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon target">&#127919;</div>
                        <div class="activity-content">
                            <div class="activity-title">Muhammad Ali mencapai skor 100% pada kuis</div>
                            <div class="activity-time">10 menit yang lalu</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card stats" style="flex:1; min-width:220px; flex-direction:column; gap:18px;">
                <div class="stat-box">
                    <div class="stat-label">Total Pengguna</div>
                    <div class="stat-value"><?php echo $total_pengguna; ?></div>
                </div>
                <div class="stat-box">
                    <div class="stat-label">Huruf Fathah</div>
                    <div class="stat-value"><?php echo $total_fathah; ?></div>
                </div>
                <div class="stat-box">
                    <div class="stat-label">Huruf Kasroh</div>
                    <div class="stat-value"><?php echo $total_kasroh; ?></div>
                </div>
                <div class="stat-box">
                    <div class="stat-label">Huruf Dhommah</div>
                    <div class="stat-value"><?php echo $total_dhommah; ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Dummy data for user growth
    const userGrowthCtx = document.getElementById('userGrowthChart').getContext('2d');
    new Chart(userGrowthCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'New Users',
                data: [55, 80, 110, 140, 180, 240],
                borderColor: '#4a69bd',
                backgroundColor: 'rgba(74,105,189,0.08)',
                fill: true,
                tension: 0.4,
                pointRadius: 4,
                pointBackgroundColor: '#4a69bd',
            }]
        },
        options: {
            plugins: { legend: { display: true } },
            scales: { y: { beginAtZero: true } }
        }
    });
    // Dummy data for learning progress
    const learningProgressCtx = document.getElementById('learningProgressChart').getContext('2d');
    new Chart(learningProgressCtx, {
        type: 'doughnut',
        data: {
            labels: ['Selesai', 'Sedang Belajar', 'Belum Mulai'],
            datasets: [{
                data: [70, 20, 10],
                backgroundColor: ['#10b981', '#f59e42', '#ef4444'],
                borderWidth: 2
            }]
        },
        options: {
            cutout: '70%',
            plugins: { legend: { display: false } }
        }
    });
</script>
</body>
</html> 