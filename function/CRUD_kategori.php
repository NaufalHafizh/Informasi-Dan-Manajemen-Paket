<?php

include 'connect.php';

if (isset($_POST['tambah_kategori'])) {

    $id_kategori = filter_var($_POST['Id_kategori'], FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
    $nama_kategori = filter_var($_POST['nama_kategori'], FILTER_SANITIZE_STRING);

    $insert = mysqli_query($con, "INSERT INTO kategori VALUES('$id_kategori', '$nama_kategori')");


    if (!$insert) {

        echo ("Error description: " . mysqli_error($con));
    }

    header("location:../View/Dashboard/index.php?page=kategori");
}

if (isset($_POST['edit_kategori'])) {

    $Id_edit = filter_var($_POST['ID_kategori_edit'], FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
    $nama_edit = filter_var($_POST['nama_kategori_edit'], FILTER_SANITIZE_STRING);

    $edit = mysqli_query($con, "UPDATE kategori SET Nama_Kategori = '$nama_edit' WHERE ID_Kategori = '$Id_edit'");

    if (!$edit) {

        echo ("Error description: " . mysqli_error($con));
    }

    header("location:../View/Dashboard/index.php?page=admin_user2");
}

if (isset($_GET['id_kategori_hapus'])) {

    $id_kategori_hapus = filter_var($_GET['id_kategori_hapus'], FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);

    $hapus = mysqli_query($con, "DELETE FROM kategori WHERE ID_Kategori = '$id_kategori_hapus'");

    if (!$hapus) {

        echo ("Error description: " . mysqli_error($con));
    }

    header("location:../View/Dashboard/index.php?page=admin_user2");
}
