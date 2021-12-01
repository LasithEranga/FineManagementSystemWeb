<!-- navigates to the payment portral after setting necessary details -->
<?php
include ("../db.php");
$statement_id = $_POST['statement_id'];
$full_name = $_POST['full_name'];
$nic = $_POST['nic'];
$email = $_POST['email'];
$address = $_POST['address'];
$contact_no = $_POST['contact_no'];
$query = "SELECT * FROM `fine_receipt` WHERE Ref_No =". $statement_id .";";
$result = mysqli_query($conn, $query);
$result_array = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    echo "
    <form id='form' action='https://sandbox.payhere.lk/pay/checkout' class='text-light' method='post'>
        <input type='hidden' name='merchant_id' value='1217251'><!-- Replace your Merchant ID -->
        <input type='hidden' name='return_url' value='localhost/fms'>
        <input type='hidden' name='cancel_url' value=''>
        <input type='hidden' name='notify_url' value='localhost/fms/notify.php'>
      <div style='display: none;'>
        <input hidden='text' name='order_id' value='".$result_array['Ref_No']."'>
        <input type='text' name='items' value='Fine Payments'><br>
        <input type='text' name='currency' value='LKR'>
        <input type='text' name='amount' value='".$result_array['Amount']."'>

        <input type='hidden' id='first_name' name='first_name' value='".$full_name."'>
        <input type='hidden' id='last_name' name='last_name' value=''><br>
        <input type='hidden' id='email' name='email' value='".$email."'>
        <input type='hidden' id='phone' name='phone' value='".$contact_no."'><br>
        <input type='hidden' id='address' name='address' value='".$address."'>
        <input type='hidden' name='city' value=''>
        <input type='hidden' name='country' value='Sri Lanka'><br><br>
        </div>
    </form>";
    ?>
    <script>
        <?php

        echo "document.getElementById('form').submit()";

        ?>
    </script>
</body>

</html>