<?php
    include('./db.php');

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $nic = $_POST['nic'];
    $phone = $_POST['phone'];
    
    $query = "INSERT INTO `driver`(`nic`, `fname`, `lname`, `full_name`, `email`, `contact_no`, `address`) VALUES('".$nic."','".$fname."','".$lname."','".$fullname."','".$email."','".$phone."','".$address."')";
    $run_query = mysqli_query($conn, $query);     
    if ($run_query) {
        echo "<script> alert('Driver Added successfully ')</script>";
        echo "<script> window.open('./home.php','_self')</script>";
    }    

?>