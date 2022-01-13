<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contoh Form Validation</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2>Form Validation</h2>
                <p>Halo cobat ketutrare, yuk kali ini kita belajar menggunakan form validate dari bootstrap. Simak contoh berikut ya :</p>
                <form action="action_page.html" class="was-validated" method="get">
                    <div class="form-group">
                        <label for="uname">Username:</label>
                        <input type="text" class="form-control" id="uname" placeholder="Ketik username" name="uname" required>
                        <div class="valid-feedback">Username Valid</div>
                        <div class="invalid-feedback">maaf, Username tidak boleh kosong !</div>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Ketik password" name="pswd" required>
                        <div class="valid-feedback">Password Valid</div>
                        <div class="invalid-feedback">Maaf, Password tidak boleh kosong !</div>
                    </div>
                    <div class="form-group form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="remember" required>Saya Bukan Robot
                            <div class="valid-feedback">Anda adalah Manusia</div>
                            <div class="invalid-feedback">Pastikan Anda Bukan Robot</div>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>