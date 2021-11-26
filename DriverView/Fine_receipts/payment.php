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
        <input hidden='text' name='order_id' value='34'>
        <input type='text' name='items' value='Fine Payments'><br>
        <input type='text' name='currency' value='LKR'>
        <input type='text' name='amount' value='5685.23'>

        <input type='hidden' id='first_name' name='first_name' value='Saman'>
        <input type='hidden' id='last_name' name='last_name' value='Perera'><br>
        <input type='hidden' id='email' name='email' value='samanp@gmail.com'>
        <input type='hidden' id='phone' name='phone' value='0771234567'><br>
        <input type='hidden' id='address' name='address' value='No.1, Galle Road'>
        <input type='hidden' name='city' value=''>
        <input type='hidden' name='country' value=''><br><br>
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