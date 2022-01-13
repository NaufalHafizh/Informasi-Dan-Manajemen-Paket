<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="../../plugin/bootstrap-5.1.1-dist/css/bootstrap.min.css">
    <!-- mycss -->
    <link rel="stylesheet" href="../../css/styles.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="../../plugin/fontawesome-free-5.15.4-web/css/all.css">

</head>

<body id="bodylogin" class="">
    <main class="form-register1 justify-content-center d-flex">
        <div class="card mb-3 cardlogin border-0" style="width: 740px;">
            <div class="row g-0 shadow rounded-3" style="height: 560px;">
                <div class="col loginform">
                    <div class="card-body border-0">
                        <h1 class="d-flex justify-content-center fw-bold h1login">Register</h1>
                        <form name="formlogin" class="was-validated" action="../../function/login_register.php" method="POST" onsubmit="return validateForm()">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Username</label>
                                <div class="input-group flex-nowrap rounded-3">
                                    <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user-alt"></i></span>
                                    <input type="text" class="form-control" name="username" aria-describedby="addon-wrapping" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama</label>
                                <div class="input-group flex-nowrap rounded-3">
                                    <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user-friends"></i></span>
                                    <input type="text" class="form-control" name="nama" aria-describedby="addon-wrapping" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <div class="input-group flex-nowrap rounded-3">
                                    <span class="input-group-text" id="addon-wrapping"><i class="fas fa-envelope"></i></span>
                                    <input type="email" class="form-control" name="email" aria-describedby="addon-wrapping" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Password</label>
                                <div class="input-group flex-nowrap rounded-3">
                                    <span class="input-group-text" id="addon-wrapping"><i class="fas fa-lock"></i></span>
                                    <input type="password" class="form-control" name="password" aria-describedby="addon-wrapping" required>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mt-4 buttonlogin">
                                <button style="width: 200px;" type="submit" name="register" class="bntnregister">REGISTER</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col">
                    <div class="card-body justify-content-center text-center">
                        <div class="sambutan text-white">
                            <p class="fw-bold fs-4">Selamat Datang!</p>
                            <p>Regster untuk mendapatkan pengelaman terbaik</p>
                        </div>
                        <a class="btn border border-light border-3 text-white rounded-pill fw-bold fs-4 tulisanregis" href="login.php"><i class="fas fa-arrow-left"></i> Login</i></a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="../../plugin/bootstrap-5.1.1-dist/js/bootstrap.min.js"></script>
    <script src="../../js/validation.js"></script>
</body>

</html>