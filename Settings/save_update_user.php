<?php
include('../db.php');
$query = "";
$message = "";

if(isset($_REQUEST['drivers'])){
    //refers driver related operation
    $nic = $_REQUEST['nic'];
    $fname = $_REQUEST['fname'];
    $lname = $_REQUEST['lname'];
    $full_name = $_REQUEST['full_name'];
    $address = $_REQUEST['address'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];

    if(isset($_REQUEST['previous_nic'])){
        //having previous id denotes that the user is trying to update
        $previous_id = $_REQUEST['previous_nic'];
        $query = "UPDATE `driver` SET `nic`='". $nic ."',`fname`='". $fname."',`lname`='". $lname."',`full_name`='". $full_name."',`email`='". $email."',`contact_no`='". $phone."',`address`='". $address."'  WHERE nic = '". $previous_id."'";
        $message = "Driver Details Updated!";
    }
    else{
        //if no previous id then user is inserting data
        $query = "INSERT INTO `driver`(`nic`, `fname`, `lname`, `full_name`, `email`, `contact_no`, `address`) VALUES ('". $nic ."','". $fname ."','". $lname ."','". $full_name ."','". $email ."','". $phone ."','". $address ."')";
        $message = "Driver Details Added!";
    }
}

else if(isset($_REQUEST['officers'])){
    $police_id = $_REQUEST['police_id'];
    $nic = $_REQUEST['nic'];
    $fname = $_REQUEST['fname'];
    $lname = $_REQUEST['lname'];
    $full_name = $_REQUEST['full_name'];
    $address = $_REQUEST['address'];
    $email = $_REQUEST['email'];
    $post = $_REQUEST['post'];
    $phone = $_REQUEST['phone'];
    //referes police officer related operation
    if(isset($_REQUEST['previous_id'])){
        //having previous id denotes that the user is trying to update
        $previous_id = $_REQUEST['previous_id'];
        $query = "UPDATE `traffic_police_officer` SET `police_id`='". $police_id ."',`fname`='". $fname ."',`lname`='". $lname ."',`full_name`='". $full_name ."',`email`='". $email ."',`nic`='". $nic ."',`contact_no`='". $phone ."',`post`='". $post ."',`address`='". $address ."' WHERE police_id= '". $previous_id ."'";
        $message = "Police Officer Details Updated!";
    }
    else{
        //if no previous id then user is inserting data
        $query = "INSERT INTO `traffic_police_officer`(`police_id`, `fname`, `lname`, `full_name`, `email`, `nic`, `contact_no`, `post`, `address`) VALUES ('". $police_id ."','". $fname ."','". $lname ."','". $full_name ."','". $email ."','". $nic ."','". $phone ."','". $post ."','". $address ."')";
        $message = "Police Officer Details Added!";
    }
}


$result = mysqli_query($conn,$query);
if($result){
    echo "<script> alert('".$message."')</script>";
    echo "<script> window.open('../?users','_self')</script>";
}
?>