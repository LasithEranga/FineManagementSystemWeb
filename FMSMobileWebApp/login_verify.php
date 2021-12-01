<?php
include ('./db.php');
session_start();
$police_id = $_REQUEST['police_id'];
$password = $_REQUEST['password'];
$query = "SELECT * FROM `traffic_police_officer` WHERE police_id = '". $police_id ."' AND email ='". $password ."'";
$result = mysqli_query($conn,$query);
$count = mysqli_num_rows($result);
$result_array = mysqli_fetch_array($result);
if($count==1){
    $_SESSION['police_id']=$police_id;
    $_SESSION['name']=$result_array['fname'];
   echo "logged";
}
else {
  echo "failed";

}


?>