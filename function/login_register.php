<?php
session_start();
include 'connect.php';

if (isset($_POST['login'])) {

    $username = filter_var($_POST['username_user'], FILTER_SANITIZE_STRING);
    $password = $_POST['password'];

    $sql = mysqli_query($con, "SELECT * FROM user_public WHERE Username = '$username' AND Password = '$password'");
    $cek = mysqli_num_rows($sql);

    if ($cek > 0) {

        $_SESSION['username_user'] = $username;
        header("location:../View/User/index.php");
    } else {

        $_SESSION['failed'] = $username;
        header("location:../View/login_Regis/login.php");
    }
}

if (isset($_POST['register'])) {

    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $nama = filter_var($_POST['nama'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $alamat = "";

    $insert = mysqli_query($con, "INSERT INTO user_public VALUES('$username', '$password', '$email', '$nama', '$alamat')");

    if (!$insert) {

        echo ("Error description: " . mysqli_error($con));
    }

    $_SESSION['berhasil'] = "Berhasil";

    header("location:../View/login_Regis/login.php");
}

if (isset($_POST['ubat_pelanggan'])) {

    $username_pelanggan_ubah = filter_var($_POST['username_pelanggan_ubah'], FILTER_SANITIZE_STRING);
    $password_pelanggan_ubah = $_POST['password_pelanggan_ubah'];
    $email_pelanggan_ubah = filter_var($_POST['email_pelanggan_ubah'], FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_STRING);
    $alamat_pelanggan_ubah = filter_var($_POST['alamat_pelanggan_ubah'], FILTER_SANITIZE_STRING);

    $update = mysqli_query($con, "UPDATE user_public SET Password = '$password_pelanggan_ubah', Email = '$email_pelanggan_ubah', Nama = '$username_pelanggan_ubah', Alamat = '$alamat_pelanggan_ubah' WHERE Username = '$username_pelanggan_ubah'");

    if (!$update) {

        echo ("Error description: " . mysqli_error($con));
    }

    header("location:/View/User/index.php");
}
