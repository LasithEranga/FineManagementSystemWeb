<?php
include('../db.php');
session_start();
$police_id = $_SESSION['police_id'];
$password = $_REQUEST['password'];

$query = "UPDATE `traffic_police_officer` SET `password` = '".$password."' WHERE `traffic_police_officer`.`police_id` = '".$police_id."';";
$result = mysqli_query($conn, $query);
if($result){
    echo "success";
}

?>