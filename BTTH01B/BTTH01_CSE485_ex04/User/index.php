<?php 
    session_start();
    include("connect.php");
    $query = "SELECT * FROM baiviet INNER JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia INNER JOIN theloai on baiviet.ma_tloai = theloai.ma_tloai";
    $stmt = $conn -> prepare($query);
    $stmt -> execute();
    $result = $stmt -> get_result();
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
        <?php include("layout_header.php"); ?>
        <!-- Phần content -->
        <div class="content">
            <div class="boc_slide" style="height: 60%;">
                <div id="slide">
                    <?php while($rows = $result -> fetch_assoc()) { ?>
                        <div class="item" style="background-image: url(../User/Images/<?php echo $rows['hinhanh']; ?>);">
                            <div class="content_item">
                                <div class="name"><?= $rows['ten_bhat']; ?></div>
                                <div class="des">Ca sĩ: <?= $rows['ten_tgia']; ?></div>
                                <button class="btn btn-outline-secondary bg-white">See more</button>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="buttons">
                        <button id="pre" class="btn btn-outline-secondary bg-white">
                            <i class="bi bi-arrow-left-short"></i>
                        </button>
                        <button id="next" class="btn btn-outline-secondary bg-white">
                            <i class="bi bi-arrow-right-short"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="list_card d-flex w-100 justify-content-around" style="height: 40%;">
                <?php
                    //Xác định số card mỗi trang
                    $itemsPage = 4;
                    if($_GET['page']) {
                        $currentPage = $_GET['page'];
                    } else {
                        $currentPage = 1;
                    }

                //Lấy dữ liệu theo LIMIT
                    if($_SERVER['REQUEST_METHOD'] === 'POST' || $_GET['key_search']) {
                            $key = $_POST['key_search'];
                    }
                    $offset = ($currentPage - 1) * $itemsPage;
                    $sql = "SELECT * FROM baiviet INNER JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia INNER JOIN theloai on baiviet.ma_tloai = theloai.ma_tloai WHERE baiviet.ten_bhat LIKE '%$key%' LIMIT $offset, $itemsPage";
                    $stmt = $conn -> prepare($sql);
                    $stmt -> execute();
                    $results = $stmt -> get_result();

                //Lấy số lượng trang
                    $sql1 = "SELECT COUNT(*) as SoLuong FROM baiviet WHERE baiviet.ten_bhat LIKE '%$key%'";
                    $stmt = $conn -> prepare($sql1);
                    $stmt -> execute();
                    $resultCount = $stmt -> get_result();
                    $rowCount = $resultCount -> fetch_assoc()['SoLuong'];
                    $totalPage = ceil($rowCount / $itemsPage);
                    // Tính trang trước đó
                    $prevPage = $currentPage - 1;

                    // Kiểm tra nếu đang ở trang đầu thì không có nút Previous
                    if ($currentPage > 1) {
                        echo '<button class="btn"><a href="index.php?page=' . $prevPage . '&key_search='. $key. '"><i class="bi bi-chevron-compact-left"></i></a></button>';
                    }
                    ?>

                <?php
                                        
                    while($row = $results -> fetch_assoc()) { ?>
                        <div class="card slide-left m-3" style="width: 18rem;">
                            <img src="../User/Images/<?php echo $row['hinhanh']; ?>" class="card-img-top" alt="...">
                            <div class="card-body text-center">
                                <a href="detail.php?tenbaihat=<?= $row['ten_bhat']; ?>"><?= $row['ten_bhat']; ?></a>
                            </div>
                        </div>
                <?php } ?>
                <?php 
                    $nextPage = $currentPage + 1;
                    if($currentPage < $totalPage) {
                        echo '<button class="btn"><a href="index.php?page='.$nextPage.'&key_search='.$key.'"><i class="bi bi-chevron-compact-right"></i></a></button>';
                    }
                ?>
            </div>
        </div>
        <!-- Phần footer -->
        <?php include("layout_footer.php"); ?>
    </div>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>