<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="../../plugin/bootstrap-5.1.1-dist/css/bootstrap.min.css">
</head>

<body>
    <?php if (isset($_SESSION['gagal'])) : ?>
        <div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
            Username <strong> <?php echo $_SESSION['gagal']; ?> </strong> Salah/tidak terdaftar
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
        if (isset($_SESSION['gagal'])) {
            unset($_SESSION['gagal']);
        }
        ?>
    <?php endif ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <h2 class="text-dark mt-5 text-center">Admin Login</h2>
                <div class="card my-5" style="width: 20rem;">
                    <form action="../../function/ceklogin-admin.php" method="POST" class=" card-body cardbody-color p-lg-5 align-bottom">
                        <div class="mb-3 input-group has-validation">
                            <input type="text" class="form-control" name="username" id="Username" aria-describedby="emailHelp" placeholder="User Name">
                            <div class="invalid-feedback">
                                Please choose a username.
                            </div>
                        </div>
                        <div class="mb-3 input-group has-validation">
                            <input type="password" class="form-control" name="password" id="password" placeholder="password">
                        </div>
                        <div class="text-center"><button type="submit" class="btn btn-dark px-5 mb-5 w-100">Login</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../../plugin/bootstrap-5.1.1-dist/js/bootstrap.min.js"></script>
</body>

</html>