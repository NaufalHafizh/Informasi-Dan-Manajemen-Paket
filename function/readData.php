<?php
include 'connect.php';

$query = "SELECT * FROM user_public";
$result = mysqli_query($con, $query);
$response = array();

while ($row = mysqli_fetch_array($result)) {
    array_push($response, array(
        "Username" => $row[0],
        "Password" => $row[1],
        "Email" => $row[2],
        "Nama" => $row[3],
    ));
}

echo json_encode(array("Data" => $response));
mysqli_close($con);
