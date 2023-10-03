<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thể Loại</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./bootstrap-icons/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="container-fluid">
        <!--        Start Header-->
        <?php include_once APP_ROOT.'/app/views/includes/layout.php'; ?>
        <!--        End Header-->

        <!--        Start Content-->
        <div class="content">
            <a href=".?c=theloai&a=add" class="btn btn-success ms-5 mb-3">Thêm mới</a>
            <?php
            if (isset($_GET['err'])) {
                if ($_GET['err'] === 'Delete success') {
                    ?>
                    <div class="text-white bg-success mb-2 ps-3 py-1 rounded">Delete category successfully</div>
                    <?php
                } else {
                    ?>
                    <div class="text-white bg-danger mb-2 ps-3 py-1 rounded"><?= $_GET['err']; ?></div>
                    <?php
                }
            }
            ?>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên Thể Loại</th>
                    <th scope="col">Function</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($arrTheLoai as $item) { ?>
                    <tr>
                        <th scope="row"><?= $item['id']; ?></th>
                        <td><?= $item['tenTheLoai']; ?></td>
                        <td><a href=".?c=theloai&a=edit&id=<?= $item['id']; ?>"><i class="bi bi-pen fs-4 text-warning"></i></a>
                            <a href=".?c=theloai&a=remove&id=<?= $item['id']; ?>"><i class="bi bi-trash3 fs-4 text-danger"></i></a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>