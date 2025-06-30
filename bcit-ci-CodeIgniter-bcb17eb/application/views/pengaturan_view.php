<!DOCTYPE html>
<html>
<head>
    <title>Pengaturan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { background: #f8fafc; font-family: 'Segoe UI', Arial, sans-serif; margin: 0; padding: 0; }
        .dashboard-container { display: flex; min-height: 100vh; }
        .sidebar { width: 250px; background: #fff; border-right: 1px solid #e5e9f2; display: flex; flex-direction: column; justify-content: space-between; }
        .sidebar .logo { font-size: 1.5em; font-weight: bold; color: #3b3f5c; padding: 32px 0 24px 32px; letter-spacing: 1px; }
        .sidebar nav { flex: 1; }
        .sidebar nav a { display: flex; align-items: center; padding: 14px 32px; color: #3b3f5c; text-decoration: none; font-size: 1.08em; border-left: 4px solid transparent; transition: background 0.2s, border 0.2s; margin-bottom: 2px; }
        .sidebar nav a.active, .sidebar nav a:hover { background: #f0f4fa; border-left: 4px solid #4a69bd; color: #4a69bd; }
        .sidebar .user-info { background: #f4f6fb; padding: 24px 32px; display: flex; align-items: center; gap: 16px; }
        .sidebar .user-info .avatar { width: 44px; height: 44px; background: #dbeafe; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.3em; color: #4a69bd; font-weight: bold; }
        .sidebar .user-info .details { display: flex; flex-direction: column; }
        .sidebar .user-info .details .name { font-weight: 600; color: #3b3f5c; }
        .sidebar .user-info .details .role { font-size: 0.95em; color: #7b809a; }
        .main-content { flex: 1; display: flex; flex-direction: column; background: #f8fafc; padding-left: 40px; padding-right: 40px; }
        .header { background: #fff; padding: 18px 36px; border-bottom: 1px solid #e5e9f2; display: flex; justify-content: space-between; align-items: center; }
        .header .title { font-size: 1.3em; font-weight: 600; color: #3b3f5c; }
        .header .logout { background: #e74c3c; color: #fff; padding: 8px 18px; border-radius: 4px; text-decoration: none; font-weight: 500; border: none; cursor: pointer; transition: background 0.2s; }
        .header .logout:hover { background: #c0392b; }
        .settings-row { display: flex; gap: 32px; margin-top: 40px; }
        .settings-panel, .admin-panel { background: #fff; border-radius: 14px; box-shadow: 0 2px 12px rgba(0,0,0,0.07); padding: 32px 32px 32px 32px; min-width: 320px; flex: 1; display: flex; flex-direction: column; }
        .settings-panel { max-width: 480px; }
        .admin-panel { max-width: 400px; }
        .panel-title { font-size: 1.15em; font-weight: bold; color: #232946; margin-bottom: 18px; }
        .form-label { font-weight: 500; color: #232946; margin-bottom: 8px; display: block; }
        .settings-input { width: 100%; padding: 12px 10px; border-radius: 7px; border: 1px solid #e5e9f2; font-size: 1.08em; margin-bottom: 18px; }
        .toggle-row { display: flex; align-items: center; gap: 16px; margin-bottom: 18px; }
        .toggle-label { font-size: 1em; color: #232946; }
        .toggle-switch { position: relative; display: inline-block; width: 44px; height: 24px; }
        .toggle-switch input { opacity: 0; width: 0; height: 0; }
        .slider { position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: #e5e9f2; border-radius: 24px; transition: .4s; }
        .slider:before { position: absolute; content: ""; height: 18px; width: 18px; left: 3px; bottom: 3px; background-color: white; border-radius: 50%; transition: .4s; }
        input:checked + .slider { background-color: #2563eb; }
        input:checked + .slider:before { transform: translateX(20px); }
        .save-btn { background: #22c55e; color: #fff; font-weight: 500; border: none; border-radius: 7px; padding: 14px 0; font-size: 1.1em; cursor: pointer; transition: background 0.2s; margin-top: 8px; }
        .save-btn:hover { background: #16a34a; }
        .admin-list { display: flex; flex-direction: column; gap: 12px; margin-bottom: 18px; }
        .admin-item { background: #f7faff; border-radius: 8px; padding: 14px 18px; display: flex; align-items: center; justify-content: space-between; }
        .admin-info { display: flex; flex-direction: column; }
        .admin-role { font-weight: 600; color: #232946; }
        .admin-email { color: #7b809a; font-size: 0.98em; }
        .admin-status { background: #e7fbe9; color: #22c55e; border-radius: 8px; padding: 4px 16px; font-size: 0.98em; font-weight: 500; }
        .add-admin-btn { background: #2563eb; color: #fff; font-weight: 500; border: none; border-radius: 7px; padding: 12px 0; font-size: 1.08em; cursor: pointer; transition: background 0.2s; width: 100%; }
        .add-admin-btn:hover { background: #1741a6; }
        @media (max-width: 900px) { .settings-row { flex-direction: column; gap: 18px; } .main-content { padding: 0 2vw; } }
    </style>
</head>
<body>
<?php $user_name = isset($user['Nama']) ? $user['Nama'] : 'Admin User'; $initial = strtoupper(substr($user_name, 0, 1)); ?>
<div class="dashboard-container">
    <div class="sidebar">
        <div>
            <div class="logo">Admin Panel</div>
            <nav>
                <a href="<?php echo site_url('dashboard'); ?>">Dashboard</a>
                <a href="<?php echo site_url('dashboard/pengguna'); ?>">Manajemen User</a>
                <a href="<?php echo site_url('dashboard/hijaiyah'); ?>">Konten Pembelajaran</a>
                <a href="<?php echo site_url('dashboard/analytics'); ?>">Analytics</a>
                <a href="<?php echo site_url('dashboard/laporan'); ?>">Laporan</a>
                <a href="#" class="active">Pengaturan</a>
            </nav>
        </div>
        <div class="user-info">
            <div class="avatar"><?php echo $initial; ?></div>
            <div class="details">
                <div class="name"><?php echo htmlspecialchars($user_name); ?></div>
                <div class="role">Super Admin</div>
            </div>
        </div>
    </div>
    <div class="main-content">
        <div class="header">
            <div class="title">Pengaturan</div>
            <a href="<?php echo site_url('auth/logout'); ?>" class="logout">Logout</a>
        </div>
        <div class="settings-row">
            <div class="settings-panel">
                <div class="panel-title">System Settings</div>
                <div class="form-label">Site Name</div>
                <input class="settings-input" type="text" value="Hijaiyah Learning Platform" />
                <div class="form-label">Max Users per Day</div>
                <input class="settings-input" type="number" value="100" />
                <div class="toggle-row">
                    <span class="toggle-label">Enable Registration</span>
                    <label class="toggle-switch">
                        <input type="checkbox" checked />
                        <span class="slider"></span>
                    </label>
                </div>
                <div class="toggle-row">
                    <span class="toggle-label">Maintenance Mode</span>
                    <label class="toggle-switch">
                        <input type="checkbox" />
                        <span class="slider"></span>
                    </label>
                </div>
                <button class="save-btn">Save Settings</button>
            </div>
            <div class="admin-panel">
                <div class="panel-title">Admin Management</div>
                <div class="admin-list">
                    <div class="admin-item">
                        <div class="admin-info">
                            <span class="admin-role">Super Admin</span>
                            <span class="admin-email">admin@hijaiyah.com</span>
                        </div>
                        <span class="admin-status">Active</span>
                    </div>
                    <div class="admin-item">
                        <div class="admin-info">
                            <span class="admin-role">Content Manager</span>
                            <span class="admin-email">content@hijaiyah.com</span>
                        </div>
                        <span class="admin-status">Active</span>
                    </div>
                </div>
                <button class="add-admin-btn">+ Add Admin</button>
            </div>
        </div>
    </div>
</div>
</body>
</html> 