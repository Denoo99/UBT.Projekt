<?php

session_start();

session_destroy();

header('location:login_form.php')

?>

<script>
    window.history.forward();
   </script>