<?php
@include 'config.php';
session_start();

require_once 'Database.php'; 
require_once 'User .php'; 

$db = new Database();
$conn = $db->getConnection();
$user = new User($conn);

if (isset($_POST['submit'])) {
    $error = $user->register($_POST['name'], $_POST['email'], $_POST['password'], $_POST['user_type']);
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
<div class="form-container">
   <form action="" method="post">
      <h3>Regjistrohu tani</h3>
      <?php if (isset($error)) { echo '<span class="error-msg">'.$error.'</span>'; } ?>
      <input type="text" name="name" required placeholder="Vendos emrin">
      <input type="email" name="email" required placeholder="Vendos emailin">
      <input type="password" name="password" required placeholder="Vendos passwordin">
      <input type="password" name="cpassword" required placeholder="Konfirmo passwordin">
      <select name="user_type">
         <option value="user">User </option>
         <option value="admin">Admin</option>
      </select>
      <input type="submit" name="submit" value="Regjistrohu tani" class="form-btn">
      <p>Keni nje llogari? <a href="login_form.php">Kyçu tani</a></p>
   </form>
</div>
</body>
</html>