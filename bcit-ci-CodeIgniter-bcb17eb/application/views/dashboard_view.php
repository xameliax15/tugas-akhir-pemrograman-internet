<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin - Hijaiyah</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            background: #f4f6fb;
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .tab-menu {
            display: flex;
            justify-content: center;
            background: #34495e;
            padding: 10px 0;
            gap: 8px;
        }
        .tab-menu a {
            color: #fff;
            text-decoration: none;
            padding: 8px 18px;
            border-radius: 4px;
            font-weight: 500;
            background: #4a69bd;
            margin: 0 2px;
            transition: background 0.2s;
        }
        .tab-menu a:hover, .tab-menu a.active {
            background: #1e3799;
        }
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 18px 0 10px 0;
            padding: 0 32px;
        }
        .top-bar .btn, .top-bar .logout {
            background: #4a69bd;
            color: #fff;
            padding: 8px 18px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            border: none;
            cursor: pointer;
            margin-left: 8px;
        }
        .top-bar .logout {
            background: #e74c3c;
        }
        .top-bar .logout:hover {
            background: #c0392b;
        }
        .center-bar {
            display: flex;
            justify-content: center;
            margin: 10px 0 24px 0;
        }
        .center-bar .btn {
            background: #27ae60;
            color: #fff;
            padding: 10px 28px;
            border-radius: 4px;
            font-weight: 500;
            border: none;
            cursor: pointer;
            font-size: 1em;
        }
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 24px;
            max-width: 1100px;
            margin: 0 auto;
        }
        .stat-box {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.07);
            padding: 28px 18px 24px 18px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .stat-label {
            font-size: 1.1em;
            color: #222f3e;
            margin-bottom: 8px;
        }
        .stat-value {
            font-size: 2.2em;
            font-weight: bold;
            color: #4a69bd;
            margin-bottom: 12px;
        }
        .stat-box .btn {
            background: #4a69bd;
            color: #fff;
            padding: 7px 18px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            border: none;
            cursor: pointer;
            font-size: 1em;
        }
        .stat-box .btn:hover {
            background: #1e3799;
        }
        @media (max-width: 700px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
            .top-bar, .center-bar {
                flex-direction: column;
                gap: 8px;
                padding: 0 8px;
            }
        }
    </style>
</head>
<body>
    <div class="tab-menu">
        <a href="#" class="active">Home</a>
        <a href="#">Fathah</a>
        <a href="#">Kasroh</a>
        <a href="#">Dhommah</a>
        <a href="#">Tanwin Fathah</a>
        <a href="#">Tanwin Dhommah</a>
        <a href="#">Tanwin Kasroh</a>
        <a href="#">Tajwid</a>
    </div>
    <div class="top-bar">
        <a href="<?php echo base_url('dashboard/pengguna'); ?>" class="btn">Data Pengguna</a>
        <a href="<?php echo base_url('auth/logout'); ?>" class="logout">Log Out</a>
    </div>
    <div class="center-bar">
        <a href="#" class="btn">Tambah Huruf</a>
    </div>
    <div class="dashboard-grid">
        <div class="stat-box">
            <div class="stat-label">Total Pengguna</div>
            <div class="stat-value"><?php echo $total_pengguna; ?></div>
            <a href="#" class="btn">Pengguna Input</a>
        </div>
        <div class="stat-box">
            <div class="stat-label">Total Huruf Fathah</div>
            <div class="stat-value"><?php echo $total_fathah; ?></div>
            <a href="#" class="btn">Lihat Lainnya</a>
        </div>
        <div class="stat-box">
            <div class="stat-label">Total Huruf Kasroh</div>
            <div class="stat-value"><?php echo $total_kasroh; ?></div>
            <a href="#" class="btn">Lihat Lainnya</a>
        </div>
        <div class="stat-box">
            <div class="stat-label">Total Huruf Dhommah</div>
            <div class="stat-value"><?php echo $total_dhommah; ?></div>
            <a href="#" class="btn">Lihat Lainnya</a>
        </div>
        <div class="stat-box">
            <div class="stat-label">Total Huruf Tanwin Fathah</div>
            <div class="stat-value"><?php echo $total_tanwin_fathah; ?></div>
            <a href="#" class="btn">Lihat Lainnya</a>
        </div>
        <div class="stat-box">
            <div class="stat-label">Total Huruf Tanwin Kasroh</div>
            <div class="stat-value"><?php echo $total_tanwin_kasroh; ?></div>
            <a href="#" class="btn">Lihat Lainnya</a>
        </div>
        <div class="stat-box">
            <div class="stat-label">Total Huruf Tanwin Dhommah</div>
            <div class="stat-value"><?php echo $total_tanwin_dhommah; ?></div>
            <a href="#" class="btn">Lihat Lainnya</a>
        </div>
        <div class="stat-box">
            <div class="stat-label">Total Huruf Tajwid</div>
            <div class="stat-value"><?php echo $total_tajwid; ?></div>
            <a href="#" class="btn">Lihat Lainnya</a>
        </div>
    </div>
</body>
</html> 