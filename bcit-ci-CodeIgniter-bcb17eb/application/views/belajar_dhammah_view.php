<!DOCTYPE html>
<html>
<head>
    <title>Huruf Hijaiyah Dhammah</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { background: #f4f6fb; font-family: 'Segoe UI', Arial, sans-serif; margin: 0; padding: 0; }
        .navbar { background: linear-gradient(90deg, #5f5be3 0%, #7b6cf6 100%); color: #fff; display: flex; align-items: center; justify-content: space-between; padding: 18px 32px; box-shadow: 0 2px 8px rgba(0,0,0,0.03); }
        .navbar .logo { font-size: 1.35em; font-weight: bold; display: flex; align-items: center; gap: 12px; }
        .navbar .logo-icon { background: #fff; color: #5f5be3; border-radius: 8px; width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; font-size: 1.2em; font-weight: bold; }
        .container { max-width: 1200px; margin: 32px auto; padding: 0 18px; }
        .huruf-header { font-size: 2.1em; font-weight: 800; color: #5f5be3; margin-bottom: 8px; text-align: center; letter-spacing: 0.5px; }
        .huruf-subtitle { color: #7b809a; font-size: 1.15em; margin-bottom: 32px; text-align: center; }
        .huruf-tab-bar { display: flex; justify-content: center; gap: 10px; margin-bottom: 18px; margin-top: 10px; }
        .huruf-tab-btn { background: #fff; color: #7b6cf6; border: 2px solid #7b6cf6; border-radius: 8px 8px 0 0; padding: 10px 28px; font-size: 1.08em; font-weight: 700; cursor: pointer; transition: background 0.2s, color 0.2s, border 0.2s; outline: none; }
        .huruf-tab-btn.active, .huruf-tab-btn:focus { background: linear-gradient(90deg, #7b6cf6 0%, #5f5be3 100%); color: #fff; border-bottom: 2px solid #fff; z-index: 2; }
        .huruf-menu-bar { display: flex; flex-wrap: wrap; gap: 12px; justify-content: center; margin-bottom: 28px; margin-top: 10px; }
        .huruf-menu-btn { background: linear-gradient(90deg, #7b6cf6 0%, #5f5be3 100%); color: #fff; border: none; border-radius: 8px; padding: 9px 18px; font-size: 1em; font-weight: 600; cursor: pointer; box-shadow: 0 2px 8px rgba(91,33,182,0.08); transition: background 0.2s, transform 0.2s; }
        .huruf-menu-btn:hover, .huruf-menu-btn.active { background: linear-gradient(90deg, #5f5be3 0%, #7b6cf6 100%); transform: translateY(-2px) scale(1.04); }
        .huruf-grid { display: grid; grid-template-columns: repeat(7, 1fr); gap: 22px; justify-items: center; margin-bottom: 32px; }
        .huruf-card { width: 120px; height: 120px; border-radius: 22px; display: flex; flex-direction: column; align-items: center; justify-content: center; cursor: pointer; box-shadow: 0 2px 12px rgba(0,0,0,0.07); transition: transform 0.3s, box-shadow 0.3s; position: relative; }
        .huruf-card:hover { transform: translateY(-6px) scale(1.04); box-shadow: 0 8px 32px rgba(91, 33, 182, 0.18); z-index: 2; }
        .huruf-arab { font-size: 2.7em; color: #fff; font-weight: 700; margin-bottom: 8px; }
        .huruf-nama { font-size: 1.15em; color: #fff; font-weight: 600; margin-bottom: 2px; letter-spacing: 0.5px; }
        .huruf-bunyi { font-size: 0.98em; color: rgba(255,255,255,0.82); font-weight: 400; }
        .card-colors { background: linear-gradient(135deg, #fbbf24 0%, #f59e42 100%); }
        .card-colors-2 { background: linear-gradient(135deg, #3b82f6 0%, #6366f1 100%); }
        .card-colors-3 { background: linear-gradient(135deg, #f472b6 0%, #fda4af 100%); }
        .card-colors-4 { background: linear-gradient(135deg, #60a5fa 0%, #a78bfa 100%); }
        .card-colors-5 { background: linear-gradient(135deg, #34d399 0%, #059669 100%); }
        .card-colors-6 { background: linear-gradient(135deg, #a5b4fc 0%, #7c3aed 100%); }
        @media (max-width: 1100px) { .huruf-grid { grid-template-columns: repeat(5, 1fr); } .huruf-card { width: 110px; height: 110px; } }
        @media (max-width: 800px) { .huruf-grid { grid-template-columns: repeat(4, 1fr); } .huruf-card { width: 100px; height: 100px; } }
        @media (max-width: 600px) { .huruf-grid { grid-template-columns: repeat(2, 1fr); gap: 14px; } .huruf-card { width: 90px; height: 90px; } .huruf-tab-btn { font-size: 0.97em; padding: 8px 10px; } .huruf-menu-bar { gap: 7px; } .huruf-menu-btn { font-size: 0.97em; padding: 8px 10px; } }
        .huruf-modal { position: fixed; z-index: 99; left: 0; top: 0; width: 100vw; height: 100vh; background: rgba(44,44,84,0.25); display: flex; align-items: center; justify-content: center; backdrop-filter: blur(2px); }
        .huruf-modal-content { background: #fff; border-radius: 18px; padding: 2.2em 2em 1.5em 2em; min-width: 320px; max-width: 90vw; box-shadow: 0 8px 32px rgba(44,44,84,0.18); position: relative; text-align: center; animation: fadeInModal 0.3s; }
        @keyframes fadeInModal { from { opacity:0; transform:scale(0.95);} to {opacity:1; transform:scale(1);} }
        .huruf-modal-close { position: absolute; right: 18px; top: 12px; font-size: 2em; color: #7b6cf6; cursor: pointer; font-weight: bold; }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo"><span class="logo-icon">ح</span> Belajar Hijaiyah</div>
    </div>
    <div class="container">
        <div class="huruf-header">Huruf Hijaiyah dengan Dhammah</div>
        <div class="huruf-subtitle">Klik setiap huruf untuk melihat penjelasan dan mendengar suaranya!</div>
        <div class="huruf-tab-bar">
            <a class="huruf-tab-btn" href="<?php echo site_url('dashboard/belajar'); ?>">Dasar</a>
            <a class="huruf-tab-btn" href="<?php echo site_url('dashboard/belajar#lanjutan'); ?>">Lanjutan</a>
            <a class="huruf-tab-btn" href="<?php echo site_url('dashboard/belajar#tajwid'); ?>">Tajwid</a>
        </div>
        <div class="huruf-menu-bar">
            <a class="huruf-menu-btn" href="<?php echo site_url('dashboard/fathah'); ?>">Fathah</a>
            <a class="huruf-menu-btn" href="<?php echo site_url('dashboard/kasrah'); ?>">Kasrah</a>
            <a class="huruf-menu-btn active" href="<?php echo site_url('dashboard/dhammah'); ?>">Dhammah</a>
            <button class="huruf-menu-btn">Tanwin Fathah</button>
            <button class="huruf-menu-btn">Tanwin Kasrah</button>
            <button class="huruf-menu-btn">Tanwin Dhammah</button>
            <button class="huruf-menu-btn">Tajwid</button>
        </div>
        <div class="huruf-grid">
            <?php
            $colors = ['card-colors','card-colors-2','card-colors-3','card-colors-4','card-colors-5','card-colors-6'];
            foreach($huruf as $i=>$h) {
                $color = $colors[$i%6];
                echo "<div class='huruf-card $color' onclick=\"showDhammahModal({$i})\">\n
                        <div class='huruf-arab'>{$h['Huruf_Harakat']}</div>\n
                        <div class='huruf-nama'>{$h['Huruf_2']}</div>\n
                        <div class='huruf-bunyi'>{$h['Bunyi_Harakat']}</div>\n
                    </div>";
            }
            ?>
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
    </div>
    <script>
    const hurufList = <?php echo json_encode($huruf); ?>;
    function showDhammahModal(idx) {
      const h = hurufList[idx];
      document.getElementById('modal-arab').innerText = h.Huruf_Harakat;
      document.getElementById('modal-nama').innerText = h.Huruf_2;
      document.getElementById('modal-bunyi').innerText = h.Bunyi_Harakat;
      document.getElementById('modal-penjelasan').innerText = h.Penjelasan_Harakat;
      document.getElementById('hurufModal').style.display = 'flex';
    }
    function closeHurufModal() {
      document.getElementById('hurufModal').style.display = 'none';
    }
    </script>
</body>
</html> 