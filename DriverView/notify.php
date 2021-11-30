<?php

$servername = "localhost";
$username = "id18013583_root";
$password = "tV#^?5Kwx(}wcm6b";
$dbname = "id18013583_fmsdb";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$merchant_id         = $_POST['merchant_id'];
$order_id             = $_POST['order_id'];
$payhere_amount     = $_POST['payhere_amount'];
$payhere_currency    = $_POST['payhere_currency'];
$status_code         = $_POST['status_code'];
$md5sig                = $_POST['md5sig'];

$merchant_secret = '8n0ONVkNfQw4ZBYG6EXXJi8hheqJYU4Do8gi0IkOhFTu'; // Replace with your Merchant Secret (Can be found on your PayHere account's Settings page)

$local_md5sig = strtoupper(md5($merchant_id . $order_id . $payhere_amount . $payhere_currency . $status_code . strtoupper(md5($merchant_secret))));

//TODO: Update your database as payment success    
//cross check the payment with database amount
//to confirm that the actual amount has been paid
$sql = "SELECT `Amount` FROM `fine_receipt` WHERE Ref_No = " . $order_id . ";";
$result = $conn->query($sql);
$data = $result->fetch_assoc();
if ($data['Amount'] == $payhere_amount) {
  $sql = "UPDATE `fine_receipt` SET `State` = '1' WHERE `fine_receipt`.`Ref_No` = " . $order_id . ";";
  $conn->query($sql);
  $sql = "INSERT INTO `payment` (`id`, `date`, `amount`, `driver_nic`, `fince_receipt_Ref`) VALUES (NULL, CURRENT_DATE, '" . $payhere_amount . "', '990811130V', '" . $order_id . "');";
  //need to set the payment status as well under fine _receipts
  $conn->query($sql);
  $_SESSION['payment_status'] = "success";
}
else{
  $_SESSION['payment_status'] = "failed";
}
