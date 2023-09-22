<?php 
    $error = "";
    $mabaiviet = 0;
    if($_SERVER['REQUEST_METHOD'] === 'GET') {
        $mabaiviet = $_GET['id'];
    }
    if($_GET['error']) {
        $error = "Nội dung bạn sửa đã trùng với 1 tiêu đề nào đó trong bảng!";
        $mabaiviet = $_GET['error'];
    }
    if($_GET['errors'] == 2) {
        $error = "Không được bỏ trống trường!";
        $mabaiviet = $_GET['mabaiviet'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài viết</title>
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
            <form action="execute_edit_posts.php" class="d-flex flex-column align-items-center gap-3" method="POST">
                <h1>Sửa thông tin bài viết</h1>
                <div class="input-group w-75">
                    <span class="input-group-text" id="basic-addon1">Mã bài viết</span>
                    <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="mabaiviet" value="<?= $mabaiviet; ?>" readonly>
                </div>
                <div class="input-group w-75">
                    <span class="input-group-text" id="basic-addon1">Tiêu đề</span>
                    <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="tieude">
                </div>
                <div class="input-group w-75">
                    <span class="input-group-text" id="basic-addon1">Tên bài hát</span>
                    <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="tenbaihat">
                </div>
                <div class="input-group w-75">
                    <span class="input-group-text" id="basic-addon1">Mã thể loại</span>
                    <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="matheloai">
                </div>
                <div class="input-group w-75">
                    <span class="input-group-text" id="basic-addon1">Tóm tắt</span>
                    <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="tomtat">
                </div>
                <div class="input-group w-75">
                    <span class="input-group-text" id="basic-addon1">Nội dung</span>
                    <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="noidung">
                </div>
                <div class="input-group w-75">
                    <span class="input-group-text" id="basic-addon1">Mã tác giả</span>
                    <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="matacgia">
                </div>
                <div class="input-group w-75">
                    <span class="input-group-text" id="basic-addon1">Hình ảnh</span>
                    <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="hinhanh">
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
        
        window.location.href = 'category.php';
    });
</script>
    <script src="script.js"></scrip>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>