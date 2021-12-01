<?php
//takes data from the database and feed them to the modal 
//the html code will be injected using javascript from the client side

include('../db.php');
$receipt_id = $_REQUEST['receipt_id'];
$query = 
$html_code = "  <input type='text' hidden='true' class='form-control  bg-dark text-light' id='name' value='Lasith'>
                <div class='form-group mb-2'>
                <label for='name' class='mb-2 texl'>Name</label>
                <input type='text' class='form-control  bg-dark text-light' id='name' value='Lasith'>
                </div>
                <div class='form-group mb-2'>
                <label for='nic' class='mb-2'>NIC</label>
                <input type='text' class='form-control  bg-dark text-light' id='nic' value='998566530V'>
                </div>
                <div class='form-group mb-2'>
                <label for='exampleInputPassword1' class='mb-2'>Email</label>
                <input type='email' class='form-control  bg-dark text-light' id='exampleInputPassword1' value='lasith@gmail.com'>
                </div>
                <div class='form-group mb-2'>
                <label for='offences' class='mb-2'>Offence(s)</label>
                <textarea class='form-control bg-dark text-light' id='address' style='height: 100px'>B16,Inamaluwa,Matara</textarea>
                </div>
                <div class='d-flex flex-row mb-2 fs-4 text-light'>
                <div class='col'>Penalty Amount: </div>
                <div class='col text-end'>Rs: 5245.52</div>
                </div>";

?>

