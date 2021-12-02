<?php
include('./db.php');
session_start();
$nic = $_REQUEST['nic'];
$password = $_REQUEST['password'];

$query = "SELECT * FROM `driver` WHERE nic = '" . $nic . "' AND password ='" . $password . "'";
$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);

if ($count == 1) {
  $_SESSION['driver_nic'] = $nic;
  echo "logged";
} else {
  $query = "SELECT * FROM driver WHERE nic = '" . $nic . "' AND ISNULL(password) AND email ='" . $password . "'";
  $result = mysqli_query($conn, $query);
  $count = mysqli_num_rows($result);
  if ($count == 1) {
    $_SESSION['driver_nic'] = $nic;
    echo "reset";
  }else{
    echo $query;//"failed";
  }
  
}
