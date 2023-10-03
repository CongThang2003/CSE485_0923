<?php
  include("connect.php");
  $query = "SELECT ma_tloai, ten_tloai FROM theloai";
  $stmt = $conn -> prepare($query);
  $stmt->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thể loại</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-fluid">
        <!-- Phần header -->
        <?php include("layout_header_admin.php"); ?>
        <!-- Phần body -->
        <div class="content_new d-flex flex-column p-5">
            <div id="buttonss" class="w-100">
                <a href="add_category.php"><button class="btn btn-success">Thêm mới</button></a>
            </div>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên thể loại</th>
                    <th scope="col">Sửa</th>
                    <th scope="col">Xóa</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                      <th scope="row"><?= $row['ma_tloai']; ?></th>
                      <td><?= $row['ten_tloai']; ?></td>
                      <td><a href="edit_category.php?id=<?= $row['ma_tloai']; ?>"><i class="bi bi-pen-fill"></i></a></td>
                      <td>
                        <a href="" data-bs-toggle="modal" data-bs-target="#form_delete_<?= $row['ma_tloai']; ?>"><i class="bi bi-trash3-fill"></i></a>
                        <div class="modal fade" id="form_delete_<?= $row['ma_tloai']; ?>">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4>Xóa</h4>
                                <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
                              </div>
                              <div class="modal-body text-center">
                                Dữ liệu bạn muốn xóa có thể là khóa ngoại của bảng khác. Bạn có chắc chắn muốn xóa không?
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                <a href="delete_category.php?id=<?php echo $row['ma_tloai']; ?>"><button type="button" class="btn btn-success">Xác nhận</button></a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
        </div>
        <!-- Phần footer -->
        <?php include("layout_footer.php"); ?>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>