<?php


if (isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

$students = [
    [
        'nama' => 'Muhammad Radzi Saleh',
        'nis' => '101234',
        'email' => 'nippon.pein14@gmail.com',
        'jurusan' => 'Rekayasa Perangkat Lunak',
        'gambar' => 'image/WIN_20241114_13_42_43_Pro.jpg'
    ]
];

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan - <?= htmlspecialchars($_SESSION['username']) ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 1500px;
            margin: 0 auto;
        }
        h1 {
            margin-bottom: 10px;
        }
        .top-bar {
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom: 15px;
        }
        .btn {
            display:inline-block;
            padding:6px 12px;
            background:#2d8f4f;
            color:white;
            text-decoration:none;
            border-radius:4px;
            font-size:14px;
        }
        .btn.secondary { background:#3498db; }
        .btn.danger { background:#c0392b; }
        table {
            width:100%;
            border-collapse:collapse;
            background:white;
            box-shadow: 0 1px 3px rgba(0,0,0,0.06);
        }
        th, td {
            padding:10px 12px;
            border-bottom:1px solid #eee;
            text-align:left;
            vertical-align:middle;
        }
        th {
            background:#fafafa;
            font-weight:600;
        }
        tr:last-child td { border-bottom: none; }
        .thumb {
            width:60px;
            height:60px;
            object-fit:cover;
            border-radius:6px;
            border:1px solid #ddd;
        }
        .aksi-btns a {
            margin-right:6px;
            font-size:13px;
            padding:6px 8px;
            border-radius:4px;
            text-decoration:none;
            color:white;
        }
        .aksi-btns .view { background:#27ae60; }
        .aksi-btns .edit { background:#f39c12; }
        .aksi-btns .delete { background:#e74c3c; }
        .note { color:#666; font-size:13px; margin-top:8px; }
        @media (max-width:800px) {
            .top-bar { flex-direction:column; align-items:flex-start; gap:8px; }
            th, td { font-size:14px; padding:8px; }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="top-bar">
        <div>
            <h1>Daftar Laporan Siswa</h1>
        </div>
        <div>
            <a href="welcome.php?page=laporan" class="btn secondary">Refresh</a>
            <a href="#" class="btn">Tambah Baru</a>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width:56px">No</th>
                <th>Gambar</th>
                <th>Nama</th>
                <th>NIS</th>
                <th>Email</th>
                <th>Jurusan</th>
                <th style="width:200px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($students)): ?>
                <tr>
                    <td colspan="7" style="text-align:center; padding:30px;">Data kosong.</td>
                </tr>
            <?php else: ?>
                <?php $no = 1; foreach ($students as $s): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td>
                        <img src="<?= htmlspecialchars($s['gambar']); ?>" style="width: 70%;" class="thumb">
                    </td>
                    <td><?= htmlspecialchars($s['nama']); ?></td>
                    <td><?= htmlspecialchars($s['nis']); ?></td>
                    <td><?= htmlspecialchars($s['email']); ?></td>
                    <td><?= htmlspecialchars($s['jurusan']); ?></td>
                    <td class="aksi-btns">
                        <!-- Ganti href sesuai route / handler yang kamu punya -->
                        <a href="view.php?nis=<?= urlencode($s['nis']); ?>" class="view">View</a>
                        <a href="edit.php?nis=<?= urlencode($s['nis']); ?>" class="edit">Edit</a>
                        <a href="delete.php?nis=<?= urlencode($s['nis']); ?>" class="delete" onclick="return confirm('Hapus data <?= addslashes($s['nama']) ?>?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

</div>
</body>
</html>
