<?php 
    include("connect.php");
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $theloai = $_POST['theloai'];
        $check_theloai = "SELECT COUNT(*) as SoLuong FROM theloai WHERE ten_tloai = '$theloai'";
        $stmt = $conn -> prepare($check_theloai);
        $stmt -> execute();
        $result = $stmt -> get_result();
        $row = $result -> fetch_assoc();
        if($row['SoLuong'] > 0) {
            header("Location: ../Admin/add_category.php?error=1");
        } else {
            $query = "INSERT INTO theloai(ten_tloai) VALUES ('$theloai')";
            $stmt = $conn -> prepare($query);
            $stmt -> execute();
            $result = $stmt -> get_result();
            header("Location: ../Admin/category.php");
        }
    } else {
        header("Location: ../Admin/add_category.php?error=1");
    }
?>