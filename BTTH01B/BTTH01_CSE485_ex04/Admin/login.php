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

    <?php 
      $error = "";
      if($_GET['error'] && $_GET['error'] == 1) {
        $error = "Username or password không đúng!";
      }
    ?>

    <div class="container-fluid">
        <!-- Phần header -->
        <?php include("layout_header.php"); ?>
        <!-- Phần content -->
        <div class="content">
            <div class="form_sign">
                <div class="header_content d-flex">
                    <a href="">Sign In</a>
                    <div class="logo">
                        <i class="bi bi-facebook fs-1"></i>
                        <i class="bi bi-google fs-1"></i>
                        <i class="bi bi-twitter fs-1"></i>
                    </div>
                </div>
                <div class="body_content">
                    <form class="form_sign1" action="check_login.php" method="POST">
                        <div class="input-group mb-3 bg-white w-75 rounded-3 ms-5">
                            <div class="input-group-prepend d-flex justify-content-center">
                                <i class="bi bi-person-fill fs-4"></i>
                            </div>
                            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="username">
                        </div>
                        <div class="input-group mb-3 bg-white w-75 rounded-3 ms-5">
                            <div class="input-group-prepend d-flex justify-content-center">
                                <i class="bi bi-key-fill fs-4"></i>
                            </div>
                            <input type="text" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1" name="password">
                        </div>
                        <div class="error ms-5 bg-danger w-75 rounded-1 text-center">
                            <span class="py-3 text-white"><?= $error ?></span>
                        </div>
                        <div class="form-check ms-5">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                        </div>
                        <button type="submit" class="btn btn-warning ms-5">Login</button>
                    </form>
                </div>
                <div class="footer_content">
                    <div>Don't have an account?<a href="../Admin/register.php">Sign Up</a></div>
                    <div><a href="">Forgot your password?</a></div>
                </div>
            </div>
        </div>
        <!-- Phần footer -->
        <?php include("layout_footer.php"); ?>
    
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
