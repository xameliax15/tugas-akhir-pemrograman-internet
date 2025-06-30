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
    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo"><span class="logo-icon">📚</span> Belajar Hijaiyah</div>
        <div class="nav-btns">
            <button class="nav-btn"><span>🏠</span> Beranda</button>
            <button class="nav-btn active"><span>📚</span> Belajar</button>
            <button class="nav-btn"><span>📝</span> Kuis</button>
            <button class="nav-btn profile-btn" title="Profile">😊</button>
        </div>
    </div>
    <div class="container">
        <div class="huruf-header">Huruf Hijaiyah 📚</div>
        <div class="huruf-subtitle">Klik setiap huruf untuk mendengar suaranya!</div>
        <div class="huruf-grid">
            <!-- 28 huruf hijaiyah -->
            <?php
            $huruf = [
                ['ا','Alif','a'],['ب','Ba','ba'],['ت','Ta','ta'],['ث','Tsa','tsa'],['ج','Jim','ja'],['ح','Ha','ha'],['خ','Kha','kha'],
                ['د','Dal','da'],['ذ','Dzal','dza'],['ر','Ra','ra'],['ز','Zai','za'],['س','Sin','sa'],['ش','Syin','sya'],['ص','Shad','sha'],
                ['ض','Dhad','dha'],['ط','Tha','tha'],['ظ','Zha','zha'],['ع','Ain','a'],['غ','Ghain','gha'],['ف','Fa','fa'],['ق','Qaf','qa'],
                ['ك','Kaf','ka'],['ل','Lam','la'],['م','Mim','ma'],['ن','Nun','na'],['و','Wau','wa'],['ه','Ha','ha'],['ي','Ya','ya']
            ];
            $colors = ['card-colors','card-colors-2','card-colors-3','card-colors-4','card-colors-5','card-colors-6'];
            foreach($huruf as $i=>$h) {
                $color = $colors[$i%6];
                echo "<div class='huruf-card $color' onclick=\"playAudio('$h[1]')\">
                        <div class='huruf-arab'>$h[0]</div>
                        <div class='huruf-nama'>$h[1]</div>
                        <div class='huruf-bunyi'>$h[2]</div>
                    </div>";
            }
            ?>
        </div>
    </div>
    <script>
        function playAudio(nama) {
            // Simulasi audio: log ke console
            console.log('Memutar suara: ' + nama);
            // TODO: Integrasi audio asli jika ada file suara
        }
    </script>
</body>
</html> 