<!DOCTYPE html>
<html>
<head>
    <title>Hijaiyah Learning - Dashboard User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { background: #eaf1fb; font-family: 'Segoe UI', Arial, sans-serif; margin: 0; padding: 0; }
        .header-bar { background: #fff; display: flex; align-items: center; justify-content: space-between; padding: 18px 32px; box-shadow: 0 2px 8px rgba(0,0,0,0.03); }
        .header-bar .logo { font-size: 1.35em; font-weight: bold; color: #232946; display: flex; align-items: center; gap: 12px; }
        .header-bar .logo-icon { background: #22c55e; color: #fff; border-radius: 8px; width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; font-size: 1.2em; font-weight: bold; }
        .header-bar .status { background: #e7fbe9; color: #22c55e; font-weight: 500; border-radius: 16px; padding: 6px 18px; font-size: 1em; margin-right: 18px; }
        .header-bar .avatar { background: #dbeafe; color: #2563eb; border-radius: 50%; width: 38px; height: 38px; display: flex; align-items: center; justify-content: center; font-size: 1.1em; font-weight: bold; }
        .container { max-width: 1200px; margin: 32px auto; padding: 0 18px; }
        .welcome { font-size: 1.45em; font-weight: 600; color: #232946; margin-bottom: 6px; }
        .subtitle { color: #7b809a; font-size: 1.08em; margin-bottom: 24px; }
        .row { display: flex; gap: 24px; margin-bottom: 24px; flex-wrap: wrap; }
        .card { background: #fff; border-radius: 14px; box-shadow: 0 2px 12px rgba(0,0,0,0.07); padding: 24px 28px; flex: 1; min-width: 220px; }
        .card h4 { margin: 0 0 10px 0; font-size: 1.08em; color: #232946; font-weight: 600; }
        .progress-bar-bg { background: #e5e9f2; border-radius: 8px; width: 100%; height: 12px; margin: 8px 0 0 0; overflow: hidden; }
        .progress-bar-fill { background: linear-gradient(90deg, #22c55e 60%, #16a34a 100%); height: 12px; border-radius: 8px; transition: width 0.4s; }
        .main-row { display: flex; gap: 24px; flex-wrap: wrap; }
        .main-col { flex: 2; min-width: 340px; }
        .side-col { flex: 1; min-width: 260px; display: flex; flex-direction: column; gap: 24px; }
        .menu-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 18px; margin-bottom: 18px; }
        .menu-btn { display: flex; flex-direction: column; align-items: flex-start; justify-content: center; background: #2563eb; color: #fff; border-radius: 10px; padding: 18px 18px; font-size: 1.08em; font-weight: 500; cursor: pointer; border: none; transition: background 0.2s; min-height: 70px; }
        .menu-btn.green { background: #22c55e; }
        .menu-btn.purple { background: #a78bfa; }
        .menu-btn.orange { background: #f59e42; }
        .menu-btn:hover { filter: brightness(0.95); }
        .huruf-row { display: flex; gap: 10px; margin-bottom: 8px; flex-wrap: wrap; }
        .huruf-card { background: #f0f9ff; color: #2563eb; border-radius: 8px; padding: 12px 18px; font-size: 1.25em; font-weight: 600; min-width: 44px; text-align: center; }
        .huruf-card.active { background: #fef9c3; color: #eab308; }
        .lihat-semua { color: #2563eb; font-size: 1em; text-decoration: underline; cursor: pointer; margin-top: 4px; display: inline-block; }
        .achievement { background: #fef9c3; color: #eab308; border-radius: 8px; padding: 10px 16px; font-size: 1em; font-weight: 500; margin-bottom: 8px; display: flex; align-items: center; gap: 8px; }
        .achievement.blue { background: #e0f2fe; color: #2563eb; }
        .achievement.green { background: #dcfce7; color: #22c55e; }
        .stat-list { margin: 0; padding: 0; list-style: none; }
        .stat-list li { margin-bottom: 8px; color: #232946; font-size: 1em; }
        @media (max-width: 900px) { .main-row { flex-direction: column; } .side-col { flex-direction: row; gap: 18px; } }
        @media (max-width: 600px) { .container { padding: 0 2vw; } .row, .main-row { flex-direction: column; gap: 12px; } }
    </style>
</head>
<body>
    <div class="header-bar">
        <div class="logo"><span class="logo-icon">ح</span> Hijaiyah Learning</div>
        <div style="display:flex;align-items:center;gap:18px;">
            <span class="status">● Online</span>
            <div class="avatar"><?php echo strtoupper(substr($user['Nama'],0,1)); ?></div>
        </div>
    </div>
    <div class="container">
        <div class="welcome">Selamat Datang, <?php echo htmlspecialchars($user['Nama']); ?>! 👋</div>
        <div class="subtitle">Mari lanjutkan perjalanan belajar huruf Hijaiyah hari ini</div>
        <div class="row">
            <div class="card">
                <h4>Progress Keseluruhan</h4>
                <div style="font-size:1.1em; font-weight:500; color:#2563eb; margin-bottom:4px;">18 dari 28 huruf</div>
                <div class="progress-bar-bg"><div class="progress-bar-fill" style="width:64%"></div></div>
                <div style="color:#7b809a; font-size:0.98em; margin-top:4px;">64%</div>
            </div>
            <div class="card">
                <h4>Streak Harian</h4>
                <div style="font-size:2em; color:#f59e42; font-weight:700;">7</div>
                <div style="color:#7b809a; font-size:0.98em;">Hari berturut-turut</div>
            </div>
            <div class="card">
                <h4>Poin Total</h4>
                <div style="font-size:2em; color:#eab308; font-weight:700;">1,250</div>
                <div style="color:#7b809a; font-size:0.98em;">Poin terkumpul</div>
            </div>
        </div>
        <div class="main-row">
            <div class="main-col">
                <div class="card">
                    <h4>Mulai Belajar</h4>
                    <div class="menu-grid">
                        <button class="menu-btn">Pelajaran Baru<br><span style="font-size:0.95em;font-weight:400;">Huruf ش (Shad)</span></button>
                        <button class="menu-btn green">Ulang Pelajaran<br><span style="font-size:0.95em;font-weight:400;">5 huruf perlu diulang</span></button>
                        <button class="menu-btn purple">Kuis Harian<br><span style="font-size:0.95em;font-weight:400;">10 soal tersedia</span></button>
                        <button class="menu-btn orange">Latihan Menulis<br><span style="font-size:0.95em;font-weight:400;">Praktik menulis huruf</span></button>
                    </div>
                </div>
                <div class="card" style="margin-top:18px;">
                    <h4>Huruf yang Dipelajari</h4>
                    <div class="huruf-row">
                        <div class="huruf-card active">ا</div>
                        <div class="huruf-card">ب</div>
                        <div class="huruf-card">ت</div>
                        <div class="huruf-card">ث</div>
                        <div class="huruf-card active">ج</div>
                        <div class="huruf-card">ح</div>
                        <div class="huruf-card">خ</div>
                        <div class="huruf-card">د</div>
                    </div>
                    <a class="lihat-semua">Lihat Semua Huruf →</a>
                </div>
            </div>
            <div class="side-col">
                <div class="card">
                    <h4>Target Harian</h4>
                    <div style="margin-bottom:8px;">Pelajaran (2/3)</div>
                    <div class="progress-bar-bg"><div class="progress-bar-fill" style="width:67%"></div></div>
                    <div style="margin:10px 0 8px 0;">Latihan (15/20 menit)</div>
                    <div class="progress-bar-bg"><div class="progress-bar-fill" style="width:75%"></div></div>
                </div>
                <div class="card">
                    <h4>Pencapaian Terbaru</h4>
                    <div class="achievement"><span>🏅</span> Minggu Pertama<br><span style="font-size:0.95em;font-weight:400;">Belajar 7 hari berturut-turut</span></div>
                    <div class="achievement blue"><span>📖</span> Pembaca Rajin<br><span style="font-size:0.95em;font-weight:400;">Menyelesaikan 15 pelajaran</span></div>
                    <div class="achievement green"><span>✅</span> Sempurna<br><span style="font-size:0.95em;font-weight:400;">Kuis dengan nilai 100%</span></div>
                </div>
                <div class="card">
                    <h4>Statistik</h4>
                    <ul class="stat-list">
                        <li>Total waktu belajar <b>12 jam 30 menit</b></li>
                        <li>Kuis diselesaikan <b>24</b></li>
                        <li>Rata-rata nilai <b>87%</b></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 