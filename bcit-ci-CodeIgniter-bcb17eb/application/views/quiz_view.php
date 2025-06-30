<!DOCTYPE html>
<html>
<head>
    <title>Kuis Hijaiyah</title>
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
        .logout-btn { background:#e74c3c;color:#fff;padding:8px 18px;border-radius:4px;text-decoration:none;font-weight:500;margin-left:12px;transition:background 0.2s; }
        .logout-btn:hover { background: #c0392b; }
        .container { max-width: 672px; margin: 38px auto 0 auto; padding: 0 18px; }
        .quiz-title { font-size: 2em; font-weight: 800; color: #5f5be3; text-align: center; margin-bottom: 24px; letter-spacing: 0.5px; }
        .quiz-card { background: linear-gradient(135deg, #f472b6 0%, #fda4af 100%); border-radius: 28px; box-shadow: 0 8px 32px rgba(91, 33, 182, 0.13); padding: 38px 32px 32px 32px; max-width: 672px; margin: 0 auto; display: flex; flex-direction: column; align-items: center; }
        .quiz-header { width: 100%; display: flex; justify-content: space-between; align-items: center; color: #fff; font-size: 1.08em; font-weight: 500; margin-bottom: 18px; }
        .quiz-progress-bg { width: 100%; height: 8px; background: rgba(255,255,255,0.25); border-radius: 8px; margin-bottom: 18px; }
        .quiz-progress-fill { height: 8px; background: #fff; border-radius: 8px; transition: width 0.4s cubic-bezier(.4,2.3,.3,1); }
        .quiz-huruf-circle { width: 90px; height: 90px; background: rgba(255,255,255,0.22); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 12px auto; }
        .quiz-huruf { font-size: 3.8em; color: #fff; font-weight: 800; }
        .quiz-question { color: #fff; font-size: 1.25em; font-weight: 500; text-align: center; margin-bottom: 24px; }
        .quiz-options { display: grid; grid-template-columns: 1fr 1fr; gap: 18px; width: 100%; margin-bottom: 8px; }
        .quiz-option { background: rgba(255,255,255,0.82); color: #be185d; font-size: 1.18em; font-weight: bold; border: none; border-radius: 14px; padding: 16px 0; box-shadow: 0 2px 12px rgba(0,0,0,0.07); cursor: pointer; transition: background 0.2s, color 0.2s, transform 0.18s; outline: none; }
        .quiz-option:hover:not([disabled]) { background: #fff; transform: translateY(-3px) scale(1.03); }
        .quiz-option.correct { background: #22c55e !important; color: #fff !important; }
        .quiz-option.wrong { background: #ef4444 !important; color: #fff !important; }
        .quiz-option[disabled] { opacity: 0.7; cursor: not-allowed; }
        .quiz-result { display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 48px 0; }
        .quiz-result .emoji { font-size: 4.5em; margin-bottom: 18px; }
        .quiz-result .result-title { color: #fff; font-size: 2em; font-weight: 800; margin-bottom: 10px; }
        .quiz-result .result-score { color: #fff; font-size: 1.25em; font-weight: 500; margin-bottom: 24px; }
        .quiz-result .restart-btn { background: #fff; color: #be185d; font-weight: 700; border: none; border-radius: 10px; padding: 14px 38px; font-size: 1.1em; cursor: pointer; transition: background 0.2s, color 0.2s; }
        .quiz-result .restart-btn:hover { background: #f3e8ff; color: #5f5be3; }
        @media (max-width: 700px) { .container, .quiz-card { max-width: 98vw; padding: 0 2vw; } .quiz-card { padding: 24px 4vw 18px 4vw; } }
        @media (max-width: 500px) { .quiz-card { padding: 12px 2vw 8px 2vw; } .quiz-title { font-size: 1.3em; } }
    </style>
</head>
<body>
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
    let quizQuestions = [];
    let currentQuestionIndex = 0;
    let score = 0;
    let quizState = 'active'; // 'active', 'answered', 'completed'
    let waktuMulai, waktuSelesai, jawabanDetail = [];

    function shuffle(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
        return array;
    }

    function generateQuizQuestions() {
        const selected = shuffle([...huruf]).slice(0, 10);
        quizQuestions = selected.map(q => {
            // Pilihan: 1 benar, 3 salah
            let options = [q.nama];
            let wrongs = shuffle(huruf.filter(h => h.nama !== q.nama)).slice(0, 3).map(h => h.nama);
            options = shuffle(options.concat(wrongs));
            return {
                letter: q.arab,
                correct: q.nama,
                options
            };
        });
    }

    function renderQuiz() {
        if (quizState === 'completed') {
            document.getElementById('quiz-area').innerHTML = `
                <div class="quiz-card">
                    <div class="quiz-result">
                        <div class="emoji">🎉</div>
                        <div class="result-title">Kuis Selesai!</div>
                        <div class="result-score">Skor Kamu: <b>${score}/10</b></div>
                        <button class="restart-btn" onclick="startQuiz()">Main Lagi</button>
                    </div>
                </div>
            `;
            return;
        }
        const q = quizQuestions[currentQuestionIndex];
        const progress = ((currentQuestionIndex) / 10) * 100;
        document.getElementById('quiz-area').innerHTML = `
            <div class="quiz-card">
                <div class="quiz-header">
                    <span>Pertanyaan ${currentQuestionIndex+1} dari 10</span>
                    <span>Skor: ${score}</span>
                </div>
                <div class="quiz-progress-bg">
                    <div class="quiz-progress-fill" style="width:${progress}%;"></div>
                </div>
                <div class="quiz-huruf-circle">
                    <span class="quiz-huruf">${q.letter}</span>
                </div>
                <div class="quiz-question">Apa nama huruf ini?</div>
                <div class="quiz-options">
                    ${q.options.map((opt, i) => `
                        <button class="quiz-option" id="opt${i}" onclick="answerQuiz('${opt}', this)">${opt}</button>
                    `).join('')}
                </div>
            </div>
        `;
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
            if (currentQuestionIndex >= 10) {
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
                total_soal: 10,
                benar: score,
                salah: 10 - score,
                waktu_mulai: waktuMulai.toISOString(),
                waktu_selesai: waktuSelesai.toISOString(),
                detail_jawaban: JSON.stringify(jawabanDetail)
            })
        });
    }

    function startQuiz() {
        currentQuestionIndex = 0;
        score = 0;
        quizState = 'active';
        generateQuizQuestions();
        jawabanDetail = [];
        waktuMulai = new Date();
        renderQuiz();
    }

    // Start quiz on load
    startQuiz();
    </script>
</body>
</html> 