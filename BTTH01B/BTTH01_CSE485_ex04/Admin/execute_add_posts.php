<?php 
    include("connect.php");
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $tieude = $_POST['tieude'];
        $tenbaihat = $_POST['tenbaihat'];
        $matheloai = $_POST['matheloai'];
        $tomtat = $_POST['tomtat'];
        $noidung = $_POST['noidung'];
        $matacgia = $_POST['matacgia'];
        $hinhanh = $_POST['hinhanh'];
        $check_baiviet = "SELECT COUNT(*) as SoLuong FROM baiviet WHERE tieude = '$tieude'";
        $stmt = $conn -> prepare($check_baiviet);
        $stmt -> execute();
        $result = $stmt -> get_result();
        $row = $result -> fetch_assoc();
        if($row['SoLuong'] > 0) {
            header("Location: ../Admin/add_posts.php?error=1");
        } else {
            $query = "INSERT INTO baiviet(tieude, ten_bhat, ma_tloai, tomtat, noidung, ma_tgia, hinhanh) VALUES ('$tieude', '$tenbaihat', '$matheloai', '$tomtat', '$noidung', '$matacgia', '$hinhanh')";
            $stmt = $conn -> prepare($query);
            $stmt -> execute();
            $result = $stmt -> get_result();
            header("Location: ../Admin/posts.php");
        }
    } else {
        header("Location: ../Admin/add_posts.php?error=1");
    }
?>