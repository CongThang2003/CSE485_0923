<?php
    include("connect.php");
    include("check_login.php");
    $nguoidung = "SELECT * FROM users";
    $theloai = "SELECT * FROM theloai";
    $tacgia = "SELECT * FROM tacgia";
    $baiviet = "SELECT * FROM baiviet";
    $stmt = $conn->prepare($nguoidung);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt = $conn->prepare($theloai);
    $stmt->execute();
    $result1 = $stmt->get_result();
    $stmt = $conn->prepare($tacgia);
    $stmt->execute();
    $result2 = $stmt->get_result();

    $stmt = $conn->prepare($baiviet);
    $stmt->execute();
    $result3 = $stmt->get_result();
    $row = [$result->num_rows, $result1->num_rows, $result2->num_rows, $result3->num_rows];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-fluid">
        <!-- Phần header -->
        <?php include("layout_header_admin.php"); ?>
        <!-- Phần body -->
        <div class="content_new d-flex justify-content-center align-items-center gap-4">
            <div class="content_new_items rounded-3 d-flex flex-column justify-content-center align-items-center">
                <span>Người dùng</span>
                <h2><?= $row[0]; ?></h2>
            </div>
            <div class="content_new_items rounded-3 d-flex flex-column justify-content-center align-items-center">
                <span>Thể loại</span>
                <h2><?= $row[1]; ?></h2>
            </div>
            <div class="content_new_items rounded-3 d-flex flex-column justify-content-center align-items-center">
                <span>Tác giả</span>
                <h2><?= $row[2]; ?></h2>
            </div>
            <div class="content_new_items rounded-3 d-flex flex-column justify-content-center align-items-center">
                <span>Bài viết</span>
                <h2><?= $row[3]; ?></h2>
            </div>
        </div>
        <!-- Phần footer -->
        <?php include("layout_footer.php"); ?>
    </div>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
