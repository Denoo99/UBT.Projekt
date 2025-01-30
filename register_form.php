<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

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
   
<div class="form-container">

   <form action="" method="post">
      <h3>register now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="Vendos emrin">
      <input type="email" name="email" required placeholder="Vendos emailin">
      <input type="password" name="password" required placeholder="Vendos passwordin">
      <input type="password" name="cpassword" required placeholder="Konfirmo passwordin">
      <select name="user_type">
         <option value="user">user</option>
         <option value="admin">admin</option>
      </select>
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>Keni nje account? <a href="login_form.php">Kyçu tani</a></p>
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
                    <li><a href="https://www.facebook.com/">Facebook</a></li>
                    <li><a href="https://x.com/?lang=en">Platforma X</a></li>
                    <li><a href="https://www.instagram.com/">Instagram</a></li>
                    <li><a href="https://www.linkedin.com/">LinkedIn</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Absolute Mall. Të drejtat e rezervuara.</p>
        </div>
    </footer>


</body>
</html>