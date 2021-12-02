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
                 <form id="modal_items" action="Settings/save_update_rule.php" method="GET">

                 </form>
             </div>
             <div class="modal-footer " style="justify-content:space-around">
                 <button type="button" class="btn btn-danger col-3" data-bs-dismiss="modal">Cancel</button>
                 <button type="button" class="btn btn-primary col-3 mx-3">Clear All</button>
                 <button id="save" type="button" class="btn btn-success col-3 " onclick="saveDetails()">Save</button>
             </div>
         </div>
     </div>
 </div>
 <button type="button" id="add_rule_modal" hidden="true" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nic_input">
 </button>
 <!-- add/update user rule end-->

 <!--messagebox Modal -->
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
                                            <input type='text' class='form-control bg-dark bg-dark text-light' id='rule_id' name='rule_id' placeholder='001' >
                                            <span id='rule_id_error' class="text-danger"></span>
                                        </div>
                                        <div class='mb-3'>
                                            <label for='rule_name' class='form-label'>Rule Name</label>
                                            <input type='text' class='form-control bg-dark text-light' id='rule_name' name='rule_name' placeholder='Double line crossed' >
                                            <span id='rule_name_error' class="text-danger"></span>
                                        </div>
                                        <div class='mb-3'>
                                            <label for='description' class='form-label'>Description</label>
                                            <input type='text' class='form-control bg-dark text-light' id='description' name='description' placeholder='The driver crossed double lines' >
                                            <span id='description_error' class="text-danger"></span>
                                        </div>
                                        <div class='mb-3'>
                                            <label for='penalty_amount' class='form-label'>Penalty Amount</label>
                                            <input type='text' class='form-control bg-dark text-light' id='penalty_amount' name='penalty_amount' placeholder='5000.00' >
                                            <span id='penalty_amount_error' class="text-danger"></span>
                                        </div>
                                        <div class='mb-3'>
                                            <label for='tag' class='form-label'>Tag</label>
                                            <input type='text' class='form-control bg-dark text-light' id='tag' name='tag' placeholder='double line'>
                                            <span id='tag_error' class="text-danger"></span>
                                        </div>
                                        <input id='submit' type='submit' hidden='true'>`;

         add_update_heading.classList.add('col', 'text-center');
         add_rule_modal.click();
     }

     //shows the msg modal
     function showMsg(title, body) {
         document.getElementById('messageTitle').innerHTML = title;
         document.getElementById('messageBody').innerHTML = body;
         document.getElementById("msgModal").click();
     }


     function saveDetails() {
         //validate details 
         //submit the form 

         var allvalid = true;
         const rule_id_error = document.getElementById('rule_id_error');
         const rule_id = document.getElementById('rule_id');

         const rule_name_error = document.getElementById('rule_name_error');
         const rule_name = document.getElementById('rule_name');

         const description_error = document.getElementById('description_error');
         const description = document.getElementById('description');

         const penalty_amount_error = document.getElementById('penalty_amount_error');
         const penalty_amount = document.getElementById('penalty_amount');

         const tag_error = document.getElementById('tag_error');
         const tag = document.getElementById('tag');

         //validate rule id
         const rule_id_check = /^\d+$/;

         if (rule_id.value == "") {
             rule_id_error.innerHTML = "<i class = 'fas fa-exclamation-circle'></i> Rule ID is required!";
             if (allvalid) {
                 allvalid = false;
             }
         } else if (!rule_id_check.test(rule_id.value)) {
             rule_id_error.innerHTML = "<i class = 'fas fa-exclamation-circle'></i> Rule ID should be Numeric";
             if (allvalid) {
                 allvalid = false;
             }
         } else {
             rule_id_error.innerHTML = "";
         }


         //validate rule name
         const nameCheck = /^[a-zA-Z\s]+$/;

         if (rule_name.value == "") {
             rule_name_error.innerHTML = "<i class = 'fas fa-exclamation-circle'></i> Rule name is required!";
             if (allvalid) {
                 allvalid = false;
             }
         } else if (!nameCheck.test(rule_name.value)) {
             rule_name_error.innerHTML = "<i class = 'fas fa-exclamation-circle'></i> Name should not include numbers!";
             if (allvalid) {
                 allvalid = false;
             }
         } else {
             rule_name_error.innerHTML = "";
         }


         //validate description
         const descriptionCheck = /^[a-zA-Z0-9\/\s,]+$/;

         if (description.value == "") {
             description_error.innerHTML = "<i class = 'fas fa-exclamation-circle'></i> Description is required!";
             if (allvalid) {
                 allvalid = false;
             }
         } else if (!descriptionCheck.test(description.value)) {
             description_error.innerHTML = "<i class = 'fas fa-exclamation-circle'></i> Valid description is required!";
             if (allvalid) {
                 allvalid = false;
             }
         } else {
             description_error.innerHTML = "";
         }


         //validate penalty amount
         //const penalty_amount_check = /^\d+$/;
         const penalty_amount_check = /^[0-9]*\.[0-9][0-9]$/;


         if (penalty_amount.value == "") {
             penalty_amount_error.innerHTML = "<i class = 'fas fa-exclamation-circle'></i> Penalty amount is required!";
             if (allvalid) {
                 allvalid = false;
             }
         } else if (!penalty_amount_check.test(penalty_amount.value)) {
             penalty_amount_error.innerHTML = "<i class = 'fas fa-exclamation-circle'></i> Penalty amount should have two decimal places!";
             if (allvalid) {
                 allvalid = false;
             }
         } else {
             penalty_amount_error.innerHTML = "";
         }


         //validate tag
         const tagCheck = /^[a-zA-Z\s]+$/;

         if (tag.value == "") {
             tag_error.innerHTML = "<i class = 'fas fa-exclamation-circle'></i> Tag is required!";
             if (allvalid) {
                 allvalid = false;
             }
         } else if (!tagCheck.test(tag.value)) {
             tag_error.innerHTML = "<i class = 'fas fa-exclamation-circle'></i> Tag should not include numbers!";
             if (allvalid) {
                 allvalid = false;
             }
         } else {
             tag_error.innerHTML = "";
         }



         if (allvalid) {
             document.getElementById('submit').click();
         }

     }
 </script>