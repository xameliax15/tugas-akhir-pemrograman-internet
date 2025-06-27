<!DOCTYPE html>
<html>
<head>
    <title>Data Pengguna</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6fb; margin: 0; padding: 0; }
        .container { max-width: 900px; margin: 40px auto; background: #fff; border-radius: 10px; box-shadow: 0 2px 12px rgba(0,0,0,0.07); padding: 32px; }
        h2 { text-align: center; margin-bottom: 24px; }
        .action-bar { display: flex; gap: 24px; justify-content: flex-start; margin-bottom: 24px; }
        .action-btn {
            background: #4a69bd;
            color: #fff;
            font-size: 1.2em;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            padding: 18px 36px;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            transition: background 0.2s;
        }
        .action-btn:disabled {
            background: #b2bec3;
            color: #fff;
            cursor: not-allowed;
        }
        table { width: 100%; border-collapse: collapse; margin-bottom: 24px; }
        th, td { padding: 12px 14px; border: 1px solid #ddd; text-align: left; }
        th { background: #4a69bd; color: #fff; font-size: 1.1em; }
        tr:nth-child(even) { background: #f7f9fa; }
        .aksi { text-align: center; }
        .aksi-btn {
            background: #f1f2f6;
            border: none;
            border-radius: 6px;
            padding: 8px 10px;
            margin: 0 2px;
            cursor: pointer;
            font-size: 1.1em;
            transition: background 0.2s;
        }
        .aksi-btn:hover { background: #dfe4ea; }
        .back-link { display: inline-block; margin-top: 12px; color: #4a69bd; text-decoration: none; border: 1px solid #4a69bd; padding: 6px 16px; border-radius: 4px; }
        .back-link:hover { background: #4a69bd; color: #fff; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Data Pengguna</h2>
        <div class="action-bar">
            <button class="action-btn">Tambah pengguna</button>
            <button class="action-btn">Edit pengguna</button>
            <button class="action-btn" disabled>Ubah password</button>
        </div>
        <table>
            <tr>
                <th style="width:40px;">#</th>
                <th>Nama</th>
                <th>Username</th>
                <th style="width:120px; text-align:center;">Aksi</th>
            </tr>
            <?php $no=1; foreach($pengguna as $p): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($p['Nama']); ?></td>
                <td><?= isset($p['Username']) ? htmlspecialchars($p['Username']) : htmlspecialchars($p['Nama']); ?></td>
                <td class="aksi">
                    <button class="aksi-btn" title="Edit"><span>&#9998;</span></button>
                    <button class="aksi-btn" title="Ubah Password"><span>&#128273;</span></button>
                    <button class="aksi-btn" title="Hapus"><span>&#128465;</span></button>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <a href="<?php echo base_url('dashboard'); ?>" class="back-link">Kembali ke Dashboard</a>
    </div>
</body>
</html> 