<?php
session_start();
// Check if the user is already logged in	
if (!isset($_SESSION['user'])) {
	header("Location: login.php");
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Berhasil Login</title>
	<style>
		/* teksnya di tengah page, h1-nya diatas, p-nya dibawah */
		body {
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
			height: 100vh;
			background-color: #f0f0f0;
			font-family: Arial, sans-serif;
			overflow-y: hidden;
		}

		h1 {
			color: black;
			margin-bottom: 20px;
		}

		p {
			color: #555;
			font-size: 18px;
		}
		
		.back-button {
			margin-top: 20px;
		}
		.back-button a {
			text-decoration: none;
			color: #007bff;
			font-weight: bold;
		}
		.logout {
			margin-top: 20px;
			text-decoration: none;
			color: #ff0000;
			font-weight: bold;
		}
		.logout:hover {
			text-decoration: underline;
		}
		
	</style>
</head>
<body>
	<h1>Selamat Datang, <?php echo $_SESSION['user']; ?>!</h1>
	<p>Anda telah berhasil masuk ke sistem.</p>
	<p>Silakan lanjutkan ke halaman lain.</p>
	<!-- Link ke halaman lain, misalnya logout -->
	<div class="back-button">
		<a href="index.html">Back to Home</a>
	</div>
	<a class="logout" href="logout.php">Logout</a>
</body>

</html>