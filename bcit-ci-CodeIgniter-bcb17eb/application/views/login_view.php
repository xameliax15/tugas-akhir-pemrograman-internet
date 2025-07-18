<!DOCTYPE html>
<html>
<head>
    <title>Pembelajaran Hijaiyah - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            min-height: 100vh;
            margin: 0;
            padding: 0;
            /* Bright, cheerful gradient */
            background: linear-gradient(120deg, #ffe066 0%, #a7f3d0 50%, #7b6cf6 100%);
            font-family: 'Segoe UI', 'Poppins', Arial, sans-serif;
            position: relative;
        }
        /* Pattern: Polkadot bubble */
        .pattern-dot {
            position: absolute;
            border-radius: 50%;
            opacity: 0.25;
            z-index: 0;
        }
        .pattern-dot.d1 { width: 80px; height: 80px; left: 8vw; top: 12vh; background: #fffbe6; }
        .pattern-dot.d2 { width: 50px; height: 50px; right: 10vw; top: 18vh; background: #fca5a5; }
        .pattern-dot.d3 { width: 60px; height: 60px; left: 20vw; bottom: 10vh; background: #a7f3d0; }
        .pattern-dot.d4 { width: 40px; height: 40px; right: 18vw; bottom: 8vh; background: #ffe066; }
        .pattern-dot.d5 { width: 30px; height: 30px; left: 50vw; top: 8vh; background: #7b6cf6; }
        .pattern-dot.d6 { width: 35px; height: 35px; right: 30vw; bottom: 18vh; background: #fffbe6; }
        .login-container {
            position: relative;
            z-index: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .login-box {
            background: rgba(255,255,255,0.92);
            border-radius: 18px;
            box-shadow: 0 8px 32px rgba(123,108,246,0.13);
            padding: 2.5em 2.2em 2em 2.2em;
            min-width: 320px;
            max-width: 96vw;
            text-align: left;
            margin: 0 auto;
        }
        .login-title {
            font-size: 2em;
            font-weight: 800;
            color: #5f5be3;
            margin-bottom: 0.2em;
            text-align: center;
            letter-spacing: 0.5px;
        }
        .login-subtitle {
            color: #7b809a;
            font-size: 1.1em;
            margin-bottom: 1.5em;
            text-align: center;
        }
        label {
            font-size: 1.08em;
            font-weight: 700;
            color: #232946;
            margin-bottom: 0.3em;
            display: block;
        }
        .input-group {
            position: relative;
            margin-bottom: 1.1em;
        }
        .input-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.25em;
            color: #7b6cf6;
            opacity: 0.85;
            pointer-events: none;
        }
        .toggle-password {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.18em;
            color: #7b809a;
            background: none;
            border: none;
            cursor: pointer;
            outline: none;
            padding: 0;
            opacity: 0.8;
        }
        .toggle-password:hover { color: #5f5be3; opacity: 1; }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 0.8em 2.5em 0.8em 2.5em;
            border-radius: 10px;
            border: 1.5px solid #d1d5db;
            font-size: 1.08em;
            font-family: inherit;
            background: #fff;
            color: #232946;
            font-weight: 600;
            box-sizing: border-box;
        }
        input[type="text"]:focus, input[type="password"]:focus {
            outline: none;
            border-color: #7b6cf6;
            background: #f3e8ff;
        }
        .login-actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.2em;
        }
        .login-actions label {
            font-size: 1em;
            font-weight: 500;
            color: #5f5be3;
            margin: 0;
            display: flex;
            align-items: center;
        }
        .login-actions input[type="checkbox"] {
            margin-right: 0.5em;
        }
        .forgot-link {
            color: #a7a7c7;
            font-size: 0.98em;
            text-decoration: none;
            transition: color 0.2s;
        }
        .forgot-link:hover { color: #5f5be3; }
        .login-btn {
            width: 100%;
            background: linear-gradient(90deg, #7b6cf6 0%, #5f5be3 100%);
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 0.9em 0;
            font-size: 1.15em;
            font-weight: 700;
            cursor: pointer;
            margin-bottom: 1em;
            box-shadow: 0 2px 8px rgba(123,108,246,0.10);
            transition: background 0.2s, transform 0.2s;
        }
        .login-btn:hover { background: linear-gradient(90deg, #5f5be3 0%, #7b6cf6 100%); transform: scale(1.03); }
        .google-btn {
            width: 100%;
            background: #fff;
            color: #5f5be3;
            border: 2px solid #7b6cf6;
            border-radius: 10px;
            padding: 0.8em 0;
            font-size: 1.08em;
            font-weight: 700;
            cursor: pointer;
            margin-bottom: 1em;
            transition: background 0.2s, color 0.2s;
        }
        .google-btn:hover { background: #f3e8ff; color: #232946; }
        .register-link {
            text-align: center;
            color: #a7a7c7;
            font-size: 1em;
            margin-top: 0.5em;
        }
        .register-link a {
            color: #5f5be3;
            text-decoration: none;
            font-weight: 700;
            margin-left: 0.2em;
        }
        .register-link a:hover { text-decoration: underline; }
        @media (max-width: 600px) {
            .login-box { padding: 1.2em 0.5em 1.2em 0.5em; min-width: 0; }
            .login-title { font-size: 1.3em; }
        }
    </style>
</head>
<body>
    <!-- Polkadot pattern background -->
    <div class="pattern-dot d1"></div>
    <div class="pattern-dot d2"></div>
    <div class="pattern-dot d3"></div>
    <div class="pattern-dot d4"></div>
    <div class="pattern-dot d5"></div>
    <div class="pattern-dot d6"></div>
    <div class="login-container">
        <form class="login-box" method="post" action="<?php echo site_url('auth/login'); ?>">
        <div class="login-title">Pembelajaran Hijaiyah</div>
        <div class="login-subtitle">Masuk untuk melanjutkan belajar</div>
            <label for="username">Email atau Username</label>
                <div class="input-group">
                <span class="input-icon">📧</span>
                <input type="text" id="username" name="username" required autofocus value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>">
                </div>
            <label for="password">Password</label>
                <div class="input-group">
                <span class="input-icon">🔒</span>
                <input type="password" id="password" name="password" required>
                <button type="button" class="toggle-password" onclick="togglePassword()" tabindex="-1" aria-label="Tampilkan Password"><span id="eyeIcon">👁️</span></button>
                </div>
            <div class="login-actions">
                <label><input type="checkbox" name="remember"> Ingat saya</label>
                    <a href="#" class="forgot-link">Lupa password?</a>
            </div>
            <button type="submit" class="login-btn">Masuk</button>
            <button type="button" class="google-btn">Masuk dengan Google</button>
            <div class="register-link">Belum punya akun? <a href="<?php echo site_url('auth/signup'); ?>">Daftar sekarang</a></div>
        </form>
    </div>
    <script>
    function togglePassword() {
        var pwd = document.getElementById('password');
        var eye = document.getElementById('eyeIcon');
        if (pwd.type === 'password') {
            pwd.type = 'text';
            eye.textContent = '🙈';
        } else {
            pwd.type = 'password';
            eye.textContent = '👁️';
        }
    }
    </script>
</body>
</html> 