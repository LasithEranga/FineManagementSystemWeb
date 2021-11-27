
<!-- Modal -->
<div class="modal fade" id="messageBox" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="border: none;">
                <h4 class="modal-title" id="messageTitle"></h4>
            </div>
            <div id="messageBody" class="modal-body">
            </div>
            <div class="modal-footer" style="border: none;">
                <button type="button" class="btn btn-primary"  data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<button id="msgModal" type="button" hidden="true"  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#messageBox">
</button>


<!-- container div -->
<?php
include('../db.php');
//$driver_nic = $_SESSION['driver_nic'];
$driver_nic = '990811130V';
$qury = "SELECT `nic`, `fname`, `lname`, `full_name`, `email`, `contact_no`, `address` FROM `driver` WHERE nic = '". $driver_nic ."'";
$result = mysqli_query($conn, $qury);
$result_array = mysqli_fetch_array($result);
?>

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand">
            <h1 class="pt-2 px-3">Your Info</h1> 
            <span class="pt-2 px-3"><span class="text-danger">Important:</span> Providing wrong details may lead to legal actions.</span>
        </a>
    
    </div>
</nav>

<div class="d-flex container flex-column  bg-dark  text-white col-lg-11 h-auto " style="width: 95%;">
    <div class=" col-10">
        <div class="d-flex">
            <div class="flex-row col-5">
                <div class="form-group mb-2">
                    <label for="nic" class="mb-2">NIC</label>
                    <input type="text" class="form-control bg-dark text-light" id="nic" placeholder="Enter email" value="<?php echo $result_array['nic']; ?>">
                </div>
                <div class="form-group mb-2">
                    <label for="fname" class="mb-2">First Name</label>
                    <input type="text" class="form-control bg-dark text-light" id="fname" value="<?php echo $result_array['fname']; ?>">
                </div>
                <div class="form-group mb-2">
                    <label for="lname" class="mb-2">Last Name</label>
                    <input type="text" class="form-control bg-dark text-light" id="lname" value="<?php echo $result_array['lname']; ?>">
                </div>
                <div class="form-group mb-2">
                    <label for="fullname" class="mb-2">Full Name</label>
                    <input type="text" class="form-control bg-dark text-light" id="fullname" value="<?php echo $result_array['full_name']; ?>">
                </div>
                <div class="form-group mb-2">
                    <label for="email" class="mb-2">Email</label>
                    <input type="email" class="form-control bg-dark text-light" id="email" value="<?php echo $result_array['email']; ?>">
                </div>

            </div>
            <div class="flex-row col-5 ms-3">
                <div class="form-group mb-2">
                    <label for="contactNo" class="mb-2">Contact No</label>
                    <input type="text" class="form-control bg-dark text-light" id="contactNo" value="<?php echo $result_array['contact_no']; ?>">
                </div>
                <div class="form-group mb-2">
                    <label for="address" class="mb-2">Address</label>
                    <textarea class="form-control bg-dark text-light" id="address" style="height: 100px"><?php echo $result_array['address']; ?></textarea>
                </div>


            </div>
        </div>
        <div class="col-10 text-end ms-3">
            <button type="submit" class="btn btn-primary mt-3 mb-2" onclick="updateInfo()">Update Info</button>
        </div>
    </div>
</div>
<script>
    const first_name = document.getElementById('fname');
    const last_name = document.getElementById('lname');
    const full_name = document.getElementById('fullname');
    const driver_nic = document.getElementById('nic');
    const address = document.getElementById('address');
    const contact_no = document.getElementById('contactNo');
    const email = document.getElementById('email');
    var accepted = false;

    //shows the message as a modal view with passed arguments
    function showMsg(title, body) {
        document.getElementById('messageTitle').innerHTML = title;
        document.getElementById('messageBody').innerHTML = body;
        document.getElementById("msgModal").click();
    }

    function updateInfo() {
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            if(this.responseText == "true"){
                showMsg("Successfully Updated!", "We Updated your information");
            }
            
        }
        xhttp.open('GET', "Your_Info/update_info.php?first_name=" + first_name.value + "&last_name=" + last_name.value + "&full_name=" + full_name.value + "&driver_nic=" + driver_nic.value + "&address=" + address.value + "&contact_no=" + contact_no.value + "&email=" + email.value);
        xhttp.send();
        
    }
</script>