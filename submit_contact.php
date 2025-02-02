<?php
@include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $query = "INSERT INTO contact_submissions (name, email, message) VALUES ('$name', '$email', '$message')";
    mysqli_query($conn, $query);
}
?>