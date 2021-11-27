<div class="d-flex flex-column bg-dark text-white col-lg-12 h-auto" style="min-height: 100vh;">
    <!--navigation bar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand col-7">
                <h1 class="pt-2 px-3">Manage Users</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <input class="form-control me-2 bg-dark text-light border_date_input" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-success me-3 " type="submit">Search</button>

            </div>
        </div>
    </nav>

    <div class=" d-flex   flex-row mt-1">
        <div class=" bg-dark  d-flex flex-column flex-md-row ">
            <div id="all_users" class=" flex-row ms-4 mb-2 px-4 bottom-green ">
                All Users
            </div>
            <!-- <label for="from" class="fs-5 ms-1">From:</label>
            <input type="date" class=" ms-1 me-2 py-1 bg-dark text-light border_date_input" id="from" name="from">-->
            <!-- <div class=" flex-row ms-4 mb-2">
                <label for="from" class="fs-5">To:</label>
                <input type="date" class=" ms-1 me-2 py-1 bg-dark text-light border_date_input" id="to" name="to">
            </div> -->
            <div id="officers" class=" flex-row ms-1 mb-2  px-4 cursor_change">
                Police Officers
            </div>
            <div id="drivers" class=" flex-row ms-1 mb-2  px-4 cursor_change">
                Drivers
            </div>
            <!-- <div class=" flex-row ms-3 ">
                <button id="btn_go" onclick="fillTableRange()" type="button" class="btn btn-success px-4 ms-2 ">Go</button>
            </div> -->

        </div>
        <div class="d-flex flex-column  ms-auto me-3 flex-md-row">

            <button type="button" class="btn  btn-block btn-success px-4 mb-2 mb-md-0 me-md-2">Share</button>
            <button type="button" class="btn  btn-block btn-success px-4 me-md-2">Save as PDF</button>
            <button type="button" class="btn  btn-block btn-success px-4 me-md-2">Add User</button>

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
                <tbody id="table_contents">

                </tbody>
        </table>
    </div>
</div>
<script>
    const all_users = document.getElementById('all_users');
    const officers = document.getElementById('officers');
    const drivers = document.getElementById('drivers');

    function removeLine() {
        all_users.classList.remove('bottom-green', 'cursor_change');
        officers.classList.remove('bottom-green', 'cursor_change');
        drivers.classList.remove('bottom-green', 'cursor_change');
        all_users.classList.add('cursor_change');
        officers.classList.add('cursor_change');
        drivers.classList.add('cursor_change');
    }

    function addLine(section) {
        removeLine();
        section.classList.add('bottom-green');
        section.classList.remove('cursor_change');
    }

    all_users.addEventListener('click', () => {
        addLine(all_users);
    });

    officers.addEventListener('click', () => {
        addLine(officers);
    });

    drivers.addEventListener('click', () => {
        addLine(drivers);
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