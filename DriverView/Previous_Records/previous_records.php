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
                <h1 class="pt-2 px-3">Previous Records</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <input class="form-control me-2 border_date_input text-light bg-dark" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-success me-3" type="submit">Search</button>

            </div>
        </div>
    </nav>

    <div class=" d-flex   flex-row mt-1">
        <div class=" bg-dark  d-flex flex-column flex-md-row">
            <div class=" flex-row ms-4 mb-2 ">
                <label for="from" class="fs-5">From:</label>
                <input type="date" class=" ms-lg-1 me-2 border_date_input bg-dark text-light py-1" id="from" name="from">
            </div>

            <div class=" flex-row ms-4 mb-2 ">
                <label for="from" class="fs-5">To:</label>
                <input type="date" class=" ms-lg-4 me-2 border_date_input bg-dark text-light py-1" id="to" name="to">
            </div>

            <div class=" flex-row ms-3 ">
                <button id="btn_go" onclick="fillTableRange()" type="button" class="btn btn-success px-4 ms-2  ">Go</button>
            </div>

        </div>
        <div class="d-flex flex-column  ms-auto me-3 flex-md-row">

            <button type="button" class="btn  btn-block btn-success px-4 mb-2 mb-md-0 me-md-2 mt-4 mt-lg-0">Share</button>
            <button type="button" id="printBtn" class="btn  btn-block btn-success px-4 me-md-2">Save as PDF
                <span id="spaning_circle" class=" spinner-border text-info text-light visually-hidden spinner-border-sm"></span>
            </button>

        </div>


    </div>

    <!--table-->
    <div class="card text-white bg-dark m-4">
        <table class="table table-responsive table-dark table-hover">
            <tdead>
                <tr>
                    <th scope="col">Reference No</th>
                    <th scope="col">Officer ID</th>
                    <th scope="col">Issue Date</th>
                    <th scope="col">Issue Time</th>
                    <th scope="col">Penalty</th>
                    <th scope="col">Offence(s)</th>
                    <th scope="col">Due Date:</td>
                </tr>
                </thead>
                <tbody id="table_contents">

                </tbody>
        </table>
    </div>
</div>

<script>
    const table_contents = document.getElementById('table_contents');
    const from = document.getElementById('from');
    const to = document.getElementById('to');

    //shows the message as a modal view with passed arguments
    function showMsg(title, body) {
        document.getElementById('messageTitle').innerHTML = title;
        document.getElementById('messageBody').innerHTML = body;
        document.getElementById("msgModal").click();
    }
    //fills table with data available in db selecting all available data for user
    function fillTable() {
        const http_req = new XMLHttpRequest();
        http_req.onload = function() {
            table_contents.innerHTML = this.responseText;
            if (this.responseText == "") {
                showMsg("Data not found!", "Sorry! There are no previous records");
            }
        }
        http_req.open('GET', "Previous_Records/get_data.php");
        http_req.send();
    }
    fillTable();

    //fills table with data available in db for selected date range
    function fillTableRange() {
        const http_req = new XMLHttpRequest();
        http_req.onload = function() {
            table_contents.innerHTML = this.responseText;
            if (this.responseText == "") {
                showMsg("Data not found!", "Sorry! There are no previous records for selected date range");
            }
        }
        http_req.open('GET', "Previous_Records/get_data.php?&from=" + from.value + "&to=" + to.value);
        http_req.send();
    }

    //exports the table as a pdf
    document.getElementById("printBtn").addEventListener("click", () => {
        spaning_circle.classList.remove('visually-hidden');
        let printTemplate = `<div id='print' class='m-1'>
                          <div class='d-flex flex-row  col-12'>
                            <div class='col-1 '></div>
                            <div class='col-1 mt-3 pt-1'> <img src='https://finemanagementsystem.000webhostapp.com/images/glogo.png' alt=''height='75px'></div>
                            <div class='col-8 text-center mt-4 '>
                              <span class='fw-bold fs-2 '>  SRI LANKA POLICE </span><br>  User Report- Previous Fine Receipts from `+from.value +` to `+to.value +`<p></p>
                            </div>
                            <div class='col-1  mt-3'><img src='https://finemanagementsystem.000webhostapp.com/images/policeLogo.png' alt=''></div>
                          </div>
                          <div class="table-responsive mx-4">
                            <table class="table table-striped table-light table-hover">
                              <thead>
                                <tr>
                                    <th scope="col">Reference No</th>
                                    <th scope="col">Officer ID</th>
                                    <th scope="col">Issue Date</th>
                                    <th scope="col">Issue Time</th>
                                    <th scope="col">Penalty</th>
                                    <th scope="col">Offence(s)</th>
                                    <th scope="col">Due Date:</td>
                                </tr>
                              </thead>
                              <tbody id="table_contents">`;

        //const element = document.getElementById("print");
        const element = printTemplate + table_contents.innerHTML + `</tbody></table></div></div>`;
        html2pdf(element, {
            margin: 1,
            filename: 'UserReport.pdf',
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
        setTimeout(() => {
            spaning_circle.classList.add('visually-hidden')
        }, 1000);

    });
</script>