<?php

$text= $_GET['text'];
$message = "";

function validateName($value)
{
    if (empty($value)) { // test the field to see if it blank (empty)
        return false;
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $value)) {
        //if the text is not consisting a-z characters
        return false;
        
    }
    else{
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
if(validateName($text,$message)){
    echo "done";
}else{
    echo "not";
}

?>