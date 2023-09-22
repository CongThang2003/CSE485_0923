<?php 
    include("connect.php");
    if($_SERVER['REQUEST_METHOD'] === 'GET') {
        $mabaiviet = $_GET['id'];
        $query = "DELETE FROM baiviet WHERE ma_bviet = $mabaiviet";
        $stmt = $conn -> prepare($query);
        $stmt -> execute();
        if($result = $stmt -> get_result()) {
            header("Location: ../Admin/posts.php");
        } else {
            header("Location: ../Admin/posts.php?error=1");
        }
    } else {
        header("Location: ../Admin/posts.php?error=1");
    }
?>