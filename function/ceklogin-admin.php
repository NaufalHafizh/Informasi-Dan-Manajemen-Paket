<?php
session_start();
include 'connect.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = mysqli_query($con, "SELECT * FROM admin WHERE Username = '$username' AND Password = '$password'");
$cek = mysqli_num_rows($sql);

if ($cek > 0) {

    $data = mysqli_fetch_assoc($sql);

    if ($data['Level'] == "Admin") {

        $_SESSION['username'] = $username;
        $_SESSION['admin'] = "Admin";

        header("location:../View/Dashboard/index.php");
    } elseif ($data['Level'] == "Courier") {

        $_SESSION['username'] = $username;
        $_SESSION['courier'] = "Courier";

        header("location:../View/Dashboard/index.php");
    } else {

        $logi_error = true;
    }
} else {

    $logi_error = true;
}

if ($logi_error) {

    $_SESSION['gagal'] = $username;
    include '../View/login_Regis/admin-login.php';
}
