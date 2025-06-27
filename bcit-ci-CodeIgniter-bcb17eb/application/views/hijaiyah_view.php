<!DOCTYPE html>
<html>
<head>
    <title>Daftar Huruf Hijaiyah</title>
</head>
<body>
    <h2>Daftar Huruf Hijaiyah</h2>
    <table border="1" cellpadding="8">
        <tr>
            <th>Huruf</th>
            <th>Nama</th>
        </tr>
        <?php foreach($huruf as $h): ?>
        <tr>
            <td style="font-size:2em; text-align:center;"> <?= $h['huruf']; ?> </td>
            <td> <?= $h['nama']; ?> </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="<?php echo site_url('dashboard'); ?>">Kembali ke Dashboard</a>
</body>
</html> 