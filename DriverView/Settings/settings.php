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
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-success me-3" type="submit">Search</button>

            </div>
        </div>
    </nav>

    <div class=" d-flex   flex-row mt-1">
        <div class=" bg-dark  d-flex flex-column flex-md-row">
            <div class=" flex-row ms-4 mb-2">
                <label for="from">From:</label>
                <input type="date" class=" ms-1 me-2" id="from" name="from">
            </div>

            <div class=" flex-row ms-4 mb-2">
                <label for="from">To:</label>
                <input type="date" class=" ms-4 me-2" id="to" name="to">
            </div>

            <div class=" flex-row ms-3 ">
                <button id="btn_go" onclick="fillTable()" type="button" class="btn btn-success px-4 ms-2  ">Go</button>
            </div>

        </div>
        <div class="d-flex flex-column  ms-auto me-3 flex-md-row">

            <button type="button" class="btn  btn-block btn-success px-4 mb-2 mb-md-0 me-md-2">Share</button>
            <button type="button" class="btn  btn-block btn-success px-4 me-md-2">Save as PDF</button>

        </div>


    </div>

    <!--table-->
    <div class="card text-white bg-dark m-4">
        <table class="table table-dark table-hover">
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
            <tbody>
                <tr>
                    <td scope="col">2</td>
                    <td scope="col">35151</td>
                    <td scope="col">2021-11-20</td>
                    <td scope="col">16:15:00</td>
                    <td scope="col">2500.00</td>
                    <td scope="col">Careless and dangerous driving</td>
                    <td scope="col">2021-12-04</td>
                </tr>

                <tr>
                    <td scope="col">19</td>
                    <td scope="col">45689</td>
                    <td scope="col">2021-11-10</td>
                    <td scope="col">18:20:00</td>
                    <td scope="col">5620.50</td>
                    <td scope="col">Failing to take an action to avoid an accident</td>
                    <td scope="col">2021-11-24</td>
                </tr>

                <tr>
                    <td scope="col">50</td>
                    <td scope="col">85457</td>
                    <td scope="col">2020-05-20</td>
                    <td scope="col">20:50:00</td>
                    <td scope="col">25000.00</td>
                    <td scope="col">Driving without a valid license</td>
                    <td scope="col">2020-06-04</td>
                </tr>

                <tr>
                    <td scope="col">60</td>
                    <td scope="col">23565</td>
                    <td scope="col">2019-04-20</td>
                    <td scope="col">09:05:00</td>
                    <td scope="col">2500.00</td>
                    <td scope="col">Double line crossed</td>
                    <td scope="col">2019-05-04</td>
                </tr>


            </tbody>
        </table>
    </div>
</div>