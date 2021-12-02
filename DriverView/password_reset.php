<?php
include('../db.php');
session_start();
$driver_nic = $_SESSION['driver_nic'];
$password = $_REQUEST['password'];
$query = "UPDATE `driver` SET `password` = '".$password."' WHERE `driver`.`nic` = '".$driver_nic."';";
$result = mysqli_query($conn, $query);
if($result){
    echo "success";
}

?>