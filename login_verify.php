<?php
include ('./db.php');
session_start();
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
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

?>