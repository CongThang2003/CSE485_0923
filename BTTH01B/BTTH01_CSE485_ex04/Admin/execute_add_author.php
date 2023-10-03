<?php 
    include("connect.php");
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $tacgia = $_POST['tacgia'];
        $hinhanh = $_POST['hinhanh'];
        $check_tacgia = "SELECT COUNT(*) as SoLuong FROM tacgia WHERE ten_tgia = '$tacgia'";
        $stmt = $conn -> prepare($check_tacgia);
        $stmt -> execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row['SoLuong'] > 0) {
            header("Location: ../Admin/add_author.php?error=1");
        } else {
            $query = "INSERT INTO tacgia(ten_tgia, hinh_tgia) VALUES ('$tacgia', '$hinhanh')";
            $stmt = $conn -> prepare($query);
            $stmt -> execute();
            header("Location: ../Admin/author.php");
        }
    } else {
        header("Location: ../Admin/add_author.php?error=1");
    }
?>