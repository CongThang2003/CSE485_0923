<?php 
    include("connect.php");
    $tenbaihat = $_GET['tenbaihat'];
    $query = "SELECT * FROM baiviet INNER JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia INNER JOIN theloai on baiviet.ma_tloai = theloai.ma_tloai WHERE baiviet.ten_bhat = '$tenbaihat'";
    $stmt = $conn -> prepare($query);
    $stmt -> execute();
    $result = $stmt -> get_result();
    $row = $result -> fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-fluid">
        <!-- Phần header -->
        <?php include("layout_header.php"); ?>
        <!-- Phần content -->
        <div class="content pt-5">
            <div class="row">
                <div class="col-md-4 content-left">
                    <img src="../User/Images/<?php echo $row['hinhanh']; ?>" alt="">
                </div>
                <div class="col-md-8 content-right">
                    <p id="namebaihat"><?php echo $row['ten_bhat']; ?></p>
                    <p><span>Bài hát:</span> <?= $row['ten_bhat']; ?></p>
                    <p><span>Thể loại:</span> <?= $row['ten_tloai']; ?></p>
                    <p><span>Tóm tắt:</span> <?= $row['tomtat']; ?></p>
                    <p><span>Nội dung:</span> <?= $row['noidung']; ?></p>
                    <p><span>Tác giả:</span> <?= $row['ten_tgia']; ?></p>
                </div>
            </div>
        </div>
        <hr>
        <!-- Phần footer -->
        <div class="footer">
            <div class="w-100" style="text-align: center;">
                <span style="font-weight: 600;">TLU'S MUSIC GARDEN</span>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>