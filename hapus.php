<?php
// koneksi ke database
require 'functions.php';

// ambil id
$id = $_GET['id'];

// cek apakah data submit berhasil dihapus atau tidak
if ( hapus($id) > 0) {
	// jika data berhasil dihapus
	echo "<script>
		alert('Data berhasil dihapus!');
		document.location.href = 'welcome.php?page=laporan';
	</script>";
} else {
	// jika data gagal dihapus
	echo "<script>
		alert('Data gagal dihapus!');
		document.location.href = 'welcome.php?page=laporan';
	</script>";
}
