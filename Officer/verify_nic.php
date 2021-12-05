<?php
include ('./db.php');
$nic = $_REQUEST['nic'];
if ($nic !== "") {
    $query = "SELECT nic FROM driver WHERE nic = '".$nic."'";
    $result = mysqli_query($conn,$query);
    $data = mysqli_fetch_array($result);
    echo $data['nic'];
}

?>