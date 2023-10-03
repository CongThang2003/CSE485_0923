<?php
    include "../Admin/connect.php";
    if(isset($_POST['btnRegis'])) {
        $uname = $_POST['username'];
        $pass = $_POST['password'];
        $email = $_POST['email'];
        $query_check = "SELECT user_id FROM users WHERE username = '$uname' OR email = '$email'";
        $stmt = $conn->prepare($query_check);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($stmt->rowCount() > 0) {
            echo "Username or email already exist";
        } else {
            $query = "INSERT INTO users(username, password, functions, email, status) VALUES ('$uname', '$pass', 'User', '$email', 'Inactive')";
            $stmt = $conn->prepare($query);
            if($stmt->execute()) {
                $stmt = $conn->prepare($query_check);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                require_once "../PHPMailer/sendmail.php";
            } else {
                echo "Loi";
            }
        }
    }