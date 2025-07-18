<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } $theme = isset($_SESSION['theme']) ? $_SESSION['theme'] : 'light'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Belajar Hijaiyah - Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { background: #f4f6fb; font-family: 'Segoe UI', Arial, sans-serif; margin: 0; padding: 0; }
        .navbar { background: linear-gradient(90deg, #5f5be3 0%, #7b6cf6 100%); color: #fff; display: flex; align-items: center; justify-content: space-between; padding: 18px 32px; box-shadow: 0 2px 8px rgba(0,0,0,0.03); }
        .navbar .logo { font-size: 1.35em; font-weight: bold; display: flex; align-items: center; gap: 12px; }
        .navbar .logo-icon { background: #fff; color: #5f5be3; border-radius: 8px; width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; font-size: 1.2em; font-weight: bold; }
        .navbar .nav-btns { display: flex; gap: 12px; }
        .navbar .nav-btn { background: #fff; color: #7b6cf6; border: none; border-radius: 8px; padding: 8px 18px; font-size: 1em; font-weight: 500; cursor: pointer; transition: background 0.2s, color 0.2s; display: flex; align-items: center; gap: 6px; }
        .navbar .nav-btn.active, .navbar .nav-btn:hover { background: #f3e8ff; color: #5f5be3; }
        .navbar .profile-btn { background: #fff; color: #7b6cf6; border-radius: 50%; width: 38px; height: 38px; display: flex; align-items: center; justify-content: center; font-size: 1.1em; font-weight: bold; margin-left: 8px; }
        .container { width: 100%; max-width: none; margin: 0; padding: 32px 2vw; box-sizing: border-box; }
        .welcome { font-size: 2em; font-weight: 700; color: #5f5be3; margin-bottom: 6px; text-align: left; }
        .subtitle { color: #7b809a; font-size: 1.15em; margin-bottom: 18px; text-align: left; }
        .info-row { display: flex; align-items: center; gap: 18px; color: #7b809a; font-size: 1.05em; margin-bottom: 18px; }
        .info-row .dot { font-size: 1.2em; color: #f59e42; }
        .stats-row { display: flex; gap: 24px; margin-bottom: 24px; flex-wrap: wrap; }
        .stat-card { flex: 1; min-width: 180px; background: linear-gradient(90deg, #22c55e 0%, #a7f3d0 100%); color: #fff; border-radius: 14px; box-shadow: 0 2px 12px rgba(0,0,0,0.07); padding: 24px 0 18px 0; text-align: center; font-size: 1.25em; font-weight: 600; transition: box-shadow 0.2s; }
        .stat-card.blue { background: linear-gradient(90deg, #3b82f6 0%, #a5b4fc 100%); }
        .stat-card.purple { background: linear-gradient(90deg, #a78bfa 0%, #f0abfc 100%); }
        .stat-card.pink { background: linear-gradient(90deg, #f472b6 0%, #fda4af 100%); }
        .stat-card .stat-label { font-size: 0.95em; font-weight: 400; color: #f3f4f6; margin-top: 6px; }
        .progress-section { background: #fff; border-radius: 14px; box-shadow: 0 2px 12px rgba(0,0,0,0.07); padding: 24px 32px; margin-bottom: 24px; }
        .progress-title { font-size: 1.15em; font-weight: bold; color: #5f5be3; margin-bottom: 10px; }
        .progress-bar-bg { background: #e5e9f2; border-radius: 8px; width: 100%; height: 14px; margin: 8px 0 0 0; overflow: hidden; }
        .progress-bar-fill { background: linear-gradient(90deg, #a78bfa 60%, #f472b6 100%); height: 14px; border-radius: 8px; transition: width 0.4s; }
        .progress-info-row { display: flex; justify-content: space-between; align-items: center; margin-top: 10px; font-size: 1.05em; color: #7b809a; }
        .progress-info-row .star { color: #eab308; font-size: 1.2em; }
        .main-row { display: flex; gap: 24px; flex-wrap: wrap; }
        .main-col { flex: 2; min-width: 340px; }
        .side-col { flex: 1; min-width: 260px; display: flex; flex-direction: column; gap: 24px; }
        .activity-section { background: #fff; border-radius: 14px; box-shadow: 0 2px 12px rgba(0,0,0,0.07); padding: 24px 32px; margin-bottom: 24px; }
        .activity-title { font-size: 1.15em; font-weight: bold; color: #a21caf; margin-bottom: 10px; }
        .activity-feed { margin: 0; padding: 0; list-style: none; }
        .activity-feed li { margin-bottom: 12px; color: #232946; font-size: 1.05em; display: flex; align-items: center; gap: 8px; }
        .activity-feed .badge { background: #fef9c3; color: #eab308; border-radius: 8px; padding: 4px 10px; font-size: 0.98em; font-weight: 500; margin-left: 8px; }
        .main-action-row { display: flex; gap: 24px; margin-bottom: 24px; }
        .main-action-card { flex: 1; background: linear-gradient(90deg, #fbbf24 0%, #f59e42 100%); color: #fff; border-radius: 14px; box-shadow: 0 2px 12px rgba(0,0,0,0.07); padding: 24px 32px; display: flex; flex-direction: column; justify-content: space-between; min-width: 260px; }
        .main-action-card.blue { background: linear-gradient(90deg, #3b82f6 0%, #a5b4fc 100%); }
        .main-action-card .action-title { font-size: 1.15em; font-weight: bold; margin-bottom: 8px; }
        .main-action-card .action-desc { font-size: 1em; margin-bottom: 12px; }
        .main-action-card .action-btn { background: #fff; color: #f59e42; border: none; border-radius: 8px; padding: 10px 22px; font-size: 1em; font-weight: 600; cursor: pointer; transition: background 0.2s, color 0.2s; }
        .main-action-card.blue .action-btn { color: #3b82f6; }
        .main-action-card .action-btn:hover { background: #fef9c3; }
        .challenge-card { background: linear-gradient(90deg, #fbbf24 0%, #f59e42 100%); color: #fff; border-radius: 14px; box-shadow: 0 2px 12px rgba(0,0,0,0.07); padding: 24px 32px; margin-bottom: 24px; display: flex; align-items: center; justify-content: space-between; }
        .challenge-info { font-size: 1.08em; }
        .challenge-btn { background: #fff; color: #f59e42; border: none; border-radius: 8px; padding: 10px 22px; font-size: 1em; font-weight: 600; cursor: pointer; transition: background 0.2s, color 0.2s; }
        .challenge-btn:hover { background: #fef9c3; }
        .quick-access-row { display: flex; gap: 18px; margin-bottom: 24px; }
        .quick-btn { flex: 1; background: #fff; color: #7b6cf6; border: none; border-radius: 12px; padding: 18px 0; font-size: 1.08em; font-weight: 600; box-shadow: 0 2px 8px rgba(0,0,0,0.04); display: flex; flex-direction: column; align-items: center; gap: 6px; cursor: pointer; transition: background 0.2s, color 0.2s; }
        .quick-btn:hover { background: #f3e8ff; color: #5f5be3; }
        .modal-bg { display: none; position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background: rgba(0,0,0,0.18); z-index: 1000; align-items: center; justify-content: center; }
        .modal-bg.active { display: flex; }
        .modal { background: #fff; border-radius: 14px; padding: 32px 36px; min-width: 320px; max-width: 90vw; box-shadow: 0 2px 24px rgba(0,0,0,0.13); }
        .modal .modal-title { font-size: 1.2em; font-weight: bold; color: #5f5be3; margin-bottom: 18px; }
        .modal .close-btn { background: #f472b6; color: #fff; border: none; border-radius: 8px; padding: 8px 18px; font-size: 1em; font-weight: 500; cursor: pointer; float: right; margin-top: -12px; margin-right: -12px; }
        .modal .close-btn:hover { background: #a21caf; }
        @media (max-width: 900px) { .main-row, .main-action-row, .stats-row, .quick-access-row { flex-direction: column; gap: 12px; } .container { padding: 0 2vw; } }
        .logout-btn:hover { background: #c0392b; }
        <?php if($theme==='dark'): ?>
        body { background: #181a20; color: #e5e7eb; }
        .navbar { background: linear-gradient(90deg, #232946 0%, #3b3f5c 100%); color: #ffe066; }
        .navbar .logo-icon { background: #232946; color: #ffe066; }
        .navbar .nav-btn, .navbar .profile-btn { background: #232946; color: #ffe066; }
        .navbar .nav-btn.active, .navbar .nav-btn:hover { background: #232946; color: #a7f3d0; }
        .container { background: #181a20; color: #e5e7eb; }
        .stat-card, .stat-card.blue, .stat-card.purple, .stat-card.pink { background: #232946 !important; color: #ffe066; box-shadow: 0 2px 12px #23294633; }
        .stat-card .stat-label { color: #a7f3d0; }
        .progress-section, .activity-section, .main-action-card, .main-action-card.blue, .challenge-card { background: #232946 !important; color: #ffe066; box-shadow: 0 2px 12px #23294633; }
        .progress-title, .activity-title { color: #ffe066; }
        .progress-bar-bg { background: #3b3f5c; }
        .progress-bar-fill { background: linear-gradient(90deg, #ffe066 60%, #f472b6 100%); }
        .progress-info-row, .progress-info-row .star { color: #a7f3d0; }
        .main-action-card .action-btn, .main-action-card.blue .action-btn, .challenge-btn { background: #181a20 !important; color: #ffe066 !important; border: 2px solid #ffe066; }
        .main-action-card .action-btn:hover, .main-action-card.blue .action-btn:hover, .challenge-btn:hover { background: #ffe066 !important; color: #232946 !important; }
        .quick-btn { background: #232946; color: #ffe066; box-shadow: 0 2px 8px #23294633; }
        .quick-btn:hover { background: #3b3f5c; color: #a7f3d0; }
        .modal { background: #232946; color: #ffe066; }
        .modal .close-btn { background: #f472b6; color: #fff; }
        .modal .close-btn:hover { background: #a21caf; }
        .activity-feed li { color: #ffe066; }
        .logout-btn { background: #ef4444 !important; color: #fff !important; }
        .logout-btn:hover { background: #a21caf !important; color: #fff !important; }
        <?php endif; ?>
    </style>
</head>
<body<?php if($theme==='dark') echo ' style="background:#181a20;color:#e5e7eb;"'; ?>>
    <div class="navbar">
        <div class="logo"><span class="logo-icon">ح</span> Belajar Hijaiyah</div>
        <div class="nav-btns">
            <button class="nav-btn active"><span>🏠</span> Beranda</button>
            <button class="nav-btn" onclick="window.location.href='<?php echo site_url('dashboard/belajar'); ?>'">
                <span>📚</span> Belajar
            </button>
            <button class="nav-btn" onclick="window.location.href='<?php echo site_url('dashboard/quiz'); ?>'">
                <span>🎯</span> Kuis
            </button>
            <button class="nav-btn profile-btn" title="Profile"><?php echo strtoupper(substr($user['Nama'],0,1)); ?></button>
            <a href="<?php echo site_url('auth/logout'); ?>" class="logout-btn" style="background:#e74c3c;color:#fff;padding:8px 18px;border-radius:4px;text-decoration:none;font-weight:500;margin-left:12px;transition:background 0.2s;">Logout</a>
        </div>
    </div>
    <div class="container">
        <div class="welcome">Selamat Datang, <?php echo htmlspecialchars($user['Nama']); ?>! 👋</div>
        <div class="subtitle">Semangat belajar hari ini! Mari lanjutkan perjalanan belajar hijaiyah kamu.</div>
        <div class="info-row">
            <span id="live-date">Senin, 30 Juni 2025</span>
            <span class="dot">•</span>
            <span id="live-time">16.06</span>
            <span class="dot">•</span>
            <span>Streak: 3 hari</span>
        </div>
        <div class="stats-row">
            <div class="stat-card"><?php echo $huruf_dipelajari; ?><div class="stat-label">Huruf Dipelajari</div></div>
            <div class="stat-card blue"><?php echo $kuis_selesai; ?><div class="stat-label">Kuis Selesai</div></div>
            <div class="stat-card purple"><?php echo $skor_terbaik; ?>/10<div class="stat-label">Skor Terbaik</div></div>
            <div class="stat-card pink"><?php echo $total_poin; ?><div class="stat-label">Total Poin</div></div>
        </div>
        <div class="progress-section">
            <div class="progress-title">Progress Belajar Kamu</div>
            <div style="display:flex;justify-content:space-between;align-items:center;">
                <span>Huruf Hijaiyah</span>
                <span style="color:#a21caf;font-weight:600;">
                    <?php echo $huruf_dipelajari; ?>/<?php echo $huruf_total; ?> (
                    <?php
                        if ($huruf_total > 0) {
                            echo round($huruf_dipelajari/$huruf_total*100);
                        } else {
                            echo '0';
                        }
                    ?>%)
                </span>
            </div>
            <div class="progress-bar-bg"><div class="progress-bar-fill" style="width:<?php echo ($huruf_total > 0 ? round($huruf_dipelajari/$huruf_total*100) : 0); ?>%"></div></div>
            <div class="progress-info-row">
                <div><span style="color:#f472b6;font-size:1.2em;">🎯</span> Target Hari Ini <span style="color:#5f5be3;font-weight:600;">3 Huruf Baru</span></div>
                <div><span class="star">★</span> Level Kamu <span style="color:#a21caf;font-weight:600;">Pemula Aktif</span></div>
                <div><span style="color:#fbbf24;font-size:1.2em;">🏆</span> Pencapaian Terbaru <span style="color:#a21caf;font-weight:600;">Kuis Master</span></div>
            </div>
        </div>
        <div class="activity-section">
            <div class="activity-title">Riwayat Belajar Terbaru</div>
            <ul class="activity-feed">
                <?php if (!empty($riwayat_belajar)): ?>
                    <?php foreach ($riwayat_belajar as $log): ?>
                        <li><span style="color:#3b82f6;">📚</span> Belajar huruf <b><?php echo htmlspecialchars($log['Huruf_2']); ?></b> (<?php echo htmlspecialchars($log['Huruf_1']); ?>) <span class="badge"><?php echo date('d M H:i', strtotime($log['waktu_belajar'])); ?></span></li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li>Belum ada riwayat belajar.</li>
                <?php endif; ?>
            </ul>
        </div>
        <div class="main-action-row">
            <div class="main-action-card">
                <div class="action-title">Lanjutkan Belajar</div>
                <div class="action-desc">Pelajari huruf Dal, Dzal, Ra selanjutnya<br><span style="color:#fff;opacity:0.8;font-size:0.98em;">Progress: 12/28 huruf</span></div>
                <button class="action-btn" onclick="window.location.href='<?php echo site_url('dashboard/belajar'); ?>'">Mulai Belajar</button>
            </div>
            <div class="main-action-card blue">
                <div class="action-title">Latihan Kuis</div>
                <div class="action-desc">Uji kemampuan dengan kuis huruf yang sudah dipelajari<br><span style="color:#fff;opacity:0.8;font-size:0.98em;">Skor terbaik: 8/10</span></div>
                <button class="action-btn" onclick="window.location.href='<?php echo site_url('dashboard/quiz'); ?>'">Mulai Kuis</button>
            </div>
        </div>
        <div class="challenge-card">
            <div class="challenge-info"><span style="font-size:1.2em;">☀️</span> Tantangan Harian<br><span style="font-size:0.98em;">Selesaikan 1 kuis dengan skor sempurna (10/10)<br>Reward: <b>+50 poin</b> & Badge "Perfect Score"</span></div>
            <button class="challenge-btn">Terima Tantangan</button>
        </div>
        <div class="quick-access-row">
            <button class="quick-btn" onclick="showProfileModal()"><span>👤</span> Profile</button>
            <button class="quick-btn" onclick="showModal('leaderboard')"><span>🏆</span> Leaderboard</button>
            <button class="quick-btn" onclick="showModal('achievements')"><span>🎖️</span> Pencapaian</button>
            <button class="quick-btn" onclick="window.location.href='<?php echo site_url('dashboard/user_settings'); ?>'"><span>⚙️</span> Pengaturan</button>
        </div>
    </div>
    <!-- Modal Dummy -->
    <div class="modal-bg" id="modal-bg">
        <div class="modal" id="modal-content">
            <button class="close-btn" onclick="closeModal()">Tutup</button>
            <div class="modal-title" id="modal-title">Modal</div>
            <div id="modal-body">Konten</div>
        </div>
    </div>
    <script>
        // Live date & time
        function updateDateTime() {
            const days = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
            const months = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
            const now = new Date();
            const day = days[now.getDay()];
            const date = now.getDate();
            const month = months[now.getMonth()];
            const year = now.getFullYear();
            const hours = now.getHours().toString().padStart(2,'0');
            const mins = now.getMinutes().toString().padStart(2,'0');
            document.getElementById('live-date').textContent = `${day}, ${date} ${month} ${year}`;
            document.getElementById('live-time').textContent = `${hours}.${mins}`;
        }
        updateDateTime();
        setInterval(updateDateTime, 60000);
        // Modal interaktif
        function showModal(type) {
            document.getElementById('modal-bg').classList.add('active');
            let title = '', body = '';
            if (type === 'leaderboard') {
                title = 'Leaderboard';
                body = '<ol style="padding-left:18px;">'+
                    <?php
                    $rank = 1;
                    $user_rank = null;
                    foreach ($leaderboard as $row) {
                        $is_me = ($row['P_id'] == $user['P_id']);
                        if ($is_me) $user_rank = $rank;
                        echo "'".($is_me?'<b>':'').$rank.'. '.htmlspecialchars($row['Nama']).' ('.($row['total_skor']?:0).' poin)'.($is_me?'</b>':'')."' + ";
                        $rank++;
                    }
                    echo "''";
                    ?>
                +'</ol>';
                <?php if (isset($user_rank)): ?>
                body = '<b>Ranking Kamu: #<?php echo $user_rank; ?></b><br>' + body;
                <?php endif; ?>
            } else if (type === 'achievements') {
                title = 'Pencapaian';
                body = '<ul style="padding-left:18px;">'+
                    <?php
                    foreach ($badges as $badge) {
                        echo "'<li>🏅 ".htmlspecialchars($badge['nama'])." <span style=\"color:#7b809a;font-size:0.97em;\">".date('d M Y', strtotime($badge['tanggal_didapat']))."</span></li>' + ";
                    }
                    echo "''";
                    ?>
                +'</ul>';
            } else if (type === 'profile') {
                title = 'Profile';
                body = 'Nama: Ahmad<br>Email: ahmad@email.com<br>Level: Pemula Aktif';
            } else if (type === 'settings') {
                title = 'Pengaturan';
                body = 'Pengaturan akun dan preferensi belajar.';
            }
            document.getElementById('modal-title').innerHTML = title;
            document.getElementById('modal-body').innerHTML = body;
        }
        function closeModal() {
            document.getElementById('modal-bg').classList.remove('active');
        }
        function showProfileModal() {
            document.getElementById('modal-bg').classList.add('active');
            document.getElementById('modal-title').textContent = 'Profil Pengguna';
            document.getElementById('modal-body').innerHTML = `
                <b>Nama:</b> <?php echo htmlspecialchars($user['Nama']); ?><br>
                <b>Username:</b> <?php echo htmlspecialchars($user['Username']); ?><br>
                <b>Level:</b> Pemula Aktif<br>
                <b>Kuis Selesai:</b> <?php echo $kuis_selesai; ?><br>
                <b>Skor Terbaik:</b> <?php echo $skor_terbaik; ?>/10<br>
                <b>Total Poin:</b> <?php echo $total_poin; ?>
            `;
        }
    </script>
</body>
</html> 