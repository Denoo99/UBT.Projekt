<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Absolute Mall</title>
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
                <li><a href="Forma e kontaktit.html">Kontakti</a></li>
                <li><a href="admin_dashboard.php">Admin Dashboard</a></li>
            </ul>
        </nav>
    </header>
<div class="container">

   <div class="content">
      <h3>Përshëndetje <span>Admin</span></h3>
      <h1>Mirësevjen <span><?php echo $_SESSION['admin_name'] ?></span></h1>
      <p>Kjo është faqja e adminit</p>
      <a href="logout.php" class="btn">Log out</a>
   </div>

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
                    <li><a href="https://www.facebook.com/">Facebook</a></li>
                    <li><a href="https://x.com/?lang=en">Platforma X</a></li>
                    <li><a href="https://www.instagram.com/">Instagram</a></li>
                </ul>                
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Absolute Mall. Të drejtat e rezervuara.</p>
        </div>
    </footer>

</body>
</html>