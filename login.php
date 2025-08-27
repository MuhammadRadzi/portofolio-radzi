<?php
session_start();
// Cek apakah user sudah login
if (isset($_SESSION['user'])) {
    header("Location: welcome.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Radzi</title>
    <link rel="stylesheet" href="loginstyle.css" />
    <link rel="stylesheet" href="style.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
</head>

<body>
    <div class="login-container" data-aos="flip-down">


        <form class="login-box" action="auth.php" method="POST">
            <h2>Login</h2>
            <input type="text" name="username" placeholder="Username" required />
            <input type="password" name="password" placeholder="Password" required />
            <a id="text" href="#">Forgot password?</a>
            <input type="submit" value="Login" />
            <?php if
            // tampilkan pesan error jika ada
            (isset($_GET['error'])): ?>
                <p class="error">Username atau password salah!</p>
            <?php endif; ?>
            <br><br><br>
            <div class="back-button">
                <a href="index.html">← Back to Home</a>
            </div>
            <a id="text" href="#">Create Account</a>
        </form>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 700,
            offset: 100, // Offset (in px) from the original trigger point
            once: false, // Animation only happens once
            easing: "ease-out-back"
        });
    </script>
</body>

</html>