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


<!--container div-->
<div class="d-flex flex-column bg-dark text-white col-lg-12 h-auto" style="min-height: 100vh;">
  <!--navigation bar-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand col-7">
        <h1 class="pt-2 px-3">REPORTS</h1>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <select id="list_type" class="d-flex flex-row form-select form-select-sm bg-dark text-white me-2" aria-label=".form-select-sm example">
          <option selected value="expired" onclick="fillTable()">Expired</option>
          <option value="suedList" onclick="fillTable()">Sued List</option>
          <option value="pending" onclick="fillTable()">Pending</option>
          <option value="paid" onclick="fillTable()">Paid</option>
          <option value="allRecords" onclick="fillTable()">All Records</option>
        </select>
        <form class="d-flex col-lg-8 mt-2 mt-lg-0">
          <input class="form-control me-2 border_date_input bg-dark text-light" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-success me-lg-3" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

  <div class=" d-flex   flex-row mt-1">
    <div class=" bg-dark  d-flex flex-column flex-md-row">
      <div class=" flex-row ms-4 mb-2">
        <label for="from" class="fs-5">From:</label>
        <input type="date" class=" ms-lg-1 me-2 border_date_input bg-dark text-light py-1" id="from" name="from">
      </div>

      <div class=" flex-row ms-4 mb-2">
        <label for="from" class="fs-5">To:</label>
        <input type="date" class=" ms-lg-4 me-2 border_date_input bg-dark text-light py-1" id="to" name="to">
      </div>

      <div class=" flex-row ms-3 ">
        <button id="btn_go" onclick="fillTable()" type="button" class="btn btn-success px-4 ms-2 ">Go</button>
      </div>

    </div>
    <div class="d-flex flex-column  ms-auto me-3 flex-md-row">

      <button type="button" class="btn  btn-block btn-success px-4 mb-2 mb-md-0 me-md-2 mt-4 mt-lg-0">Share</button>
      <button type="button" id="printBtn" class="btn  btn-block btn-success px-4 me-md-2">Save as PDF 
        
          <span id="spaning_circle" class=" spinner-border text-info text-light visually-hidden spinner-border-sm"></span>
        

    </div>


  </div>

  <!--table-->
  <div>
    <!--wrapper for printing  -->
    <div id='printArea' class=" bg-dark text-white bg-light m-4">
      <div class=" table-responsive" style="height: 70vh; padding-top: 0;">
        <table class="table table-striped table-dark table-hover">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Address</th>
              <th scope="col">NIC</th>
              <th scope="col">Date</th>
              <th scope="col">Rules</th>
              <th scope="col">Penalty</th>
            </tr>
          </thead>
          <tbody id="table_contents">

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script>
  const table_contents = document.getElementById('table_contents');
  const btn_go = document.getElementById('btn_go');
  const from = document.getElementById('from');
  const to = document.getElementById('to');
  const printArea = document.getElementById('printArea');
  const list_type = document.getElementById('list_type');
  const spaning_circle = document.getElementById('spaning_circle');

  //shows the message as a modal view with passed arguments
  function showMsg(title, body) {
    document.getElementById('messageTitle').innerHTML = title;
    document.getElementById('messageBody').innerHTML = body;
    document.getElementById("msgModal").click();
  }

  //exports the table as a pdf
  document.getElementById("printBtn").addEventListener("click",  () => {
    spaning_circle.classList.remove('visually-hidden');
    let listName = "";
    if (list_type.value == "expired") {
      listName = "Expired Fine receipt List from " + from.value + " to " + to.value;
    } else if (list_type.value == "suedList") {
      listName = "Sued Fine receipt List from " + from.value + " to " + to.value;
    } else if (list_type.value == "pending") {
      listName = "Payment pending Fine receipt List from " + from.value + " to " + to.value;
    } else if (list_type.value == "paid") {
      listName = "Settled Fine receipt List from " + from.value + " to " + to.value;
    } else if (list_type.value == "allRecords") {
      listName = "All Fine Receipts from " + from.value + " to " + to.value;
    }
    let printTemplate = `<div id='print' class='m-1'>
                          <div class='d-flex flex-row  col-12'>
                            <div class='col-1 '></div>
                            <div class='col-1 mt-3 pt-1'> <img src='https://finemanagementsystem.000webhostapp.com/images/glogo.png' alt=''height='75px'></div>
                            <div class='col-8 text-center mt-4 '>
                              <span class='fw-bold fs-2 '>  SRI LANKA POLICE </span><br> ` + listName + `<p></p>
                            </div>
                            <div class='col-1  mt-3'><img src='https://finemanagementsystem.000webhostapp.com/images/policeLogo.png' alt=''></div>
                          </div>
                          <div class="table-responsive mx-4">
                            <table class="table table-striped table-light table-hover">
                              <thead>
                                <tr>
                                  <th scope="col">ID</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Address</th>
                                  <th scope="col">NIC</th>
                                  <th scope="col">Date</th>
                                  <th scope="col">Rules</th>
                                  <th scope="col">Penalty</th>
                                </tr>
                              </thead>
                              <tbody id="table_contents">`;

    //const element = document.getElementById("print");
    const element = printTemplate + table_contents.innerHTML + `</tbody></table></div></div>`;
    html2pdf(element, {
      margin: 1,
      filename: list_type.value + '.pdf',
      image: {
        type: 'png',
        quality: 0.99
      },
      html2canvas: {
        dpi: 192,
        letterRendering: true,
        useCORS: true
      },
      jsPDF: {
        unit: 'pt',
        format: 'letter',
        orientation: 'portrait'
      }
    });
    setTimeout(()=>{spaning_circle.classList.add('visually-hidden')},1000);
    
  });

  //fills table with data available in db for selected date range
  function fillTable() {
    var selection = list_type.value;
    const http_req = new XMLHttpRequest();
    http_req.onload = function() {
      // console.log(this.responseText);
      table_contents.innerHTML = this.responseText;
      if (this.responseText == "") {
        showMsg("Data not found!", "Sorry! No data available in seleceted date range");
      }
    }
    http_req.open('GET', "Report/get_data.php?from='" + from.value + "'&to='" + to.value + "'&list=" + selection);
    http_req.send();
  }
</script>