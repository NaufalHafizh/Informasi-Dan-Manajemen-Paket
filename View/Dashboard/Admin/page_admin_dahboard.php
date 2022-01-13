<?php
include "../../../function/connect.php";
login();
// admin
$sql1 = mysqli_query($con, "SELECT * FROM admin where Level='Admin'");
$total_admin = mysqli_num_rows($sql1);

//courier
$sql2 = mysqli_query($con, "SELECT * FROM admin where Level='Courier'");
$total_courier = mysqli_num_rows($sql2);

//User
$sql3 = mysqli_query($con, "SELECT * FROM user_public");
$total_user = mysqli_num_rows($sql3);

//Paket
$sql4 = mysqli_query($con, "SELECT * FROM shipment");
$total_paket = mysqli_num_rows($sql4);

//Pending dan semuanya
$datepaket = mysqli_fetch_assoc($sql4);

?>
<h3 class="text-uppercase fs-4 fw-bolder">Dashboard</h3>
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
            <div class="inner">
                <h3><?= $total_admin; ?></h3>
                <p>Admin</p>
            </div>
            <div class="icon">
                <i class="ion ion-person"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
            <div class="inner">
                <h3><?= $total_courier; ?></h3>
                <p>Courier</p>
            </div>
            <div class="icon">
                <i class="ion ion-person"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
            <div class="inner">
                <h3><?= $total_user; ?></h3>
                <p>User Registrations</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?= $total_paket; ?></h3>
                <p>All Packages</p>
            </div>
            <div class="icon">
                <i class="ion ion-cube"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
</div>