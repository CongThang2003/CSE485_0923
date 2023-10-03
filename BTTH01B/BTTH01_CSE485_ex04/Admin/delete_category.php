<?php 
    include("connect.php");
    if($_SERVER['REQUEST_METHOD'] === 'GET') {
        $matheloai = $_GET['id'];
        $query = "DELETE FROM theloai WHERE ma_tloai = $matheloai";
        $remove_key = "DELETE FROM baiviet WHERE ma_tloai = $matheloai";
        $stmt = $conn -> prepare($remove_key);
        $stmt -> execute();
        $stmt = $conn -> prepare($query);
        if($stmt -> execute()) {
            header("Location: ../Admin/category.php");
        } else {
            header("Location: ../Admin/category.php?error=1");
        }
    } else {
        header("Location: ../Admin/add_category.php?error=1");
    }
?>