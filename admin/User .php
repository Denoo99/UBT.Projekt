<?php
class User {
    private $conn;

    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }

    public function login($email, $password) {
        $pass = md5($password);
        $select = "SELECT * FROM user_form WHERE email = ? AND password = ?";
        $stmt = $this->conn->prepare($select);
        $stmt->bind_param("ss", $email, $pass);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($row['user_type'] == 'admin') {
                $_SESSION['admin_name'] = $row['name'];
                header('location:admin_page.php');
            } elseif ($row['user_type'] == 'user') {
                $_SESSION['user_name'] = $row['name'];
                header('location:user_page.php');
            }
        } else {
            return 'Incorrect email or password!';
        }
    }

    public function register($name, $email, $password, $user_type) {
        $pass = md5($password);
        $select = "SELECT * FROM user_form WHERE email = ?";
        $stmt = $this->conn->prepare($select);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return 'User  already exists!';
        } else {
            $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES(?, ?, ?, ?)";
            $stmt = $this->conn->prepare($insert);
            $stmt->bind_param("ssss", $name, $email, $pass, $user_type);
            $stmt->execute();
            return 'Registration successful!';
        }
    }
}