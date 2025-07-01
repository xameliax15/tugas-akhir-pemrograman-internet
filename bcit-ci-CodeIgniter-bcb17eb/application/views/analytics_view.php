<!DOCTYPE html>
<html>
<head>
    <title>Analytics</title>
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
        .analytics-row { display: flex; gap: 32px; padding: 32px 36px 0 36px; flex-wrap: wrap; align-items: flex-start; }
        .card { background: #fff; border-radius: 12px; box-shadow: 0 2px 12px rgba(0,0,0,0.07); padding: 28px 24px 24px 24px; flex: 2; min-width: 340px; margin-bottom: 24px; box-sizing: border-box; }
        .card h3 { margin-top: 0; margin: 0 0 18px 0; font-size: 1.15em; color: #3b3f5c; }
        .stats-summary { display: flex; gap: 24px; margin-top: 18px; }
        .stat-box { background: #f4f6fb; border-radius: 10px; padding: 18px 24px; text-align: center; min-width: 120px; flex: 1; }
        .stat-label { font-size: 1em; color: #222f3e; margin-bottom: 6px; }
        .stat-value { font-size: 1.7em; font-weight: bold; color: #4a69bd; }
        @media (max-width: 900px) { .analytics-row { flex-direction: column; gap: 0; padding: 24px 8px 0 8px; } .card { min-width: unset; } .stats-summary { flex-direction: column; gap: 12px; } }
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
                <a href="<?php echo site_url('dashboard/hijaiyah'); ?>">Konten Pembelajaran</a>
                <a href="#" class="active">Analytics</a>
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
            <div class="title">Analytics</div>
            <a href="<?php echo site_url('auth/logout'); ?>" class="logout">Log Out</a>
        </div>
        <div class="analytics-row">
            <div class="card">
                <h3>Statistik Pengguna</h3>
                <canvas id="analyticsUserChart" height="120"></canvas>
            </div>
            <div class="card" style="flex:1; max-width:320px;">
                <h3>Ringkasan</h3>
                <div class="stats-summary">
                    <div class="stat-box">
                        <div class="stat-label">Total User</div>
                        <div class="stat-value">12</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-label">Total Latihan</div>
                        <div class="stat-value">8</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-label">Total Kuis</div>
                        <div class="stat-value">5</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-label">Rata-rata Skor</div>
                        <div class="stat-value">87</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const analyticsUserCtx = document.getElementById('analyticsUserChart').getContext('2d');
new Chart(analyticsUserCtx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
            label: 'User Aktif',
            data: [2, 3, 5, 7, 8, 10],
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
</script>
</body>
</html> 