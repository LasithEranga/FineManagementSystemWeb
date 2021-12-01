<?php

session_start();

if(!isset($_SESSION['police_id'])){

echo "<script>window.open('index.php','_self')</script>";

}
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="landing.css">
    <!-- Javascripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <style>
        .mr-10 {
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <div>
        <div class="modal fade" id="nic_input" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
            <div class="modal-dialog  modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Insert Driver NIC</h5>
                        <button id="btn_close" type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <input id="nic_no" type="text" class="form-control" placeholder="9904856484V"
                                aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="btn_okay" type="button" class="btn btn-primary">Okay</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- nic input modal end-->
        <button type="button" id="nic_modal" class="btn btn-primary" hidden="true" data-bs-toggle="modal"
            data-bs-target="#nic_input">
        </button>
    </div>

    <nav class="navbar navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <div class="input-group flex-nowrap">
                <a class="navbar-brand ms-2" href="#"><i class="fas fa-bars"></i></a>
                <span class="input-group-text ms-2" id="addon-wrapping"><i class="fas fa-search"></i></span>
                <input id="search_input" type="text" class="form-control col-2" placeholder="Search Rules..."
                    aria-label="Username" aria-describedby="addon-wrapping" onkeypress="suggestRule(this.value)">
                <a class="navbar-brand ms-4" href="#"><i class="fas fa-user"></i></a>
            </div>
        </div>
    </nav>

    <div class=" d-flex  col-12 flex-column">
        <div id="search_result" class="bg-dark">

        </div>
        <div class="d-flex flex-row col-12">

            <div class="col-1 ms-3 mt-3"> <img src="./images/glogo.png" height="75px" alt=""></div>
            <div class="col-8 text-center mt-4 ps-4">
                <span class="fw-bold "> SPOT FINE STATEMENT </span><br> Road Safety Act 1985</p>
            </div>
            <div class="col-1 me-2 mt-3 "><img src="./images/policeLogo.png" alt=""></div>
        </div>

        <div class="d-flex flex-row col-9  flex-column ms-3 mt-3">
            <div class="mb-3 fw-bold ">Fine Statement</div>
            <div class="">Statement No: <span id="statement_id"></div>
            <div class="">Officer ID:  <span id="officer_id"><?php echo $_SESSION['police_id']?></span></div>
            <div class="">Driver NIC: <span id="driver_nic" class="text-success"></span></div>
            <div class="">Issue Date: <span id="issue_date"></span></div>
            <div class="">Issue Time: <span id="issue_time"></span></div>
        </div>
        <div id="rule_info">
            <div class="d-flex flex-row col-9 flex-column ms-3 mt-3">
                <div class="mb-3 fw-bold">Offence</div>
                <div class="">Offence ID: <span id="rule_id"></span></div>
                <div class="">Offence: <span id="rule"></span></div>
            </div>

            <div class="d-flex flex-row col-9 flex-column ms-3 mt-3">
                <div class="mb-3 fw-bold">Description</div>
                <div class=""> <span id="description"></span> <br><br>
                    Penalty : <span id="penalty"></span><br><br>
                    Due Date : <span id="due_date"></span></div>

            </div>
        </div>
        <button type="button" class="btn btn-primary col-11 mx-3 mt-4 mb-5" onclick="saveFineReceipt()"> Save Receipt</button>
    </div>
    <!-- nic input modal -->


    <script>
        var ruleList = [];//rule ids included in fine receipt
        var totalAmount = 0;
        var officer_id = document.getElementById('officer_id');
        var driver_nic = document.getElementById('driver_nic');
        var issue_date = document.getElementById('issue_date');
        var issue_time = document.getElementById('issue_time')
        var modalBtn = document.getElementById("nic_modal");
        
        setTimeout(()=>{modalBtn.click()},200);

        var firstView = true;

        //verifies NIC is available in database
        function verifyNIC(nic) {
            if (nic.length > 0) {
                const xmlhttp = new XMLHttpRequest();
                xmlhttp.onload = function () {
                    if (this.responseText == "") {
                        alert("NIC not found!");
                    }
                    else if (this.responseText == document.getElementById('nic_no').value) {
                        document.getElementById('btn_close').click();
                        driver_nic.innerHTML = this.responseText;

                    }
                }
                xmlhttp.open('GET', 'verify_nic.php?nic=' + nic);
                xmlhttp.send();
            }
        }

        //gets an id from database and set statement date time as well
        function setStatementID() {

            const xmlhttp = new XMLHttpRequest();
            xmlhttp.onload = function () {
                document.getElementById('statement_id').innerHTML = this.responseText;
                var currentdate = new Date();
                issue_date.innerHTML = currentdate.getFullYear()+ "-" + currentdate.getMonth() + "-" + currentdate.getDate();
                issue_time.innerHTML = currentdate.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: false });
            }
            xmlhttp.open('GET', 'get_statementID.php');
            xmlhttp.send();
        }

        //gain an fine receipt id from db on load
        setStatementID();

        //suggest available rules when typing
        function suggestRule(key) {
            if (key.length > 0) {
                const xmlhttp = new XMLHttpRequest();
                xmlhttp.onload = function () {
                    document.getElementById('search_result').innerHTML = this.responseText;
                }
                xmlhttp.open('GET', 'search_rules.php?key=' + key);
                xmlhttp.send();
            }
        }

        //get selected rule details
        function setRuleDetails(key) {
            if (key.length > 0) {
                const xmlhttp = new XMLHttpRequest();
                xmlhttp.onload = function () {
                    result_array = this.responseText.split(',');
                    //document.getElementById('rule_info').innerHTML = this.responseText;
                    document.getElementById('search_result').innerHTML = "";
                    var currentdate = new Date();
                    currentdate.setDate(currentdate.getDate() + 7);
                    if (firstView) {
                        document.getElementById('rule_info').innerHTML = `
                        <div class="d-flex flex-row col-9 flex-column ms-3 mt-3">
                            <div class="mb-3 fw-bold">Offence</div>
                            <div class="">Offence ID: <span id="rule_id">`+ result_array[0] + `</span></div>
                            <div class="">Offence: <span id="rule">`+ result_array[1] + `</span></div>
                        </div>

                        <div class="d-flex flex-row col-9 flex-column ms-3 mt-3">
                            <div class="mb-3 fw-bold">Description</div>
                            <div class=""> <span id="description">`+ result_array[2] + `</span> <br><br>
                                Penalty : <span id="penalty">`+ result_array[3] + `</span><br><br>
                                Due Date : <span id="due_date">`+ currentdate.getFullYear() + "-" + currentdate.getMonth() + "-" + currentdate.getDate() + `</span></div>

                        </div>
                        `
                        firstView = false;
                        totalAmount += parseFloat(result_array[3]);
                        ruleList.push(result_array[0]);
                    }
                    else {
                        document.getElementById('rule_info').innerHTML += `
                        <div class="d-flex flex-row col-9 flex-column ms-3 mt-3">
                            <div class="mb-3 fw-bold">Offence</div>
                            <div class="">Offence ID: <span id="rule_id">`+ result_array[0] + `</span></div>
                            <div class="">Offence: <span id="rule">`+ result_array[1] + `</span></div>
                        </div>

                        <div class="d-flex flex-row col-9 flex-column ms-3 mt-3">
                            <div class="mb-3 fw-bold">Description</div>
                            <div class=""> <span id="description">`+ result_array[2] + `</span> <br><br>
                                Penalty : <span id="penalty">`+ result_array[3] + `</span><br><br>
                                Due Date : <span id="due_date">`+ currentdate.getFullYear() + "-" + currentdate.getMonth() + "-" + currentdate.getDate() + `</span></div>

                        </div>
                        `
                        totalAmount += parseFloat(result_array[3]);
                        ruleList.push(result_array[0]);
                    }

                    //reset the search box 
                    document.getElementById('search_input').value = "";
                }
                xmlhttp.open('GET', 'get_rule_details.php?key=' + key);
                xmlhttp.send();
            }
        }

        //saves fine receipt including its data
        function saveFineReceipt() {
            const xmlhttp = new XMLHttpRequest();
            xmlhttp.onload = function () {
                if(this.responseText){
                    console.log(this.responseText == 1);
                    alert('Fine receipt saved successfully ');
                    window.open('./home.php','_self');
                };
            }
            xmlhttp.open('GET', 'save_fine_receipt.php?officer_id='+officer_id.innerHTML+'&driver_nic='+driver_nic.innerHTML+'&date='+issue_date.innerHTML+'&amount='+totalAmount+'&time='+issue_time.innerHTML+'&offence_id_arr='+ruleList);
            xmlhttp.send();
        }



        document.getElementById('btn_okay').addEventListener('click', () => {
            verifyNIC(document.getElementById('nic_no').value);
        });
    </script>

</body>

</html>