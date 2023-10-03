<?php
    include "../Admin/connect.php";
    if(isset($_GET['user_id'])) {
        $uid = $_GET['user_id'];
        $query = "UPDATE users SET status = 'Active' WHERE user_id = $uid";
        $stmt = $conn -> prepare($query);
        if($stmt->execute()) { ?>
            <p>You have successfully activated <a href="../Admin/login.php">Click to log in</a></p>
        <?php } else { ?>
            <p>You have not successfully activated</p>;
              <?php }
            } else { ?>
            <p>You have not successfully activated</p>

    <?php } ?>