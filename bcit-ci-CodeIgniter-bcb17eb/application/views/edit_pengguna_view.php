<!DOCTYPE html>
<html>
<head>
    <title>Edit Pengguna</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6fb; margin: 0; padding: 0; }
        .container { max-width: 400px; margin: 60px auto; background: #fff; border-radius: 10px; box-shadow: 0 2px 12px rgba(0,0,0,0.07); padding: 32px; }
        h2 { text-align: center; margin-bottom: 24px; }
        label { font-weight: bold; display: block; margin-bottom: 6px; }
        input[type="text"] { width: 100%; padding: 8px 10px; margin-bottom: 16px; border: 1px solid #ccc; border-radius: 4px; background: #f9f9f9; }
        button { width: 100%; padding: 10px; background: #4a69bd; color: #fff; border: none; border-radius: 4px; font-size: 16px; cursor: pointer; transition: background 0.2s; }
        button:hover { background: #1e3799; }
        .back-link { display: inline-block; margin-top: 12px; color: #4a69bd; text-decoration: none; border: 1px solid #4a69bd; padding: 6px 16px; border-radius: 4px; }
        .back-link:hover { background: #4a69bd; color: #fff; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Pengguna</h2>
        <form method="post">
            <label>Nama:</label>
            <input type="text" name="nama" value="<?= htmlspecialchars($pengguna['Nama']); ?>" required>
            <button type="submit">Simpan Perubahan</button>
        </form>
        <a href="<?php echo base_url('dashboard/pengguna'); ?>" class="back-link">Kembali ke Data Pengguna</a>
    </div>
</body>
</html> 