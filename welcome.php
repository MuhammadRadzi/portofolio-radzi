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
<!DOCTYPE html>
<html>
<head>
    <title>welcome</title>
    <style>
		body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            height: 100vh;
        }
        .sidebar {
            width: 220px;
            background-color: #2c3e50;
            color: white;
            padding-top: 20px;
            flex-shrink: 0;
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .sidebar a {
            display: block;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #34495e;
        }
        .content {
            flex-grow: 1;
            padding: 20px;
            background-color: #ecf0f1;
            overflow-y: auto;
        }
        .logout-btn {
            background-color: #c0392b;
            color: white;
            padding: 10px 20px;
            display: block;
            margin-top: 20px;
            text-align: center;
            text-decoration: none;
        }
        .logout-btn:hover {
            background-color: #e74c3c;
		}   
    </style>
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
                include 'laporan.php';
                break;
            default:
                echo "<h3>Halaman tidak ditemukan</h3>";
                break;
        }
        ?>
    </div>
</body>
</html>