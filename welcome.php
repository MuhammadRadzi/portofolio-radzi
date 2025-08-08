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
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
			background-color: #f4f4f4;
		}
        nav {
            background: #3a3a3aff;
            padding: 10px;
        }
        nav a {
            color: white;
            margin: 0 10px;
            text-decoration: none;
        }

		h2 {
			text-align: center;
			color: #333;
			margin-top: 20px;
		}
		
		.content {
			margin: auto 60px ;
		}
    </style>
</head>
<body>
    <nav>
        <a href="welcome.php?page=home">Home</a>
        <a href="welcome.php?page=nilai">Nilai</a>
        <a href="welcome.php?page=kehadiran">Kehadiran</a>
        <a href="welcome.php?page=jadal">Jadwal</a>
        <a href="welcome.php?page=pengaturan">Pengaturan</a>
        <a href="welcome.php?page=laporan">Laporan</a>
        <a href="logout.php">Logout</a>
    </nav>

    <h2>Selamat datang, <?php echo htmlspecialchars($username); ?>!</h2>

    <div class="content">
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
            case 'jadal': // typo dari 'jadwal' biar sesuai link
                echo "<h3>Halaman ini berfungsi sebagai panduan kegiatan harian. Di dalamnya terdapat daftar lengkap mata pelajaran, jam pelajaran, nama pengajar, dan ruangan tempat kegiatan berlangsung. Jadwal biasanya tersusun rapi berdasarkan urutan hari dan jam, sehingga pengguna dapat dengan mudah mengetahui kegiatan yang akan diikuti. Pada beberapa sistem, halaman ini juga dilengkapi dengan fitur pengingat otomatis atau notifikasi jika jadwal mengalami perubahan mendadak. Dengan adanya halaman jadwal, risiko terlambat atau salah masuk kelas dapat diminimalkan.</h3>";
                break;
            case 'pengaturan':
                echo "<h3>Halaman pengaturan adalah pusat kontrol untuk memodifikasi berbagai preferensi akun. Pengguna dapat mengubah data profil seperti nama, alamat email, dan foto profil, mengganti kata sandi, mengatur keamanan akun, serta menyesuaikan tampilan dashboard sesuai keinginan. Beberapa sistem juga menyediakan opsi untuk mengaktifkan atau menonaktifkan notifikasi, mengubah bahasa, dan memilih tema warna. Halaman ini memungkinkan pengguna memiliki kendali penuh atas pengalaman penggunaan dashboard mereka.</h3>";
                break;
            case 'laporan':
                echo "<h3>Halaman laporan menyediakan akses ke dokumen atau data yang telah dirangkum secara lengkap. Di sini pengguna dapat melihat laporan nilai per semester, laporan kehadiran, hingga laporan kegiatan ekstrakurikuler. Laporan biasanya disajikan dalam bentuk tabel atau grafik, dengan opsi untuk mengunduhnya dalam format PDF atau mencetaknya langsung. Halaman ini sangat berguna bagi siswa, orang tua, atau pihak sekolah untuk melakukan evaluasi dan perencanaan berdasarkan data yang telah terdokumentasi dengan baik.</h3>";
                break;
            default:
                echo "<h3>Halaman tidak ditemukan</h3>";
                break;
        }
        ?>
    </div>
</body>
</html>
