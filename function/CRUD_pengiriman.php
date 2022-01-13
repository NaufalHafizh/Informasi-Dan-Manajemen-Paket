<?php

include 'connect.php';

if (isset($_POST['tambah_pengiriman'])) {

    $id = rand(10000000, 99999999);
    $username_tambah = filter_var($_POST['username_tambah'], FILTER_SANITIZE_STRING);
    $nama_pengirim = filter_var($_POST['nama_pengirim'], FILTER_SANITIZE_STRING);
    $alamat_pengirim = filter_var($_POST['alamat_pengirim'], FILTER_SANITIZE_STRING);
    $Id_kategori_tambah = filter_var($_POST['Id_kategori_tambah'], FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
    $Id_ongkir_tambah = filter_var($_POST['Id_ongkir_tambah'], FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
    $status_tambah = "1";

    $insert_data = mysqli_query($con, "INSERT INTO shipment VALUES('$id', '$Id_kategori_tambah', '$Id_ongkir_tambah', '$username_tambah', '$nama_pengirim', '$alamat_pengirim', '$status_tambah', CURRENT_TIMESTAMP, NULL)");

    if (!$insert_data) {

        echo ("Error description: " . mysqli_error($con));
    }

    header("location:/View/User/index.php");
}

if (isset($_POST['edit_pengiriman'])) {

    $ID_pengiriman_edit = filter_var($_POST['ID_Pengiriman_edit'], FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
    $ID_kategori_edit = filter_var($_POST['ID_Kategori_edit'], FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
    $status_edit = filter_var($_POST['status_edit'], FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);

    // $preventerror = mysqli_query($con, "UPDATE kategori SET ID_Kategori = '$ID_kategori_edit' WHERE ID_Kategori = '$ID_kategori_edit'");

    $edit = mysqli_query($con, "UPDATE shipment SET ID_Kategori = '$ID_kategori_edit', status = '$status_edit' WHERE ID_Pengiriman = '$ID_pengiriman_edit'");

    if (!$edit) {

        echo ("Error description: " . mysqli_error($con));
    }

    header("location:../View/Dashboard/index.php?page=admin_pengiriman");
}

if (isset($_GET['id_kirim_hapus'])) {

    $ID_hapus = filter_var($_GET['id_kirim_hapus'], FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);

    $hapus = mysqli_query($con, "DELETE FROM shipment WHERE ID_Pengiriman  = '$ID_hapus'");

    if (!$hapus) {

        echo ("Error description: " . mysqli_error($con));
    }

    header("location:../View/Dashboard/index.php?page=admin_pengiriman");
}
