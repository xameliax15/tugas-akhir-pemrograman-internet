<!DOCTYPE html>
<html>
<head>
    <title>Login - Hijaiyah</title>
    <style>
        body {
            background: #f7f7f7;
            font-family: Arial, sans-serif;
        }
        .login-container {
            background: #fff;
            padding: 32px 28px 24px 28px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            width: 320px;
            margin: 80px auto;
        }
        h2 {
            text-align: center;
            margin-bottom: 24px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 6px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 8px 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background: #f9f9f9;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #4a69bd;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.2s;
        }
        button:hover {
            background: #1e3799;
        }
        .error {
            color: #d63031;
            text-align: center;
            margin-bottom: 16px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <?php if(isset($error)) echo '<div class="error">'.$error.'</div>'; ?>
        <form method="post" action="<?php echo site_url('auth/login'); ?>">
            <label>Username:</label>
            <input type="text" name="username" required>
            <label>Password:</label>
            <input type="password" name="password" required>
            <button type="submit">Login</button>
        </form>
        <div style="text-align:center; margin-top:16px;">
            <a href="<?php echo site_url('auth/signup'); ?>" style="color:#4a69bd; text-decoration:none;">Belum punya akun? Sign Up</a>
        </div>
    </div>
</body>
</html> 