<?php
session_start();
// Check if the user is already logged in	
if (!isset($_SESSION['user'])) {
	header("Location: loginpage.php");
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="refresh" content="5;url=index.html">
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

	</style>
</head>
<body>
	<h1>Selamat Datang, <?php echo $_SESSION['user']; ?>!</h1>
	<p>Anda telah berhasil masuk ke sistem.</p>

	<p>Redirecting in <span id="countdown">5</span> seconds...</p>
<script>
  let seconds = 5;
  const countdownEl = document.getElementById("countdown");
  setInterval(() => {
    seconds--;
    countdownEl.textContent = seconds;
    if (seconds <= 0) {
      window.location.href = "index.html";
    }
  }, 1000);
</script>
</body>

</html>