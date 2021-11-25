<!-- container div -->

<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand">
      <h1 class="pt-2 px-3">Fine Receipts</h1>
    </a>

  </div>
</nav>

<div class="d-flex container flex-column  bg-dark  text-white col-lg-11 h-auto " style="width: 95%;">
  <div class=" d-flex  col-10 flex-column">
    <div id="search_result" class="bg-dark">

    </div>
    <div class="d-flex flex-row col-12">

      <div class="col-1 ms-3 mt-3"> <img src="./images/glogo.png" height="75px" alt=""></div>
      <div class="col-8 text-center mt-4 ps-4">
        <span class="fw-bold "> SPOT FINE STATEMENT </span><br> Road Safety Act 1985</p>
      </div>
      <div class="col-1 me-2 mt-3 "><img src="./images/policeLogo.png" alt=""></div>
    </div>

    <div class="d-flex flex-col  col-10   ms-3 mt-3">
      <div class="flex-row col">
        <div class="mb-3 fw-bold ">Fine Statement</div>

        <div class="">Statement No: 56 <span id="statement_id"></span></div>
        <div class="">Officer ID: 56859 </div>
        <div class="">Driver NIC: <span id="driver_nic" >990811130V</span></div>
        <div class="">Issue Date: <span id="issue_date">2021-11-20</span></div>
        <div class="">Issue Time: <span id="issue_time">13:23:00</span></div>
        <div class="">Street: Kaluthara Rd.</div>
      </div>
      <div class="flex-row col">
        <div class="mb-3 fw-bold">Offence(s)</div>
        <div class="">Offence(1): Driver is drunk and caugth while driving the vehicle <span id="rule"></span></div>
        <div class=""> <span id="description"></span> <br>
          Penalty : Rs.5625.23<span id="penalty"></span><br>
          Due Date : 2021-12-04 <span id="due_date"></span>
        </div>
      </div>
    </div>
    <div class="col-11 text-end">
    <button type="button" class="btn btn-primary col-3 mx-3 mt-4 mb-5" onclick="saveFineReceipt()"> Settle Fine Amount</button>
    </div>
  </div>
</div>
<!--Scripts-->
