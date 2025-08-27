<?php
session_start();

// username dan password dummy
$dummy_users = [
	'guru' => 'guru',
	'siswa' => 'siswa',
	'admin' => 'admin'
];

// cek apakah form login telah disubmit
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// cek jika username dan password cocok
if (isset($dummy_users[$username]) && $dummy_users[$username] === $password) {
	// simpan data user ke session
	$_SESSION['user'] = $username;
	header("Location: welcome.php");
} else {
	// jika login gagal, redirect kembali ke halaman login dengan pesan error
	header("Location: login.php?error=1");
	exit;
};
