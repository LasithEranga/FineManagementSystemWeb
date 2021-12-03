<?php
include('./db.php');
session_start();
if (!isset($_SESSION['police_id'])) {

    echo "<script>window.open('index.php','_self')</script>";
}
$query = "SELECT COUNT(Ref_No) as fine_receipts FROM fine_receipt WHERE officer_id='" . $_SESSION['police_id'] . "' AND Date = CURRENT_DATE";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fine Payment Management System</title>
    <link rel="icon" type="image/x-icon" href="./logo.ico">

    <!--Stylesheets-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="landing.css">
    <!-- Javascripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.0/dist/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <style>
        .m-50 {
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <!-- add driver modal -->
    <div class="modal fade" id="nic_input" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Insert Driver Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="add_driver.php" method="post">
                        <div class="mb-3">
                            <label for="fname" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="fname" name="fname" placeholder="Nimal">
                            <span id='fname_error' class="text-danger"></span>

                        </div>
                        <div class="mb-3">
                            <label for="lname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lname" name="lname" placeholder="Silva">
                            <span id='lname_error' class="text-danger"></span>

                        </div>
                        <div class="mb-3">
                            <label for="fullname" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="full_name" name="fullname" placeholder="Nimal Silva">
                            <span id='full_name_error' class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="KandyRd Kadawatha">
                            <span id='address_error' class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <label for="text" class="form-label">Email Address</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="nimal@gmail.com">
                            <span id='email_error' class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <label for="nic" class="form-label">Owner NIC</label>
                            <input type="text" class="form-control" id="nic" name="nic" placeholder="990811130V">
                            <span id='nic_error' class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Contact No</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="0770543422">
                            <span id='phone_error' class="text-danger"></span>
                        </div>

                        <input id="submit" type="submit" hidden="true">
                    </form>
                </div>
                <div class="modal-footer ">
                    <div class="text-center">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary">Clear All</button>
                        <button id="save" type="button" class="btn btn-primary">Okay</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="button" id="add_driver_modal" class="btn btn-primary" hidden=true data-bs-toggle="modal" data-bs-target="#nic_input">
    </button>
    <!-- add driver modal end-->


    <nav class="navbar navbar-dark bg-dark sticky-top" style="border-bottom: 1px solid rgb(104, 104, 104);">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><i class="fa fa-bars me-3" aria-hidden="true"></i>FineX Mobile</a>
            <a class="navbar-brand" href="logout.php"><?php echo $_SESSION['name'] ?></a>
        </div>
    </nav>
    <div class=" bg-dark vh-100 d-flex flex-column flex-md-row">

        <div class=" bg-light col-md-4 m-3 mt-5 rounded" style="height: 10rem; ">

            <div class="d-flex flex-column">
                <div class=" ms-3 mt-3 fs-1"> Today</div>
                <div class=" ms-3 mx-md-3 mt-3 fs-3"> <?php echo $data['fine_receipts']; ?> New Fine Receipt(s)</div>
            </div>

        </div>
        <div id="search_driver" class=" bg-light m-3 mt-md-5 col-md-2 fs-3  rounded d-flex justify-content-center align-items-center" style="height: 10rem; ">
            Search Driver
        </div>

        <div id="add_driver" class=" bg-light m-3 mt-md-5 col-md-2 fs-3 rounded d-flex justify-content-center align-items-center" style="height: 10rem; ">
            Add Driver
        </div>

        <div id="new_receipt" class=" bg-light m-3 mt-md-5 col-md-2 fs-3 rounded d-flex  justify-content-center align-items-center" style="height: 10rem; ">
            New Fine Receipt
        </div>
    </div>


    <script>
        document.getElementById("new_receipt").addEventListener('click', () => {
            location.href = 'finereceipt.php';
        });
        document.getElementById("search_driver").addEventListener('click', () => {
            location.href = 'search_driver.html';
        });
        document.getElementById("add_driver").addEventListener('click', () => {
            document.getElementById("add_driver_modal").click();
        });
        document.getElementById("save").addEventListener('click', () => {

            var allvalid = true;

            const nic_error = document.getElementById('nic_error');
            const nic = document.getElementById('nic');

            const fname_error = document.getElementById('fname_error');
            const fname = document.getElementById('fname');

            const lname_error = document.getElementById('lname_error');
            const lname = document.getElementById('lname');

            const full_name_error = document.getElementById('full_name_error');
            const full_name = document.getElementById('full_name');

            const address_error = document.getElementById('address_error');
            const address = document.getElementById('address');

            const email_error = document.getElementById('email_error');
            const email = document.getElementById('email');

            const phone_error = document.getElementById('phone_error');
            const phone = document.getElementById('phone');

            var emailCheck = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            var nameCheck = /^[a-zA-Z\s]+$/;
            var addressCheck = /^[a-zA-Z0-9\/\s,]+$/;

            var checkNICType1 = /^\d{9}[vxVX]{1}$/;
            var checkNICType2 = /^\d{12}$/
            if (nic.value == "") {
                nic_error.innerHTML = "<i class = 'fas fa-exclamation-circle'></i> NIC is required!";
                if (allvalid) {
                    allvalid = false;
                }
            } else if (!checkNICType1.test(nic.value) && (nic.value.length <= 10)) {
                nic_error.innerHTML = "<i class = 'fas fa-exclamation-circle'></i> NIC is invalid!";
                if (allvalid) {
                    allvalid = false;
                }
            } else if (!checkNICType2.test(nic.value) && (nic.value.length == 12)) {
                nic_error.innerHTML = "<i class = 'fas fa-exclamation-circle'></i> NIC is invalid!";
                if (allvalid) {
                    allvalid = false;
                }
            } else {
                nic_error.innerHTML = "";
            }



            //validate first name
            if (fname.value == "") {
                fname_error.innerHTML = "<i class = 'fas fa-exclamation-circle'></i> First name is required!";
                if (allvalid) {
                    allvalid = false;
                }
            } else if (!nameCheck.test(fname.value)) {
                fname_error.innerHTML = "<i class = 'fas fa-exclamation-circle'></i> Name should not include numbers or special characters!";
                if (allvalid) {
                    allvalid = false;
                }
            } else {
                fname_error.innerHTML = "";
            }

            //validate last name
            if (lname.value == "") {
                lname_error.innerHTML = "<i class = 'fas fa-exclamation-circle'></i> Last name is required!";
                if (allvalid) {
                    allvalid = false;
                }
            } else if (!nameCheck.test(lname.value)) {
                lname_error.innerHTML = "<i class = 'fas fa-exclamation-circle'></i> Last name should not include numbers or special characters!";
                if (allvalid) {
                    allvalid = false;
                }
            } else {
                lname_error.innerHTML = "";
            }

            //validate full name
            if (full_name.value == "") {
                full_name_error.innerHTML = "<i class = 'fas fa-exclamation-circle'></i> Full name is required!";
                if (allvalid) {
                    allvalid = false;
                }
            } else if (!nameCheck.test(full_name.value)) {
                full_name_error.innerHTML = "<i class = 'fas fa-exclamation-circle'></i>  Full name should not include numbers or special characters!";
                if (allvalid) {
                    allvalid = false;
                }
            } else {
                full_name_error.innerHTML = "";
            }

            //validate address
            if (address.value == "") {
                address_error.innerHTML = "<i class = 'fas fa-exclamation-circle'></i> Address is required!";
                if (allvalid) {
                    allvalid = false;
                }
            } else if (!addressCheck.test(address.value)) {
                address_error.innerHTML = "<i class = 'fas fa-exclamation-circle'></i> Address is invalid!";
                if (allvalid) {
                    allvalid = false;
                }
            } else {
                address_error.innerHTML = "";
            }

            //validate phone no
            const checkContactNo = /^\d{10}$/;
            if (phone.value == "") {
                phone_error.innerHTML = "<i class = 'fas fa-exclamation-circle'></i> Contact Number is required!";
                if (allvalid) {
                    allvalid = false;
                }
            } else {
                if (checkContactNo.test(phone.value)) {
                    phone_error.innerHTML = "";
                } else {
                    phone_error.innerHTML = "<i class = 'fas fa-exclamation-circle'></i> Contact Number shoud be 10 digits!";
                }

            }


            //validate email
            var checkEmail = /^(([^<>()[\]\\.,;:\s@]+(\.[^<>()[\]\\.,;:\s@]+)*)|(.+))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if (email.value == "") {
                email_error.innerHTML = "<i class = 'fas fa-exclamation-circle'></i> Email Address is required!";
                if (allvalid) {
                    allvalid = false;
                }
            } else if (!emailCheck.test(email.value)) {
                email_error.innerHTML = "<i class = 'fas fa-exclamation-circle'></i> A valid Email Address is required!";
                if (allvalid) {
                    allvalid = false;
                }
            } else {
                email_error.innerHTML = "";
            }

            if (allvalid) {
                document.getElementById('submit').click();
            }

        });
    </script>
</body>

</html>