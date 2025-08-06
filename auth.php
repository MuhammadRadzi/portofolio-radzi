<?php
session_start();

// Dummy user data for authentication
// In a real application, you would fetch this from a database
$dummy_users = [
	'guru' => 'password123',
	'siswa' => 'siswa123',
	'admin' => 'admin'
];

// Check if the form is submitted
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Validate the username and password
if (isset($dummy_users[$username]) && $dummy_users[$username] === $password) {
	// Set session variable for the user
	$_SESSION['user'] = $username;
	header("Location: welcome.php");
} else {
	// Redirect to login page with error
	header("Location: loginpage.php?error=Invalid%20username%20or%20password");
}

