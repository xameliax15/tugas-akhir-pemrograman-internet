<!DOCTYPE html>
<html>
<head>
    <title>Rekap Hasil Kuis User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { background: #f8fafc; font-family: 'Segoe UI', Arial, sans-serif; margin: 0; padding: 0; }
        .container { max-width: 1100px; margin: 40px auto; background: #fff; border-radius: 14px; box-shadow: 0 2px 12px rgba(0,0,0,0.07); padding: 32px; }
        h2 { color: #6c2eb7; margin-bottom: 24px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 24px; }
        th, td { padding: 10px 12px; border-bottom: 1px solid #e5e9f2; text-align: center; }
        th { background: #f3e8ff; color: #6c2eb7; font-weight: 600; }
        tr:last-child td { border-bottom: none; }
        .btn-back { background: #6c2eb7; color: #fff; padding: 10px 24px; border-radius: 7px; border: none; font-size: 1.08em; font-weight: 500; text-decoration: none; transition: background 0.2s; }
        .btn-back:hover { background: #4b1c7a; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Rekap Hasil Kuis User</h2>
        <table>
            <tr>
                <th>No</th>
                <th>Nama User</th>
                <th>Skor</th>
                <th>Benar</th>
                <th>Salah</th>
                <th>Total Soal</th>
                <th>Waktu Mulai</th>
                <th>Waktu Selesai</th>
                <th>Tanggal</th>
            </tr>
            <?php foreach($quiz_logs as $i => $q): ?>
            <tr>
                <td><?= $i+1 ?></td>
                <td><?= htmlspecialchars($q['Nama']) ?></td>
                <td><?= $q['skor'] ?></td>
                <td><?= $q['benar'] ?></td>
                <td><?= $q['salah'] ?></td>
                <td><?= $q['total_soal'] ?></td>
                <td><?= $q['waktu_mulai'] ?></td>
                <td><?= $q['waktu_selesai'] ?></td>
                <td><?= $q['tanggal'] ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <a href="<?= site_url('dashboard') ?>" class="btn-back">&larr; Kembali ke Dashboard</a>
    </div>
</body>
</html> 