<?php
include ('./db.php');

$query = "SELECT MAX(Ref_No)+1 as id FROM `fine_receipt`;";
$result = mysqli_query($conn,$query);
$data = mysqli_fetch_array($result);
echo $data['id'];
