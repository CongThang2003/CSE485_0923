<?php
    $servername = "localhost";
    $username = "root";
    $password = "123";
    $database = "btth01_cse485";
    $conn = mysqli_connect($servername, $username, $password, $database);
    if(!$conn) {
        die("Kết nối thất bại!");
    }
?>