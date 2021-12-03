<?php
include('./db.php');
session_start();
$nic = $_REQUEST['nic'];
$password = $_REQUEST['password'];

function validateNIC($value)
{
  if (empty($value)) { // test the field to see if it blank (empty)
    return false;
  } else {
    if (strlen($value) == 10) {
      //pattern1
      if (!preg_match("/^\d{9}[vxVX]{1}+$/", $value)) {
        return false;
      } else {
        return true;
      }
    } else if (strlen($value) == 12) {
      //pattern 2
      if (!preg_match("/^\d{12}$/", $value)) {
        return false;
      } else {

        return true;
      }
    }
  }
}
function validatePassword($value)
{
  if (empty($value)) { // test the field to see if it blank (empty)
    return false;
  } else if (preg_match("/^[a-zA-Z0-9\s,]+$/", $value) || preg_match("/^(([^<>()[\]\\.,;:\s@]+(\.[^<>()[\]\\.,;:\s@]+)*)|(.+))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/", $value)) {
    return true;
  } else {
    return false;
  }
}

if (validateNIC($nic) && validatePassword($password)) {


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
    } else {
      echo "failed";
    }
  }
}else{
  echo "failed";
}
