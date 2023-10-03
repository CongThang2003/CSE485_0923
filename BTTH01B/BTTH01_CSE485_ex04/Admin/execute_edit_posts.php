<?php 
    include("connect.php");
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $mabaiviet = $_POST['mabaiviet'];
        $tieude = $_POST['tieude'];
        $tenbaihat = $_POST['tenbaihat'];
        $matheloai = $_POST['matheloai'];
        $tomtat = $_POST['tomtat'];
        $noidung = $_POST['noidung'];
        $matacgia = $_POST['matacgia'];
        $hinhanh = $_POST['hinhanh'];
        if(empty($mabaiviet) || empty($tieude) || empty($tenbaihat) || empty($matheloai) || empty($tomtat) || empty($noidung) || empty($matacgia) || empty($hinhanh)) {
            header("Location: ../Admin/edit_posts.php?errors=2&mabaiviet=$mabaiviet");
        } else {
            $check_tontai = "SELECT * FROM baiviet WHERE ma_bviet != $mabaiviet AND tieude = '$tieude'";
            $stmt = $conn -> prepare($check_tontai);
            $stmt -> execute();
            if($stmt->rowCount() > 0) {
                header("Location: ../Admin/edit_posts.php?error=$mabaiviet");
            } else {
                $query = "UPDATE baiviet SET tieude = '$tieude', ten_bhat = '$tenbaihat', ma_tloai = '$matheloai', tomtat = '$tomtat', noidung = '$noidung', ma_tgia = '$matacgia', hinhanh = '$hinhanh' WHERE ma_bviet = $mabaiviet";
                $stmt = $conn -> prepare($query);
                $stmt -> execute();
                header("Location: ../Admin/posts.php");
            }
        }
    } else {
        header("Location: ../Admin/edit_posts.php?error=1");
    }
?>
