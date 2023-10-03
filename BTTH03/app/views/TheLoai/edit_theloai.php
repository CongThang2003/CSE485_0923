<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Category</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>
<div class="container-fluid vh-100 d-flex align-items-center justify-content-center">
    <form method="POST" class="w-50 border border-dark rounded-4 p-3">
        <h1 class="text-center">EDIT CATEGORY</h1>
        <?php
        if (isset($_GET['err'])) {
            if ($_GET['err'] === 'Edit success') {
                ?>
                <div class="text-white bg-success mb-2 ps-3 py-1 rounded">Edit category successfully</div>
                <?php
            } else {
                ?>
                <div class="text-white bg-danger mb-2 ps-3 py-1 rounded"><?= $_GET['err']; ?></div>
                <?php
            }
        }
        ?>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Category name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="tentheloai">
        </div>
        <div class="d-flex gap-2 justify-content-center">
            <button type="submit" class="btn btn-primary" name="btnEdit">Save</button>
            <a href=".?c=theloai" class="btn btn-danger">Cancel</a>
        </div>
    </form>
</div>
<script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html><?php
