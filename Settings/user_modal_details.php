<?php
include ('../db.php');
$user_id = $_REQUEST['user_id'];
$user_type = $_REQUEST['user_type'];
$html_code = "";

if($user_type == "driver"){
    $query = "SELECT * FROM `driver` WHERE nic = '" .$user_id. "';";
    $result_array = mysqli_query($conn, $query);
    $result = mysqli_fetch_array($result_array);
    $html_code .= "
                    <div class='mb-3'>
                        <label for='nic' class='form-label'> NIC Number</label>
                        <input type='text' class='form-control' id='nic' name='nic' value ='".$result['nic']."'>
                    </div>
                    <div class='mb-3'>
                        <label for='fname' class='form-label'>First Name</label>
                        <input type='text' class='form-control' id='fname' name='fname' value ='".$result['fname']."'>
                   </div>
                    <div class='mb-3'>
                        <label for='lname' class='form-label'>Last Name</label>
                        <input type='text' class='form-control' id='lname' name='lname' value ='".$result['lname']."'>
                    </div>
                    <div class='mb-3'>
                        <label for='fullname' class='form-label'>Full Name</label>
                        <input type='text' class='form-control' id='fullname' name='fullname' value ='".$result['full_name']."'>
                    </div>
                    <div class='mb-3'>
                        <label for='address' class='form-label'>Address</label>
                        <input type='text' class='form-control' id='address' name='address' value ='".$result['address']."'>
                    </div>
                    <div class='mb-3'>
                        <label for='text' class='form-label'>Email Address</label>
                        <input type='text' class='form-control' id='email' name='email' value ='".$result['email']."' >
                    </div>
                    <div class='mb-3'>
                        <label for='phone' class='form-label'>Contact No</label>
                        <input type='text' class='form-control' id='phone' name='phone' value ='".$result['contact_no']."'>
                    </div>
                    <input id='submit' type='submit' hidden='true'>";

}
if($user_type == "officer"){

    $query = "SELECT * FROM `traffic_police_officer` WHERE police_id = '" .$user_id. "';";
    $result_array = mysqli_query($conn, $query);
    $result = mysqli_fetch_array($result_array);
    $html_code .= "
                    <div class='mb-3'>
                        <label for='police_id' class='form-label'> Police ID </label>
                        <input type='text' class='form-control' id='police_id' name='police_id' value ='".$result['police_id']."'>
                    </div>
                    <div class='mb-3'>
                        <label for='fname' class='form-label'>First Name</label>
                        <input type='text' class='form-control' id='fname' name='fname' value ='".$result['fname']."'>
                   </div>
                    <div class='mb-3'>
                        <label for='lname' class='form-label'>Last Name</label>
                        <input type='text' class='form-control' id='lname' name='lname' value ='".$result['lname']."'>
                    </div>
                    <div class='mb-3'>
                        <label for='fullname' class='form-label'>Full Name</label>
                        <input type='text' class='form-control' id='fullname' name='fullname' value ='".$result['full_name']."'>
                    </div>
                    <div class='mb-3'>
                        <label for='address' class='form-label'>Address</label>
                        <input type='text' class='form-control' id='address' name='address' value ='".$result['address']."'>
                    </div>
                    <div class='mb-3'>
                        <label for='text' class='form-label'>Email Address</label>
                        <input type='text' class='form-control' id='email' name='email' value ='".$result['email']."' >
                    </div>
                    <div class='mb-3'>
                        <label for='nic' class='form-label'> NIC Number</label>
                        <input type='text' class='form-control' id='nic' name='nic' value ='".$result['nic']."'>
                    </div>
                    <div class='mb-3'>
                        <label for='post' class='form-label'> Post</label>
                        <input type='text' class='form-control' id='post' name='post' value ='".$result['post']."'>
                    </div>
                    <div class='mb-3'>
                        <label for='phone' class='form-label'>Contact No</label>
                        <input type='text' class='form-control' id='phone' name='phone' value ='".$result['contact_no']."'>
                    </div>
                    <input id='submit' type='submit' hidden='true'>";
}

echo $html_code;

?>
