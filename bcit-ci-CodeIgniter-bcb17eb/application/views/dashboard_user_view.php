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
        .container { max-width: 1200px; margin: 32px auto; padding: 0 18px; }
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
    </style>
</head>
<body>
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
            <div class="stat-card">12<div class="stat-label">Huruf Dipelajari</div></div>
            <div class="stat-card blue">5<div class="stat-label">Kuis Selesai</div></div>
            <div class="stat-card purple">8/10<div class="stat-label">Skor Terbaik</div></div>
            <div class="stat-card pink">245<div class="stat-label">Total Poin</div></div>
        </div>
        <div class="progress-section">
            <div class="progress-title">Progress Belajar Kamu</div>
            <div style="display:flex;justify-content:space-between;align-items:center;">
                <span>Huruf Hijaiyah</span>
                <span style="color:#a21caf;font-weight:600;">12/28 (43%)</span>
            </div>
            <div class="progress-bar-bg"><div class="progress-bar-fill" style="width:43%"></div></div>
            <div class="progress-info-row">
                <div><span style="color:#f472b6;font-size:1.2em;">🎯</span> Target Hari Ini <span style="color:#5f5be3;font-weight:600;">3 Huruf Baru</span></div>
                <div><span class="star">★</span> Level Kamu <span style="color:#a21caf;font-weight:600;">Pemula Aktif</span></div>
                <div><span style="color:#fbbf24;font-size:1.2em;">🏆</span> Pencapaian Terbaru <span style="color:#a21caf;font-weight:600;">Kuis Master</span></div>
            </div>
        </div>
        <div class="activity-section">
            <div class="activity-title">Aktivitas Terbaru</div>
            <ul class="activity-feed">
                <li><span style="color:#22c55e;">✔</span> Menyelesaikan Kuis Huruf Ba-Ta-Tsa <span class="badge">+10 Poin</span></li>
                <li><span style="color:#fbbf24;">🏅</span> Mendapat Badge "Pemula Semangat" <span style="color:#7b809a;font-size:0.97em;">2 hari yang lalu</span></li>
                <li><span style="color:#3b82f6;">📚</span> Belajar huruf Dal, Dzal, Ra <span class="badge">+3 Huruf</span></li>
            </ul>
        </div>
        <div class="main-action-row">
            <div class="main-action-card">
                <div class="action-title">Lanjutkan Belajar</div>
                <div class="action-desc">Pelajari huruf Dal, Dzal, Ra selanjutnya<br><span style="color:#fff;opacity:0.8;font-size:0.98em;">Progress: 12/28 huruf</span></div>
                <button class="action-btn">Mulai Belajar</button>
            </div>
            <div class="main-action-card blue">
                <div class="action-title">Latihan Kuis</div>
                <div class="action-desc">Uji kemampuan dengan kuis huruf yang sudah dipelajari<br><span style="color:#fff;opacity:0.8;font-size:0.98em;">Skor terbaik: 8/10</span></div>
                <button class="action-btn">Mulai Kuis</button>
            </div>
        </div>
        <div class="challenge-card">
            <div class="challenge-info"><span style="font-size:1.2em;">☀️</span> Tantangan Harian<br><span style="font-size:0.98em;">Selesaikan 1 kuis dengan skor sempurna (10/10)<br>Reward: <b>+50 poin</b> & Badge "Perfect Score"</span></div>
            <button class="challenge-btn">Terima Tantangan</button>
        </div>
        <div class="quick-access-row">
            <button class="quick-btn" onclick="showModal('profile')"><span>👤</span> Profile</button>
            <button class="quick-btn" onclick="showModal('leaderboard')"><span>🏆</span> Leaderboard</button>
            <button class="quick-btn" onclick="showModal('achievements')"><span>🎖️</span> Pencapaian</button>
            <button class="quick-btn" onclick="showModal('settings')"><span>⚙️</span> Pengaturan</button>
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
                body = '<b>Ranking Kamu: #1</b><br>1. Ahmad (245 poin)<br>2. Budi (210 poin)<br>3. Siti (180 poin)';
            } else if (type === 'achievements') {
                title = 'Pencapaian';
                body = '<ul><li>🏅 Pemula Semangat (Unlocked)</li><li>🎯 Kuis Master (Unlocked)</li><li>🔒 Konsisten 30 Hari (Locked)</li></ul>';
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
    </script>
</body>
</html> 