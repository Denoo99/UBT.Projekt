<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
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
                <li><a href="login.html">Login</a></li>
                <li><a href="Forma e kontaktit.html">Kontakti</a></li>
            </ul>
        </nav>
    </header>
<div class="container">

   <div class="content">
      <h3>Pershendetje, <span>User</span></h3>
      <h1>Miresevjen <span><?php echo $_SESSION['user_name'] ?></span></h1>
      <p>Kjo eshte faqja e userit</p>
      <a href="logout.php" class="btn">logout</a>
   </div>
</div>

</body>
</html>