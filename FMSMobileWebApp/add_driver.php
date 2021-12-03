<?php
    include('./db.php');

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $nic = $_POST['nic'];
    $phone = $_POST['phone'];

    
$allValid = true;

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

function validateEmail($value)
{
    if (empty($value)) { // test the field to see if it blank (empty)
        return false;
    } elseif (!preg_match("/^(([^<>()[\]\\.,;:\s@]+(\.[^<>()[\]\\.,;:\s@]+)*)|(.+))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/", $value)) {
        return false;
    } else {
        return true;
    }
}

function validateAddress($value)
{
    if (empty($value)) { // test the field to see if it blank (empty)
        return false;
    } elseif (!preg_match("/^[a-zA-Z0-9\/\s,]+$/", $value)) {
        //if the text is not required characters
        return false;
    } else {
        return true;
    }
}

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


if (!validateName($fname)) {
    if ($allValid) {
        $allValid = false;
    }
}
if (!validateName($lname)) {
    if ($allValid) {
        $allValid = false;
    }
}
if (!validateName($fullname)) {
    if ($allValid) {
        $allValid = false;
    }
}
if (!validateNIC($nic)) {
    if ($allValid) {
        $allValid = false;
    }
}
if (!validateAddress($address)) {
    if ($allValid) {
        $allValid = false;
    }
}
if (!validateEmail($email)) {
    if ($allValid) {
        $allValid = false;
    }
}
if($allValid)
    $query = "INSERT INTO `driver`(`nic`, `fname`, `lname`, `full_name`, `email`, `contact_no`, `address`,`password`) VALUES('".$nic."','".$fname."','".$lname."','".$fullname."','".$email."','".$phone."','".$address."', NULL)";
    $run_query = mysqli_query($conn, $query);     
    if ($run_query) {
        echo "<script> alert('Driver Added successfully ')</script>";
        echo "<script> window.open('./home.php','_self')</script>"; 
} 
else{
    echo "<script> alert('Operation Failed! ')</script>";
    echo "<script> window.open('./home.php','_self')</script>";
}
?>