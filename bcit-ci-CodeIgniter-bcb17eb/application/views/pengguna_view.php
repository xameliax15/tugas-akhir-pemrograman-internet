<!DOCTYPE html>
<html>
<head>
    <title>Manajemen User</title>
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
        .main-user-container { max-width: 1600px; margin: 40px 0 0 0; }
        .user-card { background: #fff; border-radius: 14px; box-shadow: 0 2px 12px rgba(0,0,0,0.07); padding: 32px 32px 18px 32px; max-width: 900px; min-width: 320px; margin: 0; }
        .user-card-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 18px; }
        .user-card-header h2 { margin: 0; font-size: 1.35em; color: #232946; }
        .add-user-btn { background: #2563eb; color: #fff; font-weight: 500; border: none; border-radius: 7px; padding: 10px 22px; font-size: 1em; cursor: pointer; transition: background 0.2s; }
        .add-user-btn:hover { background: #1741a6; }
        .user-table { width: 100%; border-collapse: collapse; margin-bottom: 12px; }
        .user-table th, .user-table td { padding: 14px 10px; text-align: left; }
        .user-table th { background: #f4f6fb; color: #232946; font-size: 1.05em; font-weight: 600; border-bottom: 2px solid #e5e9f2; }
        .user-table tr:not(:last-child) { border-bottom: 1px solid #e5e9f2; }
        .user-avatar {
            width: 38px; height: 38px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 1.1em; margin-right: 12px; color: #fff; }
        .user-info-cell { display: flex; align-items: center; }
        .user-name { font-weight: 500; color: #232946; }
        .user-email { font-size: 0.98em; color: #7b809a; }
        .progress-bar-bg { background: #e5e9f2; border-radius: 8px; width: 90px; height: 8px; margin-right: 8px; display: inline-block; overflow: hidden; }
        .progress-bar-fill { background: linear-gradient(90deg, #22c55e 60%, #16a34a 100%); height: 8px; border-radius: 8px; display: inline-block; transition: width 0.4s cubic-bezier(.4,2.3,.3,1); }
        .status-badge { background: #d1fae5; color: #059669; border-radius: 8px; padding: 4px 16px; font-size: 0.98em; font-weight: 500; display: inline-block; }
        .user-action-link { color: #2563eb; text-decoration: none; font-weight: 500; margin-right: 16px; cursor: pointer; border-radius: 4px; padding: 2px 8px; transition: background 0.15s; }
        .user-action-link:last-child { color: #ef4444; margin-right: 0; }
        .user-action-link:hover { text-decoration: underline; background: #f1f5fd; }
        .user-action-link:last-child:hover { background: #ffeaea; }
        .user-table tr:hover { background: #f4f6fb; transition: background 0.2s; }
        .user-table th { background: #f7faff; color: #232946; font-size: 1.08em; font-weight: 700; border-bottom: 2px solid #e5e9f2; }
        .user-table td, .user-table th { vertical-align: middle; }
        @media (max-width: 900px) { .main-user-container, .user-card { padding: 0 2vw; } .user-card { padding: 18px 4vw 8px 4vw; } .user-table th, .user-table td { padding: 10px 4px; font-size: 0.98em; } }
    </style>
</head>
<body>
<div class="dashboard-container">
    <div class="sidebar">
        <div>
            <div class="logo">Admin Panel</div>
            <nav>
                <a href="<?php echo site_url('dashboard'); ?>">Dashboard</a>
                <a href="<?php echo site_url('dashboard/pengguna'); ?>" class="active">Manajemen User</a>
                <a href="<?php echo site_url('dashboard/hijaiyah'); ?>">Konten Pembelajaran</a>
                <a href="<?php echo site_url('dashboard/analytics'); ?>">Analytics</a>
                <a href="<?php echo site_url('dashboard/laporan'); ?>">Laporan</a>
                <a href="<?php echo site_url('dashboard/pengaturan'); ?>">Pengaturan</a>
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
            <div class="title">Manajemen User</div>
            <a href="<?php echo site_url('auth/logout'); ?>" class="logout">Log Out</a>
        </div>
        <div class="main-user-container">
            <div class="user-card">
                <div class="user-card-header">
                    <h2>Manajemen User</h2>
                    <button class="add-user-btn">+ Tambah User</button>
                </div>
                <table class="user-table">
                    <tr>
                        <th style="min-width:160px;">USER</th>
                        <th>EMAIL</th>
                        <th>PROGRESS</th>
                        <th>STATUS</th>
                        <th>BERGABUNG</th>
                        <th>AKSI</th>
            </tr>
                    <?php foreach($pengguna as $p): ?>
                    <tr>
                        <td>
                            <div class="user-info-cell">
                                <?php
                                $nama = isset($p['Nama']) ? $p['Nama'] : 'User';
                                $nama_parts = explode(' ', $nama);
                                $initials = strtoupper(substr($nama_parts[0],0,1));
                                if(count($nama_parts)>1) $initials .= strtoupper(substr($nama_parts[1],0,1));
                                // Avatar color array
                                $avatar_colors = ['#4a69bd','#f59e42','#10b981','#ef4444','#6366f1','#f472b6','#facc15','#14b8a6'];
                                $color = $avatar_colors[crc32($nama)%count($avatar_colors)];
                                ?>
                                <div class="user-avatar" style="background: <?= $color ?>;">
                                    <?= $initials; ?>
                                </div>
                                <div>
                                    <div class="user-name"><?= htmlspecialchars($nama); ?></div>
                                </div>
                            </div>
                        </td>
                        <td class="user-email">
                            <?php
                            // Dummy email based on name
                            $email = strtolower(str_replace(' ', '.', $nama)) . '@email.com';
                            echo htmlspecialchars($email);
                            ?>
                        </td>
                        <td>
                            <div style="display:flex;align-items:center;">
                                <div class="progress-bar-bg">
                                    <?php $progress = rand(10,28); $percent = round($progress/28*100); ?>
                                    <div class="progress-bar-fill" style="width:<?= $percent; ?>%;"></div>
                                </div>
                                <span style="font-size:0.97em; color:#232946; font-weight:500; margin-left:2px; "><?= $progress; ?>/28 huruf</span>
                            </div>
                        </td>
                        <td><span class="status-badge" style="background:#e7fbe9; color:#22c55e;">Aktif</span></td>
                        <td><?= date('d M Y', strtotime('-'.rand(1,30).' days')); ?></td>
                        <td>
                            <a class="user-action-link" style="color:#2563eb;" href="<?php echo site_url('dashboard/edit_pengguna/' . $p['P_id']); ?>">Edit</a>
                            <a class="user-action-link" style="color:#ef4444;" href="#" onclick="return confirm('Yakin ingin menghapus user ini?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
            </div>
        </div>
    </div>
    </div>
</body>
</html> 