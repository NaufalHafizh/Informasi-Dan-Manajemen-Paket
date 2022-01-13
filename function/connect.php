<?php
$host = "localhost";
$username = "root";
$password = "";
$databasename = "pengiriman_parcel";
$con = @mysqli_connect($host, $username, $password, $databasename);
if (!$con) {
    echo "Error: " . mysqli_connect_error();
    exit();
}

//season chechk
function login()
{
    session_start();
    if (empty($_SESSION['username'])) {
        header('location: ../login_Regis/admin-login.php');
    }
}

function login_user()
{
    session_start();
    if (empty($_SESSION['username_user'])) {
        header('location: ../login_Regis/login.php');
    }
}
