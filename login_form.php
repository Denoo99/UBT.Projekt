<?php
@include 'config.php';
session_start();

require_once 'Database.php'; // Include the Database class
require_once 'User .php'; // Include the User class (Fixed the space in file name)

$db = new Database();
$conn = $db->getConnection();
$user = new User($conn);

// Redirect logged-in users away from login page
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php"); // Redirect to dashboard or home page
    exit();
}

if (isset($_POST['submit'])) {
    $error = $user->login($_POST['email'], $_POST['password']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styles.css">

    <script>
        // Prevent back navigation
        window.history.pushState(null, "", window.location.href);
        window.onpopstate = function () {
            window.history.pushState(null, "", window.location.href);
        };

        // Clear session storage on page load
        window.onload = function () {
            sessionStorage.clear();
        };

        // Extra protection to disable back button
        history.pushState(null, null, location.href);
        window.onpopstate = function () {
            history.go(1);
        };
    </script>
</head>
<body>

<header class="navbar">
    <div class="logo">
        <a href="index.html"><img src="foto/absolute.png" alt="logo e absolute mall" width="130px" height="100px"></a>
    </div>
    
    <nav>
        <ul class="menu">
            <li><a href="index.html">Ballina</a></li>
            <li><a href="products.php">Produktet</a></li>
            <li><a href="about.html">Rreth Nesh</a></li>
            <li><a href="login_form.php">Login</a></li>
            <li><a href="Forma e kontaktit.html">Kontakti</a></li>
        </ul>
    </nav>
</header>

<div class="form-container">
    <form action="" method="post">
        <h3>Kyçu në Web</h3>
        <?php if (isset($error)) { echo '<span class="error-msg">'.$error.'</span>'; } ?>
        <input type="email" name="email" required placeholder="Enter your email">
        <input type="password" name="password" required placeholder="Enter your password">
        <input type="submit" name="submit" value="Login Now" class="form-btn">
        <p>Nuk ke llogari? <a href="register_form.php">Hap një tani</a></p>
    </form>
</div>

<footer>
    <div class="footer-content">
        <div class="footer-column">
            <h3>Absolute Mall</h3>
            <p>Tek ne, gjithçka më e lirë e më e mirë. Mos mendo dy herë, por bli menjëherë!</p>
        </div>
        <div class="footer-column">
            <h3>Kontakti jonë</h3>
            <p>Email: support@absolutemall.com</p>
            <p>Telefoni: +383 44/48/49 - 123456</p>
        </div>
        <div class="footer-column">
            <h3>Rrjetet tona sociale</h3>
            <ul class="social-links">
                <li><a href="https://www.facebook.com/"><i class="fab fa-facebook"></i> Facebook</a></li>
                <li><a href="https://x.com/?lang=en"><i class="fab fa-twitter"></i> Platforma X</a></li>
                <li><a href="https://www.instagram.com/"><i class="fab fa-instagram"></i> Instagram</a></li>
            </ul>                
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2024 Absolute Mall. Të drejtat e rezervuara.</p>
    </div>
</footer>

</body>
</html>
