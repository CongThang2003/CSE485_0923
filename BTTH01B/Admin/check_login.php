<?php
    session_start();
    include("../Admin/connect.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $query = "SELECT * FROM users WHERE username = ? AND password = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows < 1) {
            header("Location: login.php?error=1");
        } else {
            $row = $result->fetch_assoc();
            if ($row['functions'] === 'admin') {
                header("Location: ../Admin/index.php");
            } else {
                $_SESSION['login']['username'] = $username;
                header("Location: ../User/index.php");
            }
        }
    } else {
    }
?>
