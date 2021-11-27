<!-- Modal for payment -->
<div class="modal fade" id="messageBox" tabindex="-1">
  <div class="modal-dialog bg-dark modal-dialog-centered">
    <div class="modal-content bg-dark" style="border: none;">
      <div class="modal-header text-center">
        <h4 class="modal-title text-light" id="messageTitle">Payment Details</h4>
        <button type="button" class="btn text-light" data-bs-dismiss="modal"> <i class="fas fa-times fs-5"></i></button>

      </div>
      <div id="messageBody" class="modal-body">
        <form action="./Fine_receipts/payment.php" class="text-light" method="POST">
          <input type="text" hidden="true" class="form-control  bg-dark text-light" id="name" value="Lasith">
          <div class="form-group mb-2">
            <label for="name" class="mb-2 texl">Name</label>
            <input type="text" class="form-control  bg-dark text-light" id="name" value="Lasith">
          </div>
          <div class="form-group mb-2">
            <label for="nic" class="mb-2">NIC</label>
            <input type="text" class="form-control  bg-dark text-light" id="nic" value="998566530V">
          </div>
          <div class="form-group mb-2">
            <label for="exampleInputPassword1" class="mb-2">Email</label>
            <input type="email" class="form-control  bg-dark text-light" id="exampleInputPassword1" value="lasith@gmail.com">
          </div>
          <div class="form-group mb-2">
            <label for="offences" class="mb-2">Offence(s)</label>
            <textarea class="form-control bg-dark text-light" id="address" style="height: 100px">B16,Inamaluwa,Matara</textarea>
          </div>
          <div class="d-flex flex-row mb-2 fs-4 text-light">
            <div class="col">Penalty Amount: </div>
            <div class="col text-end">Rs: 5245.52</div>
          </div>
          <button type="submit" class="mt-3 btn btn-primary col-12" data-bs-dismiss="modal">Proceed to Payment</button>
        </form>
      </div>

    </div>
  </div>
</div>
<button id="paymentModal" type="button" hidden="true" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#messageBox">
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
    xhttp.onload = function(){
      //
      fine_receipt.innerHTML = this.responseText;
    }
    xhttp.open('GET', "Fine_receipts/set_fine_receipt.php?receipt_id='" + '990811130V');
    xhttp.send();
  }
  setFineReceipts();
</script>