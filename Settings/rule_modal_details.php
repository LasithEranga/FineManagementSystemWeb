<?php
include ('../db.php');
$rule_id = $_REQUEST['rule_id'];

$html_code = "";

$query = "SELECT * FROM `rule` WHERE rule_id = " .$rule_id. ";";
$result_array = mysqli_query($conn, $query);
$result = mysqli_fetch_array($result_array);
$html_code .= "
            <input type='hidden' class='form-control bg-dark bg-dark text-light' name='previous_id' value ='". $result['rule_id'] ."'>
            <div class='mb-3'>
                <label for='rule_id' class='form-label'>Rule ID</label>
                <input type='text' class='form-control bg-dark bg-dark text-light' id='rule_id' name='rule_id' value ='". $result['rule_id'] ."'>
            </div>
            <div class='mb-3'>
                <label for='rule_name' class='form-label'>Rule Name</label>
                <input type='text' class='form-control bg-dark text-light' id='rule_name' name='rule_name' value ='".$result['rule_name']."'>
            </div>
            <div class='mb-3'>
                <label for='description' class='form-label'>Description</label>
                <input type='text' class='form-control bg-dark text-light' id='description' name='description' value ='".$result['description']."'>
            </div>
            <div class='mb-3'>
                <label for='penalty_amount' class='form-label'>Penalty Amount</label>
                <input type='text' class='form-control bg-dark text-light' id='penalty_amount' name='penalty_amount' value ='".$result['penalty_amount']."'>
            </div>
            <div class='mb-3'>
                <label for='tag' class='form-label'>Tag</label>
                <input type='text' class='form-control bg-dark text-light' id='tag' name='tag' value ='".$result['tag']."'>
            </div>
            <input id='submit' type='submit' hidden='true'>";

echo $html_code;
?>