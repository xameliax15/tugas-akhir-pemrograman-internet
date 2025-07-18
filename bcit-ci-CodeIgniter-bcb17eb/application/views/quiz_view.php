<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } $theme = isset($_SESSION['theme']) ? $_SESSION['theme'] : 'light'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Kuis Hijaiyah</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { background: linear-gradient(135deg, #f4f6fb 0%, #e0e7ff 100%); font-family: 'Segoe UI', Arial, sans-serif; margin: 0; padding: 0; }
        .navbar { background: linear-gradient(90deg, #5f5be3 0%, #7b6cf6 100%); color: #fff; display: flex; align-items: center; justify-content: space-between; padding: 18px 32px; box-shadow: 0 2px 8px rgba(0,0,0,0.03); border-radius: 0 0 18px 18px; }
        .navbar .logo { font-size: 1.35em; font-weight: bold; display: flex; align-items: center; gap: 12px; }
        .navbar .logo-icon { background: #fff; color: #5f5be3; border-radius: 8px; width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; font-size: 1.2em; font-weight: bold; }
        .navbar .nav-btns { display: flex; gap: 12px; }
        .navbar .nav-btn { background: #fff; color: #7b6cf6; border: none; border-radius: 8px; padding: 8px 18px; font-size: 1em; font-weight: 500; cursor: pointer; transition: background 0.2s, color 0.2s; display: flex; align-items: center; gap: 6px; }
        .navbar .nav-btn.active, .navbar .nav-btn:hover { background: #f3e8ff; color: #5f5be3; }
        .navbar .profile-btn { background: #fff; color: #7b6cf6; border-radius: 50%; width: 38px; height: 38px; display: flex; align-items: center; justify-content: center; font-size: 1.1em; font-weight: bold; margin-left: 8px; }
        .logout-btn { background:#e74c3c;color:#fff;padding:8px 18px;border-radius:4px;text-decoration:none;font-weight:500;margin-left:12px;transition:background 0.2s; }
        .logout-btn:hover { background: #c0392b; }
        .container { max-width: 672px; margin: 38px auto 0 auto; padding: 0 18px; }
        .quiz-title { font-size: 2.2em; font-weight: 900; color: #5f5be3; text-align: center; margin-bottom: 32px; letter-spacing: 0.5px; text-shadow: 0 2px 12px #7b6cf610; }
        .quiz-card { background: linear-gradient(135deg, #fbbf24 0%, #f472b6 100%); border-radius: 32px; box-shadow: 0 8px 32px rgba(91, 33, 182, 0.13); padding: 48px 38px 38px 38px; max-width: 672px; margin: 0 auto; display: flex; flex-direction: column; align-items: center; animation: fadeInQuizCard 0.5s; }
        @keyframes fadeInQuizCard { from { opacity:0; transform:scale(0.96);} to {opacity:1; transform:scale(1);} }
        .quiz-header { width: 100%; display: flex; justify-content: space-between; align-items: center; color: #fff; font-size: 1.13em; font-weight: 600; margin-bottom: 22px; }
        .quiz-progress-bg { width: 100%; height: 12px; background: rgba(255,255,255,0.25); border-radius: 8px; margin-bottom: 22px; }
        .quiz-progress-fill { height: 12px; background: linear-gradient(90deg, #7b6cf6 0%, #3b82f6 100%); border-radius: 8px; transition: width 0.4s cubic-bezier(.4,2.3,.3,1); }
        .quiz-huruf-circle { width: 110px; height: 110px; background: rgba(255,255,255,0.22); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 18px auto; box-shadow: 0 2px 12px #7b6cf610; }
        .quiz-huruf { font-size: 4.2em; color: #fff; font-weight: 900; text-shadow: 0 2px 12px #7b6cf610; }
        .quiz-question { color: #fff; font-size: 1.35em; font-weight: 700; text-align: center; margin-bottom: 32px; text-shadow: 0 2px 12px #7b6cf610; }
        .quiz-options { display: grid; grid-template-columns: 1fr 1fr; gap: 22px; width: 100%; margin-bottom: 8px; }
        .quiz-option { background: #fff; color: #be185d; font-size: 1.22em; font-weight: bold; border: none; border-radius: 18px; padding: 22px 0; box-shadow: 0 2px 12px rgba(0,0,0,0.07); cursor: pointer; transition: background 0.2s, color 0.2s, transform 0.18s; outline: none; border: 2.5px solid #fbbf24; }
        .quiz-option:hover:not([disabled]) { background: #f3e8ff; color: #5f5be3; transform: translateY(-3px) scale(1.03); border-color: #7b6cf6; }
        .quiz-option.correct { background: #22c55e !important; color: #fff !important; border-color: #22c55e !important; }
        .quiz-option.wrong { background: #ef4444 !important; color: #fff !important; border-color: #ef4444 !important; }
        .quiz-option[disabled] { opacity: 0.7; cursor: not-allowed; }
        .quiz-result { display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 48px 0; }
        .quiz-result .emoji { font-size: 4.5em; margin-bottom: 18px; }
        .quiz-result .result-title { color: #fff; font-size: 2em; font-weight: 800; margin-bottom: 10px; text-shadow: 0 2px 12px #7b6cf610; }
        .quiz-result .result-score { color: #fff; font-size: 1.25em; font-weight: 500; margin-bottom: 24px; text-shadow: 0 2px 12px #7b6cf610; }
        .quiz-result .restart-btn { background: #fff; color: #be185d; font-weight: 700; border: none; border-radius: 14px; padding: 18px 48px; font-size: 1.15em; cursor: pointer; transition: background 0.2s, color 0.2s; box-shadow: 0 2px 12px #7b6cf610; }
        .quiz-result .restart-btn:hover { background: #f3e8ff; color: #5f5be3; }
        /* Pilihan mode */
        .quiz-card .mode-btn {
          background: #fff;
          color: #5f5be3;
          font-size: 1.22em;
          font-weight: 800;
          padding: 22px 0;
          border-radius: 18px;
          width: 100%;
          margin-bottom: 18px;
          box-shadow: 0 2px 12px #7b6cf610;
          cursor: pointer;
          border: 2.5px solid #7b6cf6;
          transition: background 0.2s, color 0.2s, border 0.2s;
        }
        .quiz-card .mode-btn:last-child { color: #be185d; border-color: #fbbf24; }
        .quiz-card .mode-btn:hover { background: #f3e8ff; color: #5f5be3; border-color: #fbbf24; }
        .quiz-card .mode-btn:last-child:hover { color: #fff; background: #be185d; border-color: #be185d; }
        @media (max-width: 700px) { .container, .quiz-card { max-width: 98vw; padding: 0 2vw; } .quiz-card { padding: 24px 4vw 18px 4vw; } }
        @media (max-width: 500px) { .quiz-card { padding: 12px 2vw 8px 2vw; } .quiz-title { font-size: 1.3em; } }
        <?php if($theme==='dark'): ?>
        body { background: #181a20 !important; color: #e5e7eb; }
        .navbar { background: linear-gradient(90deg, #232946 0%, #3b3f5c 100%) !important; color: #fff; }
        .navbar .logo-icon { background: #232946; color: #ffe066; }
        .navbar .nav-btn, .navbar .profile-btn { background: #232946; color: #ffe066; }
        .navbar .nav-btn.active, .navbar .nav-btn:hover { background: #232946; color: #a7f3d0; }
        .container { background: #181a20; color: #e5e7eb; }
        .quiz-title { color: #ffe066; text-shadow: 0 2px 12px #23294630; }
        .quiz-card { background: #232946 !important; color: #ffe066 !important; box-shadow: 0 8px 32px #23294633; }
        .quiz-header, .quiz-question, .quiz-result .result-title, .quiz-result .result-score { color: #ffe066 !important; text-shadow: 0 2px 12px #23294630; }
        .quiz-huruf-circle { background: #181a20 !important; }
        .quiz-huruf { color: #ffe066 !important; text-shadow: 0 2px 12px #23294630; }
        .quiz-option { background: #232946 !important; color: #ffe066 !important; border-color: #ffe066 !important; }
        .quiz-option:hover:not([disabled]) { background: #ffe066 !important; color: #232946 !important; border-color: #ffe066 !important; }
        .quiz-option.correct { background: #22c55e !important; color: #fff !important; border-color: #22c55e !important; }
        .quiz-option.wrong { background: #ef4444 !important; color: #fff !important; border-color: #ef4444 !important; }
        .quiz-result .restart-btn { background: #ffe066 !important; color: #232946 !important; }
        .quiz-result .restart-btn:hover { background: #232946 !important; color: #ffe066 !important; }
        .quiz-card .mode-btn { background: #232946 !important; color: #ffe066 !important; border-color: #ffe066 !important; }
        .quiz-card .mode-btn:hover { background: #ffe066 !important; color: #232946 !important; border-color: #ffe066 !important; }
        <?php endif; ?>
    </style>
</head>
<body<?php if($theme==='dark') echo ' style="background:#181a20;color:#e5e7eb;"'; ?>>
    <div class="navbar">
        <div class="logo"><span class="logo-icon">ح</span> Belajar Hijaiyah</div>
        <div class="nav-btns">
            <button class="nav-btn" onclick="window.location.href='<?php echo site_url('dashboard/user'); ?>'"><span>🏠</span> Beranda</button>
            <button class="nav-btn" onclick="window.location.href='<?php echo site_url('dashboard/belajar'); ?>'"><span>📚</span> Belajar</button>
            <button class="nav-btn active"><span>🎯</span> Kuis</button>
            <button class="nav-btn profile-btn" title="Profile">😊</button>
            <a href="<?php echo site_url('auth/logout'); ?>" class="logout-btn">Logout</a>
        </div>
    </div>
    <div class="container">
        <div class="quiz-title">Kuis Hijaiyah 🎯</div>
        <div id="quiz-area">
            <!-- Quiz card akan di-generate oleh JS -->
        </div>
    </div>
    <script>
    // Data huruf hijaiyah
    const huruf = [
        {arab:'ا', nama:'Alif'}, {arab:'ب', nama:'Ba'}, {arab:'ت', nama:'Ta'}, {arab:'ث', nama:'Tsa'},
        {arab:'ج', nama:'Jim'}, {arab:'ح', nama:'Ha'}, {arab:'خ', nama:'Kha'}, {arab:'د', nama:'Dal'},
        {arab:'ذ', nama:'Dzal'}, {arab:'ر', nama:'Ra'}, {arab:'ز', nama:'Zai'}, {arab:'س', nama:'Sin'},
        {arab:'ش', nama:'Syin'}, {arab:'ص', nama:'Shad'}, {arab:'ض', nama:'Dhad'}, {arab:'ط', nama:'Tha'},
        {arab:'ظ', nama:'Zha'}, {arab:'ع', nama:'Ain'}, {arab:'غ', nama:'Ghain'}, {arab:'ف', nama:'Fa'},
        {arab:'ق', nama:'Qaf'}, {arab:'ك', nama:'Kaf'}, {arab:'ل', nama:'Lam'}, {arab:'م', nama:'Mim'},
        {arab:'ن', nama:'Nun'}, {arab:'و', nama:'Wau'}, {arab:'ه', nama:'Ha'}, {arab:'ي', nama:'Ya'}
    ];
    // ===== DATA HIJAIYAH DASAR DAN LANJUTAN (SAMA DENGAN BELAJAR) =====
    const hijaiyahStandar = [
      {Huruf_1:'ا', Huruf_2:'Alif', H_sound:'a', fathah:'اَ', kasrah:'اِ', dhammah:'اُ', fathatain:'اً', kasratain:'اٍ', dhammatain:'اٌ'},
      {Huruf_1:'ب', Huruf_2:'Ba', H_sound:'ba', fathah:'بَ', kasrah:'بِ', dhammah:'بُ', fathatain:'بً', kasratain:'بٍ', dhammatain:'بٌ'},
      {Huruf_1:'ت', Huruf_2:'Ta', H_sound:'ta', fathah:'تَ', kasrah:'تِ', dhammah:'تُ', fathatain:'تً', kasratain:'تٍ', dhammatain:'تٌ'},
      {Huruf_1:'ث', Huruf_2:'Tsa', H_sound:'tsa', fathah:'ثَ', kasrah:'ثِ', dhammah:'ثُ', fathatain:'ثً', kasratain:'ثٍ', dhammatain:'ثٌ'},
      {Huruf_1:'ج', Huruf_2:'Jim', H_sound:'ja', fathah:'جَ', kasrah:'جِ', dhammah:'جُ', fathatain:'جً', kasratain:'جٍ', dhammatain:'جٌ'},
      {Huruf_1:'ح', Huruf_2:'Ha', H_sound:'ha', fathah:'حَ', kasrah:'حِ', dhammah:'حُ', fathatain:'حً', kasratain:'حٍ', dhammatain:'حٌ'},
      {Huruf_1:'خ', Huruf_2:'Kha', H_sound:'kha', fathah:'خَ', kasrah:'خِ', dhammah:'خُ', fathatain:'خً', kasratain:'خٍ', dhammatain:'خٌ'},
      {Huruf_1:'د', Huruf_2:'Dal', H_sound:'da', fathah:'دَ', kasrah:'دِ', dhammah:'دُ', fathatain:'دً', kasratain:'دٍ', dhammatain:'دٌ'},
      {Huruf_1:'ذ', Huruf_2:'Dzal', H_sound:'dza', fathah:'ذَ', kasrah:'ذِ', dhammah:'ذُ', fathatain:'ذً', kasratain:'ذٍ', dhammatain:'ذٌ'},
      {Huruf_1:'ر', Huruf_2:'Ra', H_sound:'ra', fathah:'رَ', kasrah:'رِ', dhammah:'رُ', fathatain:'رً', kasratain:'رٍ', dhammatain:'رٌ'},
      {Huruf_1:'ز', Huruf_2:'Zai', H_sound:'za', fathah:'زَ', kasrah:'زِ', dhammah:'زُ', fathatain:'زً', kasratain:'زٍ', dhammatain:'زٌ'},
      {Huruf_1:'س', Huruf_2:'Sin', H_sound:'sa', fathah:'سَ', kasrah:'سِ', dhammah:'سُ', fathatain:'سً', kasratain:'سٍ', dhammatain:'سٌ'},
      {Huruf_1:'ش', Huruf_2:'Syin', H_sound:'sya', fathah:'شَ', kasrah:'شِ', dhammah:'شُ', fathatain:'شً', kasratain:'شٍ', dhammatain:'شٌ'},
      {Huruf_1:'ص', Huruf_2:'Shad', H_sound:'sha', fathah:'صَ', kasrah:'صِ', dhammah:'صُ', fathatain:'صً', kasratain:'صٍ', dhammatain:'صٌ'},
      {Huruf_1:'ض', Huruf_2:'Dhad', H_sound:'dha', fathah:'ضَ', kasrah:'ضِ', dhammah:'ضُ', fathatain:'ضً', kasratain:'ضٍ', dhammatain:'ضٌ'},
      {Huruf_1:'ط', Huruf_2:'Tha', H_sound:'tha', fathah:'طَ', kasrah:'طِ', dhammah:'طُ', fathatain:'طً', kasratain:'طٍ', dhammatain:'طٌ'},
      {Huruf_1:'ظ', Huruf_2:'Zha', H_sound:'zha', fathah:'ظَ', kasrah:'ظِ', dhammah:'ظُ', fathatain:'ظً', kasratain:'ظٍ', dhammatain:'ظٌ'},
      {Huruf_1:'ع', Huruf_2:'Ain', H_sound:'a', fathah:'عَ', kasrah:'عِ', dhammah:'عُ', fathatain:'عً', kasratain:'عٍ', dhammatain:'عٌ'},
      {Huruf_1:'غ', Huruf_2:'Ghain', H_sound:'gha', fathah:'غَ', kasrah:'غِ', dhammah:'غُ', fathatain:'غً', kasratain:'غٍ', dhammatain:'غٌ'},
      {Huruf_1:'ف', Huruf_2:'Fa', H_sound:'fa', fathah:'فَ', kasrah:'فِ', dhammah:'فُ', fathatain:'فً', kasratain:'فٍ', dhammatain:'فٌ'},
      {Huruf_1:'ق', Huruf_2:'Qaf', H_sound:'qa', fathah:'قَ', kasrah:'قِ', dhammah:'قُ', fathatain:'قً', kasratain:'قٍ', dhammatain:'قٌ'},
      {Huruf_1:'ك', Huruf_2:'Kaf', H_sound:'ka', fathah:'كَ', kasrah:'كِ', dhammah:'كُ', fathatain:'كً', kasratain:'كٍ', dhammatain:'كٌ'},
      {Huruf_1:'ل', Huruf_2:'Lam', H_sound:'la', fathah:'لَ', kasrah:'لِ', dhammah:'لُ', fathatain:'لً', kasratain:'لٍ', dhammatain:'لٌ'},
      {Huruf_1:'م', Huruf_2:'Mim', H_sound:'ma', fathah:'مَ', kasrah:'مِ', dhammah:'مُ', fathatain:'مً', kasratain:'مٍ', dhammatain:'مٌ'},
      {Huruf_1:'ن', Huruf_2:'Nun', H_sound:'na', fathah:'نَ', kasrah:'نِ', dhammah:'نُ', fathatain:'نً', kasratain:'نٍ', dhammatain:'نٌ'},
      {Huruf_1:'و', Huruf_2:'Wau', H_sound:'wa', fathah:'وَ', kasrah:'وِ', dhammah:'وُ', fathatain:'وً', kasratain:'وٍ', dhammatain:'وٌ'},
      {Huruf_1:'ه', Huruf_2:'Ha', H_sound:'ha', fathah:'هَ', kasrah:'هِ', dhammah:'هُ', fathatain:'هً', kasratain:'هٍ', dhammatain:'هٌ'},
      {Huruf_1:'ي', Huruf_2:'Ya', H_sound:'ya', fathah:'يَ', kasrah:'يِ', dhammah:'يُ', fathatain:'يً', kasratain:'يٍ', dhammatain:'يٌ'}
    ];
    const gridMadPanjang = [
      {arab: 'با', latin: 'baa', penjelasan: 'Mad Thabi\'i: ba + alif dibaca panjang "baa" (2 harakat).'},
      {arab: 'بي', latin: 'bii', penjelasan: 'Mad Thabi\'i: ba + ya dibaca panjang "bii" (2 harakat).'},
      {arab: 'بو', latin: 'buu', penjelasan: 'Mad Thabi\'i: ba + wau dibaca panjang "buu" (2 harakat).'},
      {arab: 'تا', latin: 'taa', penjelasan: 'Mad Thabi\'i: ta + alif dibaca panjang "taa" (2 harakat).'},
      {arab: 'تي', latin: 'tii', penjelasan: 'Mad Thabi\'i: ta + ya dibaca panjang "tii" (2 harakat).'},
      {arab: 'تو', latin: 'tuu', penjelasan: 'Mad Thabi\'i: ta + wau dibaca panjang "tuu" (2 harakat).'},
      {arab: 'ثا', latin: 'tsaa', penjelasan: 'Mad Thabi\'i: tsa + alif dibaca panjang "tsaa" (2 harakat).'},
      {arab: 'ثي', latin: 'tsii', penjelasan: 'Mad Thabi\'i: tsa + ya dibaca panjang "tsii" (2 harakat).'},
      {arab: 'ثو', latin: 'tsuu', penjelasan: 'Mad Thabi\'i: tsa + wau dibaca panjang "tsuu" (2 harakat).'},
      {arab: 'جا', latin: 'jaa', penjelasan: 'Mad Thabi\'i: jim + alif dibaca panjang "jaa" (2 harakat).'},
      {arab: 'جي', latin: 'jii', penjelasan: 'Mad Thabi\'i: jim + ya dibaca panjang "jii" (2 harakat).'},
      {arab: 'جو', latin: 'juu', penjelasan: 'Mad Thabi\'i: jim + wau dibaca panjang "juu" (2 harakat).'},
      {arab: 'حا', latin: 'haa', penjelasan: 'Mad Thabi\'i: ha + alif dibaca panjang "haa" (2 harakat).'},
      {arab: 'حي', latin: 'hii', penjelasan: 'Mad Thabi\'i: ha + ya dibaca panjang "hii" (2 harakat).'},
      {arab: 'حو', latin: 'huu', penjelasan: 'Mad Thabi\'i: ha + wau dibaca panjang "huu" (2 harakat).'},
      {arab: 'خا', latin: 'khaa', penjelasan: 'Mad Thabi\'i: kha + alif dibaca panjang "khaa" (2 harakat).'},
      {arab: 'خي', latin: 'khii', penjelasan: 'Mad Thabi\'i: kha + ya dibaca panjang "khii" (2 harakat).'},
      {arab: 'خو', latin: 'khuu', penjelasan: 'Mad Thabi\'i: kha + wau dibaca panjang "khuu" (2 harakat).'},
      {arab: 'دا', latin: 'daa', penjelasan: 'Mad Thabi\'i: dal + alif dibaca panjang "daa" (2 harakat).'},
      {arab: 'دي', latin: 'dii', penjelasan: 'Mad Thabi\'i: dal + ya dibaca panjang "dii" (2 harakat).'},
      {arab: 'دو', latin: 'duu', penjelasan: 'Mad Thabi\'i: dal + wau dibaca panjang "duu" (2 harakat).'},
      {arab: 'ذا', latin: 'dzaa', penjelasan: 'Mad Thabi\'i: dzal + alif dibaca panjang "dzaa" (2 harakat).'},
      {arab: 'ذي', latin: 'dzaii', penjelasan: 'Mad Thabi\'i: dzal + ya dibaca panjang "dzaii" (2 harakat).'},
      {arab: 'ذو', latin: 'dzuu', penjelasan: 'Mad Thabi\'i: dzal + wau dibaca panjang "dzuu" (2 harakat).'},
      {arab: 'را', latin: 'raa', penjelasan: 'Mad Thabi\'i: ra + alif dibaca panjang "raa" (2 harakat).'},
      {arab: 'ري', latin: 'rii', penjelasan: 'Mad Thabi\'i: ra + ya dibaca panjang "rii" (2 harakat).'},
      {arab: 'رو', latin: 'ruu', penjelasan: 'Mad Thabi\'i: ra + wau dibaca panjang "ruu" (2 harakat).'},
      {arab: 'زا', latin: 'zaa', penjelasan: 'Mad Thabi\'i: zai + alif dibaca panjang "zaa" (2 harakat).'},
      {arab: 'زي', latin: 'zii', penjelasan: 'Mad Thabi\'i: zai + ya dibaca panjang "zii" (2 harakat).'},
      {arab: 'زو', latin: 'zuu', penjelasan: 'Mad Thabi\'i: zai + wau dibaca panjang "zuu" (2 harakat).'}
    ];
    const gridTasydidSukun = [
      {arab: 'مُدَّ', latin: 'muddad', penjelasan: 'Tasydid: mad + dhad (2 harakat).'},
      {arab: 'سُكُن', latin: 'sukun', penjelasan: 'Sukun: sin + kaf (2 harakat).'},
      {arab: 'غُنَّ', latin: 'ghunnah', penjelasan: 'Ghunnah: nun + ha (2 harakat).'},
      {arab: 'فَعْلَ', latin: 'fa\'ala', penjelasan: 'Fa\'ala: fa + alif (2 harakat).'},
      {arab: 'قَفْلَ', latin: 'qaflal', penjelasan: 'Qaflal: qaf + lam (2 harakat).'},
      {arab: 'كَفْلَ', latin: 'kaflal', penjelasan: 'Kaflal: kaf + lam (2 harakat).'},
      {arab: 'لَفْعَلَ', latin: 'laf\'ala', penjelasan: 'Laf\'ala: lam + fa\'ala (2 harakat).'},
      {arab: 'مَفْعَلَ', latin: 'maf\'ala', penjelasan: 'Maf\'ala: mim + fa\'ala (2 harakat).'},
      {arab: 'نَفْعَلَ', latin: 'naf\'ala', penjelasan: 'Naf\'ala: nun + fa\'ala (2 harakat).'},
      {arab: 'وَفْعَلَ', latin: 'waf\'ala', penjelasan: 'Waf\'ala: wau + fa\'ala (2 harakat).'},
      {arab: 'هَفْعَلَ', latin: 'haf\'ala', penjelasan: 'Haf\'ala: ha + fa\'ala (2 harakat).'}
    ];
    const gridKalimatPendek = [
      {arab: 'مَا أَنْتَ', latin: 'ma antaka', penjelasan: 'Kalimat Pendek: ma + antaka (2 harakat).'},
      {arab: 'مَنْ يَعْمَلْ', latin: 'man ya\'mal', penjelasan: 'Kalimat Pendek: man + ya\'mal (2 harakat).'},
      {arab: 'إِنَّ', latin: 'innna', penjelasan: 'Kalimat Pendek: inn + na (2 harakat).'},
      {arab: 'مَا أَغْنَى', latin: 'ma aghna', penjelasan: 'Kalimat Pendek: ma + aghna (2 harakat).'},
      {arab: 'حَبَّ', latin: 'habba', penjelasan: 'Kalimat Pendek: ha + bba (2 harakat).'},
      {arab: 'مَرَّ يَحْزَن', latin: 'marra yahzan', penjelasan: 'Kalimat Pendek: marra + yahzan (2 harakat).'},
      {arab: 'مِنْ شَرٍّ', latin: 'min sharriin', penjelasan: 'Kalimat Pendek: min + sharriin (2 harakat).'},
      {arab: 'ثُمَّ', latin: 'thumma', penjelasan: 'Kalimat Pendek: thumma (2 harakat).'}
    ];
    const gridTajwidDasar = [
      {arab: 'أَلْفَ', latin: 'alfa', penjelasan: 'Tajwid Dasar: alif + lam (2 harakat).'},
      {arab: 'بَلْفَ', latin: 'balfa', penjelasan: 'Tajwid Dasar: ba + lam (2 harakat).'},
      {arab: 'تَلْفَ', latin: 'talfa', penjelasan: 'Tajwid Dasar: ta + lam (2 harakat).'},
      {arab: 'ثَلْفَ', latin: 'thalfa', penjelasan: 'Tajwid Dasar: tsa + lam (2 harakat).'},
      {arab: 'جَلْفَ', latin: 'jalafa', penjelasan: 'Tajwid Dasar: jim + lam (2 harakat).'},
      {arab: 'حَلْفَ', latin: 'halafa', penjelasan: 'Tajwid Dasar: ha + lam (2 harakat).'},
      {arab: 'خَلْفَ', latin: 'khalafa', penjelasan: 'Tajwid Dasar: kha + lam (2 harakat).'},
      {arab: 'دَلْفَ', latin: 'dalafa', penjelasan: 'Tajwid Dasar: dal + lam (2 harakat).'},
      {arab: 'ذَلْفَ', latin: 'dhalafa', penjelasan: 'Tajwid Dasar: dzal + lam (2 harakat).'},
      {arab: 'رَلْفَ', latin: 'ralafa', penjelasan: 'Tajwid Dasar: ra + lam (2 harakat).'},
      {arab: 'زَلْفَ', latin: 'zalafa', penjelasan: 'Tajwid Dasar: zai + lam (2 harakat).'},
      {arab: 'سَلْفَ', latin: 'salafa', penjelasan: 'Tajwid Dasar: sin + lam (2 harakat).'},
      {arab: 'شَلْفَ', latin: 'shalafa', penjelasan: 'Tajwid Dasar: syin + lam (2 harakat).'},
      {arab: 'صَلْفَ', latin: 'shalafa', penjelasan: 'Tajwid Dasar: shad + lam (2 harakat).'},
      {arab: 'ضَلْفَ', latin: 'dhalafa', penjelasan: 'Tajwid Dasar: dhad + lam (2 harakat).'},
      {arab: 'طَلْفَ', latin: 'thalafa', penjelasan: 'Tajwid Dasar: tha + lam (2 harakat).'},
      {arab: 'ظَلْفَ', latin: 'dhalafa', penjelasan: 'Tajwid Dasar: zha + lam (2 harakat).'},
      {arab: 'عَلْفَ', latin: 'alafa', penjelasan: 'Tajwid Dasar: ain + lam (2 harakat).'},
      {arab: 'غَلْفَ', latin: 'ghalafa', penjelasan: 'Tajwid Dasar: ghain + lam (2 harakat).'},
      {arab: 'فَلْفَ', latin: 'falafa', penjelasan: 'Tajwid Dasar: fa + lam (2 harakat).'},
      {arab: 'قَلْفَ', latin: 'qalafa', penjelasan: 'Tajwid Dasar: qaf + lam (2 harakat).'},
      {arab: 'كَلْفَ', latin: 'kalafa', penjelasan: 'Tajwid Dasar: kaf + lam (2 harakat).'},
      {arab: 'لَلْفَ', latin: 'lalafa', penjelasan: 'Tajwid Dasar: lam + lam (2 harakat).'},
      {arab: 'مَلْفَ', latin: 'malafa', penjelasan: 'Tajwid Dasar: mim + lam (2 harakat).'},
      {arab: 'نَلْفَ', latin: 'nalafa', penjelasan: 'Tajwid Dasar: nun + lam (2 harakat).'},
      {arab: 'وَلْفَ', latin: 'walafa', penjelasan: 'Tajwid Dasar: wau + lam (2 harakat).'},
      {arab: 'هَلْفَ', latin: 'halafa', penjelasan: 'Tajwid Dasar: ha + lam (2 harakat).'},
      {arab: 'يَلْفَ', latin: 'yalafa', penjelasan: 'Tajwid Dasar: ya + lam (2 harakat).'}
    ];
    const gridGhunnah = [
      {arab: 'إِنَّ', latin: 'innna', penjelasan: 'Ghunnah: inn + na (2 harakat).'},
      {arab: 'إِنَّ', latin: 'innna', penjelasan: 'Ghunnah: inn + na (2 harakat).'},
      {arab: 'إِنَّ', latin: 'innna', penjelasan: 'Ghunnah: inn + na (2 harakat).'},
      {arab: 'إِنَّ', latin: 'innna', penjelasan: 'Ghunnah: inn + na (2 harakat).'},
      {arab: 'إِنَّ', latin: 'innna', penjelasan: 'Ghunnah: inn + na (2 harakat).'},
      {arab: 'إِنَّ', latin: 'innna', penjelasan: 'Ghunnah: inn + na (2 harakat).'},
      {arab: 'إِنَّ', latin: 'innna', penjelasan: 'Ghunnah: inn + na (2 harakat).'},
      {arab: 'إِنَّ', latin: 'innna', penjelasan: 'Ghunnah: inn + na (2 harakat).'},
      {arab: 'إِنَّ', latin: 'innna', penjelasan: 'Ghunnah: inn + na (2 harakat).'},
      {arab: 'إِنَّ', latin: 'innna', penjelasan: 'Ghunnah: inn + na (2 harakat).'}
    ];

    // Tambahkan harakatMap dari belajar_view.php
    const harakatMap = {
      fathah: {
        pelafalan: {
          'Alif': 'a', 'Ba': 'ba', 'Ta': 'ta', 'Tsa': 'tsa', 'Jim': 'ja', 'Ha': 'ha', 'Kha': 'kha', 'Dal': 'da', 'Dzal': 'dza', 'Ra': 'ra', 'Zai': 'za', 'Sin': 'sa', 'Syin': 'sya', 'Shad': 'sha', 'Dhad': 'dha', 'Tha': 'tha', 'Zha': 'zha', 'Ain': 'a', 'Ghain': 'gha', 'Fa': 'fa', 'Qaf': 'qa', 'Kaf': 'ka', 'Lam': 'la', 'Mim': 'ma', 'Nun': 'na', 'Wau': 'wa', 'Ha': 'ha', 'Ya': 'ya'
        }
      },
      kasrah: {
        pelafalan: {
          'Alif': 'i', 'Ba': 'bi', 'Ta': 'ti', 'Tsa': 'tsi', 'Jim': 'ji', 'Ha': 'hi', 'Kha': 'khi', 'Dal': 'di', 'Dzal': 'dzi', 'Ra': 'ri', 'Zai': 'zi', 'Sin': 'si', 'Syin': 'syi', 'Shad': 'shi', 'Dhad': 'dhi', 'Tha': 'thi', 'Zha': 'zhi', 'Ain': 'i', 'Ghain': 'ghi', 'Fa': 'fi', 'Qaf': 'qi', 'Kaf': 'ki', 'Lam': 'li', 'Mim': 'mi', 'Nun': 'ni', 'Wau': 'wi', 'Ha': 'hi', 'Ya': 'yi'
        }
      },
      dhammah: {
        pelafalan: {
          'Alif': 'u', 'Ba': 'bu', 'Ta': 'tu', 'Tsa': 'tsu', 'Jim': 'ju', 'Ha': 'hu', 'Kha': 'khu', 'Dal': 'du', 'Dzal': 'dzu', 'Ra': 'ru', 'Zai': 'zu', 'Sin': 'su', 'Syin': 'syu', 'Shad': 'shu', 'Dhad': 'dhu', 'Tha': 'thu', 'Zha': 'zhu', 'Ain': 'u', 'Ghain': 'ghu', 'Fa': 'fu', 'Qaf': 'qu', 'Kaf': 'ku', 'Lam': 'lu', 'Mim': 'mu', 'Nun': 'nu', 'Wau': 'wu', 'Ha': 'hu', 'Ya': 'yu'
        }
      },
      Fathatain: {
        pelafalan: {
          'Alif': 'an', 'Ba': 'ban', 'Ta': 'tan', 'Tsa': 'tsan', 'Jim': 'jan', 'Ha': 'han', 'Kha': 'khan', 'Dal': 'dan', 'Dzal': 'dzan', 'Ra': 'ran', 'Zai': 'zan', 'Sin': 'san', 'Syin': 'syan', 'Shad': 'shan', 'Dhad': 'dhan', 'Tha': 'than', 'Zha': 'zhan', 'Ain': 'an', 'Ghain': 'ghan', 'Fa': 'fan', 'Qaf': 'qan', 'Kaf': 'kan', 'Lam': 'lan', 'Mim': 'man', 'Nun': 'nan', 'Wau': 'wan', 'Ha': 'han', 'Ya': 'yan'
        }
      },
      Kasratain: {
        pelafalan: {
          'Alif': 'in', 'Ba': 'bin', 'Ta': 'tin', 'Tsa': 'tsin', 'Jim': 'jin', 'Ha': 'hin', 'Kha': 'khin', 'Dal': 'din', 'Dzal': 'dzin', 'Ra': 'rin', 'Zai': 'zin', 'Sin': 'sin', 'Syin': 'syin', 'Shad': 'shin', 'Dhad': 'dhin', 'Tha': 'thin', 'Zha': 'zhin', 'Ain': 'in', 'Ghain': 'ghin', 'Fa': 'fin', 'Qaf': 'qin', 'Kaf': 'kin', 'Lam': 'lin', 'Mim': 'min', 'Nun': 'nin', 'Wau': 'win', 'Ha': 'hin', 'Ya': 'yin'
        }
      },
      Dhammatain: {
        pelafalan: {
          'Alif': 'un', 'Ba': 'bun', 'Ta': 'tun', 'Tsa': 'tsun', 'Jim': 'jun', 'Ha': 'hun', 'Kha': 'khun', 'Dal': 'dun', 'Dzal': 'dzun', 'Ra': 'run', 'Zai': 'zun', 'Sin': 'sun', 'Syin': 'syun', 'Shad': 'shun', 'Dhad': 'dhun', 'Tha': 'thun', 'Zha': 'zhun', 'Ain': 'un', 'Ghain': 'ghun', 'Fa': 'fun', 'Qaf': 'qun', 'Kaf': 'kun', 'Lam': 'lun', 'Mim': 'mun', 'Nun': 'nun', 'Wau': 'wun', 'Ha': 'hun', 'Ya': 'yun'
        }
      }
    };

    let quizQuestions = [];
    let currentQuestionIndex = 0;
    let score = 0;
    let quizState = 'active'; // 'active', 'answered', 'completed'
    let waktuMulai, waktuSelesai, jawabanDetail = [];
    let quizMode = null; // 'dasar' atau 'lanjutan'

    function shuffle(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
        return array;
    }

    function generateQuizQuestions() {
        // 5 soal nama huruf
        let soalNama = shuffle([...hijaiyahStandar]).slice(0, 5).map(q => {
            let options = [q.Huruf_2];
            let wrongs = shuffle(hijaiyahStandar.filter(h => h.Huruf_2 !== q.Huruf_2)).slice(0, 3).map(h => h.Huruf_2);
            options = shuffle(options.concat(wrongs));
            return {
                type: 'nama',
                letter: q.Huruf_1,
                correct: q.Huruf_2,
                options,
                question: 'Apa nama huruf ini?'
            };
        });
        // 5 soal cara baca huruf (fathah, kasrah, dhammah, fathatain, kasratain, dhammatain)
        let harakats = ['fathah','kasrah','dhammah','fathatain','kasratain','dhammatain'];
        let soalBaca = [];
        let hijaiyahShuffled = shuffle([...hijaiyahStandar]);
        let idx = 0;
        while (soalBaca.length < 5 && idx < hijaiyahShuffled.length) {
            let q = hijaiyahShuffled[idx];
            let harakat = harakats[Math.floor(Math.random()*harakats.length)];
            let hurufHarakat = q[harakat];
            let jawaban = harakatMap[harakat] && harakatMap[harakat].pelafalan[q.Huruf_2] ? harakatMap[harakat].pelafalan[q.Huruf_2] : '';
            if (hurufHarakat && jawaban) {
                let options = [jawaban];
                let wrongs = shuffle(hijaiyahStandar.filter(h => h.Huruf_2 !== q.Huruf_2)).slice(0, 3).map(h => harakatMap[harakat].pelafalan[h.Huruf_2] || '');
                options = shuffle(options.concat(wrongs));
                soalBaca.push({
                    type: 'baca',
                    letter: hurufHarakat,
                    correct: jawaban,
                    options,
                    question: 'Bagaimana cara membaca huruf ini?'
                });
            }
            idx++;
        }
        // 6 soal materi tanwin (2x fathatain, 2x kasratain, 2x dhammatain, dari huruf berbeda)
        let tanwinHarakats = ['fathatain','kasratain','dhammatain'];
        let soalTanwin = [];
        tanwinHarakats.forEach(harakat => {
            let tanwinHurufs = shuffle([...hijaiyahStandar]).slice(0,2); // 2 huruf berbeda untuk tiap tanwin
            tanwinHurufs.forEach(q => {
                let hurufTanwin = q[harakat];
                let jawaban = harakatMap[harakat] && harakatMap[harakat].pelafalan[q.Huruf_2] ? harakatMap[harakat].pelafalan[q.Huruf_2] : '';
                if (hurufTanwin && jawaban) {
                    let options = [jawaban];
                    let wrongs = shuffle(hijaiyahStandar.filter(h => h.Huruf_2 !== q.Huruf_2)).slice(0, 3).map(h => harakatMap[harakat].pelafalan[h.Huruf_2] || '');
                    options = shuffle(options.concat(wrongs));
                    soalTanwin.push({
                        type: 'tanwin',
                        letter: hurufTanwin,
                        correct: jawaban,
                        options,
                        question: 'Bagaimana cara membaca huruf ini?'
                    });
                }
            });
        });
        // Tambah 10 soal tanwin lagi dari huruf berbeda (acak, tidak duplikat)
        let soalTanwinExtra = [];
        let tanwinHurufPool = shuffle([...hijaiyahStandar]);
        let tanwinHarakatPool = ['fathatain','kasratain','dhammatain'];
        let usedTanwin = new Set(soalTanwin.map(s => s.letter));
        let extraCount = 0;
        let i = 0;
        while (soalTanwinExtra.length < 10 && i < tanwinHurufPool.length * tanwinHarakatPool.length) {
            let q = tanwinHurufPool[i % tanwinHurufPool.length];
            let harakat = tanwinHarakatPool[i % tanwinHarakatPool.length];
            let hurufTanwin = q[harakat];
            let jawaban = harakatMap[harakat] && harakatMap[harakat].pelafalan[q.Huruf_2] ? harakatMap[harakat].pelafalan[q.Huruf_2] : '';
            if (hurufTanwin && jawaban && !usedTanwin.has(hurufTanwin)) {
                let options = [jawaban];
                let wrongs = shuffle(hijaiyahStandar.filter(h => h.Huruf_2 !== q.Huruf_2)).slice(0, 3).map(h => harakatMap[harakat].pelafalan[h.Huruf_2] || '');
                options = shuffle(options.concat(wrongs));
                soalTanwinExtra.push({
                    type: 'tanwin',
                    letter: hurufTanwin,
                    correct: jawaban,
                    options,
                    question: 'Bagaimana cara membaca huruf ini?'
                });
                usedTanwin.add(hurufTanwin);
            }
            i++;
        }
        // 4 soal jenis harakat
        let soalJenis = [];
        let hijaiyahShuffled2 = shuffle([...hijaiyahStandar]);
        let idx2 = 0;
        while (soalJenis.length < 4 && idx2 < hijaiyahShuffled2.length) {
            let q = hijaiyahShuffled2[idx2];
            let harakat = harakats[Math.floor(Math.random()*harakats.length)];
            let hurufHarakat = q[harakat];
            if (hurufHarakat) {
                let options = shuffle([...harakats]);
                soalJenis.push({
                    type: 'jenis',
                    letter: hurufHarakat,
                    correct: harakat,
                    options,
                    question: 'Apa nama harakat pada huruf ini?'
                });
            }
            idx2++;
        }
        // Gabungkan semua soal dan filter null/undefined
        let allSoal = [...soalNama, ...soalBaca, ...soalTanwin, ...soalTanwinExtra, ...soalJenis].filter(Boolean);
        // Jika kurang dari 30, tambahkan dari tipe lain secara acak
        while (allSoal.length < 30) {
            let cadangan = shuffle([...soalNama, ...soalBaca, ...soalTanwin, ...soalTanwinExtra, ...soalJenis].filter(Boolean));
            for (let i = 0; i < cadangan.length && allSoal.length < 30; i++) {
                allSoal.push(cadangan[i]);
            }
        }
        // Jika lebih dari 30, potong
        if (allSoal.length > 30) allSoal = allSoal.slice(0, 30);
        // Acak urutan soal
        quizQuestions = shuffle(allSoal);
    }

    function renderQuizModeSelection() {
        document.getElementById('quiz-area').innerHTML = `
            <div class="quiz-card" style="gap:32px;">
                <div style="width:100%;text-align:center;margin-bottom:18px;">
                    <span style="font-size:1.25em;font-weight:700;color:#fff;">Pilih Jenis Kuis:</span>
                </div>
                <button id="btnQuizDasar" class="mode-btn" type="button">Quiz Dasar</button>
                <button id="btnQuizLanjutan" class="mode-btn" type="button">Quiz Lanjutan</button>
            </div>
        `;
        // Inisialisasi ulang event handler secara langsung
        var btnDasar = document.getElementById('btnQuizDasar');
        var btnLanjutan = document.getElementById('btnQuizLanjutan');
        if (btnDasar) btnDasar.onclick = function(e){ e.preventDefault(); startQuizDasar(); };
        if (btnLanjutan) btnLanjutan.onclick = function(e){ e.preventDefault(); startQuizLanjutan(); };
    }

    function startQuizDasar() {
        quizMode = 'dasar';
        startQuiz();
    }
    function startQuizLanjutan() {
        quizMode = 'lanjutan';
        startQuizLanjutanImpl();
    }

    function startQuizLanjutanImpl() {
        // Gabungkan semua grid lanjutan
        const lanjutan = [...gridMadPanjang, ...gridTasydidSukun, ...gridKalimatPendek, ...gridTajwidDasar, ...gridGhunnah];
        // 10 soal: pilih bacaan latin
        let soalLatin = shuffle([...lanjutan]).slice(0, 10).map(q => {
            let wrongs = shuffle(lanjutan.filter(x => x.latin !== q.latin)).slice(0, 3).map(x => x.latin);
            let options = shuffle([q.latin, ...wrongs]);
            return {
                type: 'latin',
                letter: q.arab,
                correct: q.latin,
                options,
                question: 'Bagaimana cara membaca kata/kalimat ini?'
            };
        });
        // 10 soal: pilih jenis materi
        let soalMateri = shuffle([...lanjutan]).slice(0, 10).map(q => {
            let materi = '';
            if (gridMadPanjang.includes(q)) materi = 'Mad Panjang';
            else if (gridTasydidSukun.includes(q)) materi = 'Tasydid & Sukun';
            else if (gridKalimatPendek.includes(q)) materi = 'Kalimat Pendek';
            else if (gridTajwidDasar.includes(q)) materi = 'Tajwid Dasar';
            else if (gridGhunnah.includes(q)) materi = 'Ghunnah';
            let allMateri = ['Mad Panjang','Tasydid & Sukun','Kalimat Pendek','Tajwid Dasar','Ghunnah'];
            let wrongs = shuffle(allMateri.filter(m => m !== materi)).slice(0, 3);
            let options = shuffle([materi, ...wrongs]);
            return {
                type: 'materi',
                letter: q.arab,
                correct: materi,
                options,
                question: 'Apa jenis kata/kalimat ini?'
            };
        });
        quizQuestions = shuffle([...soalLatin, ...soalMateri]);
        currentQuestionIndex = 0;
        score = 0;
        quizState = 'active';
        jawabanDetail = [];
        waktuMulai = new Date();
        renderQuiz();
    }

    function answerQuiz(selected, btn) {
        if (quizState !== 'active') return;
        quizState = 'answered';
        const q = quizQuestions[currentQuestionIndex];
        const correctIdx = q.options.indexOf(q.correct);
        const btns = Array.from(document.getElementsByClassName('quiz-option'));
        btns.forEach((b, i) => {
            b.disabled = true;
            if (q.options[i] === q.correct) {
                b.classList.add('correct');
            }
            if (b === btn && q.options[i] !== q.correct) {
                b.classList.add('wrong');
            }
        });
        const benar = selected === q.correct;
        if (benar) score++;
        jawabanDetail.push({
            soal: q.letter,
            jawaban: selected,
            benar: benar,
            kunci: q.correct,
            opsi: q.options
        });
        setTimeout(() => {
            currentQuestionIndex++;
            if (currentQuestionIndex >= 30) { // Ganti 10 dengan 20
                quizState = 'completed';
                waktuSelesai = new Date();
                simpanHasilKuis();
            } else {
                quizState = 'active';
            }
            renderQuiz();
        }, 1500);
    }

    function simpanHasilKuis() {
        fetch('<?= site_url('dashboard/save_quiz_result') ?>', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({
                skor: score,
                total_soal: 30, // Ganti 10 dengan 20
                benar: score,
                salah: 30 - score, // Ganti 10 dengan 20
                waktu_mulai: waktuMulai.toISOString(),
                waktu_selesai: waktuSelesai.toISOString(),
                detail_jawaban: JSON.stringify(jawabanDetail)
            })
        });
    }

    function startQuiz() {
        if (!quizMode) { renderQuizModeSelection(); return; }
        currentQuestionIndex = 0;
        score = 0;
        quizState = 'active';
        if (quizMode === 'dasar') {
        generateQuizQuestions();
        }
        jawabanDetail = [];
        waktuMulai = new Date();
        renderQuiz();
    }

    // Tambahkan definisi fungsi renderQuiz sebelum digunakan
    function renderQuiz() {
        if (quizState === 'completed') {
            document.getElementById('quiz-area').innerHTML = `
                <div class="quiz-card">
                    <div class="quiz-result">
                        <div class="emoji">🎉</div>
                        <div class="result-title">Kuis Selesai!</div>
                        <div class="result-score">Skor Kamu: <b>${score}/30</b></div>
                        <button class="restart-btn" onclick="quizMode=null;renderQuizModeSelection()">Kembali ke Pilihan</button>
                    </div>
                </div>
            `;
            return;
        }
        const q = quizQuestions[currentQuestionIndex];
        const progress = ((currentQuestionIndex) / 30) * 100; // Ganti 10 dengan 20
        document.getElementById('quiz-area').innerHTML = `
            <div class="quiz-card">
                <div class="quiz-header">
                    <span>Pertanyaan ${currentQuestionIndex+1} dari 30</span>
                    <span>Skor: ${score}</span>
                </div>
                <div class="quiz-progress-bg">
                    <div class="quiz-progress-fill" style="width:${progress}%;"></div>
                </div>
                <div class="quiz-huruf-circle">
                    <span class="quiz-huruf">${q.letter}</span>
                </div>
                <div class="quiz-question">${q.question}</div>
                <div class="quiz-options">
                    ${q.options.map((opt, i) => `
                        <button class="quiz-option" id="opt${i}" onclick="answerQuiz('${opt}', this)">${opt}</button>
                    `).join('')}
                </div>
            </div>
        `;
    }

    // Start quiz on load
    renderQuizModeSelection();

    // Event delegation agar tombol Quiz Dasar dan Quiz Lanjutan selalu berfungsi

    // Hapus event delegation global pada document
    </script>
</body>
</html> 