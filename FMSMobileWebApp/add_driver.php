<?php
    include('./db.php');

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $nic = $_POST['nic'];
    $phone = $_POST['phone'];
    $licenseNo = $_POST['licenseNo'];
    $vehicleNo = $_POST['vehicleNo'];
    
    $query = "INSERT INTO `driver`(`nic`, `fname`, `lname`, `full_name`, `email`, `contact_no`, `address`,`license_no`, `vehicle_no`) VALUES('".$nic."','".$fname."','".$lname."','".$fullname."','".$email."','".$phone."','".$address."','".$licenseNo."','".$vehicleNo."')";
    $run_query = mysqli_query($conn, $query);     
    if ($run_query) {
        echo "<script> alert('Driver Added successfully ')</script>";
        echo "<script> window.open('./home.html','_self')</script>";
    }    

?>