<div class="form-container">
   <form action="" method="post">
      <h3>Log In</h3>
      <h3>Kyçu ne Web</h3>
      <?php if (isset($error)) { echo '<span class="error-msg">'.$error.'</span>'; } ?>
      <input type="email" name="email" required placeholder="Enter your email">
      <input type="password" name="password" required placeholder="Enter your password">
      <input type="submit" name="submit" value="Login Now" class="form-btn">
      <p>Don't have an account? <a href="register_form.php">Register now</a></p>
      <p>Nuk ke llogari? <a href="register_form.php">Hap nje tani</a></p>
   </form>
</div>

‎register_form.php
+2
-2
Original file line number	Diff line number	Diff line change
@@ -27,7 +27,7 @@
<body>
<div class="form-container">
   <form action="" method="post">
      <h3>Register Now</h3>
      <h3>Regjistrohu tani</h3>
      <?php if (isset($error)) { echo '<span class="error-msg">'.$error.'</span>'; } ?>
      <input type="text" name="name" required placeholder="Enter your name">
      <input type="email" name="email" required placeholder="Enter your email">
@@ -38,7 +38,7 @@
         <option value="admin">Admin</option>
      </select>
      <input type="submit" name="submit" value="Register Now" class="form-btn">
      <p>Already have an account? <a href="login_form.php">Log in now</a></p>
      <p>Keni nje llogari? <a href="login_form.php">Kyçu tani</a></p>
   </form>
</div>
</body>
