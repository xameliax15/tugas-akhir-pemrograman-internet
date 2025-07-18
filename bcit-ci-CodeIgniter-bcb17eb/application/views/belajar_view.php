<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } $theme = isset($_SESSION['theme']) ? $_SESSION['theme'] : 'light'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Huruf Hijaiyah 📚</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { background: #f4f6fb; font-family: 'Segoe UI', Arial, sans-serif; margin: 0; padding: 0; }
        <?php if($theme==='dark'): ?>
        body { background: #181a20; color: #e5e7eb; }
        .navbar { background: linear-gradient(90deg, #232946 0%, #3b3f5c 100%) !important; color: #ffe066; }
        .navbar .logo-icon { background: #232946; color: #ffe066; }
        .navbar .nav-btn, .navbar .profile-btn {
          background: #232946 !important;
          color: #ffe066 !important;
          border: 2px solid #ffe066 !important;
          box-shadow: 0 2px 8px #23294633;
        }
        .navbar .nav-btn.active, .navbar .nav-btn:hover, .navbar .profile-btn:hover {
          background: #ffe066 !important;
          color: #232946 !important;
          border: 2px solid #ffe066 !important;
        }
        .navbar .logout-btn {
          background: #ef4444 !important;
          color: #fff !important;
          border: none !important;
        }
        .navbar .logout-btn:hover {
          background: #a21caf !important;
          color: #fff !important;
        }
        .container { background: #181a20; color: #e5e7eb; }
        .huruf-card, .card-colors, .card-colors-2, .card-colors-3, .card-colors-4, .card-colors-5, .card-colors-6 { background: #232946 !important; color: #ffe066 !important; }
        .huruf-arab, .huruf-nama, .huruf-bunyi { color: #ffe066 !important; }
        .huruf-modal-content, #materiDetailCard .huruf-modal-content { background: #232946 !important; color: #ffe066 !important; border-color: #ffe066 !important; }
        #materiDetailCard .materi-paragraf, #modal-penjelasan { background: #232946 !important; color: #ffe066 !important; }
        .huruf-modal-close { background: #232946 !important; color: #ffe066 !important; }
        .huruf-modal-close:hover { background: #ffe066 !important; color: #232946 !important; }
        .huruf-menu-btn, .huruf-menu-btn.active, .huruf-menu-btn:hover {
          background: #232946 !important;
          color: #ffe066 !important;
          border: 2px solid #ffe066 !important;
          box-shadow: 0 2px 8px #23294633;
        }
        .huruf-menu-btn:hover {
          background: #ffe066 !important;
          color: #232946 !important;
          border: 2px solid #ffe066 !important;
        }
        .huruf-tab-btn {
          background: #232946 !important;
          color: #ffe066 !important;
          border: 2px solid #ffe066 !important;
        }
        .huruf-tab-btn.active, .huruf-tab-btn:hover {
          background: #ffe066 !important;
          color: #232946 !important;
          border: 2px solid #ffe066 !important;
        }
        <?php endif; ?>
        /* Dekorasi bubble dan bintang untuk background materi */
        .materi-bg-bubble {
          position: absolute;
          z-index: 0;
          pointer-events: none;
        }
        .materi-bg-bubble.b1 { left: 5vw; top: 180px; width: 90px; height: 90px; background: radial-gradient(circle at 30% 30%, #ffe066 70%, #fffbe6 100%); border-radius: 50%; opacity: 0.45; }
        .materi-bg-bubble.b2 { right: 8vw; top: 320px; width: 60px; height: 60px; background: radial-gradient(circle at 60% 60%, #a7f3d0 70%, #e0f7fa 100%); border-radius: 50%; opacity: 0.38; }
        .materi-bg-bubble.b3 { left: 50vw; top: 80px; width: 50px; height: 50px; background: radial-gradient(circle at 50% 50%, #fca5a5 70%, #fff0f0 100%); border-radius: 50%; opacity: 0.32; }
        .materi-bg-bubble.b4 { right: 18vw; top: 200px; width: 40px; height: 40px; background: radial-gradient(circle at 50% 50%, #fcd34d 70%, #fffbe6 100%); border-radius: 50%; opacity: 0.32; }
        .materi-bg-star {
          position: absolute; z-index: 0; color: #ffe066; font-size: 2em; opacity: 0.5;
        }
        .materi-bg-star.s1 { left: 12vw; top: 260px; }
        .materi-bg-star.s2 { right: 15vw; top: 120px; }
        /* Materi tab khusus */
        #tabMateriContent { position: relative; z-index: 1; }
        .huruf-header { font-size: 2.1em; font-weight: 800; color: #5f5be3; margin-bottom: 8px; text-align: center; letter-spacing: 0.5px; }
        .huruf-header.materi-emoji { font-size: 2.2em; display: flex; align-items: center; justify-content: center; gap: 0.5em; }
        .huruf-menu-bar#materiMenuBar { flex-wrap: wrap; gap: 16px; margin-bottom: 18px; margin-top: 10px; justify-content: center; }
        .huruf-menu-btn {
          background: linear-gradient(90deg, #fbbf24 0%, #f472b6 100%);
          color: #fff;
          border: none;
          border-radius: 18px;
          padding: 13px 26px;
          font-size: 1.13em;
          font-weight: 700;
          cursor: pointer;
          box-shadow: 0 2px 12px rgba(91,33,182,0.10);
          transition: background 0.2s, transform 0.2s, box-shadow 0.2s;
          margin-bottom: 4px;
        }
        .huruf-menu-btn.active, .huruf-menu-btn:hover {
          background: linear-gradient(90deg, #7b6cf6 0%, #5f5be3 100%);
          color: #fff;
          transform: scale(1.07) translateY(-2px);
          box-shadow: 0 6px 24px rgba(123,108,246,0.13);
        }
        /* Card materi detail */
        #materiDetailCard .huruf-modal-content {
          background: #fffbe6;
          border-radius: 28px;
          box-shadow: 0 8px 32px rgba(255, 193, 7, 0.10);
          border: 2.5px solid #ffe066;
          padding: 2.5em 2em 2em 2em;
          min-width: 320px; max-width: 96vw;
          text-align: left;
          color: #232946;
          font-size: 1.18em;
          font-family: 'Segoe UI', Arial, sans-serif;
          margin-bottom: 32px;
          position: relative;
          z-index: 2;
        }
        #materiDetailCard .huruf-header { font-size: 1.5em; margin-bottom: 0.7em; text-align: left; }
        #materiDetailCard .materi-paragraf {
          background: #fff9e6;
          border-radius: 18px;
          padding: 1.1em 1em 1em 1em;
          margin-bottom: 1.1em;
          box-shadow: 0 2px 12px rgba(255, 193, 7, 0.07);
          font-size: 1.08em;
          color: #232946;
          font-family: 'Segoe UI', Arial, sans-serif;
        }
        #materiDetailCard ul { margin-left: 1.2em; }
        #materiDetailCard li { margin-bottom: 0.5em; }
        @media (max-width: 600px) {
          .huruf-menu-btn { font-size: 1em; padding: 10px 12px; border-radius: 12px; }
          #materiDetailCard .huruf-modal-content { padding: 1.2em 0.5em 1.2em 0.5em; }
          #materiDetailCard .materi-paragraf { font-size: 1em; padding: 0.7em 0.5em; }
        }
        .navbar { background: linear-gradient(90deg, #5f5be3 0%, #7b6cf6 100%); color: #fff; display: flex; align-items: center; justify-content: space-between; padding: 18px 32px; box-shadow: 0 2px 8px rgba(0,0,0,0.03); }
        .navbar .logo { font-size: 1.35em; font-weight: bold; display: flex; align-items: center; gap: 12px; }
        .navbar .logo-icon { background: #fff; color: #5f5be3; border-radius: 8px; width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; font-size: 1.2em; font-weight: bold; }
        .navbar .nav-btns { display: flex; gap: 12px; }
        .navbar .nav-btn { background: #fff; color: #7b6cf6; border: none; border-radius: 8px; padding: 8px 18px; font-size: 1em; font-weight: 500; cursor: pointer; transition: background 0.2s, color 0.2s; display: flex; align-items: center; gap: 6px; }
        .navbar .nav-btn.active, .navbar .nav-btn:hover { background: #f3e8ff; color: #5f5be3; }
        .navbar .profile-btn { background: #fff; color: #7b6cf6; border-radius: 50%; width: 38px; height: 38px; display: flex; align-items: center; justify-content: center; font-size: 1.1em; font-weight: bold; margin-left: 8px; }
        .container { max-width: 1200px; margin: 32px auto; padding: 0 18px; }
        .huruf-grid {
          display: grid;
          grid-template-columns: repeat(7, 1fr);
          gap: 22px;
          justify-items: stretch;
          align-items: stretch;
          margin-bottom: 32px;
          direction: rtl;
          max-width: 900px;
          margin-left: auto;
          margin-right: auto;
        }
        @media (max-width: 900px) {
          .huruf-grid { grid-template-columns: repeat(4, 1fr); max-width: 520px; }
        }
        @media (max-width: 600px) {
          .huruf-grid { grid-template-columns: repeat(2, 1fr); gap: 14px; max-width: 220px; }
        }
        .huruf-card {
          width: 100%;
          height: 110px;
          border-radius: 22px;
          display: flex;
          flex-direction: column;
          align-items: center;
          justify-content: center;
          cursor: pointer;
          box-shadow: 0 2px 12px rgba(0,0,0,0.07);
          transition: transform 0.3s, box-shadow 0.3s;
          position: relative;
          direction: rtl;
          text-align: right;
          box-sizing: border-box;
          margin: 0;
          padding: 0;
        }
        .huruf-card:hover { transform: translateY(-6px) scale(1.04); box-shadow: 0 8px 32px rgba(91, 33, 182, 0.18); z-index: 2; }
        .huruf-arab {
          font-size: 2.7em;
          color: #fff;
          font-weight: 700;
          margin-bottom: 8px;
          font-family: 'Amiri', 'Scheherazade', 'Noto Naskh Arabic', 'Arial', serif;
          direction: rtl;
          text-align: right;
        }
        .huruf-nama { font-size: 1.15em; color: #fff; font-weight: 600; margin-bottom: 2px; letter-spacing: 0.5px; }
        .huruf-bunyi {
          font-size: 1.18em;
          color: rgba(255,255,255,0.92);
          font-weight: 700;
        }
        /* 6 gradient warna */
        .card-colors { background: linear-gradient(135deg, #fbbf24 0%, #f59e42 100%); }
        .card-colors-2 { background: linear-gradient(135deg, #3b82f6 0%, #6366f1 100%); }
        .card-colors-3 { background: linear-gradient(135deg, #f472b6 0%, #fda4af 100%); }
        .card-colors-4 { background: linear-gradient(135deg, #60a5fa 0%, #a78bfa 100%); }
        .card-colors-5 { background: linear-gradient(135deg, #34d399 0%, #059669 100%); }
        .card-colors-6 { background: linear-gradient(135deg, #a5b4fc 0%, #7c3aed 100%); }
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
          direction: rtl;
          text-align: right;
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
          font-size: 3.2em;
          color: #7b6cf6;
          font-weight: 800;
          margin-bottom: 0.2em;
          text-shadow: 0 2px 12px rgba(123,108,246,0.10);
          font-family: 'Amiri', 'Scheherazade', 'Noto Naskh Arabic', 'Arial', serif;
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
          min-width: 110px;
          max-width: 220px;
          width: 100%;
          height: auto;
          border-radius: 22px;
          display: flex;
          flex-direction: column;
          align-items: center;
          justify-content: center;
          cursor: pointer;
          box-shadow: 0 2px 12px rgba(0,0,0,0.07);
          transition: transform 0.3s, box-shadow 0.3s;
          position: relative;
          background: linear-gradient(135deg, #fbbf24 0%, #f59e42 100%);
          margin-bottom: 0;
          padding: 18px 10px 12px 10px;
          margin: 0 auto;
          word-break: break-word;
        }
        .suku-kata-card:hover { transform: translateY(-6px) scale(1.04); box-shadow: 0 8px 32px rgba(91, 33, 182, 0.18); z-index: 2; }
        .suku-arab {
          font-size: 2em;
          color: #fff;
          font-weight: 700;
          margin-bottom: 8px;
          text-align: center;
          word-break: break-word;
        }
        .suku-latin {
          font-size: 1.1em;
          color: #fff;
          font-weight: 600;
          margin-bottom: 2px;
          letter-spacing: 0.5px;
          text-align: center;
          word-break: break-word;
        }
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
        #lanjutanModalNav button:not(:disabled):hover {
          background: #5f5be3 !important;
          color: #fff !important;
        }
    </style>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Amiri:wght@700&family=Scheherazade:wght@700&display=swap">
</head>
<body<?php if($theme==='dark') echo ' style="background:#181a20;color:#e5e7eb;"'; ?>>
    <div class="navbar">
        <div class="logo"><span class="logo-icon">ح</span> Belajar Hijaiyah</div>
        <div class="nav-btns">
            <button class="nav-btn" onclick="window.location.href='<?php echo site_url('dashboard/user'); ?>'"><span>🏠</span> Beranda</button>
            <button class="nav-btn active"><span>📚</span> Belajar</button>
            <a href="<?php echo site_url('dashboard/quiz'); ?>" class="nav-btn"><span>📝</span> Kuis</a>
            <button class="nav-btn profile-btn" title="Profile">😊</button>
            <a href="<?php echo site_url('auth/logout'); ?>" class="logout-btn" style="background:#e74c3c;color:#fff;padding:8px 18px;border-radius:4px;text-decoration:none;font-weight:500;margin-left:12px;transition:background 0.2s;">Logout</a>
        </div>
    </div>
    <div class="container">
        <div class="huruf-header">Huruf Hijaiyah 📚</div>
        <div class="huruf-subtitle">Klik setiap huruf untuk melihat penjelasan dan mendengar suaranya!</div>
        <div class="huruf-tab-bar">
            <button class="huruf-tab-btn" id="tabMateriBtn" onclick="switchTab('materi')">Materi</button>
            <button class="huruf-tab-btn active" id="tabDasarBtn" onclick="switchTab('dasar')">Dasar</button>
            <button class="huruf-tab-btn" id="tabLanjutanBtn" onclick="switchTab('lanjutan')">Lanjutan</button>
        </div>
        <div id="tabMateriContent" style="display:none;">
            <div class="huruf-header">Materi Lengkap Hijaiyah</div>
            <div class="huruf-subtitle">Pahami seluruh aspek huruf hijaiyah, sejarah, makhraj, hukum bacaan, tanda baca, dan lainnya.</div>
            <div class="huruf-menu-bar" id="materiMenuBar" style="margin-top:24px;"></div>
            <div id="materiDetailCard" style="max-width:1000px;margin:32px auto 0 auto;"></div>
        </div>
        <div id="tabDasarContent">
            <div class="huruf-menu-bar">
                <button class="huruf-menu-btn active" id="btnDasarInfo" onclick="switchHarakat('dasar')">Dasar</button>
                <button class="huruf-menu-btn" id="btnFathah" onclick="switchHarakat('fathah')">Fathah</button>
                <button class="huruf-menu-btn" id="btnKasrah" onclick="switchHarakat('kasrah')">Kasrah</button>
                <button class="huruf-menu-btn" id="btnDhammah" onclick="switchHarakat('dhammah')">Dhammah</button>
                <button class="huruf-menu-btn" id="btnFathatain" onclick="switchHarakat('Fathatain')">Fathatain</button>
                <button class="huruf-menu-btn" id="btnKasratain" onclick="switchHarakat('Kasratain')">Kasratain</button>
                <button class="huruf-menu-btn" id="btnDhammatain" onclick="switchHarakat('Dhammatain')">Dhammatain</button>
            </div>
            <div class="huruf-grid" id="hurufGrid"></div>
        </div>
        <div id="tabLanjutanContent" style="display:none;">
            <div class="lanjutan-menu-bar">
                <button class="lanjutan-menu-btn active" id="btnMadPanjang" onclick="showLanjutan('madpanjang')">Latihan Mad Panjang</button>
                <button class="lanjutan-menu-btn" id="btnTasydidSukun" onclick="showLanjutan('tasydidsukun')">Tasydid & Sukun</button>
                <button class="lanjutan-menu-btn" id="btnKalimatPendek" onclick="showLanjutan('kalimatpendek')">Latihan Kalimat Pendek</button>
                <button class="lanjutan-menu-btn" id="btnTajwidDasar" onclick="showLanjutan('tajwiddasar')">Tajwid Dasar</button>
                <button class="lanjutan-menu-btn" id="btnGhunnah" onclick="showLanjutan('ghunnah')">Mim & Nun Tasydid (Ghunnah)</button>
                <button class="lanjutan-menu-btn" id="btnMenulis" onclick="showLanjutan('menulis')">Latihan Menulis</button>
            </div>
            <div id="lanjutanSukuKata" class="lanjutan-latihan-section">
        <!-- HAPUS grid dummy di sini, biarkan renderLanjutanGrid yang membuat grid -->
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
    // ======== DATA HURUF HIJAIYAH STANDAR (fallback jika hurufList kosong) ========
    const hijaiyahStandar = [
      {Huruf_1:'ا', Huruf_2:'Alif', H_sound:'a'},
      {Huruf_1:'ب', Huruf_2:'Ba', H_sound:'ba'},
      {Huruf_1:'ت', Huruf_2:'Ta', H_sound:'ta'},
      {Huruf_1:'ث', Huruf_2:'Tsa', H_sound:'tsa'},
      {Huruf_1:'ج', Huruf_2:'Jim', H_sound:'ja'},
      {Huruf_1:'ح', Huruf_2:'Ha', H_sound:'ha'},
      {Huruf_1:'خ', Huruf_2:'Kha', H_sound:'kha'},
      {Huruf_1:'د', Huruf_2:'Dal', H_sound:'da'},
      {Huruf_1:'ذ', Huruf_2:'Dzal', H_sound:'dza'},
      {Huruf_1:'ر', Huruf_2:'Ra', H_sound:'ra'},
      {Huruf_1:'ز', Huruf_2:'Zai', H_sound:'za'},
      {Huruf_1:'س', Huruf_2:'Sin', H_sound:'sa'},
      {Huruf_1:'ش', Huruf_2:'Syin', H_sound:'sya'},
      {Huruf_1:'ص', Huruf_2:'Shad', H_sound:'sha'},
      {Huruf_1:'ض', Huruf_2:'Dhad', H_sound:'dha'},
      {Huruf_1:'ط', Huruf_2:'Tha', H_sound:'tha'},
      {Huruf_1:'ظ', Huruf_2:'Zha', H_sound:'zha'},
      {Huruf_1:'ع', Huruf_2:'Ain', H_sound:'a'},
      {Huruf_1:'غ', Huruf_2:'Ghain', H_sound:'gha'},
      {Huruf_1:'ف', Huruf_2:'Fa', H_sound:'fa'},
      {Huruf_1:'ق', Huruf_2:'Qaf', H_sound:'qa'},
      {Huruf_1:'ك', Huruf_2:'Kaf', H_sound:'ka'},
      {Huruf_1:'ل', Huruf_2:'Lam', H_sound:'la'},
      {Huruf_1:'م', Huruf_2:'Mim', H_sound:'ma'},
      {Huruf_1:'ن', Huruf_2:'Nun', H_sound:'na'},
      {Huruf_1:'و', Huruf_2:'Wau', H_sound:'wa'},
      {Huruf_1:'ه', Huruf_2:'Ha', H_sound:'ha'},
      {Huruf_1:'ي', Huruf_2:'Ya', H_sound:'ya'}
    ];
    let hurufList = <?php echo json_encode($huruf); ?>;
    if (!Array.isArray(hurufList) || hurufList.length < 28) {
      hurufList = hijaiyahStandar;
    }
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
      },
      Fathatain: {
        label: 'Fathatain',
        harakat: '\u064B',
        pelafalan: {
          'Alif': 'an', 'Ba': 'ban', 'Ta': 'tan', 'Tsa': 'tsan', 'Jim': 'jan', 'Ha': 'han', 'Kha': 'khan', 'Dal': 'dan', 'Dzal': 'dzan', 'Ra': 'ran', 'Zai': 'zan', 'Sin': 'san', 'Syin': 'syan', 'Shad': 'shan', 'Dhad': 'dhan', 'Tha': 'than', 'Zha': 'zhan', 'Ain': 'an', 'Ghain': 'ghan', 'Fa': 'fan', 'Qaf': 'qan', 'Kaf': 'kan', 'Lam': 'lan', 'Mim': 'man', 'Nun': 'nan', 'Wau': 'wan', 'Ha': 'han', 'Ya': 'yan'
        },
        penjelasan: nama => `Huruf ${nama} dengan tanda Fathatain dibaca "${harakatMap.Fathatain.pelafalan[nama]||''}" sesuai standar tajwid.`
      },
      Kasratain: {
        label: 'Kasratain',
        harakat: '\u064D',
        pelafalan: {
          'Alif': 'in', 'Ba': 'bin', 'Ta': 'tin', 'Tsa': 'tsin', 'Jim': 'jin', 'Ha': 'hin', 'Kha': 'khin', 'Dal': 'din', 'Dzal': 'dzin', 'Ra': 'rin', 'Zai': 'zin', 'Sin': 'sin', 'Syin': 'syin', 'Shad': 'shin', 'Dhad': 'dhin', 'Tha': 'thin', 'Zha': 'zhin', 'Ain': 'in', 'Ghain': 'ghin', 'Fa': 'fin', 'Qaf': 'qin', 'Kaf': 'kin', 'Lam': 'lin', 'Mim': 'min', 'Nun': 'nin', 'Wau': 'win', 'Ha': 'hin', 'Ya': 'yin'
        },
        penjelasan: nama => `Huruf ${nama} dengan tanda Kasratain dibaca "${harakatMap.Kasratain.pelafalan[nama]||''}" sesuai standar tajwid.`
      },
      Dhammatain: {
        label: 'Dhammatain',
        harakat: '\u064C',
        pelafalan: {
          'Alif': 'un', 'Ba': 'bun', 'Ta': 'tun', 'Tsa': 'tsun', 'Jim': 'jun', 'Ha': 'hun', 'Kha': 'khun', 'Dal': 'dun', 'Dzal': 'dzun', 'Ra': 'run', 'Zai': 'zun', 'Sin': 'sun', 'Syin': 'syun', 'Shad': 'shun', 'Dhad': 'dhun', 'Tha': 'thun', 'Zha': 'zhun', 'Ain': 'un', 'Ghain': 'ghun', 'Fa': 'fun', 'Qaf': 'qun', 'Kaf': 'kun', 'Lam': 'lun', 'Mim': 'mun', 'Nun': 'nun', 'Wau': 'wun', 'Ha': 'hun', 'Ya': 'yun'
        },
        penjelasan: nama => `Huruf ${nama} dengan tanda Dhammatain dibaca "${harakatMap.Dhammatain.pelafalan[nama]||''}" sesuai standar tajwid.`
      }
    };
    let currentHarakat = 'fathah';
    function renderHurufGrid() {
      const grid = document.getElementById('hurufGrid');
      grid.innerHTML = '';
      if (currentHarakat === 'dasar') {
        let list = (Array.isArray(hurufList) && hurufList.length >= 28) ? hurufList : hijaiyahStandar;
        list.forEach((h, i) => {
          const color = `card-colors${(i%6)?'-'+((i%6)+1):''}`;
          const card = document.createElement('div');
          card.className = `huruf-card ${color}`;
          card.onclick = () => showHurufModal(h, h.Huruf_1, '', `Huruf ${h.Huruf_2} adalah huruf hijaiyah dasar.`);
          card.innerHTML = `<div class='huruf-arab'>${h.Huruf_1}</div><div class='huruf-nama'>${h.Huruf_2}</div><div class='huruf-bunyi'></div>`;
          grid.appendChild(card);
        });
        return;
      }
      const harakat = harakatMap[currentHarakat].harakat;
      const pelafalan = harakatMap[currentHarakat].pelafalan;
      hurufList.forEach((h, i) => {
        const color = `card-colors${(i%6)?'-'+((i%6)+1):''}`;
        const harakatChar = h.Huruf_1 + harakat;
        const bunyi = pelafalan[h.Huruf_2] || '';
        const card = document.createElement('div');
        card.className = `huruf-card ${color}`;
        card.onclick = () => showHurufModal(h, harakatChar, bunyi, harakatMap[currentHarakat].penjelasan(h.Huruf_2));
        card.innerHTML = `<div class='huruf-arab'>${harakatChar}</div><div class='huruf-bunyi'>${bunyi}</div>`;
        grid.appendChild(card);
      });
    }
    function switchHarakat(h) {
      currentHarakat = h;
      document.getElementById('btnDasarInfo').classList.toggle('active', h==='dasar');
      document.getElementById('btnFathah').classList.toggle('active', h==='fathah');
      document.getElementById('btnKasrah').classList.toggle('active', h==='kasrah');
      document.getElementById('btnDhammah').classList.toggle('active', h==='dhammah');
      document.getElementById('btnFathatain').classList.toggle('active', h==='Fathatain');
      document.getElementById('btnKasratain').classList.toggle('active', h==='Kasratain');
      document.getElementById('btnDhammatain').classList.toggle('active', h==='Dhammatain');
      renderHurufGrid();
    }
    let dasarGridIndex = null;
    let dasarGridData = [];
    let dasarHarakat = null;
    function showHurufModal(h, harakatChar, bunyi, penjelasan) {
      const isDasar = currentHarakat === 'dasar';
      const isHarakatDasar = ['dasar','fathah','kasrah','dhammah','Fathatain','Kasratain','Dhammatain'].includes(currentHarakat);
      if (isHarakatDasar) {
        dasarGridData = (Array.isArray(hurufList) && hurufList.length >= 28) ? hurufList : hijaiyahStandar;
        dasarGridIndex = dasarGridData.findIndex(x => x.Huruf_1 === h.Huruf_1);
        dasarHarakat = currentHarakat;
        // === Tambahkan log belajar ke backend ===
        let hurufId = h.Hh_id || h.Huruf_ID || h.Huruf_1; // fallback ke Huruf_1 jika tidak ada id
        if (hurufId) {
          fetch('<?php echo site_url('dashboard/belajar_huruf_log'); ?>', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'huruf_id=' + encodeURIComponent(hurufId)
          });
        }
      } else {
        dasarGridIndex = null;
        dasarGridData = [];
        dasarHarakat = null;
      }
      document.getElementById('modal-arab').innerText = harakatChar;
      if (isDasar) {
        document.getElementById('modal-nama').innerHTML = `<b>${h.Huruf_2}</b>`;
        document.getElementById('modal-bunyi').innerHTML = `<span style='color:#5f5be3;'>${h.H_sound||''}</span>`;
      } else if (isHarakatDasar) {
        document.getElementById('modal-nama').innerHTML = `<b style='font-size:1.25em;color:#232946;'>${bunyi}</b>`;
        document.getElementById('modal-bunyi').innerHTML = `<span style='color:#7b809a;font-size:1em;'>${h.Huruf_2}</span>`;
      } else {
        document.getElementById('modal-nama').innerHTML = `<b style='font-size:1.25em;color:#232946;'>${bunyi}</b>`;
        document.getElementById('modal-bunyi').innerHTML = `<span style='color:#7b809a;font-size:1em;'>${h.Huruf_2}</span>`;
      }
      document.getElementById('modal-penjelasan').innerText = penjelasan;
      // Hapus navigasi panah lama jika ada
      const oldNav = document.getElementById('dasarModalNav');
      if (oldNav) oldNav.remove();
      // Tambahkan navigasi panah jika di tab dasar/harakat
      if (isHarakatDasar && dasarGridData.length > 1) {
        let navHtml = '';
        navHtml += `<div id='dasarModalNav' style='display:flex;justify-content:center;align-items:center;gap:10px;margin-top:1.5em;'>`;
        navHtml += `<button id='dasarPrevBtn' style='width:40px;height:40px;display:flex;align-items:center;justify-content:center;border-radius:50%;border:none;background:#e0e7ff;color:#5f5be3;font-size:1.5em;box-shadow:0 2px 8px #7b6cf610;transition:background 0.2s;${dasarGridIndex===0?'opacity:0.5;cursor:not-allowed;':''}' ${dasarGridIndex===0?'disabled':''} title=\"Sebelumnya\">&lt;</button>`;
        navHtml += `<span style='font-weight:700;color:#5f5be3;font-size:1.13em;min-width:70px;text-align:center;'>${dasarGridIndex+1} / ${dasarGridData.length}</span>`;
        navHtml += `<button id='dasarNextBtn' style='width:40px;height:40px;display:flex;align-items:center;justify-content:center;border-radius:50%;border:none;background:#e0e7ff;color:#5f5be3;font-size:1.5em;box-shadow:0 2px 8px #7b6cf610;transition:background 0.2s;${dasarGridIndex===dasarGridData.length-1?'opacity:0.5;cursor:not-allowed;':''}' ${dasarGridIndex===dasarGridData.length-1?'disabled':''} title=\"Berikutnya\">&gt;</button>`;
        navHtml += `</div>`;
        document.getElementById('modal-penjelasan').insertAdjacentHTML('afterend', navHtml);
        setTimeout(()=>{
          const prevBtn = document.getElementById('dasarPrevBtn');
          const nextBtn = document.getElementById('dasarNextBtn');
          if(prevBtn) prevBtn.onclick = ()=>{ if(dasarGridIndex>0){ dasarGridIndex--; showHurufModalDasarSlide(); } };
          if(nextBtn) nextBtn.onclick = ()=>{ if(dasarGridIndex<dasarGridData.length-1){ dasarGridIndex++; showHurufModalDasarSlide(); } };
        }, 10);
      }
      document.getElementById('hurufModal').style.display = 'flex';
    }
    function showHurufModalDasarSlide() {
      const h = dasarGridData[dasarGridIndex];
      if (dasarHarakat === 'dasar') {
        showHurufModal(h, h.Huruf_1, '', `Huruf ${h.Huruf_2} adalah huruf hijaiyah dasar.`);
      } else {
        // Ambil harakat dan bunyi sesuai harakat aktif
        const harakat = harakatMap[dasarHarakat].harakat;
        const pelafalan = harakatMap[dasarHarakat].pelafalan;
        const harakatChar = h.Huruf_1 + harakat;
        const bunyi = pelafalan[h.Huruf_2] || '';
        showHurufModal(h, harakatChar, bunyi, harakatMap[dasarHarakat].penjelasan(h.Huruf_2));
      }
    }
    function closeHurufModal() {
      document.getElementById('hurufModal').style.display = 'none';
    }
    // ======== ARRAY MATERI HIJAIYAH ========
    const materiList = [
      {
        judul: 'Pengertian Huruf Hijaiyah',
        ringkasan: `<p>Huruf hijaiyah adalah abjad yang digunakan dalam bahasa Arab dan terdiri dari 28 huruf utama. Huruf-huruf ini menjadi fondasi utama dalam penulisan Al-Qur'an, kitab suci umat Islam, serta berbagai literatur berbahasa Arab. Setiap huruf hijaiyah memiliki bentuk, nama, dan cara pengucapan yang khas, yang membedakannya dari huruf-huruf dalam abjad lain di dunia.</p>
        <p>Huruf hijaiyah tidak hanya digunakan untuk menulis kata-kata, tetapi juga memiliki peran penting dalam pelafalan dan pembacaan Al-Qur'an. Penguasaan huruf-huruf ini menjadi langkah awal yang sangat penting bagi siapa saja yang ingin belajar membaca Al-Qur'an dengan baik dan benar. Selain itu, huruf hijaiyah juga menjadi dasar dalam mempelajari ilmu tajwid, yaitu ilmu yang mengatur tata cara membaca Al-Qur'an secara tartil (perlahan dan benar).</p>
        <p>Setiap huruf hijaiyah memiliki makhraj (tempat keluar huruf) dan sifat tertentu yang harus diperhatikan dalam pelafalannya. Kesalahan dalam mengenali atau melafalkan huruf hijaiyah dapat mengubah makna kata dalam bahasa Arab, sehingga pemahaman yang mendalam tentang huruf-huruf ini sangatlah penting.</p>`,
        sumber: 'Kemenag RI, Ensiklopedia Islam'
      },
      {
        judul: 'Sejarah Huruf Hijaiyah',
        ringkasan: `<p>Huruf hijaiyah berasal dari abjad Aram kuno yang berkembang di wilayah Timur Tengah, khususnya di Jazirah Arab. Pada masa sebelum Islam, penulisan huruf-huruf ini belum terstandarisasi dan masih mengalami banyak perubahan bentuk. Seiring dengan turunnya wahyu Al-Qur'an kepada Nabi Muhammad SAW, penulisan huruf hijaiyah mulai distandarisasi agar dapat digunakan untuk menulis wahyu secara akurat dan mudah dipahami oleh umat Islam.</p>
        <p>Perkembangan huruf hijaiyah tidak lepas dari pengaruh budaya dan peradaban di sekitarnya, seperti Persia, Romawi, dan Bizantium. Bentuk-bentuk huruf mengalami penyempurnaan, terutama pada masa kekhalifahan Utsmaniyah, sehingga menjadi 28 huruf seperti yang dikenal saat ini. Standarisasi ini juga memudahkan proses pembelajaran dan penyebaran Islam ke berbagai penjuru dunia.</p>
        <p>Selain itu, seni kaligrafi Arab berkembang pesat seiring dengan penyebaran huruf hijaiyah. Kaligrafi menjadi salah satu bentuk seni yang sangat dihargai dalam peradaban Islam, dan huruf hijaiyah menjadi elemen utamanya. Hingga kini, huruf hijaiyah tetap menjadi identitas penting dalam budaya dan agama Islam.</p>`,
        sumber: 'Wikipedia, Ensiklopedia Islam'
      },
      {
        judul: 'Makharijul Huruf (Tempat Keluar Huruf)',
        ringkasan: `<p>Makharijul huruf adalah istilah dalam ilmu tajwid yang merujuk pada tempat keluarnya huruf-huruf hijaiyah saat diucapkan. Setiap huruf memiliki makhraj yang spesifik di dalam rongga mulut, tenggorokan, lidah, bibir, atau rongga hidung. Mengetahui makhraj huruf sangat penting agar pelafalan huruf menjadi benar dan tidak mengubah arti kata dalam bacaan Al-Qur'an.</p>
        <p>Secara umum, makhraj huruf hijaiyah dibagi menjadi lima tempat utama: (1) rongga mulut (al-jauf), (2) tenggorokan (al-halq), (3) lidah (al-lisan), (4) bibir (asy-syafatain), dan (5) rongga hidung (al-khaisyum). Setiap tempat memiliki beberapa huruf yang keluar dari sana. Misalnya, huruf ba (ب) keluar dari kedua bibir, sedangkan huruf qaf (ق) keluar dari pangkal lidah yang menempel pada langit-langit mulut bagian belakang.</p>
        <p>Pemahaman tentang makharijul huruf sangat membantu dalam memperbaiki bacaan Al-Qur'an dan menghindari kesalahan dalam pelafalan. Latihan yang rutin dan bimbingan dari guru yang kompeten sangat dianjurkan untuk menguasai makhraj setiap huruf.</p>`,
        sumber: 'Ilmu Tajwid Kemenag RI'
      },
      {
        judul: 'Hukum Bacaan (Tajwid Dasar)',
        ringkasan: `<p>Tajwid adalah ilmu yang mempelajari tata cara membaca Al-Qur'an dengan baik dan benar sesuai dengan kaidah-kaidah yang telah ditetapkan. Salah satu aspek penting dalam tajwid adalah hukum bacaan, yang mengatur cara pengucapan huruf-huruf tertentu dalam kondisi tertentu, terutama ketika huruf-huruf tersebut bertemu dengan huruf lain dalam satu kata atau kalimat.</p>
        <p>Beberapa hukum bacaan tajwid dasar yang perlu diketahui antara lain:</p>
        <ul>
          <li><b>Idzhar</b>: Membaca nun sukun atau tanwin dengan jelas ketika bertemu huruf-huruf halqi (ء, ه, ع, ح, غ, خ).</li>
          <li><b>Idgham</b>: Meleburkan nun sukun atau tanwin ke dalam huruf berikutnya (ي, ر, م, ل, و, ن), sebagian dengan dengung dan sebagian tanpa dengung.</li>
          <li><b>Iqlab</b>: Mengganti bunyi nun sukun atau tanwin menjadi "m" ketika bertemu huruf ba (ب), disertai dengan dengung.</li>
          <li><b>Ikhfa</b>: Membaca nun sukun atau tanwin secara samar di antara jelas dan dengung ketika bertemu salah satu dari 15 huruf ikhfa.</li>
        </ul>
        <p>Memahami dan menerapkan hukum bacaan tajwid sangat penting agar bacaan Al-Qur'an menjadi fasih, tartil, dan sesuai dengan tuntunan Rasulullah SAW.</p>`,
        sumber: 'Ilmu Tajwid Kemenag RI'
      },
      {
        judul: 'Tanda Baca (Harakat)',
        ringkasan: `<p>Tanda baca atau harakat adalah simbol-simbol khusus yang diletakkan di atas atau di bawah huruf hijaiyah untuk menunjukkan vokal atau cara pengucapan huruf tersebut. Harakat sangat penting dalam bahasa Arab karena dapat mengubah arti kata secara signifikan.</p>
        <p>Beberapa jenis harakat yang umum digunakan antara lain:</p>
        <ul>
          <li><b>Fathah (َ)</b>: Tanda garis miring di atas huruf, menandakan vokal "a".</li>
          <li><b>Kasrah (ِ)</b>: Tanda garis miring di bawah huruf, menandakan vokal "i".</li>
          <li><b>Dhammah (ُ)</b>: Tanda seperti koma kecil di atas huruf, menandakan vokal "u".</li>
          <li><b>Sukun (ْ)</b>: Tanda bulat kecil di atas huruf, menandakan huruf mati (tidak berharakat).</li>
          <li><b>Tanwin</b>: Tanda harakat ganda yang menunjukkan akhiran "an", "in", atau "un".</li>
        </ul>
        <p>Tanpa harakat, kata dalam bahasa Arab bisa memiliki banyak arti yang berbeda. Oleh karena itu, harakat sangat membantu dalam membaca dan memahami teks Arab, terutama bagi pemula.</p>`,
        sumber: 'Kemenag RI, Wikipedia'
      },
      {
        judul: 'Cara Penulisan Huruf Hijaiyah',
        ringkasan: `<p>Huruf hijaiyah dapat ditulis dalam tiga bentuk utama, yaitu di awal, tengah, dan akhir kata. Setiap huruf bisa berubah bentuk tergantung posisinya dalam kata, kecuali beberapa huruf tertentu yang tidak bisa disambung dengan huruf setelahnya.</p>
        <p>Penulisan huruf hijaiyah yang benar sangat penting untuk memudahkan pembacaan dan menghindari kesalahan makna. Dalam bahasa Arab, satu huruf yang salah tulis atau salah sambung bisa mengubah arti kata secara keseluruhan. Oleh karena itu, latihan menulis huruf hijaiyah dengan berbagai bentuknya sangat dianjurkan, terutama bagi pemula.</p>
        <p>Selain itu, penulisan huruf hijaiyah juga menjadi dasar dalam seni kaligrafi Arab, yang merupakan salah satu bentuk seni tertua dan paling dihargai dalam peradaban Islam.</p>`,
        sumber: 'Buku Bahasa Arab, Wikipedia'
      },
      {
        judul: 'Contoh Pengucapan Huruf Hijaiyah',
        ringkasan: `<p>Setiap huruf hijaiyah memiliki cara pengucapan yang unik dan berbeda-beda, tergantung pada makhraj dan sifat huruf tersebut. Misalnya, huruf ب (ba) diucapkan dengan kedua bibir yang rapat, huruf ع (ain) diucapkan dari tengah tenggorokan, dan huruf ق (qaf) diucapkan dari pangkal lidah yang menempel pada langit-langit mulut bagian belakang.</p>
        <p>Latihan pengucapan huruf hijaiyah sangat penting untuk memperbaiki bacaan Al-Qur'an. Kesalahan dalam pengucapan bisa menyebabkan perubahan makna kata atau bahkan makna ayat secara keseluruhan. Oleh karena itu, disarankan untuk berlatih bersama guru yang berkompeten dan menggunakan media audio-visual untuk memperdalam pemahaman tentang cara pengucapan setiap huruf.</p>
        <p>Selain itu, pengucapan huruf hijaiyah yang benar juga menjadi syarat sah dalam membaca Al-Qur'an, sehingga sangat penting untuk dikuasai oleh setiap Muslim.</p>`,
        sumber: 'Ilmu Tajwid, Praktik Qiraah'
      },
      {
        judul: 'Pentingnya Belajar Hijaiyah',
        ringkasan: `<p>Belajar huruf hijaiyah adalah langkah awal yang sangat penting dalam memahami dan membaca Al-Qur'an. Dengan menguasai huruf hijaiyah, seseorang dapat membaca Al-Qur'an dengan benar, memahami makna ayat-ayat suci, dan melaksanakan ibadah dengan lebih khusyuk.</p>
        <p>Pemahaman yang baik tentang huruf hijaiyah juga membantu dalam mempelajari bahasa Arab secara keseluruhan, karena huruf-huruf ini menjadi fondasi utama dalam pembentukan kata dan kalimat. Selain itu, belajar hijaiyah juga memperkuat pemahaman tentang ilmu tajwid, yang sangat penting untuk menjaga keaslian bacaan Al-Qur'an.</p>
        <p>Dengan belajar huruf hijaiyah, seseorang juga dapat mengajarkan ilmu ini kepada orang lain, sehingga pahala dan manfaatnya akan terus mengalir. Oleh karena itu, belajar huruf hijaiyah tidak hanya bermanfaat untuk diri sendiri, tetapi juga untuk masyarakat luas.</p>`,
        sumber: 'Kemenag RI, Rumaysho.com'
      }
    ];

    // ======== RENDER GRID MATERI DAN TOMBOL MENU ========
    function renderMateriGrid() {
      // Hilangkan grid materi, hanya render menu bar dan detail
      renderMateriMenuBar();
      // Tampilkan detail pertama secara default
      showMateriDetail(materiList[0], 0);
    }
    // ======== RENDER MENU BAR MATERI (TOMBOL GRID) SAJA ========
    function renderMateriMenuBar() {
      const bar = document.getElementById('materiMenuBar');
      bar.innerHTML = '';
      const emojiList = ['📖','🕰️','📍','📜','🔤','✍️','🔊','⭐'];
      materiList.forEach((m, i) => {
        const btn = document.createElement('button');
        btn.className = 'huruf-menu-btn';
        btn.innerHTML = `<span style='font-size:1.3em;margin-right:0.3em;'>${emojiList[i%emojiList.length]}</span> ${m.judul}`;
        btn.onclick = () => showMateriDetail(m, i);
        btn.id = 'materiMenuBtn' + i;
        bar.appendChild(btn);
      });
    }
    // ======== TAMPILKAN DETAIL MATERI DI BAWAH MENU BAR DAN HIGHLIGHT TOMBOL ========
    function showMateriDetail(m, idx) {
      const detail = document.getElementById('materiDetailCard');
      // Pisahkan setiap <p> menjadi bubble sticky note
      let isi = m.ringkasan.replace(/<p>(.*?)<\/p>/g, (match, p1) => `<div class='materi-paragraf'>${p1}</div>`);
      detail.innerHTML = `<div class='huruf-modal-content'><div class='huruf-header materi-emoji'>${document.getElementById('materiMenuBtn'+idx)?.querySelector('span')?.outerHTML||''} ${m.judul}</div><div style='margin:0.5em 0 0.5em 0;font-size:1.08em;color:#232946;'>${isi}</div></div>`;
      // Highlight tombol aktif
      materiList.forEach((_, i) => {
        const btn = document.getElementById('materiMenuBtn'+i);
        if(btn) btn.classList.toggle('active', i === idx);
      });
    }
    // ======== SCROLL TO DETAIL ========
    function scrollToMateriDetail() {
      const detail = document.getElementById('materiDetailCard');
      if(detail) detail.scrollIntoView({behavior:'smooth'});
    }
    // ======== MODIFIKASI SWITCH TAB ========
    function switchTab(tab) {
      document.getElementById('tabMateriBtn').classList.remove('active');
      document.getElementById('tabDasarBtn').classList.remove('active');
      document.getElementById('tabLanjutanBtn').classList.remove('active');
      document.getElementById('tabMateriContent').style.display = 'none';
      document.getElementById('tabDasarContent').style.display = 'none';
      document.getElementById('tabLanjutanContent').style.display = 'none';
      if(tab === 'materi') {
        document.getElementById('tabMateriBtn').classList.add('active');
        document.getElementById('tabMateriContent').style.display = '';
        renderMateriGrid();
      } else if(tab === 'dasar') {
        document.getElementById('tabDasarBtn').classList.add('active');
        document.getElementById('tabDasarContent').style.display = '';
        renderHurufGrid();
      } else if(tab === 'lanjutan') {
        document.getElementById('tabLanjutanBtn').classList.add('active');
        document.getElementById('tabLanjutanContent').style.display = '';
        showLanjutan('madpanjang');
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
      console.log('showLanjutan dipanggil dengan mode:', mode);
      document.getElementById('btnMadPanjang').classList.remove('active');
      document.getElementById('btnTasydidSukun').classList.remove('active');
      document.getElementById('btnKalimatPendek').classList.remove('active');
      document.getElementById('btnTajwidDasar').classList.remove('active');
      document.getElementById('btnGhunnah').classList.remove('active');
      document.getElementById('btnMenulis').classList.remove('active');
      document.getElementById('lanjutanSukuKata').style.display = 'none';
      document.getElementById('lanjutanKata').style.display = 'none';
      document.getElementById('lanjutanMenulis').style.display = 'none';
      // Untuk semua mode grid, tampilkan grid sesuai mode
      if(['madpanjang','tasydidsukun','kalimatpendek','tajwiddasar','ghunnah'].includes(mode)) {
        document.getElementById('btn'+capitalize(mode)).classList.add('active');
        document.getElementById('lanjutanSukuKata').style.display = '';
        renderLanjutanGrid(mode);
      } else if(mode === 'menulis') {
        document.getElementById('btnMenulis').classList.add('active');
        document.getElementById('lanjutanMenulis').style.display = '';
        if (typeof initMenulisPilihan === 'function') initMenulisPilihan();
      }
    }
    function capitalize(str) {
      if (str === 'madpanjang') return 'MadPanjang';
      if (str === 'tasydidsukun') return 'TasydidSukun';
      if (str === 'kalimatpendek') return 'KalimatPendek';
      if (str === 'tajwiddasar') return 'TajwidDasar';
      if (str === 'ghunnah') return 'Ghunnah';
      if (str === 'menulis') return 'Menulis';
      return str.charAt(0).toUpperCase() + str.slice(1);
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
      // Bubble dan bintang hanya untuk tab materi
      const materiTab = document.getElementById('tabMateriContent');
      if (materiTab && !document.getElementById('materiBubble1')) {
        const b1 = document.createElement('div'); b1.className = 'materi-bg-bubble b1'; b1.id = 'materiBubble1';
        const b2 = document.createElement('div'); b2.className = 'materi-bg-bubble b2'; b2.id = 'materiBubble2';
        const b3 = document.createElement('div'); b3.className = 'materi-bg-bubble b3'; b3.id = 'materiBubble3';
        const b4 = document.createElement('div'); b4.className = 'materi-bg-bubble b4'; b4.id = 'materiBubble4';
        const s1 = document.createElement('div'); s1.className = 'materi-bg-star s1'; s1.innerText = '★';
        const s2 = document.createElement('div'); s2.className = 'materi-bg-star s2'; s2.innerText = '★';
        materiTab.appendChild(b1); materiTab.appendChild(b2); materiTab.appendChild(b3); materiTab.appendChild(b4); materiTab.appendChild(s1); materiTab.appendChild(s2);
      }
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
        penjelasan: 'Idgham artinya "meleburkan". Terjadi jika nun sukun/tanwin bertemu huruf ي, ر, م, ل, و, ن. Nun/tanwin dilebur ke huruf berikutnya, sebagian dengan dengung dan sebagian tanpa dengung.',
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
    function renderLanjutanGrid(mode) {
      console.log('renderLanjutanGrid dipanggil dengan mode:', mode);
      let data = [];
      if (mode === 'madpanjang') data = gridMadPanjang;
      else if (mode === 'tasydidsukun') data = gridTasydidSukun;
      else if (mode === 'kalimatpendek') data = gridKalimatPendek;
      else if (mode === 'tajwiddasar') data = gridTajwidDasar;
      else if (mode === 'ghunnah') data = gridGhunnah;
      console.log('Data grid yang digunakan:', data);
      let grid = document.querySelector('#lanjutanSukuKata .huruf-grid');
      if (!grid) {
        grid = document.createElement('div');
        grid.className = 'huruf-grid';
        document.getElementById('lanjutanSukuKata').appendChild(grid);
      }
      grid.innerHTML = '';
      data.forEach((item, i) => {
        const card = document.createElement('div');
        card.className = 'suku-kata-card';
        card.onclick = () => showLanjutanModal(item);
        card.innerHTML = `<div class='suku-arab'>${item.arab}</div><div class='suku-latin'>${item.latin}</div>`;
        // Tombol audio jika ada
        if(item.audio) {
          const audioBtn = document.createElement('button');
          audioBtn.className = 'suku-audio-btn';
          audioBtn.innerHTML = '<span>🔊</span>';
          audioBtn.onclick = (e) => { e.stopPropagation(); playLanjutanAudio(item); };
          card.appendChild(audioBtn);
        }
        grid.appendChild(card);
      });
    }
    function showLanjutanModal(item) {
      document.getElementById('modal-arab').innerText = item.arab;
      document.getElementById('modal-nama').innerText = item.latin;
      document.getElementById('modal-bunyi').innerText = '';
      document.getElementById('modal-penjelasan').innerText = item.penjelasan;
      document.getElementById('hurufModal').style.display = 'flex';
    }
    function playLanjutanAudio(item) {
      if (item.audio) {
        const audio = new Audio(item.audio);
        audio.play();
      } else {
        alert('Audio belum tersedia untuk item ini.');
      }
    }
    // Tambahkan data grid lanjutan
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
      {arab: 'مُدَّ', latin: 'mudda', penjelasan: 'Tasydid: dal bertasydid dibaca dobel "mud-da".'},
      {arab: 'حَبَّ', latin: 'habba', penjelasan: 'Tasydid: ba bertasydid dibaca dobel "hab-ba".'},
      {arab: 'إِلَّا', latin: 'illaa', penjelasan: 'Tasydid: lam bertasydid, mad pada alif.'},
      {arab: 'أَبْ', latin: 'ab', penjelasan: 'Sukun: ba sukun, dibaca "ab".'},
      {arab: 'أَحْ', latin: 'ah', penjelasan: 'Sukun: ha sukun, dibaca "ah".'},
      {arab: 'رَبِّ', latin: 'rabbi', penjelasan: 'Tasydid: ba bertasydid, dibaca dobel "rab-bi".'},
      {arab: 'مَرَّ', latin: 'marra', penjelasan: 'Tasydid: ra bertasydid, dibaca dobel "mar-ra".'},
      {arab: 'يَحْزَن', latin: 'yahzan', penjelasan: 'Sukun: za sukun, dibaca "yah-zan".'},
      {arab: 'يَشْكُرْ', latin: 'yashkur', penjelasan: 'Sukun: kaf sukun, dibaca "yash-kur".'},
      {arab: 'مُحَمَّد', latin: 'muhammad', penjelasan: 'Tasydid: mim bertasydid, dibaca dobel "muham-mad".'},
      {arab: 'أُمّ', latin: 'umm', penjelasan: 'Tasydid: mim bertasydid, dibaca dobel "umm".'},
      {arab: 'بِسْمْ', latin: 'bism', penjelasan: 'Sukun: sin sukun, dibaca "bism".'},
      {arab: 'يَكْتُبْ', latin: 'yaktub', penjelasan: 'Sukun: ta sukun, dibaca "yak-tub".'},
      {arab: 'حَجّ', latin: 'hajj', penjelasan: 'Tasydid: jim bertasydid, dibaca dobel "hajj".'},
      {arab: 'دَرَّ', latin: 'darra', penjelasan: 'Tasydid: ra bertasydid, dibaca dobel "dar-ra".'},
      {arab: 'سَبَّحَ', latin: 'sabbaha', penjelasan: 'Tasydid: ba bertasydid, dibaca dobel "sab-ba-ha".'},
      {arab: 'مَكْتُوبْ', latin: 'maktub', penjelasan: 'Sukun: ta sukun, dibaca "mak-tub".'},
      {arab: 'مَكَّة', latin: 'makka', penjelasan: 'Tasydid: kaf bertasydid, dibaca dobel "mak-ka".'},
      {arab: 'حَقّ', latin: 'haqq', penjelasan: 'Tasydid: qaf bertasydid, dibaca dobel "haqq".'},
      {arab: 'عَبَّدَ', latin: 'abbada', penjelasan: 'Tasydid: ba bertasydid, dibaca dobel "ab-ba-da".'},
      {arab: 'مُسْلِمْ', latin: 'muslim', penjelasan: 'Sukun: lam sukun, dibaca "mus-lim".'},
      {arab: 'مُدَرِّس', latin: 'mudarris', penjelasan: 'Tasydid: ra bertasydid, dibaca dobel "mu-dar-ris".'},
      {arab: 'مُحَسَّن', latin: 'muhassan', penjelasan: 'Tasydid: sin bertasydid, dibaca dobel "mu-has-san".'},
      {arab: 'مُحَفَّظ', latin: 'muhaffazh', penjelasan: 'Tasydid: fa bertasydid, dibaca dobel "mu-haf-fazh".'},
      {arab: 'مُحَفَّظَة', latin: 'muhaffazhah', penjelasan: 'Tasydid: fa bertasydid, dibaca dobel "mu-haf-fazh-ah".'},
      {arab: 'مُحَفَّظُون', latin: 'muhaffazhun', penjelasan: 'Tasydid: fa bertasydid, dibaca dobel "mu-haf-fazhun".'},
      {arab: 'مُحَفَّظِينَ', latin: 'muhaffazhiin', penjelasan: 'Tasydid: fa bertasydid, dibaca dobel "mu-haf-fazhiin".'},
      {arab: 'مُحَفَّظَات', latin: 'muhaffazhat', penjelasan: 'Tasydid: fa bertasydid, dibaca dobel "mu-haf-fazhat".'},
      {arab: 'مُحَفَّظَاتٍ', latin: 'muhaffazhatiin', penjelasan: 'Tasydid: fa bertasydid, dibaca dobel "mu-haf-fazhatiin".'}
    ];
    const gridKalimatPendek = [
      {arab: 'إِنَّا أَعْطَيْنَاكَ', latin: 'inna a\'thainaaka', penjelasan: 'Kalimat pendek dengan tasydid dan mad.'},
      {arab: 'قَالُوا', latin: 'qaaluu', penjelasan: 'Kalimat dengan mad dan huruf wau.'},
      {arab: 'مَدَدْ', latin: 'madad', penjelasan: 'Gabungan huruf dengan sukun.'},
      {arab: 'رَبِّ اغْفِرْ لِي', latin: 'rabbi-ghfir lii', penjelasan: 'Kalimat pendek dengan tasydid dan sukun.'},
      {arab: 'فَصَبْرٌ جَمِيلٌ', latin: 'fasabrun jamiilun', penjelasan: 'Kalimat pendek dengan sukun dan mad.'},
      {arab: 'مَرَّ يَحْزَن', latin: 'marra yahzan', penjelasan: 'Gabungan tasydid dan sukun.'},
      {arab: 'هُوَ اللهُ أَحَدٌ', latin: 'huwa allahu ahadun', penjelasan: 'Kalimat pendek dari surat Al-Ikhlas.'},
      {arab: 'مَا أَنْتَ', latin: 'maa anta', penjelasan: 'Kalimat pendek dengan mad dan sukun.'},
      {arab: 'لَمْ يَلِدْ', latin: 'lam yalid', penjelasan: 'Kalimat pendek dengan sukun.'},
      {arab: 'وَلَمْ يُولَدْ', latin: 'walam yuulad', penjelasan: 'Kalimat pendek dengan sukun.'},
      {arab: 'مَا لَهُ', latin: 'maa lahu', penjelasan: 'Kalimat pendek dengan mad.'},
      {arab: 'مَا أَدْرَاكَ', latin: 'maa adraaka', penjelasan: 'Kalimat pendek dengan mad dan sukun.'},
      {arab: 'مَا أَغْنَى', latin: 'maa aghnaa', penjelasan: 'Kalimat pendek dengan mad.'},
      {arab: 'مَا أَكْثَرَهُ', latin: 'maa aktharahu', penjelasan: 'Kalimat pendek dengan mad dan sukun.'},
      {arab: 'مَا أَصْبَرَهُمْ', latin: 'maa ashbarahum', penjelasan: 'Kalimat pendek dengan mad dan sukun.'},
      {arab: 'مَا أَضَلَّهُمْ', latin: 'maa adhallahum', penjelasan: 'Kalimat pendek dengan mad dan sukun.'},
      {arab: 'مَا أَغْنَاهُ', latin: 'maa aghnaahu', penjelasan: 'Kalimat pendek dengan mad.'},
      {arab: 'مَا أَغْنَى عَنْهُ', latin: 'maa aghnaa anhu', penjelasan: 'Kalimat pendek dengan mad.'},
      {arab: 'مَا أَغْنَى عَنْهُمْ', latin: 'maa aghnaa anhum', penjelasan: 'Kalimat pendek dengan mad.'},
      {arab: 'مَا أَغْنَى عَنْهَا', latin: 'maa aghnaa anhaa', penjelasan: 'Kalimat pendek dengan mad.'},
      {arab: 'مَا أَغْنَى عَنْهُ مَالُهُ', latin: 'maa aghnaa anhu maaluhu', penjelasan: 'Kalimat pendek dengan mad.'},
      {arab: 'مَا أَغْنَى عَنْهُ مَالُهُ وَمَا كَسَبَ', latin: 'maa aghnaa anhu maaluhu wamaa kasaba', penjelasan: 'Kalimat pendek dengan mad.'},
      {arab: 'مَا أَغْنَى عَنْهُ مَالُهُ وَمَا كَسَبَ وَمَا أَغْنَى', latin: 'maa aghnaa anhu maaluhu wamaa kasaba wamaa aghnaa', penjelasan: 'Kalimat pendek dengan mad.'},
      {arab: 'مَا أَغْنَى عَنْهُ مَالُهُ وَمَا كَسَبَ وَمَا أَغْنَى عَنْهُ', latin: 'maa aghnaa anhu maaluhu wamaa kasaba wamaa aghnaa anhu', penjelasan: 'Kalimat pendek dengan mad.'},
      {arab: 'مَا أَغْنَى عَنْهُ مَالُهُ وَمَا كَسَبَ وَمَا أَغْنَى عَنْهُمْ', latin: 'maa aghnaa anhu maaluhu wamaa kasaba wamaa aghnaa anhum', penjelasan: 'Kalimat pendek dengan mad.'},
      {arab: 'مَا أَغْنَى عَنْهُ مَالُهُ وَمَا كَسَبَ وَمَا أَغْنَى عَنْهَا', latin: 'maa aghnaa anhu maaluhu wamaa kasaba wamaa aghnaa anhaa', penjelasan: 'Kalimat pendek dengan mad.'},
      {arab: 'مَا أَغْنَى عَنْهُ مَالُهُ وَمَا كَسَبَ وَمَا أَغْنَى عَنْهُ مَالُهُ', latin: 'maa aghnaa anhu maaluhu wamaa kasaba wamaa aghnaa anhu maaluhu', penjelasan: 'Kalimat pendek dengan mad.'},
      {arab: 'مَا أَغْنَى عَنْهُ مَالُهُ وَمَا كَسَبَ وَمَا أَغْنَى عَنْهُ مَالُهُ وَمَا كَسَبَ', latin: 'maa aghnaa anhu maaluhu wamaa kasaba wamaa aghnaa anhu maaluhu wamaa kasaba', penjelasan: 'Kalimat pendek dengan mad.'}
    ];
    const gridTajwidDasar = [
      {arab: 'مَنْ يَعْمَلْ', latin: 'man ya\'mal', penjelasan: 'Idgham: nun sukun bertemu ya.'},
      {arab: 'أَنْبِتُوا', latin: 'anbituu', penjelasan: 'Iqlab: nun sukun bertemu ba.'},
      {arab: 'أَنْزَلْنَا', latin: 'anzalnaa', penjelasan: 'Ikhfa: nun sukun bertemu zay.'},
      {arab: 'مِنْ', latin: 'min', penjelasan: 'Izhar: nun sukun bertemu huruf halqi.'},
      {arab: 'مَنْ آمَنَ', latin: 'man aamana', penjelasan: 'Izhar: nun sukun bertemu alif.'},
      {arab: 'مَنْ يَقُولُ', latin: 'man yaquulu', penjelasan: 'Idgham: nun sukun bertemu ya.'},
      {arab: 'مِنْ بَعْدِ', latin: 'min ba\'di', penjelasan: 'Iqlab: nun sukun bertemu ba.'},
      {arab: 'مِنْ شَرٍّ', latin: 'min syarrin', penjelasan: 'Ikhfa: nun sukun bertemu syin.'},
      {arab: 'مِنْ قَبْلِ', latin: 'min qabli', penjelasan: 'Ikhfa: nun sukun bertemu qaf.'},
      {arab: 'مِنْ دُونِ', latin: 'min duuni', penjelasan: 'Ikhfa: nun sukun bertemu dal.'},
      {arab: 'مِنْ عِلْمٍ', latin: 'min ilmin', penjelasan: 'Ikhfa: nun sukun bertemu ain.'},
      {arab: 'مِنْ غَيْرِ', latin: 'min ghayri', penjelasan: 'Ikhfa: nun sukun bertemu ghain.'},
      {arab: 'مِنْ فَضْلِ', latin: 'min fadli', penjelasan: 'Ikhfa: nun sukun bertemu fa.'},
      {arab: 'مِنْ قَبْلِكُمْ', latin: 'min qablikum', penjelasan: 'Ikhfa: nun sukun bertemu qaf.'},
      {arab: 'مِنْ بَعْدِهِ', latin: 'min ba\'dihi', penjelasan: 'Iqlab: nun sukun bertemu ba.'},
      {arab: 'مِنْ مَالٍ', latin: 'min maalin', penjelasan: 'Ikhfa: nun sukun bertemu mim.'},
      {arab: 'مِنْ نِعْمَةٍ', latin: 'min ni\'matin', penjelasan: 'Ikhfa: nun sukun bertemu nun.'},
      {arab: 'مِنْ وَلِيٍّ', latin: 'min waliyyin', penjelasan: 'Ikhfa: nun sukun bertemu wau.'},
      {arab: 'مِنْ يَوْمٍ', latin: 'min yaumin', penjelasan: 'Ikhfa: nun sukun bertemu ya.'},
      {arab: 'مِنْ زَيْتُونٍ', latin: 'min zaituunin', penjelasan: 'Ikhfa: nun sukun bertemu zai.'},
      {arab: 'مِنْ سُوءٍ', latin: 'min suu-in', penjelasan: 'Ikhfa: nun sukun bertemu sin.'},
      {arab: 'مِنْ شَيْءٍ', latin: 'min syai-in', penjelasan: 'Ikhfa: nun sukun bertemu syin.'},
      {arab: 'مِنْ صَدَقَةٍ', latin: 'min sadaqatin', penjelasan: 'Ikhfa: nun sukun bertemu shad.'},
      {arab: 'مِنْ ضَرٍّ', latin: 'min darrin', penjelasan: 'Ikhfa: nun sukun bertemu dhad.'},
      {arab: 'مِنْ طَعَامٍ', latin: 'min tha\'amin', penjelasan: 'Ikhfa: nun sukun bertemu tha.'},
      {arab: 'مِنْ ظُلْمٍ', latin: 'min zhulmin', penjelasan: 'Ikhfa: nun sukun bertemu zha.'},
      {arab: 'مِنْ عَذَابٍ', latin: 'min adhaabin', penjelasan: 'Ikhfa: nun sukun bertemu ain.'},
      {arab: 'مِنْ غَفُورٍ', latin: 'min ghafuurin', penjelasan: 'Ikhfa: nun sukun bertemu ghain.'}
    ];
    const gridGhunnah = [
      {arab: 'إِنَّ', latin: 'inna', penjelasan: 'Ghunnah: nun bertasydid, dibaca dengung.'},
      {arab: 'ثُمَّ', latin: 'thumma', penjelasan: 'Ghunnah: mim bertasydid, dibaca dengung.'},
      {arab: 'عَمَّ', latin: 'amma', penjelasan: 'Ghunnah: mim bertasydid, dibaca dengung.'},
      {arab: 'إِنَّمَا', latin: 'innamaa', penjelasan: 'Ghunnah: nun bertasydid, dibaca dengung.'},
      {arab: 'غَنَّ', latin: 'ghanna', penjelasan: 'Ghunnah: nun bertasydid, dibaca dengung.'},
      {arab: 'يُمَنِّي', latin: 'yumannii', penjelasan: 'Ghunnah: nun bertasydid, dibaca dengung.'},
      {arab: 'مِنَّا', latin: 'minnaa', penjelasan: 'Ghunnah: nun bertasydid, dibaca dengung.'},
      {arab: 'عَنَّ', latin: 'anna', penjelasan: 'Ghunnah: nun bertasydid, dibaca dengung.'},
      {arab: 'مُمِدّ', latin: 'mumidd', penjelasan: 'Ghunnah: mim bertasydid, dibaca dengung.'},
      {arab: 'مُمَدّ', latin: 'mumadd', penjelasan: 'Ghunnah: mim bertasydid, dibaca dengung.'},
      {arab: 'مُمَكَّن', latin: 'mumakkan', penjelasan: 'Ghunnah: mim bertasydid, dibaca dengung.'},
      {arab: 'مُمَكَّنَة', latin: 'mumakkanah', penjelasan: 'Ghunnah: mim bertasydid, dibaca dengung.'},
      {arab: 'مُمَكَّنُون', latin: 'mumakkanuun', penjelasan: 'Ghunnah: mim bertasydid, dibaca dengung.'},
      {arab: 'مُمَكَّنِينَ', latin: 'mumakkaniin', penjelasan: 'Ghunnah: mim bertasydid, dibaca dengung.'},
      {arab: 'مُمَكَّنَات', latin: 'mumakkanat', penjelasan: 'Ghunnah: mim bertasydid, dibaca dengung.'},
      {arab: 'مُمَكَّنَاتٍ', latin: 'mumakkanatiin', penjelasan: 'Ghunnah: mim bertasydid, dibaca dengung.'},
      {arab: 'مُمَكَّنَةٌ', latin: 'mumakkanatun', penjelasan: 'Ghunnah: mim bertasydid, dibaca dengung.'},
      {arab: 'مُمَكَّنَةٍ', latin: 'mumakkanatin', penjelasan: 'Ghunnah: mim bertasydid, dibaca dengung.'},
      {arab: 'مُمَكَّنَةً', latin: 'mumakkanatan', penjelasan: 'Ghunnah: mim bertasydid, dibaca dengung.'},
      {arab: 'مُمَكَّنَةٌ', latin: 'mumakkanatun', penjelasan: 'Ghunnah: mim bertasydid, dibaca dengung.'},
      {arab: 'مُمَكَّنَةٍ', latin: 'mumakkanatin', penjelasan: 'Ghunnah: mim bertasydid, dibaca dengung.'},
      {arab: 'مُمَكَّنَةً', latin: 'mumakkanatan', penjelasan: 'Ghunnah: mim bertasydid, dibaca dengung.'},
      {arab: 'مُمَكَّنَةٌ', latin: 'mumakkanatun', penjelasan: 'Ghunnah: mim bertasydid, dibaca dengung.'},
      {arab: 'مُمَكَّنَةٍ', latin: 'mumakkanatin', penjelasan: 'Ghunnah: mim bertasydid, dibaca dengung.'},
      {arab: 'مُمَكَّنَةً', latin: 'mumakkanatan', penjelasan: 'Ghunnah: mim bertasydid, dibaca dengung.'}
    ];

    // Navigasi modal pop up grid lanjutan
    let lanjutanGridData = [];
    let lanjutanGridIndex = 0;
    function showLanjutanModal(item) {
      // Temukan data grid dan index
      const mode = getCurrentLanjutanMode();
      lanjutanGridData = getLanjutanGridData(mode);
      lanjutanGridIndex = lanjutanGridData.findIndex(x => x.arab === item.arab && x.latin === item.latin);
      renderLanjutanModal();
    }
    function renderLanjutanModal() {
      const item = lanjutanGridData[lanjutanGridIndex];
      document.getElementById('modal-arab').innerText = item.arab;
      document.getElementById('modal-nama').innerText = item.latin;
      document.getElementById('modal-bunyi').innerText = '';
      document.getElementById('modal-penjelasan').innerText = item.penjelasan;
      // Hapus navigasi panah lama jika ada
      const oldNav = document.getElementById('lanjutanModalNav');
      if (oldNav) oldNav.remove();
      // Tambahkan panah navigasi baru
      let navHtml = '';
      navHtml += `<div id='lanjutanModalNav' style='display:flex;justify-content:center;align-items:center;gap:10px;margin-top:1.5em;'>`;
      navHtml += `<button id='lanjutanPrevBtn' style='width:40px;height:40px;display:flex;align-items:center;justify-content:center;border-radius:50%;border:none;background:#e0e7ff;color:#5f5be3;font-size:1.5em;box-shadow:0 2px 8px #7b6cf610;transition:background 0.2s;${lanjutanGridIndex===0?'opacity:0.5;cursor:not-allowed;':''}' ${lanjutanGridIndex===0?'disabled':''} title=\"Sebelumnya\">&lt;</button>`;
      navHtml += `<span style='font-weight:700;color:#5f5be3;font-size:1.13em;min-width:70px;text-align:center;'>${lanjutanGridIndex+1} / ${lanjutanGridData.length}</span>`;
      navHtml += `<button id='lanjutanNextBtn' style='width:40px;height:40px;display:flex;align-items:center;justify-content:center;border-radius:50%;border:none;background:#e0e7ff;color:#5f5be3;font-size:1.5em;box-shadow:0 2px 8px #7b6cf610;transition:background 0.2s;${lanjutanGridIndex===lanjutanGridData.length-1?'opacity:0.5;cursor:not-allowed;':''}' ${lanjutanGridIndex===lanjutanGridData.length-1?'disabled':''} title=\"Berikutnya\">&gt;</button>`;
      navHtml += `</div>`;
      document.getElementById('modal-penjelasan').insertAdjacentHTML('afterend', navHtml);
      document.getElementById('hurufModal').style.display = 'flex';
      setTimeout(()=>{
        const prevBtn = document.getElementById('lanjutanPrevBtn');
        const nextBtn = document.getElementById('lanjutanNextBtn');
        if(prevBtn) prevBtn.onclick = ()=>{ if(lanjutanGridIndex>0){lanjutanGridIndex--;renderLanjutanModal();} };
        if(nextBtn) nextBtn.onclick = ()=>{ if(lanjutanGridIndex<lanjutanGridData.length-1){lanjutanGridIndex++;renderLanjutanModal();} };
      }, 10);
    }
    function getCurrentLanjutanMode() {
      // Cek tombol lanjutan yang aktif
      if(document.getElementById('btnMadPanjang').classList.contains('active')) return 'madpanjang';
      if(document.getElementById('btnTasydidSukun').classList.contains('active')) return 'tasydidsukun';
      if(document.getElementById('btnKalimatPendek').classList.contains('active')) return 'kalimatpendek';
      if(document.getElementById('btnTajwidDasar').classList.contains('active')) return 'tajwiddasar';
      if(document.getElementById('btnGhunnah').classList.contains('active')) return 'ghunnah';
      return '';
    }
    function getLanjutanGridData(mode) {
      if(mode==='madpanjang') return gridMadPanjang;
      if(mode==='tasydidsukun') return gridTasydidSukun;
      if(mode==='kalimatpendek') return gridKalimatPendek;
      if(mode==='tajwiddasar') return gridTajwidDasar;
      if(mode==='ghunnah') return gridGhunnah;
      return [];
        }
    </script>
</body>
</html> 