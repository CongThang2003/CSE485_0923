<?php 
    include("connect.php");
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $matheloai = $_POST['matheloai'];
        $tentheloai = $_POST['tentheloai'];
        $check_tontai = "SELECT * FROM theloai WHERE ma_tloai != $matheloai AND ten_loai = '$tentheloai'";
        $stmt = $conn -> prepare($check_tontai);
        $stmt -> execute();
        $result = $stmt -> get_result();
        if($result->num_rows > 0) {
            header("Location: ../Admin/edit_category.php?error=$matheloai");
        } else {
            if(empty($matheloai) || empty($tentheloai)) {
                header("Location: ../Admin/edit_category.php?errors=2&matheloai=$matheloai");
            } else 
            {
                $query = "UPDATE theloai SET ten_tloai = '$tentheloai' WHERE ma_tloai = $matheloai";
                $stmt = $conn -> prepare($query);
                $stmt -> execute();
                header("Location: ../Admin/category.php");
            }
        }
    } else {
        header("Location: ../Admin/add_category.php?error=1");
    }
?>
