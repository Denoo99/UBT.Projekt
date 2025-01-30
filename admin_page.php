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
   <title>Faqja e Adminit</title>

   <!-- custom css file link  -->
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
                <li><a href="products.html">Produktet</a></li>
                <li><a href="about.html">Rreth Nesh</a></li>
                <li><a href="login.html">Login</a></li>
                <li><a href="Forma e kontaktit.html">Kontakti</a></li>
            </ul>
        </nav>
    </header>
<div class="container">

   <div class="content">
      <h3>Pershendetje <span>Admin</span></h3>
      <h1>Miresevjen <span><?php echo $_SESSION['admin_name'] ?></span></h1>
      <p>Kjo eshte faqja e adminit</p>
      <a href="login_form.php" class="btn">Log In</a>
      <a href="register_form.php" class="btn">Regjistrohu</a>
      <a href="logout.php" class="btn">Log out</a>
   </div>

</div>

</body>
</html>