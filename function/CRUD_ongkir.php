<?php

include 'connect.php';

if (isset($_POST['tambah_ongkir'])) {

    $Id_ongkir = filter_var($_POST['Id_ongkir'], FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
    $lokasi = filter_var($_POST['lokasi'], FILTER_SANITIZE_STRING);
    $ongkos = filter_var($_POST['ongkos'], FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);

    $insert = mysqli_query($con, "INSERT INTO ongkir VALUES('$Id_ongkir', '$lokasi', '$ongkos')");


    if (!$insert) {

        echo ("Error description: " . mysqli_error($con));
    }

    header("location:../View/Dashboard/index.php?page=ongkir");
}

if (isset($_POST['edit_ongkir'])) {

    $ID_ongkir_edit = filter_var($_POST['ID_ongkir_edit'], FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
    $lokasi_edit =  filter_var($_POST['lokasi_edit'], FILTER_SANITIZE_STRING);
    $Ongkos_edit =  filter_var($_POST['Ongkos_edit'], FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);

    $edit = mysqli_query($con, "UPDATE ongkir SET Lokasi = '$lokasi_edit', Ongkos = '$Ongkos_edit' WHERE ID_Ongkir = '$ID_ongkir_edit'");

    if (!$edit) {

        echo ("Error description: " . mysqli_error($con));
    }

    header("location:../View/Dashboard/index.php?page=ongkir");
}

if (isset($_GET['id_ongkir_hapus'])) {

    $id_ongkir_hapus = filter_var($_GET['id_ongkir_hapus'], FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);

    $hapus = mysqli_query($con, "DELETE FROM ongkir WHERE ID_Ongkir = '$id_ongkir_hapus'");

    if (!$hapus) {

        echo ("Error description: " . mysqli_error($con));
    }

    header("location:../View/Dashboard/index.php?page=ongkir");
}
