<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } $theme = isset($_SESSION['theme']) ? $_SESSION['theme'] : 'light'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Pengaturan Akun</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { background: #f4f6fb; font-family: 'Segoe UI', Arial, sans-serif; margin: 0; padding: 0; }
        .settings-wrapper { display: flex; min-height: 100vh; }
        .sidebar {
            width: 260px;
            background: #fff;
            border-right: 1px solid #e0e6ed;
            padding: 32px 0 0 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .sidebar h3 {
            color: #5f5be3;
            font-size: 1.3em;
            margin: 0 0 32px 32px;
            font-weight: 700;
        }
        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .sidebar-menu li {
            margin-bottom: 8px;
        }
        .sidebar-menu button {
            width: 100%;
            background: none;
            border: none;
            color: #232946;
            text-align: left;
            padding: 12px 32px;
            font-size: 1em;
            font-weight: 500;
            cursor: pointer;
            border-left: 4px solid transparent;
            transition: background 0.15s, border-color 0.15s;
        }
        .sidebar-menu button.active, .sidebar-menu button:hover {
            background: #f0f4ff;
            border-left: 4px solid #5f5be3;
            color: #5f5be3;
        }
        .main-content {
            flex: 1;
            padding: 48px 32px;
            background: #f4f6fb;
            min-height: 100vh;
        }
        .setting-section { margin-bottom: 24px; }
        .setting-label { font-weight: 600; color: #232946; margin-bottom: 6px; display: block; }
        .setting-value { color: #7b809a; margin-bottom: 18px; display: block; }
        .btn { background: #7b6cf6; color: #fff; border: none; border-radius: 8px; padding: 10px 22px; font-size: 1em; font-weight: 600; cursor: pointer; transition: background 0.2s; }
        .btn:hover { background: #5f5be3; }
        .back-btn { background: #f472b6; margin-bottom: 18px; }
        .back-btn:hover { background: #a21caf; }
        @media (max-width: 800px) {
            .settings-wrapper { flex-direction: column; }
            .sidebar { width: 100%; border-right: none; border-bottom: 1px solid #e0e6ed; min-height: unset; }
            .main-content { padding: 32px 12px; }
        }
        <?php if($theme==='dark'): ?>
        body, .main-content { background: #181a20 !important; color: #e5e7eb !important; }
        .sidebar { background: #232946 !important; border-right: 1px solid #232946 !important; }
        .sidebar h3, .sidebar-menu button, .sidebar-menu button.active, .sidebar-menu button:hover { color: #ffe066 !important; }
        .sidebar-menu button.active, .sidebar-menu button:hover { background: #232946 !important; border-left: 4px solid #ffe066 !important; }
        .main-content, .setting-section, .setting-label, .setting-value { color: #ffe066 !important; }
        .btn { background: #232946 !important; color: #ffe066 !important; }
        .btn:hover { background: #ffe066 !important; color: #232946 !important; }
        .back-btn { background: #f472b6 !important; color: #fff !important; }
        .back-btn:hover { background: #a21caf !important; color: #fff !important; }
        input, select { background: #232946 !important; color: #ffe066 !important; border: 1px solid #ffe066 !important; }
        <?php endif; ?>
    </style>
    <script>
        function showSection(section) {
            // Hide all sections
            document.querySelectorAll('.content-section').forEach(function(el) {
                el.style.display = 'none';
            });
            // Remove active from all buttons
            document.querySelectorAll('.sidebar-menu button').forEach(function(btn) {
                btn.classList.remove('active');
            });
            // Show selected
            document.getElementById(section).style.display = 'block';
            document.getElementById('btn-' + section).classList.add('active');
        }
        window.onload = function() {
            showSection('profil');
        };
    </script>
</head>
<body<?php if($theme==='dark') echo ' style="background:#181a20;color:#e5e7eb;"'; ?>>
<div class="settings-wrapper">
    <nav class="sidebar">
        <h3>Pengaturan</h3>
        <ul class="sidebar-menu">
            <li><button id="btn-profil" onclick="showSection('profil')">Profil</button></li>
            <li><button id="btn-akun" onclick="showSection('akun')">Akun</button></li>
            <li><button id="btn-preferensi" onclick="showSection('preferensi')">Preferensi</button></li>
            <li><button id="btn-tentang" onclick="showSection('tentang')">Tentang Aplikasi</button></li>
            <li style="margin-top:32px"><button class="back-btn" onclick="window.location.href='<?php echo site_url('dashboard/user'); ?>'">&larr; Kembali ke Dashboard</button></li>
        </ul>
    </nav>
    <main class="main-content">
        <section id="profil" class="content-section">
            <h2>Profil</h2>
            <?php if(isset($error) && $error): ?>
                <div style="color:#d63031; font-weight:600; margin-bottom:14px;"> <?= htmlspecialchars($error) ?> </div>
            <?php endif; ?>
            <?php if(isset($success) && $success): ?>
                <div style="color:#27ae60; font-weight:600; margin-bottom:14px;"> <?= htmlspecialchars($success) ?> </div>
            <?php endif; ?>
            <form method="post" action="<?php echo site_url('dashboard/update_profile'); ?>" style="max-width:400px;">
                <div class="setting-section">
                    <span class="setting-label">Nama</span>
                    <input type="text" name="nama" value="<?php echo htmlspecialchars($user['Nama']); ?>" required style="margin-bottom:10px;width:100%;padding:8px 10px;border-radius:6px;border:1px solid #ccc;">
                </div>
                <div class="setting-section">
                    <span class="setting-label">Username</span>
                    <input type="text" name="username" value="<?php echo isset($user['Username']) ? htmlspecialchars($user['Username']) : htmlspecialchars($user['Nama']); ?>" style="margin-bottom:10px;width:100%;padding:8px 10px;border-radius:6px;border:1px solid #ccc;">
                </div>
                <button class="btn" type="submit">Simpan Profil</button>
            </form>
        </section>
        <section id="akun" class="content-section" style="display:none">
            <h2>Akun</h2>
            <?php if(isset(
                $error) && $error): ?>
                <div style="color:#d63031; font-weight:600; margin-bottom:14px;"> <?= htmlspecialchars($error) ?> </div>
            <?php endif; ?>
            <?php if(isset($success) && $success): ?>
                <div style="color:#27ae60; font-weight:600; margin-bottom:14px;"> <?= htmlspecialchars($success) ?> </div>
            <?php endif; ?>
            <form method="post" action="<?php echo site_url('dashboard/change_password'); ?>" style="margin-bottom:28px;">
                <div class="setting-section">
                    <span class="setting-label">Ubah Password</span>
                    <input type="password" name="old_password" placeholder="Password lama" required style="margin-bottom:10px;width:100%;padding:8px 10px;border-radius:6px;border:1px solid #ccc;">
                    <input type="password" name="new_password" placeholder="Password baru" required style="margin-bottom:10px;width:100%;padding:8px 10px;border-radius:6px;border:1px solid #ccc;">
                    <input type="password" name="confirm_password" placeholder="Konfirmasi password baru" required style="margin-bottom:10px;width:100%;padding:8px 10px;border-radius:6px;border:1px solid #ccc;">
                    <button class="btn" type="submit">Simpan Password</button>
                </div>
            </form>
            <div class="setting-section">
                <span class="setting-label">Hapus Akun</span>
                <form id="deleteAccountForm" method="post" action="<?php echo site_url('dashboard/delete_account'); ?>" style="display:inline;">
                    <button class="btn" type="button" style="background:#ef4444;" onclick="showDeleteModal()">Hapus Akun</button>
                </form>
            </div>
            <div id="deleteModal" style="display:none;position:fixed;top:0;left:0;width:100vw;height:100vh;background:rgba(0,0,0,0.18);z-index:1000;align-items:center;justify-content:center;">
                <div style="background:#fff;padding:32px 28px;border-radius:12px;box-shadow:0 2px 16px rgba(0,0,0,0.13);max-width:90vw;width:340px;text-align:center;">
                    <div style="font-size:1.15em;font-weight:600;margin-bottom:18px;color:#ef4444;">Yakin ingin menghapus akun Anda?</div>
                    <div style="color:#7b809a;margin-bottom:22px;">Aksi ini tidak dapat dibatalkan. Semua data Anda akan dihapus permanen.</div>
                    <button class="btn" style="background:#ef4444;margin-right:10px;" onclick="submitDeleteAccount()">Ya, Hapus</button>
                    <button class="btn" style="background:#7b809a;" onclick="hideDeleteModal()">Batal</button>
                </div>
            </div>
            <script>
            function showDeleteModal() {
                document.getElementById('deleteModal').style.display = 'flex';
            }
            function hideDeleteModal() {
                document.getElementById('deleteModal').style.display = 'none';
            }
            function submitDeleteAccount() {
                document.getElementById('deleteAccountForm').submit();
            }
            </script>
        </section>
        <section id="preferensi" class="content-section" style="display:none">
            <h2><?php echo (isset($_SESSION['language']) && $_SESSION['language']==='en') ? 'Preferences' : 'Preferensi'; ?></h2>
            <div class="setting-section">
                <span class="setting-label">Tema</span>
                <form method="post" action="<?php echo site_url('dashboard/update_theme'); ?>" style="display:inline;">
                    <select name="theme" style="padding:7px 12px;border-radius:6px;border:1px solid #ccc;">
                        <option value="light" <?php echo (isset($_SESSION['theme']) && $_SESSION['theme']==='light') ? 'selected' : ''; ?>>Terang</option>
                        <option value="dark" <?php echo (isset($_SESSION['theme']) && $_SESSION['theme']==='dark') ? 'selected' : ''; ?>>Gelap</option>
                    </select>
                    <button class="btn" type="submit" style="margin-left:8px;">Simpan</button>
                </form>
            </div>
            <div class="setting-section">
                <span class="setting-label">Bahasa</span>
                <form method="post" action="<?php echo site_url('dashboard/update_language'); ?>" style="display:inline;">
                    <select name="language" style="padding:7px 12px;border-radius:6px;border:1px solid #ccc;">
                        <option value="id" <?php echo (isset($_SESSION['language']) && $_SESSION['language']==='id') ? 'selected' : ''; ?>>Indonesia</option>
                        <option value="en" <?php echo (isset($_SESSION['language']) && $_SESSION['language']==='en') ? 'selected' : ''; ?>>English</option>
                    </select>
                    <button class="btn" type="submit" style="margin-left:8px;">Simpan</button>
                </form>
            </div>
        </section>
        <section id="tentang" class="content-section" style="display:none">
            <h2>Tentang Aplikasi</h2>
            <div class="setting-section">
                <span class="setting-label">Versi Aplikasi</span>
                <span class="setting-value">1.0.0</span>
            </div>
            <div class="setting-section">
                <span class="setting-label">Kontak Admin</span>
                <span class="setting-value">admin@hijaiyah-app.com</span>
            </div>
        </section>
    </main>
</div>
</body>
</html> 