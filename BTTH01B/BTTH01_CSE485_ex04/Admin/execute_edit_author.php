<?php 
    include("connect.php");
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $matacgia = $_POST['matacgia'];
        $tentacgia = $_POST['tentacgia'];
        $hinhtacgia = $_POST['hinhtacgia'];
        if(empty($matacgia) || empty($tentacgia)) {
            header("Location: ../Admin/edit_author.php?errors=2&matacgia=$matacgia");
        } else {
            $check_tontai = "SELECT * FROM tacgia WHERE ma_tgia != $matacgia AND ten_tgia = '$tengiacgia' or hinh_tgia = '$hinhtacgia'";
            $stmt = $conn -> prepare($check_tontai);
            $stmt -> execute();
            if($stmt->rowCount() > 0) {
                header("Location: ../Admin/edit_author.php?error=$matacgia");
            } else {
                $query = "UPDATE tacgia SET ten_tgia = '$tentacgia', hinh_tgia = '$hinhtacgia' WHERE ma_tgia = $matacgia";
                $stmt = $conn -> prepare($query);
                if($stmt -> execute()) {
                    header("Location: ../Admin/author.php");
                } else {
                    header("Location: ../Admin/edit_author.php?error=1");
                }
            }
        }
    } else {
        header("Location: ../Admin/edit_author.php?error=1");
    }
?>
