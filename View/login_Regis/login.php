<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="../../plugin/bootstrap-5.1.1-dist/css/bootstrap.min.css">
    <!-- mycss -->
    <link rel="stylesheet" href="../../css/styles.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="../../plugin/fontawesome-free-5.15.4-web/css/all.css">

</head>

<body id="bodylogin" class="">
    <?php if (isset($_SESSION['failed'])) : ?>
        <div class="alert alert-danger text-center alert-dismissible fade show fixed-top" role="alert">
            Username <strong> <?php echo $_SESSION['failed']; ?> </strong> Salah/tidak terdaftar
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
        if (isset($_SESSION['failed'])) {
            unset($_SESSION['failed']);
        }
        ?>
    <?php endif ?>
    <?php if (isset($_SESSION['berhasil'])) : ?>
        <div class="alert alert-success text-center alert-dismissible fade show fixed-top" role="alert">
            <p>Anda telah berhasil <strong>Register</strong> Silahkan Untuk <strong>Login</strong></p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
        if (isset($_SESSION['berhasil'])) {
            unset($_SESSION['berhasil']);
        }
        ?>
    <?php endif ?>
    <main class="form-signin1 justify-content-center d-flex">
        <div class="card mb-3 cardlogin border-0" style="width: 740px;">
            <div class="row g-0 shadow rounded-3" style="height: 400px;">
                <div class="col-md-6">
                    <div class="card-body justify-content-center text-center rounded-3">
                        <div class="sambutan text-white">
                            <p class="fw-bold fs-4">Selamat Datang Kembali!</p>
                            <p>Login untuk mendapatkan pengelaman terbaik</p>
                        </div>
                        <a class="btn border border-light border-3 text-white rounded-pill fw-bold fs-4 tulisanregis" href="register.php"><i class="fas fa-arrow-left"></i> Register</i></a>
                    </div>
                    <div>

                    </div>
                </div>
                <div class="col-md-6 loginform">
                    <div class="card-body border-0">
                        <h1 class="d-flex justify-content-center fw-bold h1login">LOGIN</h1>
                        <form name="formlogin" class="was-validated" action="../../function/login_register.php" method="POST">
                            <div class="col mb-3">
                                <label for="exampleInputEmail1" class="form-label">Username</label>
                                <div class="input-group rounded-3">
                                    <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user-alt"></i></span>
                                    <input type="text" class="form-control" name="username_user" aria-describedby="addon-wrapping" required> <br>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Password</label>
                                <div class="input-group rounded-3">
                                    <span class="input-group-text" id="addon-wrapping"><i class="fas fa-lock"></i></span>
                                    <input type="password" class="form-control" name="password" aria-describedby="addon-wrapping" required>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mt-3 buttonlogin">
                                <button style="width: 200px;" name="login" type="submit" class="btnlogin">LOGIN</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="../../plugin/bootstrap-5.1.1-dist/js/bootstrap.min.js"></script>
</body>

</html>