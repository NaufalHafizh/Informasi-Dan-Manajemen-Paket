<?php

include 'connect.php';

if (isset($_POST['tambah_kurir'])) {

    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $pass = $_POST['password'];
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_STRING);
    $nama = filter_var($_POST['nama'], FILTER_SANITIZE_STRING);
    $level = filter_var($_POST['level'], FILTER_SANITIZE_STRING);

    $insert = mysqli_query($con, "INSERT INTO admin VALUES('$username', '$pass', '$email', '$nama', '$level')");


    if (!$insert) {

        echo ("Error description: " . mysqli_error($con));
    }

    header("location:../View/Dashboard/index.php?page=admin_user2");
}

if (isset($_POST['edit_kurir'])) {

    $username_edit = filter_var($_POST['username_edit'], FILTER_SANITIZE_STRING);
    $pass_edit = $_POST['password_edit'];
    $email_edit = filter_var($_POST['email_edit'], FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_STRING);
    $nama_edit = filter_var($_POST['nama_edit'], FILTER_SANITIZE_STRING);
    $level_edit = "Courier";

    $edit = mysqli_query($con, "UPDATE admin SET Password = '$pass_edit', Email = '$email_edit', Nama = '$nama_edit', Level = '$level_edit' WHERE Username = '$username_edit'");

    if (!$edit) {

        echo ("Error description: " . mysqli_error($con));
    }

    header("location:../View/Dashboard/index.php?page=admin_user2");
}

if (isset($_GET['id_kurir_hapus'])) {

    $ID_kurir_hapus = filter_var($_POST['id_kurir_hapus'], FILTER_SANITIZE_STRING);

    $hapus = mysqli_query($con, "DELETE FROM admin WHERE Username = '$ID_kurir_hapus'");

    if (!$hapus) {

        echo ("Error description: " . mysqli_error($con));
    }
}
