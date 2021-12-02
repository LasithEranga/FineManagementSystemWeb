<?php
include('../db.php');
//$driver_session_nic = $_SESSION['driver_nic'];
$driver_session_nic = '990811150V';
$first_name = $_REQUEST['first_name'];
$last_name = $_REQUEST['last_name'];
$full_name =  $_REQUEST['full_name'];
$driver_nic = $_REQUEST['driver_nic'];
$address =  $_REQUEST['address'];
$contact_no =  $_REQUEST['contact_no'];
$email =  $_REQUEST['email'];

$query ="UPDATE `driver` SET `nic`= '".$driver_nic."' ,`fname`= '". $first_name ."' ,`lname`='". $last_name . "',`full_name`='". $full_name . "',`email`='". $email ."',`contact_no`='". $contact_no ."',`address`='". $address ."' WHERE nic = '".$driver_session_nic."';";
$result = mysqli_query($conn, $query);
if($result){
    echo "true";
}
