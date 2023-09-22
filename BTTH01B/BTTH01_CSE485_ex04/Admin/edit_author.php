<?php 
    $error = "";
    $matacgia = 0;
    if($_SERVER['REQUEST_METHOD'] === 'GET') {
        $matacgia = $_GET['id'];
    }
    if($_GET['error']) {
        $error = "Nội dung bạn sửa đã trùng với 1 tác giả nào đó trong bảng!";
        $matacgia = $_GET['error'];
    }
    if($_GET['errors'] == 2) {
        $error = "Không được bỏ trống 'tên tác giả'";
        $matacgia = $_GET['matheloai'];
    }
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

        <?php include("layout_header_admin.php"); ?>

        <!-- Phần body -->
        <div class="content_new d-flex flex-column justify-content-center">
            <form action="execute_edit_author.php" class="d-flex flex-column align-items-center gap-3" method="POST">
                <h1>Sửa thông tin tác giả</h1>
                <div class="input-group w-75">
                    <span class="input-group-text" id="basic-addon1">Mã tác giả</span>
                    <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="matacgia" value="<?= $matacgia; ?>" readonly>
                </div>
                <div class="input-group w-75">
                    <span class="input-group-text" id="basic-addon1">Tên tác giả</span>
                    <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="tentacgia">
                </div>
                <div class="input-group w-75">
                    <span class="input-group-text" id="basic-addon1">Hình tác giả</span>
                    <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="hinhtacgia">
                </div>
                <div class="error">
                    <span style="Color: red;"><?= $error; ?></span>
                </div>
                <div class="w-75 d-flex justify-content-end gap-2">
                    <button class="btn btn-success">Lưu lại</button>
                    <button class="btn btn-warning" id="goBackButton">Quay lại</button>
                </div>
            </form>
        </div>
        <!-- Phần footer -->

        <?php include("layout_footer.php"); ?>
        
    </div>
    <script>

    document.getElementById('goBackButton').addEventListener('click', function (e) {
        e.preventDefault();
        
        window.location.href = 'author.php';
    });
</script>
    <script src="script.js"></scrip>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>