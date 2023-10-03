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
        if(empty($tieude) || empty($tenbaihat) || empty($matacgia) || empty($matheloai) || empty($tomtat) || empty($noidung) || empty($hinhanh)) {
            header("Location: ../Admin/add_posts.php?error=2");
        } else {
            $check_baiviet = "SELECT COUNT(*) as SoLuong FROM baiviet WHERE tieude = '$tieude'";
            $stmt = $conn -> prepare($check_baiviet);
            $stmt -> execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($row['SoLuong'] > 0) {
                header("Location: ../Admin/add_posts.php?error=1");
            } else {
                $query = "INSERT INTO baiviet(tieude, ten_bhat, ma_tloai, tomtat, noidung, ma_tgia, hinhanh) VALUES ('$tieude', '$tenbaihat', $matheloai, '$tomtat', '$noidung', $matacgia, '$hinhanh')";
                $stmt = $conn -> prepare($query);
                if($stmt -> execute()) {
                    header("Location: ../Admin/posts.php");
                } else {
                    header("Location: ../Admin/add_posts.php?error=1");
                }
            }
        }
    } else {
        header("Location: ../Admin/add_posts.php?error=1");
    }
?>