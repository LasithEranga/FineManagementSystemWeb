<?php
include('../db.php');
$query = "";
$message = "";

$nic = $_REQUEST['nic'];
$fname = $_REQUEST['fname'];
$lname = $_REQUEST['lname'];
$full_name = $_REQUEST['full_name'];
$address = $_REQUEST['address'];
$email = $_REQUEST['email'];
$phone = $_REQUEST['phone'];

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

function validateEmail($value, &$messages)
{
    if (empty($value)) { // test the field to see if it blank (empty)
        return false;
    } elseif (!preg_match("/^(([^<>()[\]\\.,;:\s@]+(\.[^<>()[\]\\.,;:\s@]+)*)|(.+))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/", $value)) {
        $messages = "email error";
        return false;
    } else {
        return true;
    }
}

function validateAddress($value, &$messages)
{
    if (empty($value)) { // test the field to see if it blank (empty)
        return false;
    } elseif (!preg_match("/^[a-zA-Z0-9\/\s,]+$/", $value)) {
        //if the text is not required characters
        $messages = "address";
        return false;
    } else {
        return true;
    }
}

function validateNIC($value, &$messages)
{
    if (empty($value)) { // test the field to see if it blank (empty)
        return false;
    } else {
        if (strlen($value) == 10) {
            //pattern1
            if (!preg_match("/^\d{9}[vxVX]{1}+$/", $value)) {
                $messages = "nic error";
                return false;
            } else {
                return true;
            }
        } else if (strlen($value) == 12) {
            //pattern 2
            if (!preg_match("/^\d{12}$/", $value)) {
                $messages = "nic error";
                return false;
            } else {

                return true;
            }
        }
    }
}
function validatePoliceID($value, &$messages)
{

    if (!preg_match("/^\d{5}$/", $value)) {
        $messages = "ID error";
        return false;
    } else {
        return true;
    }
}

if (!validateName($fname)) {
    if ($allValid) {
        $allValid = false;
    }
}
if (!validateName($lname, $message)) {
    if ($allValid) {
        $allValid = false;
    }
}
if (!validateName($full_name, $message)) {
    if ($allValid) {
        $allValid = false;
    }
}
if (!validateNIC($nic, $message)) {
    if ($allValid) {
        $allValid = false;
    }
}
if (!validateAddress($address, $message)) {
    if ($allValid) {
        $allValid = false;
    }
}
if (!validateEmail($email, $message)) {
    if ($allValid) {
        $allValid = false;
    }
}

if ($allValid) {
    if (isset($_REQUEST['drivers'])) {
        //refers driver related operation
        if (isset($_REQUEST['previous_nic'])) {
            //having previous id denotes that the user is trying to update
            $previous_id = $_REQUEST['previous_nic'];
            $query = "UPDATE `driver` SET `nic`='" . $nic . "',`fname`='" . $fname . "',`lname`='" . $lname . "',`full_name`='" . $full_name . "',`email`='" . $email . "',`contact_no`='" . $phone . "',`address`='" . $address . "'  WHERE nic = '" . $previous_id . "'";
            $message = "Driver Details Updated!";
        } else {
            //if no previous id then user is inserting data
            $query = "INSERT INTO `driver`(`nic`, `fname`, `lname`, `full_name`, `email`, `contact_no`, `address`,`password`) VALUES ('" . $nic . "','" . $fname . "','" . $lname . "','" . $full_name . "','" . $email . "','" . $phone . "','" . $address . "', NULL)";
            $message = "Driver Details Added!";
        }
    } else if (isset($_REQUEST['officers'])) {

        $police_id = $_REQUEST['police_id'];
        $post = $_REQUEST['post'];
        if (true) {
            //referes police officer related operation
            if (isset($_REQUEST['previous_id'])) {
                //having previous id denotes that the user is trying to update
                $previous_id = $_REQUEST['previous_id'];
                $query = "UPDATE `traffic_police_officer` SET `police_id`='" . $police_id . "',`fname`='" . $fname . "',`lname`='" . $lname . "',`full_name`='" . $full_name . "',`email`='" . $email . "',`nic`='" . $nic . "',`contact_no`='" . $phone . "',`post`='" . $post . "',`address`='" . $address . "' WHERE police_id= '" . $previous_id . "'";
                $message = "Police Officer Details Updated!";
            } else {
                //if no previous id then user is inserting data
                $query = "INSERT INTO `traffic_police_officer`(`police_id`, `fname`, `lname`, `full_name`, `email`, `nic`, `contact_no`, `post`, `address`,`password`) VALUES ('" . $police_id . "','" . $fname . "','" . $lname . "','" . $full_name . "','" . $email . "','" . $nic . "','" . $phone . "','" . $post . "','" . $address . "', NULL)";
                $message = "Police Officer Details Added!";
            }
        }
    }
}


if ($allValid) {
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "<script> alert('" . $message . "')</script>";
        echo "<script> window.open('../?users','_self')</script>";
    }
} else {
    echo "<script> alert('Update Failed!')</script>";
    echo "<script> window.open('../?users','_self')</script>";
}
