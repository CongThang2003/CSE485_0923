<?php 
    include("connect.php");
    if($_SERVER['REQUEST_METHOD'] === 'GET') {
        $matacgia = $_GET['id'];
        $query = "DELETE FROM tacgia WHERE ma_tgia = $matacgia";
        $remove_key = "DELETE FROM baiviet WHERE ma_tgia = $matacgia";
        $stmt = $conn -> prepare($remove_key);
        $stmt -> execute();
        $stmt = $conn -> prepare($query);
        $stmt -> execute();
        if($result = $stmt -> get_result()) {
            header("Location: ../Admin/author.php");
        } else {
            header("Location: ../Admin/author.php?error=1");
        }
    } else {
        header("Location: ../Admin/author.php?error=1");
    }
?>