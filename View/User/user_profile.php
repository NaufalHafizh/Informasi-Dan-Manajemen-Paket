<?php
include '../../function/connect.php';
login_user();
$menghitung_huruf = strlen($_SESSION['username_user']);
$nama_depan = substr($_SESSION['username_user'], 0, 1);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="../../plugin/bootstrap-5.1.1-dist/css/bootstrap.min.css">

    <!-- fontawesome -->
    <link rel="stylesheet" href="../../plugin/fontawesome-free-5.15.4-web/css/all.css">

    <style>
        .card-form {

            margin-top: 100px;
        }
    </style>
</head>

<body style="background-color: #E9FDFF;">
    <section class="d-flex justify-content-center card-form">
        <div class="card shadow rounded" style="width: 50rem;">
            <div class="card-header bg-light">
                <h3 class="text-uppercase fw-bolder">Update Profile</h3>
            </div>
            <div class="card-body">
                <form action="../../function//login_register.php" method="POST">
                    <?php
                    $user_id = $_GET['user'];
                    $ubah_user = mysqli_query($con, "SELECT * FROM user_public WHERE Username = '$user_id'");

                    while ($update = mysqli_fetch_array($ubah_user)) {
                    ?>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Username</label>
                                <input type="text" class="form-control" name="username_pelanggan_ubah" value="<?= $update['Username'] ?>" readonly> <br>
                            </div>
                            <div class="col-md-6">
                                <label for="">Old Password</label>
                                <input type="password" class="form-control" name="password_pelanggan_ubah" value="<?= $update['Password'] ?>" readonly>
                            </div>
                            <div class=" col-md-6">
                                <label for="">Email</label>
                                <input type="text" class="form-control" name="email_pelanggan_ubah" value="<?= $update['Email'] ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" name="nama_pelanggan_ubah" value="<?= $update['Nama'] ?>"> <br>
                            </div>
                            <div class="col">
                                <label for="">Alamat</label>
                                <textarea placeholder="Alamat Anda Kosong" class="form-control" name="alamat_pelanggan_ubah" id="" cols="30" rows="5"><?= $update['Alamat'] ?></textarea> <br>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <div>
                        <button type="submit" name="ubat_pelanggan" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script src="../../plugin/bootstrap-5.1.1-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>