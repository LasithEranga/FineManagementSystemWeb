 <!-- add/update rule modal -->
 <div class="modal fade" id="nic_input" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog  modal-dialog-centered">
         <div class="modal-content bg-dark text-light">
             <div class="modal-header">
                 <h5 class="modal-title" id="add_update_heading">Rule Deatails</h5>
                 <button type="button" class="btn text-light" data-bs-dismiss="modal"> <i class="fas fa-times fs-5"></i></button>

                 <!-- <button type="button" class="btn-close text-light" data-bs-dismiss="modal" aria-label="Close"></button> -->
             </div>
             <div class="modal-body ">
                 <form id="modal_items" action="add_driver.php" method="post">

                 </form>
             </div>
             <div class="modal-footer " style="justify-content:space-around">
                 <button type="button" class="btn btn-danger col-3" data-bs-dismiss="modal">Cancel</button>
                 <button type="button" class="btn btn-primary col-3 mx-3">Clear All</button>
                 <button id="save" type="button" class="btn btn-success col-3 ">Save</button>
             </div>
         </div>
     </div>
 </div>
 <button type="button" id="add_rule_modal" hidden="true" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nic_input">
 </button>
 <!-- add/update user rule end-->

 <div class="d-flex flex-column bg-dark text-white col-lg-12 h-auto" style="min-height: 100vh;">
     <!--navigation bar-->
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
         <div class="container-fluid">
             <a class="navbar-brand col-7">
                 <h1 class="pt-2 px-3">Manage Rules <button id="btn_add" onclick="showAddModal()" type="button" class="btn btn-success px-4 ms-2  ">Add Rule</button>
                 </h1>
             </a>
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse" id="navbarScroll">
                 <input class="form-control me-2 bg-dark text-light border_date_input" type="search" placeholder="Search" aria-label="Search">
                 <button class="btn btn-success me-3" type="submit">Search</button>

             </div>
         </div>
     </nav>

     <!-- <div class=" d-flex   flex-row mt-1">
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
                <button id="btn_go" onclick="fillTableRange()" type="button" class="btn btn-success px-4 ms-2  ">Go</button>
            </div>

        </div>
        <div class="d-flex flex-column  ms-auto me-3 flex-md-row">

            <button type="button" class="btn  btn-block btn-success px-4 mb-2 mb-md-0 me-md-2">Share</button>
            <button type="button" class="btn  btn-block btn-success px-4 me-md-2">Save as PDF</button>

        </div>


    </div> -->

     <!--table-->
     <div class="card text-white bg-dark m-4">
         <table class="table table-dark table-hover">
             <tdead>
                 <tr>
                     <th scope="col">ID</th>
                     <th scope="col">Rule Name</th>
                     <th scope="col">Description</th>
                     <th scope="col">Penalty</th>
                     <th scope="col">tag</th>
                     <th scope="col">Edit</th>
                 </tr>
                 </thead>
                 <tbody id="table_contents">

                 </tbody>
         </table>
     </div>
 </div>
 <script>
     const add_rule_modal = document.getElementById('add_rule_modal');

     //fills table with data available in db 
     function fillTable() {
         const http_req = new XMLHttpRequest();
         http_req.onload = function() {
             // console.log(this.responseText);
             table_contents.innerHTML = this.responseText;
             if (this.responseText == "") {
                 showMsg("Data not found!", "Sorry! No data available in seleceted date range");
             }
         }
         http_req.open('GET', "Settings/get_rule_details.php");
         http_req.send();
     }
     fillTable();

     //get data from database for update modal and show the modal
     function showUpdateModal(rule_id) {
         const http_req = new XMLHttpRequest();
         http_req.onload = function() {
             // console.log(this.responseText);
             modal_items.innerHTML = this.responseText;
             add_update_heading.classList.add('col', 'text-center');
             add_rule_modal.click();
         }
         http_req.open('GET', "Settings/rule_modal_details.php?rule_id=" + rule_id);
         http_req.send();
     }

     function showAddModal() {
         const http_req = new XMLHttpRequest();
         modal_items.innerHTML = `<div class='mb-3'>
                                            <label for='rule_id' class='form-label'>Rule ID</label>
                                            <input type='text' class='form-control bg-dark bg-dark text-light' id='rule_id' name='rule_id' >
                                        </div>
                                        <div class='mb-3'>
                                            <label for='rule_name' class='form-label'>Rule Name</label>
                                            <input type='text' class='form-control bg-dark text-light' id='rule_name' name='rule_name' >
                                        </div>
                                        <div class='mb-3'>
                                            <label for='description' class='form-label'>Description</label>
                                            <input type='text' class='form-control bg-dark text-light' id='description' name='description' >
                                        </div>
                                        <div class='mb-3'>
                                            <label for='penalty_amount' class='form-label'>Penalty Amount</label>
                                            <input type='text' class='form-control bg-dark text-light' id='penalty_amount' name='penalty_amount' >
                                        </div>
                                        <div class='mb-3'>
                                            <label for='tag' class='form-label'>Tag</label>
                                            <input type='text' class='form-control bg-dark text-light' id='tag' name='tag'>
                                        </div>
                                        <input id='submit' type='submit' hidden='true'>`;

         add_update_heading.classList.add('col', 'text-center');
         add_rule_modal.click();
     }
 </script>