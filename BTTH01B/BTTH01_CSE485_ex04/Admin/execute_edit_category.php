<?php 
    include("connect.php");
    if(isset($_POST['btnECate'])) {
        $matheloai = $_POST['matheloai'];
        $tentheloai = $_POST['tentheloai'];
        $query_check = "SELECT * FROM theloai WHERE ma_tloai != $matheloai AND ten_tloai = '$tentheloai'";
        $stmt = $conn->prepare($query_check);
        $stmt->execute();
        if($stmt->rowCount() > 0) {
            header("Location: ../Admin/edit_category.php?error=$matheloai");
        } else {
            if(empty($matheloai) || empty($tentheloai)) {
                header("Location: ../Admin/edit_category.php?errors=2&matheloai=$matheloai");
            } else {
                $query = "UPDATE theloai SET ten_tloai = '$tentheloai' WHERE ma_tloai = $matheloai";
                $stmt = $conn -> prepare($query);
                $stmt -> execute();
                header("Location: ../Admin/category.php");
            }
        }
    } else {
        header("Location: ../Admin/edit_category.php?error=$matheloai");
    }
?>
