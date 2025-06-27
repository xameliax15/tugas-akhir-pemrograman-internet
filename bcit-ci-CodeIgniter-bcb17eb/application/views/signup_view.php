<!DOCTYPE html>
<html>
<head>
    <title>Sign Up - Hijaiyah</title>
    <style>
        body {
            background: #f7f7f7;
            font-family: Arial, sans-serif;
        }
        .signup-container {
            background: #fff;
            padding: 32px 28px 24px 28px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            width: 340px;
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
        .success {
            color: #27ae60;
            text-align: center;
            margin-bottom: 16px;
        }
        .back-link {
            text-align: center;
            margin-top: 16px;
        }
        .back-link a {
            color: #4a69bd;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <h2>Sign Up</h2>
        <?php if(isset($error)) echo '<div class="error">'.$error.'</div>'; ?>
        <?php if(isset($success)) echo '<div class="success">'.$success.'</div>'; ?>
        <form method="post" action="<?php echo site_url('auth/signup'); ?>">
            <label>Username:</label>
            <input type="text" name="username" required>
            <label>Password:</label>
            <input type="password" name="password" required>
            <label>Konfirmasi Password:</label>
            <input type="password" name="password2" required>
            <button type="submit">Sign Up</button>
        </form>
        <div class="back-link">
            <a href="<?php echo site_url('auth'); ?>">Sudah punya akun? Login</a>
        </div>
    </div>
</body>
</html> 