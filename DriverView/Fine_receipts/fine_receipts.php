<?php
include('../db.php');
$driver_nic = '990811130V'; //replace with login details
$query = "SELECT * FROM driver WHERE nic='" . $driver_nic . "';";
$result = mysqli_query($conn, $query);
$result_array = mysqli_fetch_array($result);
echo "<script> payment_status = undefined </script>";
if (isset($_GET['order_id'])) {
  $sql = "SELECT `State` FROM `fine_receipt` WHERE Ref_No = " . $_GET['order_id'] . ";";
  $payment_result = mysqli_query($conn, $sql);
  $payment_result_array = mysqli_fetch_array($payment_result);
  echo "<script> console.log(".$payment_result_array['State'].") </script>";
  if($payment_result_array['State'] == 1){
    echo "<script> payment_status = true </script>";
  }
  else{
    echo "<script> payment_status = false </script>";
  }
}
?>
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
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<button id="msgModal" type="button" hidden="true" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#messageBox">
</button>


<!-- Modal for payment -->
<div class="modal fade" id="payment_modal" tabindex="-1">
  <div class="modal-dialog bg-dark modal-dialog-centered">
    <div class="modal-content bg-dark" style="border: none;">
      <div class="modal-header text-center">
        <h4 class="modal-title text-light" id="messageTitle">Payment Details</h4>
        <button type="button" class="btn text-light" data-bs-dismiss="modal"> <i class="fas fa-times fs-5"></i></button>

      </div>
      <div id="messageBody" class="modal-body">
        <form action="./Fine_receipts/payment.php" class="text-light" method="POST">
          <input type='text' hidden='true' id='statement_id' name='statement_id' value=''>
          <div class='form-group mb-2'>
            <label for='name' class='mb-2 texl'>Name</label>
            <input type='text' class='form-control  bg-dark text-light' name='full_name' value='<?php echo $result_array['full_name'] ?>'>
          </div>
          <div class='form-group mb-2'>
            <label for='nic' class='mb-2'>NIC</label>
            <input type='text' class='form-control  bg-dark text-light' name='nic' value='<?php echo $result_array['nic'] ?>'>
          </div>
          <div class='form-group mb-2'>
            <label for='exampleInputPassword1' class='mb-2'>Email</label>
            <input type='email' class='form-control  bg-dark text-light' name='email' value='<?php echo $result_array['email'] ?>'>
          </div>
          <div class='form-group mb-2'>
            <label for='exampleInputPassword1' class='mb-2'>Contact No</label>
            <input type='text' class='form-control  bg-dark text-light' name='contact_no' value='<?php echo $result_array['contact_no'] ?>'>
          </div>
          <div class='form-group mb-2'>
            <label for='offences' class='mb-2'>Address</label>
            <textarea class='form-control bg-dark text-light' name='address' style='height: 100px'><?php echo $result_array['address'] ?></textarea>
          </div>
          <div class='d-flex flex-row mb-2 fs-4 text-light'>
            <div class='col'>Penalty Amount: </div>
            <div class='col text-end' id="amount"></div>
          </div>
          <button type="submit" class="mt-3 btn btn-primary col-12" data-bs-dismiss="modal">Proceed to Payment</button>
        </form>
      </div>

    </div>
  </div>
</div>
<button id="paymentModal" type="button" hidden="true" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#payment_modal">
</button>


<!-- container div -->

<nav class="navbar navbar-dark bg-dark ">
  <div class="container-fluid">
    <a class="navbar-brand sticky-top">
      <h1 class="pt-2 px-3">Fine Receipts</h1>
    </a>

  </div>
</nav>

<div class="d-flex container flex-column  bg-dark  text-white col-lg-11 " style="width: 95%;">
  <div id="fine_receipt">

  </div>
</div>

<script>
  const driver_nic = document.getElementById('driver_nic');
  const driver_name = document.getElementById('driver_name');
  const offences = document.getElementById('offences');
  const penalty = document.getElementById('penalty');
  const paymentModal = document.getElementById('paymentModal');
  const fine_receipt = document.getElementById('fine_receipt');

  //sets the fine receipt view for the driver
  function setFineReceipts() {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
      //
      fine_receipt.innerHTML = this.responseText;
    }
    xhttp.open('GET', "Fine_receipts/set_fine_receipt.php?receipt_id='" + '990811130V');
    xhttp.send();
  }

  setFineReceipts();

  function openPaymentModal(id) {
    document.getElementById('amount').innerHTML = "Rs." + document.getElementById('penalty' + id).innerHTML;
    document.getElementById('messageTitle').classList.add('col', 'text-center');
    document.getElementById('statement_id').value = id;
    document.getElementById('paymentModal').click();
  }

  //shows the message as a modal view with passed arguments
  function showMsg(title, body) {
    document.getElementById('messageTitle').innerHTML = title;
    document.getElementById('messageBody').innerHTML = body;
    document.getElementById("msgModal").click();
  }

  //checks whether the user has come after doing a payment 
  //if the variable is defined the user is returend after a payment 
  //the variable is set based on the session variable payment_status which is set by the server call back during the payment 
  if (payment_status != undefined) {
    setTimeout(() => {
      if (payment_status) {
        showMsg("<i class='fas fa-check-circle text-success me-3'></i>Payment Succeed!", "We received your payment! Thank you.");
      } else {
        showMsg("<i class='fas fa-times-circle text-danger me-3'></i>Payment Failed!", "Sorry! The payment did not succeed.");
      }

    }, 300);
  }
</script>