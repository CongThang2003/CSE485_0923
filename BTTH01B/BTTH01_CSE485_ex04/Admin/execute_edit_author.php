<?php 
    include("connect.php");
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $matacgia = $_POST['matacgia'];
        $tentacgia = $_POST['tentacgia'];
        $hinhtacgia = $_POST['hinhtacgia'];
        $check_tontai = "SELECT * FROM tacgia WHERE ma_tgia != $matacgia AND (ten_tgia = '$tengiacgia' or hinh_tgia = '$hinhtacgia')";
        $stmt = $conn -> prepare($check_tontai);
        $stmt -> execute();
        $result = $stmt -> get_result();
        if($result->num_rows > 0) {
            header("Location: ../Admin/edit_author.php?error=$matacgia");
        } else {
            if(empty($matacgia) || empty($tentacgia)) {
                header("Location: ../Admin/edit_author.php?errors=2&matacgia=$matacgia");
            } else 
            {
                $query = "UPDATE tacgia SET ten_tgia = '$tentacgia', hinh_tgia = '$hinhtacgia' WHERE ma_tgia = $matacgia";
                $stmt = $conn -> prepare($query);
                $stmt -> execute();
                header("Location: ../Admin/author.php");
            }
        }
    } else {
        header("Location: ../Admin/add_author.php?error=1");
    }
?>
