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
                         <input type="text" class="form-control" id="fname" name="fname" placeholder="Jhon">
                     </div>
                     <div class="mb-3">
                         <label for="lname" class="form-label">Last Name</label>
                         <input type="text" class="form-control" id="lname" name="lname" placeholder="Doily">
                     </div>
                     <div class="mb-3">
                         <label for="fullname" class="form-label">Full Name</label>
                         <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Doily">
                     </div>
                     <div class="mb-3">
                         <label for="address" class="form-label">Address</label>
                         <input type="text" class="form-control" id="address" name="address" placeholder="Doily">
                     </div>
                     <div class="mb-3">
                         <label for="text" class="form-label">Email Address</label>
                         <input type="text" class="form-control" id="email" name="email" placeholder="Doily">
                     </div>
                     <div class="mb-3">
                         <label for="nic" class="form-label">Owner NIC</label>
                         <input type="text" class="form-control" id="nic" name="nic" placeholder="Doily">
                     </div>
                     <div class="mb-3">
                         <label for="phone" class="form-label">Contact No</label>
                         <input type="text" class="form-control" id="phone" name="phone" placeholder="Doily">
                     </div>
                     <div class="mb-3">
                         <label for="licenseNo" class="form-label">License No</label>
                         <input type="text" class="form-control" id="licenseNo" name="licenseNo" placeholder="Doily">
                     </div>
                     <div class="mb-3">
                         <label for="vehicleNo" class="form-label">Vehicle No</label>
                         <input type="text" class="form-control" id="vehicleNo" name="vehicleNo" placeholder="Doily">
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

 <!-- add police officer modal -->
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
                         <input type="text" class="form-control" id="fname" name="fname" placeholder="Jhon">
                     </div>
                     <div class="mb-3">
                         <label for="lname" class="form-label">Last Name</label>
                         <input type="text" class="form-control" id="lname" name="lname" placeholder="Doily">
                     </div>
                     <div class="mb-3">
                         <label for="fullname" class="form-label">Full Name</label>
                         <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Doily">
                     </div>
                     <div class="mb-3">
                         <label for="address" class="form-label">Address</label>
                         <input type="text" class="form-control" id="address" name="address" placeholder="Doily">
                     </div>
                     <div class="mb-3">
                         <label for="text" class="form-label">Email Address</label>
                         <input type="text" class="form-control" id="email" name="email" placeholder="Doily">
                     </div>
                     <div class="mb-3">
                         <label for="nic" class="form-label">Owner NIC</label>
                         <input type="text" class="form-control" id="nic" name="nic" placeholder="Doily">
                     </div>
                     <div class="mb-3">
                         <label for="phone" class="form-label">Contact No</label>
                         <input type="text" class="form-control" id="phone" name="phone" placeholder="Doily">
                     </div>
                     <div class="mb-3">
                         <label for="licenseNo" class="form-label">License No</label>
                         <input type="text" class="form-control" id="licenseNo" name="licenseNo" placeholder="Doily">
                     </div>
                     <div class="mb-3">
                         <label for="vehicleNo" class="form-label">Vehicle No</label>
                         <input type="text" class="form-control" id="vehicleNo" name="vehicleNo" placeholder="Doily">
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
 <!-- add police Officer modal end-->

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
         <table id="table_contents" class="table table-dark table-hover">
         </table>
     </div>
 </div>
 <script>
     const all_users = document.getElementById('all_users');
     const officers = document.getElementById('officers');
     const drivers = document.getElementById('drivers');
     const table_contents = document.getElementById('table_contents');
     var selected_section = "all_users"

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
         selected_section = "all_users";
         fillTable();
     });

     officers.addEventListener('click', () => {
         addLine(officers);
         selected_section = "officers";
         fillTable();
     });

     drivers.addEventListener('click', () => {
         addLine(drivers);
         selected_section = "drivers";
         fillTable();
     });

     function showMsg(title, body) {
         document.getElementById('messageTitle').innerHTML = title;
         document.getElementById('messageBody').innerHTML = body;
         document.getElementById("msgModal").click();
     }


     //fills table with data available in db for selected date range
     function fillTable() {
         const http_req = new XMLHttpRequest();
         http_req.onload = function() {
             // console.log(this.responseText);
             table_contents.innerHTML = this.responseText;
             if (this.responseText == "") {
                 showMsg("Data not found!", "Sorry! No data available in seleceted date range");
             }
         }
         http_req.open('GET', "Settings/get_users_details.php?selected_section=" + selected_section);
         http_req.send();
     }
     fillTable();

     function editDriver(driver_nic) {
         const http_req = new XMLHttpRequest();
         http_req.onload = function() {
             // console.log(this.responseText);
             table_contents.innerHTML = this.responseText;
         }
         http_req.open('GET', "Settings/show_driver_details.php?driver_nic=" + driver_nic);
         http_req.send();
     }
 </script>