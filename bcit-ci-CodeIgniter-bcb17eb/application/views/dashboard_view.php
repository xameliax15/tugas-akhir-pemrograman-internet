<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin - Belajar Hijaiyah</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        body { background: #f8fafc; font-family: 'Segoe UI', Arial, sans-serif; margin: 0; padding: 0; }
        .dashboard-container { display: flex; min-height: 100vh; }
        .sidebar { width: 250px; background: #6c2eb7; color: #fff; display: flex; flex-direction: column; justify-content: space-between; }
        .sidebar .logo { font-size: 1.5em; font-weight: bold; color: #fff; padding: 32px 0 24px 32px; letter-spacing: 1px; }
        .sidebar nav { flex: 1; }
        .sidebar nav a { display: flex; align-items: center; padding: 14px 32px; color: #fff; text-decoration: none; font-size: 1.08em; border-left: 4px solid transparent; transition: background 0.2s, border 0.2s; margin-bottom: 2px; }
        .sidebar nav a.active, .sidebar nav a:hover { background: #5a2497; border-left: 4px solid #fff; color: #fff; }
        .sidebar .user-info { background: #5a2497; padding: 24px 32px; display: flex; align-items: center; gap: 16px; }
        .sidebar .user-info .avatar { width: 44px; height: 44px; background: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.3em; color: #6c2eb7; font-weight: bold; }
        .sidebar .user-info .details { display: flex; flex-direction: column; }
        .sidebar .user-info .details .name { font-weight: 600; color: #fff; }
        .sidebar .user-info .details .role { font-size: 0.95em; color: #e0d7f7; }
        .main-content { flex: 1; display: flex; flex-direction: column; background: #f8fafc; }
        .header { background: #fff; padding: 18px 36px; border-bottom: 1px solid #e5e9f2; display: flex; justify-content: space-between; align-items: center; }
        .header .title { font-size: 1.3em; font-weight: 600; color: #232946; }
        .header .subtitle { color: #7b809a; font-size: 1em; margin-top: 2px; }
        .header .user-info { display: flex; align-items: center; gap: 16px; }
        .header .user-name { font-weight: 500; color: #232946; margin-right: 12px; }
        .header .logout { background: #e74c3c; color: #fff; padding: 8px 18px; border-radius: 4px; text-decoration: none; font-weight: 500; border: none; cursor: pointer; transition: background 0.2s; }
        .header .logout:hover { background: #c0392b; }
        .stats-row { display: flex; gap: 24px; margin: 32px 36px 0 36px; flex-wrap: wrap; }
        .stat-card { flex: 1; min-width: 200px; background: #fff; border-radius: 12px; box-shadow: 0 2px 12px rgba(0,0,0,0.07); padding: 24px 24px 18px 24px; display: flex; flex-direction: column; align-items: flex-start; position: relative; }
        .stat-card .icon { font-size: 2em; position: absolute; right: 24px; top: 24px; opacity: 0.18; }
        .stat-card.blue { background: linear-gradient(90deg,#2563eb 60%,#4f8cff 100%); color: #fff; }
        .stat-card.green { background: linear-gradient(90deg,#16a34a 60%,#22c55e 100%); color: #fff; }
        .stat-card.purple { background: linear-gradient(90deg,#a21caf 60%,#d946ef 100%); color: #fff; }
        .stat-card.orange { background: linear-gradient(90deg,#ea580c 60%,#fbbf24 100%); color: #fff; }
        .stat-label { font-size: 1em; opacity: 0.95; }
        .stat-value { font-size: 2.1em; font-weight: bold; margin: 8px 0 2px 0; }
        .stat-desc { font-size: 0.98em; opacity: 0.85; }
        .dashboard-row { display: flex; gap: 32px; padding: 32px 36px 0 36px; flex-wrap: wrap; align-items: flex-start; }
        .card { background: #fff; border-radius: 12px; box-shadow: 0 2px 12px rgba(0,0,0,0.07); padding: 24px 24px 24px 24px; flex: 1; min-width: 320px; margin-bottom: 24px; box-sizing: border-box; }
        .card h3 { margin-top: 0; margin: 0 0 18px 0; font-size: 1.15em; color: #3b3f5c; }
        @media (max-width: 900px) { .dashboard-row, .stats-row { flex-direction: column; gap: 0; padding: 24px 8px 0 8px; } .card, .stat-card { min-width: unset; } }
    </style>
</head>
<body>
<div class="dashboard-container">
    <div class="sidebar">
        <div>
            <div class="logo">Admin Panel<br><span style='font-size:0.7em;font-weight:400;'>Belajar Hijaiyah</span></div>
            <nav>
                <a href="<?php echo site_url('dashboard'); ?>" class="active">Dashboard</a>
                <a href="<?php echo site_url('dashboard/pengguna'); ?>">Manajemen User</a>
                <a href="<?php echo site_url('dashboard/laporan'); ?>">Laporan</a>
                <a href="<?php echo site_url('dashboard/pengaturan'); ?>">Pengaturan</a>
            </nav>
    </div>
        <div class="user-info">
            <div class="avatar">
                <?php $user_name = isset($user['Nama']) ? $user['Nama'] : 'Admin'; $initial = strtoupper(substr($user_name, 0, 1)); echo $initial; ?>
    </div>
            <div class="details">
                <div class="name"><?php echo htmlspecialchars($user_name); ?></div>
                <div class="role">Admin Utama</div>
    </div>
        </div>
    </div>
    <div class="main-content">
        <div class="header">
            <div>
                <div class="title">Dashboard</div>
                <div class="subtitle">Ringkasan aktivitas platform</div>
            </div>
            <div class="user-info">
                <div class="user-name"><?php echo htmlspecialchars($user_name); ?></div>
                <div><?php echo date('l, d F Y \p\u\k\u\l H.i'); ?></div>
                <a href="<?php echo base_url('auth/logout'); ?>" class="logout">Keluar</a>
            </div>
        </div>
        <div class="stats-row">
            <div class="stat-card blue">
                <div class="stat-label">Total Pengguna</div>
                <div class="stat-value"><?php echo $total_pengguna; ?></div>
                <div class="stat-desc">+12% bulan ini</div>
                <div class="icon">&#128101;</div>
            </div>
            <div class="stat-card green">
                <div class="stat-label">Aktif Hari Ini</div>
                <div class="stat-value"><?php echo $aktif_hari_ini; ?></div>
                <div class="stat-desc">User login hari ini</div>
                <div class="icon">&#128293;</div>
            </div>
            <div class="stat-card purple">
                <div class="stat-label">Kuis Diselesaikan</div>
                <div class="stat-value"><?php echo $kuis_total; ?></div>
                <div class="stat-desc">Total semua user</div>
                <div class="icon">&#127919;</div>
            </div>
            <div class="stat-card orange">
                <div class="stat-label">Tingkat Penyelesaian</div>
                <div class="stat-value"><?php echo $kuis_penyelesaian; ?>%</div>
                <div class="stat-desc">User pernah mengerjakan kuis</div>
                <div class="icon">&#128200;</div>
            </div>
        </div>
        <div class="dashboard-row">
            <div class="card" style="flex:2;">
                <h3>Pertumbuhan Pengguna</h3>
                <canvas id="userGrowthChart" height="120"></canvas>
        </div>
            <div class="card" style="max-width:400px;">
                <h3>Performa Kuis</h3>
                <canvas id="quizPerformanceChart" height="120"></canvas>
                <div style="display:flex; gap:12px; margin-top:18px; flex-wrap:wrap;">
                    <div style="display:flex;align-items:center;gap:6px;"><span style="width:12px;height:12px;background:#22c55e;display:inline-block;border-radius:2px;"></span> Sempurna (10/10)</div>
                    <div style="display:flex;align-items:center;gap:6px;"><span style="width:12px;height:12px;background:#2563eb;display:inline-block;border-radius:2px;"></span> Baik (7-9)</div>
                    <div style="display:flex;align-items:center;gap:6px;"><span style="width:12px;height:12px;background:#fbbf24;display:inline-block;border-radius:2px;"></span> Cukup (5-6)</div>
        </div>
        </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Grafik Pertumbuhan Pengguna (real)
    const userGrowthData = <?php echo json_encode($user_growth); ?>;
    const userGrowthCtx = document.getElementById('userGrowthChart').getContext('2d');
    new Chart(userGrowthCtx, {
        type: 'line',
        data: {
            labels: [
                <?php
                for ($i = 5; $i >= 0; $i--) {
                    echo "'" . date('M', strtotime("-$i month")) . "',";
                }
                ?>
            ],
            datasets: [{
                label: 'Pengguna',
                data: userGrowthData,
                borderColor: '#6c2eb7',
                backgroundColor: 'rgba(108,46,183,0.08)',
                fill: true,
                tension: 0.4,
                pointRadius: 4,
                pointBackgroundColor: '#6c2eb7',
            }]
        },
        options: {
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true } }
        }
    });
    // Grafik Performa Kuis (real)
    const quizPerformanceData = [<?php echo $kuis_perfect; ?>, <?php echo $kuis_baik; ?>, <?php echo $kuis_cukup; ?>];
    const quizPerformanceCtx = document.getElementById('quizPerformanceChart').getContext('2d');
    new Chart(quizPerformanceCtx, {
        type: 'doughnut',
        data: {
            labels: ['Sempurna (10/10)', 'Baik (7-9)', 'Cukup (5-6)'],
            datasets: [{
                data: quizPerformanceData,
                backgroundColor: ['#22c55e', '#2563eb', '#fbbf24'],
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