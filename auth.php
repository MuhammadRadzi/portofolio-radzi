<?php
session_start();

// Dummy user data for authentication
// In a real application, you would fetch this from a database
$dummy_users = [
	'guru' => 'guru',
	'siswa' => 'siswa',
	'admin' => 'admin'
];

// Check if the form is submitted
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Check if the username and password match any dummy user
if (isset($dummy_users[$username]) && $dummy_users[$username] === $password) {
	// Set session variable for the user
	$_SESSION['user'] = $username;
	header("Location: welcome.php");
} else {
	// Redirect to login page with error
	header("Location: loginpage.php?error=1");
	exit;
};
