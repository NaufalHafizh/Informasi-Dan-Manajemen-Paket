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
    <title>Fast Parcel</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="../../plugin/bootstrap-5.1.1-dist/css/bootstrap.min.css">

    <!-- fontawesome -->
    <link rel="stylesheet" href="../../plugin/fontawesome-free-5.15.4-web/css/all.css">

    <style>
        .header {

            padding-top: 50px;
        }

        .paket-anda {

            padding-top: 50px;
        }

        #navigation {

            background-color: #87CEEB;
        }

        #welcome {

            padding-top: 5rem;
        }

        .tulisan1 {

            margin-top: 5rem;
        }

        #footer {

            padding-top: 9rem;
            padding-bottom: 5rem;
        }

        .home {

            margin-right: 20px;
        }
    </style>
</head>

<body>

</body style="background-color: #E9FDFF;">
<div class="">
    <nav id="navigation" class="navbar navbar-expand-lg shadow-sm text-uppercase">
        <div class="container">
            <h3 class="float-md-start text-dark fw-bold">Fast</h3>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-decoration-none" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="text-uppercase fw-bold text-dark btn btn-light rounded-circle"><?= $nama_depan; ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li><a class="dropdown-item" href="user_profile.php?user=<?= $_SESSION['username_user'] ?>">Profile</a></li>
                            <li><a class="dropdown-item" href="../../function//logout_user.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="container mt-5">
        <div class="header">
            <h2 class="fw-bold">
                Selamat Datang Kembali, <?= $_SESSION['username_user'] ?>
            </h2>
            <h5 class="mt-3">
                Mau kirim paket atau cek paket ?
            </h5>
            <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Kirim Paket
            </button>
        </div>
    </section>
    <section class="container mt-5 paket-anda">
        <h2 class="mb-3 fw-bold">Paket Anda</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
            $username = $_SESSION['username_user'];
            $data = mysqli_query($con, "SELECT * FROM shipment WHERE Username = '$username'");
            while ($read = mysqli_fetch_array($data)) {
            ?>
                <div class="col">
                    <div style="background-color: #87CEEB;" class="card">
                        <div class="card-body">
                            <h4 class="card-title"><a data-bs-toggle="modal" data-bs-target="#Detail<?= $read['ID_Pengiriman'] ?>" class="text-decoration-none text-black" href=""><?= $read['ID_Pengiriman'] ?></a></h4>
                            <p class="card-text">
                                <?php if ($read['status'] == 1) : ?>
                                    <span class="badge badge-warning">Pending</span>
                                <?php elseif ($read['status'] == 2) : ?>
                                    <span class="badge badge-warning">Packing</span>
                                <?php elseif ($read['status'] == 3) : ?>
                                    <span class="badge badge-primary">Delivered</span>
                                <?php elseif ($read['status'] == 4) : ?>
                                    <span class="badge badge-success">Arived</span>
                                <?php endif ?>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Modal view -->
                <div class="modal fade" id="Detail<?= $read['ID_Pengiriman'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Detail Paket</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <?php
                                $resi = $read['ID_Pengiriman'];
                                $detail_paket = mysqli_query($con, "SELECT * FROM shipment JOIN kategori ON kategori.ID_Kategori = shipment.ID_Kategori JOIN user_public ON user_public.Username = shipment.Username JOIN ongkir ON ongkir.ID_Ongkir = shipment.ID_Ongkir WHERE shipment.ID_Pengiriman = $resi;");
                                while ($paket_detail = mysqli_fetch_array($detail_paket)) {
                                ?>
                                    <div class="row mt-4">
                                        <div class="col">
                                            <h3 class="">Resi</h3>
                                            <p><?= $paket_detail['ID_Pengiriman'] ?></p>
                                        </div>
                                        <div class="col">
                                            <h3 class="">Status</h3>
                                            <?php if ($paket_detail['status'] == 1) : ?>
                                                <p class="">Pending</p>
                                            <?php elseif ($paket_detail['status'] == 2) : ?>
                                                <p class="">Packing</p>
                                            <?php elseif ($paket_detail['status'] == 3) : ?>
                                                <p class="">Delivered</p>
                                            <?php elseif ($paket_detail['status'] == 4) : ?>
                                                <p class="">Arived</p>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col">
                                            <h3>Pengirim</h3>
                                            <div class="box-pengirim">
                                                <p class="fw-bold"><?= $paket_detail['Nama'] ?></p>
                                                <p><?= $paket_detail['Alamat'] ?></p>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <h3>Penerima</h3>
                                            <p class="fw-bold"><?= $paket_detail['Nama_Penerima'] ?></p>
                                            <p><?= $paket_detail['Alamat_Penerima'] ?></p>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col">
                                            <h3>Detail</h3>
                                            <p><?= $paket_detail['Nama_Kategori'] ?></p>
                                        </div>
                                        <div class="col">
                                            <?php
                                            $Harga = $paket_detail['Ongkos'];
                                            ?>
                                            <h4>Ongkir</h4>
                                            <p>Total Biaya : Rp <?= number_format($Harga, 2, ",", "."); ?> </p>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Kirim Paket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../../function/CRUD_pengiriman.php" method="POST" class="was-validated">
                        <div class="row">
                            <?php
                            $user = $_SESSION['username_user'];
                            $nama_alamat = mysqli_query($con, "SELECT * FROM user_public WHERE Username = '$username'");
                            while ($na = mysqli_fetch_array($nama_alamat)) {
                            ?>
                                <div class="form-groub">
                                    <label for="">Nama Pengirim</label>
                                    <input type="text" class="form-control" value="<?= $na['Username'] ?>" name="username_tambah" readonly> <br>
                                </div>
                                <div class="form-groub">
                                    <label for="">Alamat Pengirim</label>
                                    <textarea placeholder="Alamat Anda Kosong" class="form-control" name="alamat" id="" cols="30" rows="3" readonly><?= $na['Alamat'] ?></textarea> <br>
                                </div>
                            <?php
                            }
                            ?>
                            <div class="form-groub">
                                <label for="">Nama Penerima</label>
                                <input type="text" class="form-control" name="nama_pengirim" required> <br>
                            </div>
                            <div class="form-groub">
                                <label for="">Alamat penerima</label>
                                <textarea placeholder="Alamat Anda Kosong" class="form-control" name="alamat_pengirim" id="" cols="30" rows="3" required></textarea> <br>
                            </div>
                            <div class="form-groub col">
                                <label for="">Kategori</label>
                                <select class="form-select" name="Id_kategori_tambah" id="validationCustom04" required>
                                    <option disabled selected value="">Pilih Jenis Paket</option>
                                    <?php
                                    $kategori = mysqli_query($con, "SELECT * FROM kategori");
                                    while ($k = mysqli_fetch_array($kategori)) {
                                    ?>
                                        <option value="<?= $k['ID_Kategori'] ?>"><?= $k['Nama_Kategori'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <br>
                            </div>
                            <div class="form-groub col">
                                <label for="">Lokasi</label>
                                <select class="form-select" name="Id_ongkir_tambah" required>
                                    <option selected disabled value="">Pilih Lokasi</option>
                                    <?php
                                    $ongkir = mysqli_query($con, "SELECT * FROM ongkir");
                                    while ($o = mysqli_fetch_array($ongkir)) {
                                    ?>
                                        <option value="<?= $o['ID_Ongkir'] ?>"><?= $o['Lokasi'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <br>
                            </div>
                            <div>
                                <p class="text-danger">Pastikan semua data benar, karena data sudah tidak dapat dirubah kembali</p>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-start">
                            <button type="submit" name="tambah_pengiriman" class="btn btn-success">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../../plugin/bootstrap-5.1.1-dist/js/bootstrap.bundle.min.js"></script>
</div>

</html>