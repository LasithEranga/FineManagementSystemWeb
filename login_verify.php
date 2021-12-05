<?php
include ('./db.php');
session_start();
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

function validateName($value)
{
    if (empty($value)) { // test the field to see if it blank (empty)
        return false;
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $value)) {
        //if the text is not consisting a-z characters
        return false;
    } else {
        return true;
    }
}

function validatePassword($value)
{
  if (empty($value)) { // test the field to see if it blank (empty)
    return false;
  } else if (!preg_match("/^[a-zA-Z0-9\s,]+$/", $value)) {
    return false;
  } else {
    return true;
  }
}

if (validateName($username) && validatePassword($password)) {

    $query = "SELECT * FROM `user` WHERE user_name ='". $username ."' AND password ='". $password ."'";
    $result = mysqli_query($conn,$query);
    $count = mysqli_num_rows($result);

    if($count==1){
        $_SESSION['username']=$username;
      echo "logged";
    }
    else {
      echo "failed";

    }
}else{
  echo "failed";
}
?>