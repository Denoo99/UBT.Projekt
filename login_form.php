<?php
@include 'config.php';
session_start();

require_once 'Database.php';
require_once 'User .php';

$db = new Database();
$conn = $db->getConnection();
$user = new User($conn);

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
      <h3>Kyçu ne Web</h3>
      <?php if (isset($error)) { echo '<span class="error-msg">'.$error.'</span>'; } ?>
      <input type="email" name="email" required placeholder="Vendos emailin">
      <input type="password" name="password" required placeholder="Vendos passwordin">
      <input type="submit" name="submit" value="Hyni tani" class="form-btn">
      <p>Nuk ke llogari? <a href="register_form.php">Hap nje tani</a></p>
   </form>
</div>


<footer>
        <div class="footer-content">
            <div class="footer-column">
                <h3>Absolute Mall</h3>
                <p>Tek ne, gjithqka më e lirë e më e mirë. Mos mendo dy herë, por bli menjëherë!</p>
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