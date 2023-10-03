<?php
    session_start();
    include("../Admin/connect.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        if($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($row['functions'] === 'Admin' or $row['functions'] === 'admin') {
                $_SESSION['isLogin'] = $row['username'];
                header("Location: ../Admin/index.php");
            } else {
                $_SESSION['isLogin'] = $row['username'];
                header("Location: ../User/index.php");
            }
        } else {
            header("Location: ../Admin/login.php?error=1");
        }
    } else {
    }
?>
