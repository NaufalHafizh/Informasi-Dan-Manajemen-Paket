<?php
if (empty($_GET['page']) && $_SESSION['admin']) {

    include "Admin/page_admin_dahboard.php";
}

if ($_GET['page'] == "admin_user") {

    include "Admin/page_admin_users.php";
} elseif ($_GET['page'] == "admin_user2") {

    include "Admin/page_admin_users2.php";
} elseif ($_GET['page'] == "admin_dashboard") {

    include "Admin/page_admin_dahboard.php";
} elseif ($_GET['page'] == "admin_user_reg") {

    include "Admin/page_admin_user_reg.php";
} elseif ($_GET['page'] == "admin_pengiriman") {

    include "Admin/page_admin_pengiriman.php";
} elseif ($_GET['page'] == "kategori") {

    include "Admin/page_admin_kategori.php";
} elseif ($_GET['page'] == "ongkir") {

    include "Admin/page_admin_ongkir.php";
}
