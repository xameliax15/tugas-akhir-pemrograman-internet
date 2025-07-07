<!DOCTYPE html>
<html>
<head>
    <title>Huruf Hijaiyah 📚</title>
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
        .huruf-header { font-size: 2.1em; font-weight: 800; color: #5f5be3; margin-bottom: 8px; text-align: center; letter-spacing: 0.5px; }
        .huruf-subtitle { color: #7b809a; font-size: 1.15em; margin-bottom: 32px; text-align: center; }
        .huruf-grid { display: grid; grid-template-columns: repeat(7, 1fr); gap: 22px; justify-items: center; margin-bottom: 32px; }
        .huruf-card { width: 120px; height: 120px; border-radius: 22px; display: flex; flex-direction: column; align-items: center; justify-content: center; cursor: pointer; box-shadow: 0 2px 12px rgba(0,0,0,0.07); transition: transform 0.3s, box-shadow 0.3s; position: relative; }
        .huruf-card:hover { transform: translateY(-6px) scale(1.04); box-shadow: 0 8px 32px rgba(91, 33, 182, 0.18); z-index: 2; }
        .huruf-arab { font-size: 2.7em; color: #fff; font-weight: 700; margin-bottom: 8px; }
        .huruf-nama { font-size: 1.15em; color: #fff; font-weight: 600; margin-bottom: 2px; letter-spacing: 0.5px; }
        .huruf-bunyi { font-size: 0.98em; color: rgba(255,255,255,0.82); font-weight: 400; }
        /* 6 gradient warna */
        .card-colors { background: linear-gradient(135deg, #fbbf24 0%, #f59e42 100%); }
        .card-colors-2 { background: linear-gradient(135deg, #3b82f6 0%, #6366f1 100%); }
        .card-colors-3 { background: linear-gradient(135deg, #f472b6 0%, #fda4af 100%); }
        .card-colors-4 { background: linear-gradient(135deg, #60a5fa 0%, #a78bfa 100%); }
        .card-colors-5 { background: linear-gradient(135deg, #34d399 0%, #059669 100%); }
        .card-colors-6 { background: linear-gradient(135deg, #a5b4fc 0%, #7c3aed 100%); }
        @media (max-width: 1100px) { .huruf-grid { grid-template-columns: repeat(5, 1fr); } .huruf-card { width: 110px; height: 110px; } }
        @media (max-width: 800px) { .huruf-grid { grid-template-columns: repeat(4, 1fr); } .huruf-card { width: 100px; height: 100px; } }
        @media (max-width: 600px) { .huruf-grid { grid-template-columns: repeat(2, 1fr); gap: 14px; } .huruf-card { width: 90px; height: 90px; } }
        .logout-btn:hover { background: #c0392b; }
        .huruf-modal {
          position: fixed; z-index: 99; left: 0; top: 0; width: 100vw; height: 100vh;
          background: rgba(44,44,84,0.25); display: flex; align-items: center; justify-content: center;
          backdrop-filter: blur(3px);
          animation: fadeInModalBg 0.3s;
        }
        @keyframes fadeInModalBg { from { opacity:0; } to { opacity:1; } }
        .huruf-modal-content {
          background: #fff;
          border-radius: 28px;
          box-shadow: 0 12px 48px 0 rgba(31,38,135,0.22);
          border: 2.5px solid rgba(255,255,255,0.32);
          padding: 2.8em 2.2em 2.2em 2.2em;
          min-width: 340px; max-width: 96vw;
          text-align: center;
          animation: fadeInModal 0.35s;
          position: relative;
          color: #232946;
          display: flex;
          flex-direction: column;
          align-items: center;
        }
        @keyframes fadeInModal { from { opacity:0; transform:scale(0.92);} to {opacity:1; transform:scale(1);} }
        .huruf-modal-close {
          position: absolute; right: 22px; top: 18px; font-size: 2.2em; color: #7b6cf6; cursor: pointer; font-weight: bold;
          background: rgba(255,255,255,0.5); border-radius: 50%; width: 38px; height: 38px; display: flex; align-items: center; justify-content: center; transition: background 0.2s, color 0.2s;
          box-shadow: 0 2px 8px rgba(123,108,246,0.10);
        }
        .huruf-modal-close:hover {
          background: #7b6cf6; color: #fff;
        }
        .huruf-modal-content .huruf-arab {
          font-size: 3.2em; color: #7b6cf6; font-weight: 800; margin-bottom: 0.2em; text-shadow: 0 2px 12px rgba(123,108,246,0.10);
        }
        .huruf-modal-content .huruf-nama {
          font-size: 1.35em; color: #232946; font-weight: 700; margin-bottom: 0.2em; letter-spacing: 0.5px;
        }
        .huruf-modal-content .huruf-bunyi {
          font-size: 1.08em; color: #5f5be3; font-weight: 600; margin-bottom: 1.1em;
        }
        #modal-penjelasan {
          color: #232946; font-size: 1.13em; line-height: 1.6; background: #f7f7fa; border-radius: 14px; padding: 1.1em 1em 1em 1em; margin-top: 0.2em; box-shadow: 0 2px 12px rgba(123,108,246,0.07);
          font-weight: 500;
        }
        @media (max-width: 600px) {
          .huruf-modal-content { min-width: 0; padding: 1.2em 0.5em 1.2em 0.5em; }
          #modal-penjelasan { font-size: 1em; padding: 0.7em 0.5em; }
          .huruf-modal-close { right: 10px; top: 8px; width: 32px; height: 32px; font-size: 1.5em; }
        }
        .huruf-menu-bar {
          display: flex;
          flex-wrap: wrap;
          gap: 12px;
          justify-content: center;
          margin-bottom: 28px;
          margin-top: 10px;
        }
        .huruf-menu-btn {
          background: linear-gradient(90deg, #7b6cf6 0%, #5f5be3 100%);
          color: #fff;
          border: none;
          border-radius: 8px;
          padding: 9px 18px;
          font-size: 1em;
          font-weight: 600;
          cursor: pointer;
          box-shadow: 0 2px 8px rgba(91,33,182,0.08);
          transition: background 0.2s, transform 0.2s;
        }
        .huruf-menu-btn:hover, .huruf-menu-btn.active {
          background: linear-gradient(90deg, #5f5be3 0%, #7b6cf6 100%);
          transform: translateY(-2px) scale(1.04);
        }
        @media (max-width: 600px) {
          .huruf-menu-bar { gap: 7px; }
          .huruf-menu-btn { font-size: 0.97em; padding: 8px 10px; }
        }
        .huruf-tab-bar {
          display: flex;
          justify-content: center;
          gap: 10px;
          margin-bottom: 18px;
          margin-top: 10px;
        }
        .huruf-tab-btn {
          background: #fff;
          color: #7b6cf6;
          border: 2px solid #7b6cf6;
          border-radius: 8px 8px 0 0;
          padding: 10px 28px;
          font-size: 1.08em;
          font-weight: 700;
          cursor: pointer;
          transition: background 0.2s, color 0.2s, border 0.2s;
          outline: none;
        }
        .huruf-tab-btn.active, .huruf-tab-btn:focus {
          background: linear-gradient(90deg, #7b6cf6 0%, #5f5be3 100%);
          color: #fff;
          border-bottom: 2px solid #fff;
          z-index: 2;
        }
        .lanjutan-menu-bar {
          display: flex;
          flex-wrap: wrap;
          gap: 12px;
          justify-content: center;
          margin-bottom: 28px;
          margin-top: 10px;
        }
        .lanjutan-menu-btn {
          background: linear-gradient(90deg, #7b6cf6 0%, #5f5be3 100%);
          color: #fff;
          border: none;
          border-radius: 8px;
          padding: 10px 22px;
          font-size: 1em;
          font-weight: 600;
          cursor: pointer;
          box-shadow: 0 2px 8px rgba(91,33,182,0.08);
          transition: background 0.2s, transform 0.2s;
        }
        .lanjutan-menu-btn:hover, .lanjutan-menu-btn.active {
          background: linear-gradient(90deg, #5f5be3 0%, #7b6cf6 100%);
          transform: translateY(-2px) scale(1.04);
        }
        .lanjutan-placeholder, .tajwid-placeholder {
          text-align: center;
          margin-top: 40px;
          font-size: 1.15em;
          color: #232946;
          background: #f7f7fa;
          border-radius: 16px;
          padding: 2.2em 1em 2em 1em;
          box-shadow: 0 2px 12px rgba(123,108,246,0.07);
          font-weight: 500;
          max-width: 500px;
          margin-left: auto;
          margin-right: auto;
        }
        @media (max-width: 600px) {
          .huruf-tab-btn { font-size: 0.97em; padding: 8px 10px; }
          .lanjutan-placeholder, .tajwid-placeholder { font-size: 1em; padding: 1.2em 0.5em; }
        }
        .lanjutan-latihan-section .huruf-grid { margin-top: 0; }
        .suku-kata-card {
          width: 120px; height: 120px; border-radius: 22px; display: flex; flex-direction: column; align-items: center; justify-content: center; cursor: pointer; box-shadow: 0 2px 12px rgba(0,0,0,0.07); transition: transform 0.3s, box-shadow 0.3s; position: relative; background: linear-gradient(135deg, #fbbf24 0%, #f59e42 100%); margin-bottom: 0;
        }
        .suku-kata-card:hover { transform: translateY(-6px) scale(1.04); box-shadow: 0 8px 32px rgba(91, 33, 182, 0.18); z-index: 2; }
        .suku-arab { font-size: 2.2em; color: #fff; font-weight: 700; margin-bottom: 8px; }
        .suku-latin { font-size: 1.1em; color: #fff; font-weight: 600; margin-bottom: 2px; letter-spacing: 0.5px; }
        .suku-penjelasan { font-size: 0.98em; color: rgba(255,255,255,0.82); font-weight: 400; }
        .suku-kata-card {
          position: relative;
        }
        .suku-audio-btn {
          position: absolute; bottom: 10px; right: 10px;
          background: #fff; color: #7b6cf6; border: none; border-radius: 50%; width: 36px; height: 36px;
          display: flex; align-items: center; justify-content: center; font-size: 1.3em; box-shadow: 0 2px 8px rgba(123,108,246,0.10);
          cursor: pointer; transition: background 0.2s, color 0.2s;
        }
        .suku-audio-btn:hover { background: #7b6cf6; color: #fff; }
        .kata-card {
          width: 140px; height: 120px; border-radius: 22px; display: flex; flex-direction: column; align-items: center; justify-content: center; cursor: pointer; box-shadow: 0 2px 12px rgba(0,0,0,0.07); transition: transform 0.3s, box-shadow 0.3s; position: relative; background: linear-gradient(135deg, #3b82f6 0%, #6366f1 100%); margin-bottom: 0;
        }
        .kata-card:hover { transform: translateY(-6px) scale(1.04); box-shadow: 0 8px 32px rgba(91, 33, 182, 0.18); z-index: 2; }
        .kata-arab { font-size: 2em; color: #fff; font-weight: 700; margin-bottom: 8px; }
        .kata-latin { font-size: 1.1em; color: #fff; font-weight: 600; margin-bottom: 2px; letter-spacing: 0.5px; }
        .kata-audio-btn {
          position: absolute; bottom: 10px; right: 10px;
          background: #fff; color: #3b82f6; border: none; border-radius: 50%; width: 36px; height: 36px;
          display: flex; align-items: center; justify-content: center; font-size: 1.3em; box-shadow: 0 2px 8px rgba(123,108,246,0.10);
          cursor: pointer; transition: background 0.2s, color 0.2s;
        }
        .kata-audio-btn:hover { background: #3b82f6; color: #fff; }
        .kata-progress-bar-bg {
          width: 100%;
          max-width: 500px;
          height: 18px;
          background: #e0e7ff;
          border-radius: 10px;
          margin: 0 auto 18px auto;
          overflow: hidden;
          box-shadow: 0 2px 8px rgba(123,108,246,0.07);
        }
        .kata-progress-bar-fill {
          height: 100%;
          background: linear-gradient(90deg, #7b6cf6 0%, #3b82f6 100%);
          border-radius: 10px;
          transition: width 0.4s;
        }
        .kata-progress-info {
          text-align: center;
          font-size: 1em;
          color: #5f5be3;
          font-weight: 600;
          margin-bottom: 8px;
        }
        .kata-modal-nav {
          display: flex;
          justify-content: space-between;
          align-items: center;
          margin-top: 1.2em;
          gap: 12px;
        }
        .kata-modal-nav-btn {
          background: #7b6cf6;
          color: #fff;
          border: none;
          border-radius: 8px;
          padding: 8px 18px;
          font-size: 1em;
          font-weight: 600;
          cursor: pointer;
          transition: background 0.2s, color 0.2s;
          opacity: 1;
        }
        .kata-modal-nav-btn:disabled {
          background: #e0e7ff;
          color: #bdbdbd;
          cursor: not-allowed;
          opacity: 0.7;
        }
        .kata-quiz-modal-bg {
          position: fixed; z-index: 100; left: 0; top: 0; width: 100vw; height: 100vh;
          background: rgba(44,44,84,0.18); display: flex; align-items: center; justify-content: center;
        }
        .kata-quiz-modal {
          background: #fff; border-radius: 22px; box-shadow: 0 8px 32px rgba(44,44,84,0.18);
          padding: 2.2em 2em 1.5em 2em; min-width: 320px; max-width: 96vw;
          text-align: center; position: relative;
          animation: fadeInModal 0.3s;
        }
        .kata-quiz-close {
          position: absolute; right: 18px; top: 12px; font-size: 2em; color: #7b6cf6; cursor: pointer; font-weight: bold;
          background: rgba(255,255,255,0.5); border-radius: 50%; width: 38px; height: 38px; display: flex; align-items: center; justify-content: center; transition: background 0.2s, color 0.2s;
          box-shadow: 0 2px 8px rgba(123,108,246,0.10);
        }
        .kata-quiz-close:hover { background: #7b6cf6; color: #fff; }
        .kata-quiz-q { font-size: 1.15em; font-weight: 600; color: #232946; margin-bottom: 1.2em; }
        .kata-quiz-opts { display: flex; flex-direction: column; gap: 12px; margin-bottom: 1.2em; }
        .kata-quiz-opt-btn {
          background: #e0e7ff; color: #5f5be3; border: none; border-radius: 8px; padding: 10px 0; font-size: 1.08em; font-weight: 600; cursor: pointer; transition: background 0.2s, color 0.2s;
        }
        .kata-quiz-opt-btn.selected { background: #7b6cf6; color: #fff; }
        .kata-quiz-feedback { font-size: 1.1em; font-weight: 600; margin-bottom: 0.7em; }
        .kata-quiz-feedback.benar { color: #16a34a; }
        .kata-quiz-feedback.salah { color: #e74c3c; }
        .menulis-container {
          display: flex;
          flex-direction: column;
          align-items: center;
          margin-top: 24px;
        }
        .menulis-contoh {
          font-size: 2.5em;
          color: #7b6cf6;
          font-weight: 800;
          margin-bottom: 10px;
          letter-spacing: 2px;
        }
        .menulis-canvas {
          border: 2.5px solid #7b6cf6;
          border-radius: 18px;
          background: #fff;
          box-shadow: 0 2px 12px rgba(123,108,246,0.07);
          touch-action: none;
          margin-bottom: 12px;
        }
        .menulis-btn {
          background: #7b6cf6;
          color: #fff;
          border: none;
          border-radius: 8px;
          padding: 8px 22px;
          font-size: 1em;
          font-weight: 600;
          cursor: pointer;
          transition: background 0.2s, color 0.2s;
          margin-top: 6px;
        }
        .menulis-btn:hover { background: #5f5be3; }
        .menulis-select {
          font-size: 1.1em;
          padding: 6px 16px;
          border-radius: 8px;
          border: 1.5px solid #7b6cf6;
          margin-bottom: 10px;
          margin-top: 4px;
          color: #5f5be3;
          font-weight: 600;
          background: #f7f7fa;
        }
        .menulis-btn-group {
          display: flex;
          gap: 10px;
          margin-top: 6px;
          justify-content: center;
        }
        .menulis-feedback {
          margin-top: 10px;
          font-size: 1.08em;
          font-weight: 600;
          color: #7b6cf6;
          min-height: 1.5em;
          text-align: center;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo"><span class="logo-icon">ح</span> Belajar Hijaiyah</div>
        <div class="nav-btns">
            <button class="nav-btn" onclick="window.location.href='<?php echo site_url('dashboard/user'); ?>'"><span>🏠</span> Beranda</button>
            <button class="nav-btn active"><span>📚</span> Belajar</button>
            <button class="nav-btn"><span>📝</span> Kuis</button>
            <button class="nav-btn profile-btn" title="Profile">😊</button>
            <a href="<?php echo site_url('auth/logout'); ?>" class="logout-btn" style="background:#e74c3c;color:#fff;padding:8px 18px;border-radius:4px;text-decoration:none;font-weight:500;margin-left:12px;transition:background 0.2s;">Logout</a>
        </div>
    </div>
    <div class="container">
        <div class="huruf-header">Huruf Hijaiyah 📚</div>
        <div class="huruf-subtitle">Klik setiap huruf untuk melihat penjelasan dan mendengar suaranya!</div>
        <div class="huruf-tab-bar">
            <button class="huruf-tab-btn" id="tabMateriBtn" onclick="window.location.href='#materi'">Materi</button>
            <button class="huruf-tab-btn active" id="tabDasarBtn" onclick="switchTab('dasar')">Dasar</button>
            <button class="huruf-tab-btn" id="tabLanjutanBtn" onclick="switchTab('lanjutan')">Lanjutan</button>
            <button class="huruf-tab-btn" id="tabTajwidBtn" onclick="switchTab('tajwid')">Tajwid</button>
        </div>
        <div id="tabDasarContent">
            <div class="huruf-menu-bar">
                <button class="huruf-menu-btn active" id="btnFathah" onclick="switchHarakat('fathah')">Fathah</button>
                <button class="huruf-menu-btn" id="btnKasrah" onclick="switchHarakat('kasrah')">Kasrah</button>
                <button class="huruf-menu-btn" id="btnDhammah" onclick="switchHarakat('dhammah')">Dhammah</button>
            </div>
            <div class="huruf-grid" id="hurufGrid"></div>
        </div>
        <div id="tabLanjutanContent" style="display:none;">
            <div class="lanjutan-menu-bar">
                <button class="lanjutan-menu-btn active" id="btnSukuKata" onclick="showLanjutan('suku')">Latihan Suku Kata</button>
                <button class="lanjutan-menu-btn" id="btnKata" onclick="showLanjutan('kata')">Latihan Kata</button>
                <button class="lanjutan-menu-btn" id="btnMenulis" onclick="showLanjutan('menulis')">Latihan Menulis</button>
            </div>
            <div id="lanjutanSukuKata" class="lanjutan-latihan-section">
        <div class="huruf-grid">
                    <!-- Grid suku kata dummy -->
                </div>
            </div>
            <div id="lanjutanKata" class="lanjutan-latihan-section" style="display:none;">
                <div class="lanjutan-placeholder">Latihan kata akan segera hadir!</div>
            </div>
            <div id="lanjutanMenulis" class="lanjutan-latihan-section" style="display:none;">
                <div class="menulis-container">
                    <select class="menulis-select" id="menulisSelect"></select>
                    <div class="menulis-contoh" id="menulisContoh">ب</div>
                    <canvas id="menulisCanvas" class="menulis-canvas" width="320" height="180"></canvas>
                    <div class="menulis-btn-group">
                        <button class="menulis-btn" onclick="clearMenulisCanvas()">Bersihkan</button>
                        <button class="menulis-btn" onclick="cekKemiripanMenulis()">Cek Kemiripan</button>
                        <button class="menulis-btn" onclick="downloadMenulisCanvas()">Download</button>
                    </div>
                    <div class="menulis-feedback" id="menulisFeedback"></div>
                </div>
            </div>
        </div>
        <div id="tabTajwidContent" style="display:none;">
            <div class="huruf-header">Materi Tajwid</div>
            <div class="huruf-subtitle">Klik setiap hukum tajwid untuk melihat penjelasan dan contoh bacaan!</div>
            <div class="huruf-grid" style="grid-template-columns: repeat(4, 1fr);">
                <div class="huruf-card card-colors" onclick="showTajwidModal('idzhar')">
                    <div class="huruf-arab" style="font-size:2em;">إظهار</div>
                    <div class="huruf-nama">Idzhar</div>
                </div>
                <div class="huruf-card card-colors-2" onclick="showTajwidModal('idgham')">
                    <div class="huruf-arab" style="font-size:2em;">إدغام</div>
                    <div class="huruf-nama">Idgham</div>
                </div>
                <div class="huruf-card card-colors-3" onclick="showTajwidModal('iqlab')">
                    <div class="huruf-arab" style="font-size:2em;">إقلاب</div>
                    <div class="huruf-nama">Iqlab</div>
                </div>
                <div class="huruf-card card-colors-4" onclick="showTajwidModal('ikhfa')">
                    <div class="huruf-arab" style="font-size:2em;">إخفاء</div>
                    <div class="huruf-nama">Ikhfa</div>
                </div>
            </div>
            <!-- Modal Tajwid -->
            <div id="tajwidModal" class="huruf-modal" style="display:none;">
              <div class="huruf-modal-content">
                <span class="huruf-modal-close" onclick="closeTajwidModal()">&times;</span>
                <div id="tajwid-title" class="huruf-header" style="font-size:1.5em;"></div>
                <div id="tajwid-arab" class="huruf-arab" style="font-size:2em;"></div>
                <div id="tajwid-penjelasan" style="color:#333;font-size:1.05em;margin:1em 0;"></div>
                <div id="tajwid-contoh" style="color:#5f5be3;font-size:1.1em;"></div>
              </div>
            </div>
        </div>
        <!-- Modal Penjelasan Huruf -->
        <div id="hurufModal" class="huruf-modal" style="display:none;">
          <div class="huruf-modal-content">
            <span class="huruf-modal-close" onclick="closeHurufModal()">&times;</span>
            <div id="modal-arab" class="huruf-arab" style="font-size:2.5em;"></div>
            <div id="modal-nama" class="huruf-nama" style="font-size:1.2em;"></div>
            <div id="modal-bunyi" class="huruf-bunyi" style="margin-bottom:1em;"></div>
            <div id="modal-penjelasan" style="color:#333;font-size:1.05em;"></div>
          </div>
        </div>
        <div id="kataQuizModalBg" class="kata-quiz-modal-bg" style="display:none;">
          <div class="kata-quiz-modal">
            <span class="kata-quiz-close" onclick="closeKataQuiz()">&times;</span>
            <div id="kataQuizQ" class="kata-quiz-q"></div>
            <div id="kataQuizOpts" class="kata-quiz-opts"></div>
            <div id="kataQuizFeedback" class="kata-quiz-feedback"></div>
          </div>
        </div>
    </div>
    <script>
    const hurufList = <?php echo json_encode($huruf); ?>;
    const harakatMap = {
      fathah: {
        label: 'Fathah',
        harakat: '\u064E',
        pelafalan: {
          'Alif': 'a', 'Ba': 'ba', 'Ta': 'ta', 'Tsa': 'tsa', 'Jim': 'ja', 'Ha': 'ha', 'Kha': 'kha', 'Dal': 'da', 'Dzal': 'dza', 'Ra': 'ra', 'Zai': 'za', 'Sin': 'sa', 'Syin': 'sya', 'Shad': 'sha', 'Dhad': 'dha', 'Tha': 'tha', 'Zha': 'zha', 'Ain': 'a', 'Ghain': 'gha', 'Fa': 'fa', 'Qaf': 'qa', 'Kaf': 'ka', 'Lam': 'la', 'Mim': 'ma', 'Nun': 'na', 'Wau': 'wa', 'Ha': 'ha', 'Ya': 'ya'
        },
        penjelasan: nama => `Huruf ${nama} dengan tanda Fathah dibaca "${harakatMap.fathah.pelafalan[nama]||''}" sesuai standar tajwid.`
      },
      kasrah: {
        label: 'Kasrah',
        harakat: '\u0650',
        pelafalan: {
          'Alif': 'i', 'Ba': 'bi', 'Ta': 'ti', 'Tsa': 'tsi', 'Jim': 'ji', 'Ha': 'hi', 'Kha': 'khi', 'Dal': 'di', 'Dzal': 'dzi', 'Ra': 'ri', 'Zai': 'zi', 'Sin': 'si', 'Syin': 'syi', 'Shad': 'shi', 'Dhad': 'dhi', 'Tha': 'thi', 'Zha': 'zhi', 'Ain': 'i', 'Ghain': 'ghi', 'Fa': 'fi', 'Qaf': 'qi', 'Kaf': 'ki', 'Lam': 'li', 'Mim': 'mi', 'Nun': 'ni', 'Wau': 'wi', 'Ha': 'hi', 'Ya': 'yi'
        },
        penjelasan: nama => `Huruf ${nama} dengan tanda Kasrah dibaca "${harakatMap.kasrah.pelafalan[nama]||''}" sesuai standar tajwid.`
      },
      dhammah: {
        label: 'Dhammah',
        harakat: '\u064F',
        pelafalan: {
          'Alif': 'u', 'Ba': 'bu', 'Ta': 'tu', 'Tsa': 'tsu', 'Jim': 'ju', 'Ha': 'hu', 'Kha': 'khu', 'Dal': 'du', 'Dzal': 'dzu', 'Ra': 'ru', 'Zai': 'zu', 'Sin': 'su', 'Syin': 'syu', 'Shad': 'shu', 'Dhad': 'dhu', 'Tha': 'thu', 'Zha': 'zhu', 'Ain': 'u', 'Ghain': 'ghu', 'Fa': 'fu', 'Qaf': 'qu', 'Kaf': 'ku', 'Lam': 'lu', 'Mim': 'mu', 'Nun': 'nu', 'Wau': 'wu', 'Ha': 'hu', 'Ya': 'yu'
        },
        penjelasan: nama => `Huruf ${nama} dengan tanda Dhammah dibaca "${harakatMap.dhammah.pelafalan[nama]||''}" sesuai standar tajwid.`
      }
    };
    let currentHarakat = 'fathah';
    function renderHurufGrid() {
      const grid = document.getElementById('hurufGrid');
      grid.innerHTML = '';
      const harakat = harakatMap[currentHarakat].harakat;
      const pelafalan = harakatMap[currentHarakat].pelafalan;
      hurufList.forEach((h, i) => {
        const color = `card-colors${(i%6)?'-'+((i%6)+1):''}`;
        const harakatChar = h.Huruf_1 + harakat;
        const bunyi = pelafalan[h.Huruf_2] || '';
        const card = document.createElement('div');
        card.className = `huruf-card ${color}`;
        card.onclick = () => showHurufModal(h, harakatChar, bunyi, harakatMap[currentHarakat].penjelasan(h.Huruf_2));
        card.innerHTML = `<div class='huruf-arab'>${harakatChar}</div><div class='huruf-nama'>${h.Huruf_2}</div><div class='huruf-bunyi'>${bunyi}</div>`;
        grid.appendChild(card);
      });
    }
    function switchHarakat(h) {
      currentHarakat = h;
      document.getElementById('btnFathah').classList.toggle('active', h==='fathah');
      document.getElementById('btnKasrah').classList.toggle('active', h==='kasrah');
      document.getElementById('btnDhammah').classList.toggle('active', h==='dhammah');
      renderHurufGrid();
    }
    function showHurufModal(h, harakatChar, bunyi, penjelasan) {
      document.getElementById('modal-arab').innerText = harakatChar;
      document.getElementById('modal-nama').innerText = h.Huruf_2;
      document.getElementById('modal-bunyi').innerText = bunyi;
      document.getElementById('modal-penjelasan').innerText = penjelasan;
      document.getElementById('hurufModal').style.display = 'flex';
    }
    function closeHurufModal() {
      document.getElementById('hurufModal').style.display = 'none';
    }
    function switchTab(tab) {
      document.getElementById('tabDasarBtn').classList.remove('active');
      document.getElementById('tabLanjutanBtn').classList.remove('active');
      document.getElementById('tabTajwidBtn').classList.remove('active');
      document.getElementById('tabDasarContent').style.display = 'none';
      document.getElementById('tabLanjutanContent').style.display = 'none';
      document.getElementById('tabTajwidContent').style.display = 'none';
      if(tab === 'dasar') {
        document.getElementById('tabDasarBtn').classList.add('active');
        document.getElementById('tabDasarContent').style.display = '';
      } else if(tab === 'lanjutan') {
        document.getElementById('tabLanjutanBtn').classList.add('active');
        document.getElementById('tabLanjutanContent').style.display = '';
      } else if(tab === 'tajwid') {
        document.getElementById('tabTajwidBtn').classList.add('active');
        document.getElementById('tabTajwidContent').style.display = '';
      }
    }
    // Dummy data suku kata dengan audio
    const sukuKataList = [
      { id: 1, arab: 'بَ', latin: 'ba', penjelasan: 'Suku kata ba terdiri dari huruf ba dan harakat fathah.', audio: 'https://cdn.pixabay.com/audio/2022/10/16/audio_12b6fae3b2.mp3' },
      { id: 2, arab: 'تِ', latin: 'ti', penjelasan: 'Suku kata ti terdiri dari huruf ta dan harakat kasrah.', audio: 'https://cdn.pixabay.com/audio/2022/10/16/audio_12b6fae3b2.mp3' },
      { id: 3, arab: 'ثُ', latin: 'tsu', penjelasan: 'Suku kata tsu terdiri dari huruf tsa dan harakat dhammah.', audio: 'https://cdn.pixabay.com/audio/2022/10/16/audio_12b6fae3b2.mp3' },
      { id: 4, arab: 'مَ', latin: 'ma', penjelasan: 'Suku kata ma terdiri dari huruf mim dan harakat fathah.', audio: 'https://cdn.pixabay.com/audio/2022/10/16/audio_12b6fae3b2.mp3' },
      { id: 5, arab: 'نِ', latin: 'ni', penjelasan: 'Suku kata ni terdiri dari huruf nun dan harakat kasrah.', audio: 'https://cdn.pixabay.com/audio/2022/10/16/audio_12b6fae3b2.mp3' },
      { id: 6, arab: 'لُ', latin: 'lu', penjelasan: 'Suku kata lu terdiri dari huruf lam dan harakat dhammah.', audio: 'https://cdn.pixabay.com/audio/2022/10/16/audio_12b6fae3b2.mp3' },
    ];
    function renderSukuKataGrid() {
      const grid = document.querySelector('#lanjutanSukuKata .huruf-grid');
      grid.innerHTML = '';
      sukuKataList.forEach(suku => {
        const card = document.createElement('div');
        card.className = 'suku-kata-card';
        card.onclick = () => showSukuKataModal(suku);
        card.innerHTML = `<div class='suku-arab'>${suku.arab}</div><div class='suku-latin'>${suku.latin}</div>`;
        // Tombol audio
        const audioBtn = document.createElement('button');
        audioBtn.className = 'suku-audio-btn';
        audioBtn.innerHTML = '<span>🔊</span>';
        audioBtn.onclick = (e) => { e.stopPropagation(); playSukuKataAudio(suku); };
        card.appendChild(audioBtn);
        grid.appendChild(card);
      });
    }
    function showSukuKataModal(suku) {
      document.getElementById('modal-arab').innerText = suku.arab;
      document.getElementById('modal-nama').innerText = suku.latin;
      document.getElementById('modal-bunyi').innerText = '';
      document.getElementById('modal-penjelasan').innerText = suku.penjelasan;
      document.getElementById('hurufModal').style.display = 'flex';
    }
    function playSukuKataAudio(suku) {
      if (suku.audio) {
        const audio = new Audio(suku.audio);
        audio.play();
      } else {
        alert('Audio belum tersedia untuk suku kata ini.');
      }
    }
    function showLanjutan(mode) {
      document.getElementById('btnSukuKata').classList.remove('active');
      document.getElementById('btnKata').classList.remove('active');
      document.getElementById('btnMenulis').classList.remove('active');
      document.getElementById('lanjutanSukuKata').style.display = 'none';
      document.getElementById('lanjutanKata').style.display = 'none';
      document.getElementById('lanjutanMenulis').style.display = 'none';
      if(mode === 'suku') {
        document.getElementById('btnSukuKata').classList.add('active');
        document.getElementById('lanjutanSukuKata').style.display = '';
        renderSukuKataGrid();
      } else if(mode === 'kata') {
        document.getElementById('btnKata').classList.add('active');
        document.getElementById('lanjutanKata').style.display = '';
        // Render grid kata
        if (!document.querySelector('#lanjutanKata .huruf-grid')) {
          const grid = document.createElement('div');
          grid.className = 'huruf-grid';
          document.getElementById('lanjutanKata').prepend(grid);
        }
        // Tambah progress bar jika belum ada
        if (!document.getElementById('kataProgressBarBg')) {
          const barBg = document.createElement('div');
          barBg.className = 'kata-progress-bar-bg';
          barBg.id = 'kataProgressBarBg';
          barBg.innerHTML = `<div class='kata-progress-bar-fill' id='kataProgressBarFill' style='width:0%'></div>`;
          document.getElementById('lanjutanKata').prepend(barBg);
        }
        if (!document.getElementById('kataProgressInfo')) {
          const info = document.createElement('div');
          info.className = 'kata-progress-info';
          info.id = 'kataProgressInfo';
          document.getElementById('lanjutanKata').prepend(info);
        }
        renderKataGrid();
      } else if(mode === 'menulis') {
        document.getElementById('btnMenulis').classList.add('active');
        document.getElementById('lanjutanMenulis').style.display = '';
        if (typeof initMenulisPilihan === 'function') initMenulisPilihan();
      }
    }
    // Dummy data kata
    const kataList = [
      { id: 1, arab: 'بَتَ', latin: 'bata', penjelasan: 'Kata "bata" terdiri dari suku kata ba dan ta.', audio: 'https://cdn.pixabay.com/audio/2022/10/16/audio_12b6fae3b2.mp3' },
      { id: 2, arab: 'مَنِ', latin: 'mani', penjelasan: 'Kata "mani" terdiri dari suku kata ma dan ni.', audio: 'https://cdn.pixabay.com/audio/2022/10/16/audio_12b6fae3b2.mp3' },
      { id: 3, arab: 'تُمُ', latin: 'tumu', penjelasan: 'Kata "tumu" terdiri dari suku kata tu dan mu.', audio: 'https://cdn.pixabay.com/audio/2022/10/16/audio_12b6fae3b2.mp3' },
      { id: 4, arab: 'لُبَ', latin: 'luba', penjelasan: 'Kata "luba" terdiri dari suku kata lu dan ba.', audio: 'https://cdn.pixabay.com/audio/2022/10/16/audio_12b6fae3b2.mp3' },
    ];
    // Progress bar state
    let kataProgress = [];
    let kataQuizShown = false;
    function renderKataProgress() {
      const total = kataList.length;
      const done = kataProgress.length;
      let percent = Math.round((done/total)*100);
      if (percent > 100) percent = 100;
      let bar = document.getElementById('kataProgressBarFill');
      if (bar) bar.style.width = percent + '%';
      let info = document.getElementById('kataProgressInfo');
      if (info) info.innerText = `Progress: ${done} / ${total} kata (${percent}%)`;
      // Quiz mini: jika semua kata sudah dipelajari dan quiz belum muncul
      if (done === total && !kataQuizShown) {
        setTimeout(showKataQuiz, 600);
      }
    }
    function renderKataGrid() {
      const grid = document.querySelector('#lanjutanKata .huruf-grid');
      grid.innerHTML = '';
      kataList.forEach(kata => {
        const card = document.createElement('div');
        card.className = 'kata-card';
        card.onclick = () => showKataModal(kata);
        card.innerHTML = `<div class='kata-arab'>${kata.arab}</div><div class='kata-latin'>${kata.latin}</div>`;
        // Tombol audio
        const audioBtn = document.createElement('button');
        audioBtn.className = 'kata-audio-btn';
        audioBtn.innerHTML = '<span>🔊</span>';
        audioBtn.onclick = (e) => { e.stopPropagation(); playKataAudio(kata); };
        card.appendChild(audioBtn);
        grid.appendChild(card);
      });
      renderKataProgress();
    }
    let kataModalIndex = null;
    function showKataModal(kata) {
      document.getElementById('modal-arab').innerText = kata.arab;
      document.getElementById('modal-nama').innerText = kata.latin;
      document.getElementById('modal-bunyi').innerText = '';
      document.getElementById('modal-penjelasan').innerText = kata.penjelasan;
      document.getElementById('hurufModal').style.display = 'flex';
      // Progress: tambahkan jika belum ada
      if (!kataProgress.includes(kata.id)) {
        kataProgress.push(kata.id);
        renderKataProgress();
      }
      // Navigasi modal
      kataModalIndex = kataList.findIndex(k => k.id === kata.id);
      renderKataModalNav();
    }
    function playKataAudio(kata) {
      if (kata.audio) {
        const audio = new Audio(kata.audio);
        audio.play();
      } else {
        alert('Audio belum tersedia untuk kata ini.');
      }
    }
    function renderKataModalNav() {
      const nav = document.getElementById('kataModalNav');
      if (kataModalIndex === null || kataModalIndex === undefined || kataList.length < 2) {
        nav.style.display = 'none';
        nav.innerHTML = '';
        return;
      }
      nav.style.display = '';
      nav.innerHTML = '';
      // Tombol Sebelumnya
      const prevBtn = document.createElement('button');
      prevBtn.className = 'kata-modal-nav-btn';
      prevBtn.innerText = '⟨ Sebelumnya';
      prevBtn.disabled = kataModalIndex === 0;
      prevBtn.onclick = () => {
        if (kataModalIndex > 0) {
          showKataModal(kataList[kataModalIndex-1]);
        }
      };
      nav.appendChild(prevBtn);
      // Info posisi
      const info = document.createElement('span');
      info.style.fontWeight = '600';
      info.style.color = '#5f5be3';
      info.innerText = `Kata ${kataModalIndex+1} / ${kataList.length}`;
      nav.appendChild(info);
      // Tombol Berikutnya
      const nextBtn = document.createElement('button');
      nextBtn.className = 'kata-modal-nav-btn';
      nextBtn.innerText = 'Berikutnya ⟩';
      nextBtn.disabled = kataModalIndex === kataList.length-1;
      nextBtn.onclick = () => {
        if (kataModalIndex < kataList.length-1) {
          showKataModal(kataList[kataModalIndex+1]);
        }
      };
      nav.appendChild(nextBtn);
    }
    // Quiz mini logic
    function showKataQuiz() {
      kataQuizShown = true;
      // Soal: Pilih bacaan yang benar untuk salah satu kata
      const idx = Math.floor(Math.random()*kataList.length);
      const kata = kataList[idx];
      const options = shuffleArray([
        kata.latin,
        ...kataList.filter(k=>k.id!==kata.id).slice(0,2).map(k=>k.latin)
      ]);
      document.getElementById('kataQuizQ').innerHTML = `Mana bacaan latin yang benar untuk <span style='font-size:1.2em;color:#7b6cf6;font-weight:700;'>${kata.arab}</span>?`;
      const optsDiv = document.getElementById('kataQuizOpts');
      optsDiv.innerHTML = '';
      options.forEach(opt => {
        const btn = document.createElement('button');
        btn.className = 'kata-quiz-opt-btn';
        btn.innerText = opt;
        btn.onclick = () => selectKataQuizOpt(btn, opt, kata.latin);
        optsDiv.appendChild(btn);
      });
      document.getElementById('kataQuizFeedback').innerText = '';
      document.getElementById('kataQuizFeedback').className = 'kata-quiz-feedback';
      document.getElementById('kataQuizModalBg').style.display = 'flex';
    }
    function selectKataQuizOpt(btn, opt, answer) {
      const all = document.querySelectorAll('.kata-quiz-opt-btn');
      all.forEach(b=>b.classList.remove('selected'));
      btn.classList.add('selected');
      const feedback = document.getElementById('kataQuizFeedback');
      if (opt === answer) {
        feedback.innerText = 'Benar!';
        feedback.className = 'kata-quiz-feedback benar';
      } else {
        feedback.innerText = 'Salah, coba lagi!';
        feedback.className = 'kata-quiz-feedback salah';
      }
    }
    function closeKataQuiz() {
      document.getElementById('kataQuizModalBg').style.display = 'none';
    }
    // Helper untuk acak array
    function shuffleArray(arr) {
      let a = arr.slice();
      for (let i = a.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [a[i], a[j]] = [a[j], a[i]];
      }
      return a;
    }
    // Render grid suku kata saat tab lanjutan pertama kali dibuka
    document.addEventListener('DOMContentLoaded', function() {
      renderSukuKataGrid();
    });
    // Latihan Menulis: Canvas
    let isMenulisDrawing = false;
    let menulisLastX = 0, menulisLastY = 0;
    const menulisCanvas = document.getElementById('menulisCanvas');
    const menulisCtx = menulisCanvas ? menulisCanvas.getContext('2d') : null;
    function startMenulisDraw(e) {
      isMenulisDrawing = true;
      const pos = getMenulisPos(e);
      menulisLastX = pos.x;
      menulisLastY = pos.y;
    }
    function drawMenulis(e) {
      if (!isMenulisDrawing) return;
      const pos = getMenulisPos(e);
      menulisCtx.lineWidth = 4;
      menulisCtx.lineCap = 'round';
      menulisCtx.strokeStyle = '#232946';
      menulisCtx.beginPath();
      menulisCtx.moveTo(menulisLastX, menulisLastY);
      menulisCtx.lineTo(pos.x, pos.y);
      menulisCtx.stroke();
      menulisLastX = pos.x;
      menulisLastY = pos.y;
    }
    function stopMenulisDraw() { isMenulisDrawing = false; }
    function getMenulisPos(e) {
      const rect = menulisCanvas.getBoundingClientRect();
      if (e.touches && e.touches.length > 0) {
        return { x: e.touches[0].clientX - rect.left, y: e.touches[0].clientY - rect.top };
      } else {
        return { x: e.clientX - rect.left, y: e.clientY - rect.top };
      }
    }
    function clearMenulisCanvas() {
      menulisCtx.clearRect(0, 0, menulisCanvas.width, menulisCanvas.height);
    }
    // Event listeners
    if (menulisCanvas) {
      menulisCanvas.addEventListener('mousedown', startMenulisDraw);
      menulisCanvas.addEventListener('mousemove', drawMenulis);
      menulisCanvas.addEventListener('mouseup', stopMenulisDraw);
      menulisCanvas.addEventListener('mouseleave', stopMenulisDraw);
      menulisCanvas.addEventListener('touchstart', startMenulisDraw);
      menulisCanvas.addEventListener('touchmove', drawMenulis);
      menulisCanvas.addEventListener('touchend', stopMenulisDraw);
    }
    // Data pilihan huruf/kata untuk latihan menulis
    const menulisPilihan = [
      { label: 'Huruf ب', value: 'ب' },
      { label: 'Huruf ت', value: 'ت' },
      { label: 'Huruf م', value: 'م' },
      { label: 'Kata بَتَ', value: 'بَتَ' },
      { label: 'Kata مَنِ', value: 'مَنِ' },
      { label: 'Kata لُبَ', value: 'لُبَ' },
    ];
    // Inisialisasi dropdown dan contoh
    function initMenulisPilihan() {
      const select = document.getElementById('menulisSelect');
      select.innerHTML = '';
      menulisPilihan.forEach(opt => {
        const o = document.createElement('option');
        o.value = opt.value;
        o.innerText = opt.label;
        select.appendChild(o);
      });
      select.onchange = function() {
        document.getElementById('menulisContoh').innerText = select.value;
        clearMenulisCanvas();
        document.getElementById('menulisFeedback').innerText = '';
      };
      // Set default
      document.getElementById('menulisContoh').innerText = select.value;
    }
    // Cek kemiripan sederhana: hitung jumlah pixel terisi
    function cekKemiripanMenulis() {
      const ctx = menulisCtx;
      const imgData = ctx.getImageData(0, 0, menulisCanvas.width, menulisCanvas.height);
      let filled = 0;
      for (let i = 0; i < imgData.data.length; i += 4) {
        if (imgData.data[i+3] > 32) filled++;
      }
      // Simulasi: jika pixel terisi > threshold, dianggap mirip
      const threshold = 1200;
      const feedback = document.getElementById('menulisFeedback');
      if (filled > threshold) {
        feedback.innerText = 'Bagus! Tulisanmu sudah mirip.';
        feedback.style.color = '#16a34a';
      } else {
        feedback.innerText = 'Belum mirip, coba tulis lebih jelas.';
        feedback.style.color = '#e74c3c';
      }
    }
    // Download canvas sebagai PNG
    function downloadMenulisCanvas() {
      const link = document.createElement('a');
      link.download = 'latihan-menulis.png';
      link.href = menulisCanvas.toDataURL('image/png');
      link.click();
    }
    const tajwidData = {
      'idzhar': {
        title: 'Idzhar',
        arab: 'إظهار',
        penjelasan: 'Idzhar artinya "jelas". Hukum ini berlaku jika nun sukun atau tanwin bertemu salah satu huruf halqi (ء, ه, ع, ح, غ, خ). Bacaan nun/tanwin diucapkan jelas tanpa dengung.',
        contoh: 'Contoh: مَنْ آمَنَ (dibaca: man aamana)'
      },
      'idgham': {
        title: 'Idgham',
        arab: 'إدغام',
        penjelasan: 'Idgham artinya "meleburkan". Terjadi jika nun sukun/tanwin bertemu huruf ي, ر, م, ل, و, ن. Nun/tanwin dilebur ke huruf berikutnya, sebagian dengan dengung.',
        contoh: 'Contoh: مَنْ يَعْمَلْ (dibaca: may-ya\'mal)'
      },
      'iqlab': {
        title: 'Iqlab',
        arab: 'إقلاب',
        penjelasan: 'Iqlab artinya "mengganti". Terjadi jika nun sukun/tanwin bertemu huruf ب. Nun/tanwin diganti menjadi bunyi "m" disertai dengung.',
        contoh: 'Contoh: أَنْبِتُوا (dibaca: am-bituu)'
      },
      'ikhfa': {
        title: 'Ikhfa',
        arab: 'إخفاء',
        penjelasan: 'Ikhfa artinya "samar". Terjadi jika nun sukun/tanwin bertemu salah satu dari 15 huruf ikhfa. Bacaan nun/tanwin dibaca samar di antara jelas dan dengung.',
        contoh: 'Contoh: أَنْزَلْنَا (dibaca: an-zalnaa)'
      }
    };
    function showTajwidModal(key) {
      const t = tajwidData[key];
      document.getElementById('tajwid-title').innerText = t.title;
      document.getElementById('tajwid-arab').innerText = t.arab;
      document.getElementById('tajwid-penjelasan').innerText = t.penjelasan;
      document.getElementById('tajwid-contoh').innerText = t.contoh;
      document.getElementById('tajwidModal').style.display = 'flex';
    }
    function closeTajwidModal() {
      document.getElementById('tajwidModal').style.display = 'none';
        }
    </script>
</body>
</html> 