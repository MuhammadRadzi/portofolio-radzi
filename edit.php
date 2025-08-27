<?php
// koneksi ke database
require 'functions.php';
$id = $_GET["id"];

// ambil data siswa berdasarkan id
$siswa = mysqli_query($conn, "SELECT * FROM siswa WHERE id = $id");
$row = mysqli_fetch_assoc($siswa);
$ubahDB = $row;

// cek apakah data submit berhasil diubah atau tidak
if (isset($_POST["submit"])) {
	if (ubah($_POST) > 0) {
		// jika data berhasil diubah
		echo "<script>
            alert('Data berhasil diubah!');
            document.location.href = 'welcome.php?page=laporan';
        </script>";
	} else {
		// jika data gagal diubah
		echo "<script>
            alert('Data gagal diubah!');
            document.location.href = 'welcome.php?page=laporan';
        </script>";
	}
}
?>
<form action="" method="post" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?= $ubahDB['id']; ?>">
	<input type="hidden" name="gambarLama" value="<?= $ubahDB['gambar']; ?>">

	<label>Nama:</label>
	<input type="text" name="nama" value="<?= $ubahDB['nama']; ?>" required>

	<label>NIS:</label>
	<input type="text" name="nis" value="<?= $ubahDB['nis']; ?>" required>

	<label>Email:</label>
	<input type="email" name="email" value="<?= $ubahDB['email']; ?>" required>

	<label>Jurusan:</label>
	<input type="text" name="jurusan" value="<?= $ubahDB['jurusan']; ?>">

	<label>Gambar:</label>
	<img src="image/cache/<?= $ubahDB['gambar']; ?>" width="100"><br>
	<input type="file" name="gambar">

	<button type="submit" name="submit">Update</button>
</form>