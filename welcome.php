<?php
session_start();

// Cek login
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$username = $_SESSION['user'];
$page = $_GET['page'] ?? 'home';

?>

<?php
require 'functions.php';
$siswa = mysqli_query($conn, "SELECT * FROM siswa");


if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "<script>
            alert('Data berhasil ditambahkan!');
            document.location.href = 'welcome.php?page=laporan';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal ditambahkan!');
            document.location.href = 'welcome.php?page=laporan';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>welcome</title>
    <link rel="stylesheet" href="style2.css">
</head>

<body>
    <div class="sidebar">
        <h2>Menu</h2>
        <a href="welcome.php?page=home">🏠 Home</a>
        <a href="welcome.php?page=nilai">📊 Nilai</a>
        <a href="welcome.php?page=kehadiran">📝 Kehadiran</a>
        <a href="welcome.php?page=jadwal">📅 Jadwal</a>
        <a href="welcome.php?page=pengaturan">⚙️ Pengaturan</a>
        <a href="welcome.php?page=laporan">📄 Laporan</a>
        <a href="logout.php" class="logout-btn">🚪 Logout</a>
    </div>


    <div class="content">
        <h2>Selamat datang, <?php echo htmlspecialchars($username); ?>!</h2>
        <?php
        switch ($page) {
            case 'home':
                echo "<h3>Selamat datang di halaman utama dashboard. Di sini kamu dapat melihat gambaran umum seluruh aktivitas dan informasi yang berkaitan dengan akunmu. Bagian ini biasanya berisi ringkasan nilai terbaru, status kehadiran bulan ini, pengumuman penting dari pihak sekolah atau instansi, serta agenda kegiatan yang akan datang. Dengan melihat halaman ini, kamu dapat langsung mengetahui informasi terkini tanpa harus membuka halaman lainnya satu per satu. Selain itu, pada beberapa sistem, halaman Home juga dapat menampilkan pesan pribadi atau notifikasi khusus sesuai peran pengguna.</h3>";
                break;
            case 'nilai':
                echo "<h3>Halaman ini menampilkan seluruh nilai yang telah diperoleh dari berbagai mata pelajaran atau modul pembelajaran. Data yang disajikan biasanya berupa tabel dengan kolom mata pelajaran, nilai tugas, nilai ujian, rata-rata, dan keterangan kelulusan. Kamu dapat menggunakan halaman ini untuk memantau perkembangan akademik dari waktu ke waktu, melihat peningkatan atau penurunan nilai, dan mengidentifikasi mata pelajaran yang memerlukan perhatian lebih. Beberapa sistem juga memungkinkan pengguna untuk mengunduh atau mencetak laporan nilai langsung dari halaman ini.</h3>";
                break;
            case 'kehadiran':
                echo "<h3>Halaman kehadiran menyajikan catatan lengkap mengenai absensi selama periode tertentu. Informasi yang ditampilkan mencakup jumlah kehadiran, izin, sakit, dan alfa (tidak hadir tanpa keterangan). Rekap kehadiran biasanya dilengkapi dengan persentase, sehingga memudahkan untuk mengevaluasi kedisiplinan. Fitur tambahan yang umum ditemui adalah filter berdasarkan bulan atau semester, serta grafik visual untuk memberikan gambaran yang lebih jelas mengenai pola kehadiran. Halaman ini bermanfaat untuk memastikan catatan absensi tetap terpantau dengan baik.</h3>";
                break;
            case 'jadwal':
                echo "<h3>Halaman ini berfungsi sebagai panduan kegiatan harian. Di dalamnya terdapat daftar lengkap mata pelajaran, jam pelajaran, nama pengajar, dan ruangan tempat kegiatan berlangsung. Jadwal biasanya tersusun rapi berdasarkan urutan hari dan jam, sehingga pengguna dapat dengan mudah mengetahui kegiatan yang akan diikuti. Pada beberapa sistem, halaman ini juga dilengkapi dengan fitur pengingat otomatis atau notifikasi jika jadwal mengalami perubahan mendadak. Dengan adanya halaman jadwal, risiko terlambat atau salah masuk kelas dapat diminimalkan.</h3>";
                break;
            case 'pengaturan':
                echo "<h3>Halaman pengaturan adalah pusat kontrol untuk memodifikasi berbagai preferensi akun. Pengguna dapat mengubah data profil seperti nama, alamat email, dan foto profil, mengganti kata sandi, mengatur keamanan akun, serta menyesuaikan tampilan dashboard sesuai keinginan. Beberapa sistem juga menyediakan opsi untuk mengaktifkan atau menonaktifkan notifikasi, mengubah bahasa, dan memilih tema warna. Halaman ini memungkinkan pengguna memiliki kendali penuh atas pengalaman penggunaan dashboard mereka.</h3>";
                break;
            case 'laporan':
        ?>
                <h3>Laporan Siswa</h3>
                <div class="form-container">
                    <h4>Tambah Siswa Baru</h4>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <label for="nama">Nama:</label>
                        <input type="text" id="nama" name="nama" required>

                        <label for="nis">NIS:</label>
                        <input type="text" id="nis" name="nis" required>

                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>

                        <label for="jurusan">Jurusan:</label>
                        <select name="jurusan" id="jurusan">
                            <option value=""></option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Sistem Informatika">Sistem Informatika</option>
                        </select>

                        <label for="gambar">Gambar Profil:</label>
                        <input type="file" name="gambar" id="gambar" accept="image/*">

                        <button type="submit" name="submit">Tambah Siswa</button>
                    </form>
                </div>

                <h4>Daftar Siswa</h4>
                <table border="1" cellpadding="10" cellspacing="0">
                    <thead>

                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>NIS</th>
                            <th>Email</th>
                            <th>Jurusan</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($siswa)): ?>
                            <tr>
                                <td colspan="7" style="text-align:center; padding:30px;">Data kosong.</td>
                            </tr>
                        <?php else: ?>
                            <?php
                            $i = 1;
                            $siswa = isset($siswa) ? $siswa : [];
                            foreach ($siswa as $row) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= htmlspecialchars($row['nama']); ?></td>
                                    <td><?= htmlspecialchars($row['nis']); ?></td>
                                    <td><?= htmlspecialchars($row['email']); ?></td>
                                    <td><?= htmlspecialchars($row['jurusan']); ?></td>
                                    <td><img src="image/<?= htmlspecialchars($row['gambar']); ?>" class="thumb"></td>
                                    <td class="aksi-btns">
                                        <a href="view.php?id=<?= $s['id']; ?>" class="view">Lihat</a>
                                        <a href="edit.php?id=<?= $s['id']; ?>" class="edit">Ubah</a>
                                        <a href="delete.php?id=<?= $s['id']; ?>" class="delete" onclick="return confirm('Hapus data <?= addslashes($s['nama']) ?>?')">Hapus</a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
        <?php
                break;
            default:
                echo "<h3>Halaman tidak ditemukan</h3>";
                break;
        }
        ?>
    </div>
</body>

</html>