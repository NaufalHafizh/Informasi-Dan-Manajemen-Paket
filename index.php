<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="plugin/bootstrap-5.1.1-dist/css/bootstrap.min.css">

    <!-- fontawesome -->
    <link rel="stylesheet" href="./plugin/fontawesome-free-5.15.4-web/css/all.css">

    <style>
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

<body class="text-dark">
    <nav id="navigation" class="navbar navbar-expand-lg shadow-sm text-uppercase">
        <div class="container">
            <h3 class="float-md-start text-dark fw-bold">Fast</h3>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link aktif text-dark" href="#about">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link aktif text-dark" href="#about">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link aktif text-dark" href="././View/login_Regis/login.php">LogIn <i class="fas fa-sign-in-alt"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main style="background-color: #E9FDFF;">
        <section id="welcome">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 mt-5">
                        <div class="tulisan1">
                            <h2 class="flex align-items-center mt-5 fs-2 fw-bold">Kecepatan Dan Katepan</h2>
                        </div>
                        <div>
                            <p class="mt-3">Kami memberikan pelayanan terbaik dan menjamin barang anda sampai tujuan dengan cepat dan selamat</p>
                        </div>
                        <div name="Selengkapnya">
                            <a class="btn btn-dark mt-3" href="">Selengkapnya</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img class="w-100" src="./img/home-4.png" alt="">
                    </div>
                </div>
            </div>
        </section>
        <section id="footer">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-3">
                        <p class="fw-bold">INFORMASI</p>
                        <div class="informasi">
                            <a class="d-block text-decoration-none" href="">FAQ</a>
                            <a class="d-block text-decoration-none" href="">Terms & Condition</a>
                            <a class="d-block text-decoration-none" href="">Privacy Policy</a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <p class="fw-bold">Produk Dan Layanan</p>
                        <div class="produk">
                            <a class="d-block text-decoration-none" href="">Pengiriman Barang</a>
                            <a class="d-block text-decoration-none" href="">Pengiriman Hewan</a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <p class="fw-bold">INFO KONTAK</p>
                        <div class="kontak">
                            <a class="d-block text-decoration-none" href=""><i style="margin-right: 12px;" class="fas fa-map-marker-alt"></i> Jalan yang Lurus No01</a>
                            <a class="d-block text-decoration-none" href=""><i style="margin-right: 12px;" class="fas fa-phone-volume"></i> 085xxxxxxx</a>
                            <a class="d-block text-decoration-none" href=""><i style="margin-right: 8px;" class="far fa-envelope"></i> Support: customer.care@fast.com</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="./bootstrap-5.1.1-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>