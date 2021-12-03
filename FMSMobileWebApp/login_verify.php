<?php
include ('./db.php');
session_start();
$police_id = $_REQUEST['police_id'];
$password = $_REQUEST['password'];

function validatePoliceID($value)
{
  if (empty($value)) { // test the field to see if it blank (empty)
    return false;
  } else if(!preg_match("/^\d{5}$/", $value)) {
    return false;
  } else {
    return true;
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

if (validatePoliceID($police_id) && validatePassword($password)) {

  $query = "SELECT * FROM `traffic_police_officer` WHERE police_id = '". $police_id ."' AND password ='". $password ."'";
  $result = mysqli_query($conn, $query);
  $count = mysqli_num_rows($result);
  //echo $query;
  if ($count == 1) {
    $result_array = mysqli_fetch_array($result);
    $_SESSION['police_id']=$police_id;
    $_SESSION['name']=$result_array['fname'];
    echo "logged";
  } else {
    $query = "SELECT * FROM traffic_police_officer WHERE police_id = '" . $police_id . "' AND ISNULL(password) AND email ='" . $password . "'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
      $_SESSION['police_id'] = $police_id;
      echo "reset";
    } else {
      echo "failed";
    }
  }
}else{
  echo "failed";
}
