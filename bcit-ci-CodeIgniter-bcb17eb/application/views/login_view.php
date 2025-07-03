<!DOCTYPE html>
<html>
<head>
    <title>Login - Hijaiyah</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;400&display=swap" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #7b6cf6 0%, #6c2eb7 100%);
            font-family: 'Montserrat', Arial, sans-serif;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(44, 44, 84, 0.13);
            padding: 40px 36px 32px 36px;
            width: 100%;
            max-width: 420px;
            margin: 40px 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-sizing: border-box;
        }
        .login-title {
            font-size: 2em;
            font-weight: 700;
            color: #fff;
            margin-bottom: 8px;
            text-align: center;
            letter-spacing: 0.5px;
            text-shadow: 0 2px 8px rgba(44,44,84,0.08);
        }
        .login-subtitle {
            color: #e0e7ff;
            font-size: 1.08em;
            margin-bottom: 24px;
            text-align: center;
        }
        .login-form {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .form-label {
            font-weight: 500;
            color: #232946;
            margin-bottom: 2px;
            font-size: 0.97em;
        }
        .input-group {
            position: relative;
        }
        .login-input {
            width: 100%;
            padding: 10px 40px 10px 14px;
            border: 1.5px solid #e5e9f2;
            border-radius: 8px;
            background: #f8fafc;
            font-size: 1em;
            outline: none;
            transition: border 0.2s;
            box-sizing: border-box;
        }
        .login-input:focus {
            border-color: #7b6cf6;
        }
        .login-input::placeholder {
            color: #b4b8d0;
            font-size: 0.97em;
        }
        .toggle-password {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #7b809a;
            font-size: 1.1em;
        }
        .login-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 2px;
        }
        .remember-me {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.95em;
            color: #7b809a;
        }
        .forgot-link {
            color: #a78bfa;
            font-size: 0.95em;
            text-decoration: none;
            transition: color 0.2s;
        }
        .forgot-link:hover {
            color: #6c2eb7;
        }
        .login-btn {
            width: 100%;
            padding: 11px 0;
            border: none;
            border-radius: 8px;
            background: linear-gradient(90deg, #a78bfa 0%, #3b82f6 100%);
            color: #fff;
            font-size: 1.08em;
            font-weight: 600;
            margin-top: 8px;
            margin-bottom: 8px;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(123,108,246,0.08);
            transition: background 0.2s;
        }
        .login-btn:hover {
            background: linear-gradient(90deg, #7b6cf6 0%, #2563eb 100%);
        }
        .divider {
            width: 100%;
            border: none;
            border-top: 1.2px solid #e5e9f2;
            margin: 14px 0 10px 0;
        }
        .google-btn {
            width: 100%;
            padding: 9px 0;
            border: 1.2px solid #e5e9f2;
            border-radius: 8px;
            background: #fff;
            color: #232946;
            font-size: 1em;
            font-weight: 500;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            cursor: pointer;
            transition: border 0.2s, box-shadow 0.2s;
        }
        .google-btn:hover {
            border-color: #7b6cf6;
            box-shadow: 0 2px 8px rgba(123,108,246,0.08);
        }
        .google-icon {
            width: 18px;
            height: 18px;
            display: inline-block;
        }
        .signup-link {
            text-align: center;
            margin-top: 14px;
            color: #7b809a;
            font-size: 0.97em;
        }
        .signup-link a {
            color: #a78bfa;
            text-decoration: none;
            font-weight: 500;
            margin-left: 4px;
        }
        .signup-link a:hover {
            color: #6c2eb7;
        }
        .error {
            color: #d63031;
            text-align: center;
            margin-bottom: 14px;
        }
        @media (max-width: 600px) {
            .login-card { max-width: 98vw; padding: 18px 4vw 14px 4vw; }
            .login-title { font-size: 1.3em; }
        }
    </style>
</head>
<body>
    <div style="width:100vw;min-height:100vh;display:flex;flex-direction:column;align-items:center;justify-content:center;">
        <div class="login-title">Pembelajaran Hijaiyah</div>
        <div class="login-subtitle">Masuk untuk melanjutkan belajar</div>
        <div class="login-card">
            <?php if(isset($error)) echo '<div class="error">'.$error.'</div>'; ?>
            <form class="login-form" method="post" action="<?php echo site_url('auth/login'); ?>">
                <div class="form-label">Email atau Username</div>
                <div class="input-group">
                    <input class="login-input" type="text" name="username" placeholder="Masukkan email atau username" required>
                </div>
                <div class="form-label">Password</div>
                <div class="input-group">
                    <input class="login-input" type="password" name="password" id="password" placeholder="Masukkan password" required>
                    <span class="toggle-password" onclick="togglePassword()">&#128065;</span>
                </div>
                <div class="login-row">
                    <label class="remember-me"><input type="checkbox" name="remember"> Ingat saya</label>
                    <a href="#" class="forgot-link">Lupa password?</a>
                </div>
                <button class="login-btn" type="submit">Masuk</button>
            </form>
            <hr class="divider">
            <button class="google-btn" type="button" onclick="alert('Fitur login Google belum tersedia!')">
                <svg class="google-icon" viewBox="0 0 24 24"><g><path fill="#4285F4" d="M12 12.2727V9.81818H19.0909C19.1818 10.2727 19.2727 10.8182 19.2727 11.4545C19.2727 14.0909 17.4545 16.3636 14.7273 16.3636C12.8182 16.3636 11.2727 15.0909 10.7273 13.3636H7.81818V15.8182C9.27273 18.1818 11.4545 19.6364 14.7273 19.6364C18.0909 19.6364 21 16.9091 21 13.6364C21 12.9091 20.9091 12.1818 20.8182 11.4545H12Z"/><path fill="#34A853" d="M10.7273 13.3636C10.5455 12.9091 10.4545 12.3636 10.4545 11.8182C10.4545 11.2727 10.5455 10.7273 10.7273 10.2727V7.81818H7.81818C7.27273 8.90909 7 10.0909 7 11.2727C7 12.4545 7.27273 13.6364 7.81818 14.7273L10.7273 13.3636Z"/><path fill="#FBBC05" d="M14.7273 7.63636C15.5455 7.63636 16.2727 7.90909 16.9091 8.36364L19.0909 6.18182C17.8182 5.09091 16.3636 4.36364 14.7273 4.36364C11.4545 4.36364 9.27273 6.81818 7.81818 9.18182L10.7273 10.2727C11.2727 8.54545 12.8182 7.63636 14.7273 7.63636Z"/><path fill="#EA4335" d="M14.7273 19.6364C11.4545 19.6364 9.27273 17.1818 7.81818 14.7273L10.7273 13.3636C11.2727 15.0909 12.8182 16.3636 14.7273 16.3636C16.3636 16.3636 17.8182 15.6364 19.0909 14.5455L16.9091 12.3636C16.2727 12.8182 15.5455 13.0909 14.7273 13.0909C13.0909 13.0909 11.8182 11.8182 11.8182 10.1818C11.8182 8.54545 13.0909 7.27273 14.7273 7.27273C15.5455 7.27273 16.2727 7.54545 16.9091 8L19.0909 5.81818C17.8182 4.72727 16.3636 4 14.7273 4C11.4545 4 9.27273 6.45455 7.81818 8.81818L10.7273 9.90909C11.2727 8.18182 12.8182 7.27273 14.7273 7.27273C16.3636 7.27273 17.8182 8.54545 17.8182 10.1818C17.8182 11.8182 16.3636 13.0909 14.7273 13.0909C13.0909 13.0909 11.8182 11.8182 11.8182 10.1818C11.8182 8.54545 13.0909 7.27273 14.7273 7.27273Z"/></g></svg>
                <span style="margin-left:8px;font-size:1em;font-weight:500;letter-spacing:0.01em;">Masuk dengan Google</span>
            </button>
            <div class="signup-link">
                Belum punya akun? <a href="<?php echo site_url('auth/signup'); ?>">Daftar sekarang</a>
            </div>
        </div>
    </div>
    <script>
    function togglePassword() {
        var pwd = document.getElementById('password');
        if (pwd.type === 'password') {
            pwd.type = 'text';
        } else {
            pwd.type = 'password';
        }
    }
    </script>
</body>
</html> 