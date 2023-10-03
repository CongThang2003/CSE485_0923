<!-- Phần header -->
<div class="header d-flex justify-content-between align-items-center p-4">
    <div class="header_left d-flex align-items-center gap-2">
        <img src="../User/Images/1music-for-life-logo.png" alt=""  style="width: 150px; height: auto;">
        <a href="../User/index.php" style="font-weight: 600;">TRANG CHỦ</a>
        <?php if($_SESSION['isLogin']) {
            ?>
            <span>Xin chào <?= $_SESSION['isLogin']; ?></span>
            <a href="../Admin/log_out.php"><i class="bi bi-box-arrow-right fs-3" style="color: red;"></i></a>
            <?php }else {
                ?>
                <a href="../Admin/login.php">ĐĂNG NHẬP<span style="color: red;"> (Vui lòng đăng nhập!)</span></a>
            <?php } ?>
    </div>
    <div class="header_right d-flex gap-2">
        <form action="../User/index.php" class="d-flex gap-2" method="POST">
            <input type="text" class="form-control" placeholder="Nội dung cần tìm" name="key_search">
            <button type="submit" class="btn btn-outline-secondary">Tìm</button>
        </form>
    </div>
</div>