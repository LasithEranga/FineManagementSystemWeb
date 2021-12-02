 <!-- add/update user modal -->
 <div class="modal fade" id="nic_input" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog  modal-dialog-centered">
         <div class="modal-content bg-dark text-light">
             <div class="modal-header">
                 <h5 class="modal-title" id="add_update_heading"></h5>
                 <button type="button" class="btn text-light" data-bs-dismiss="modal"> <i class="fas fa-times fs-5"></i></button>

                 <!-- <button type="button" class="btn-close text-light" data-bs-dismiss="modal" aria-label="Close"></button> -->
             </div>
             <div class="modal-body ">
                 <form id="modal_items" action="./Settings/save_update_user.php" method="post">

                 </form>
             </div>
             <div class="modal-footer " style="justify-content:space-around">
                 <button type="button" class="btn btn-danger col-3" data-bs-dismiss="modal">Cancel</button>
                 <button type="button" class="btn btn-primary col-3 mx-3">Clear All</button>
                 <button id="save" type="button" onclick="saveDetails()" class="btn btn-success col-3 ">Save</button>
             </div>
         </div>
     </div>
 </div>
 <button type="button" id="add_user_modal" hidden="true" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nic_input">
 </button>
 <!-- add/update user modal end-->

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

             <button type="button" id="btn_share" class="btn  btn-block btn-success px-4 mb-2 mb-md-0 me-md-2">Share</button>
             <button type="button" id="printBtn" class="btn  btn-block btn-success px-4 me-md-2">Save as PDF
                 <span id="spaning_circle" class=" spinner-border text-info text-light visually-hidden spinner-border-sm"></span>

             </button>
             <button id="btn_add_user" type="button" class="btn  btn-block btn-success px-4 me-md-2" onclick="showAddUserModal()">Add User</button>

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
     const modal_items = document.getElementById('modal_items');
     const add_user_modal = document.getElementById('add_user_modal');
     const btn_add_user = document.getElementById('btn_add_user');
     const add_update_heading = document.getElementById('add_update_heading');


     var selected_section = "all_users"
     //initially loads to all user, therefore add user button is hidden
     btn_add_user.hidden = true;

     //removes green line and hover effect from given elements
     function removeLine() {
         all_users.classList.remove('bottom-green', 'cursor_change');
         officers.classList.remove('bottom-green', 'cursor_change');
         drivers.classList.remove('bottom-green', 'cursor_change');
         all_users.classList.add('cursor_change');
         officers.classList.add('cursor_change');
         drivers.classList.add('cursor_change');
     }

     //adds the green line and hover effet to section element
     function addLine(section) {
         removeLine();
         section.classList.add('bottom-green');
         section.classList.remove('cursor_change');
     }

     all_users.addEventListener('click', () => {
         addLine(all_users);
         selected_section = "all_users";
         fillTable();
         btn_add_user.hidden = true;
     });

     officers.addEventListener('click', () => {
         addLine(officers);
         selected_section = "officers";
         fillTable();
         btn_add_user.hidden = false;
     });

     drivers.addEventListener('click', () => {
         addLine(drivers);
         selected_section = "drivers";
         fillTable();
         btn_add_user.hidden = false;
     });

     function showMsg(title, body) {
         document.getElementById('messageTitle').innerHTML = title;
         document.getElementById('messageBody').innerHTML = body;
         document.getElementById("msgModal").click();
     }



     //fills table with data available in db 
     function fillTable() {
         const http_req = new XMLHttpRequest();
         http_req.onload = function() {
             // console.log(this.responseText);
             table_contents.innerHTML = this.responseText;
             if (this.responseText == "") {
                 showMsg("Data not found!", "Sorry! No data available");
             }
         }
         http_req.open('GET', "Settings/get_users_details.php?selected_section=" + selected_section);
         http_req.send();
     }
     fillTable();

     //get data from database for update modal and show the modal
     function showUpdateModal(user_id, user_type) {
         const http_req = new XMLHttpRequest();
         http_req.onload = function() {
             // console.log(this.responseText);
             modal_items.innerHTML = this.responseText;
             if (selected_section == "officers") {
                 add_update_heading.innerHTML = "Police Officer Details";
             } else if (selected_section == "drivers") {
                 add_update_heading.innerHTML = "Driver Details"
             }
             add_update_heading.classList.add('col', 'text-center');
             add_user_modal.click();

         }
         http_req.open('GET', "Settings/user_modal_details.php?user_id=" + user_id + "&user_type=" + user_type);
         http_req.send();
     }

     //get data from database for update modal and show the modal
     function showAddUserModal() {
         if (selected_section == "drivers") {
             add_update_heading.innerHTML = "Driver Details";
             add_update_heading.classList.add('col', 'text-center');
             modal_items.innerHTML = `
                                 <input type='hidden' name='drivers'>
                                    <div class='mb-3'>
                                        <label for='fname' class='form-label'>First Name</label>
                                        <input type='text' class='form-control bg-dark bg-dark text-light' id='fname' name='fname' placeholder='Kamal' >
                                        <span id='fname_error' class="text-danger"></span>
                                    </div>
                                    <div class='mb-3'>
                                        <label for='lname' class='form-label'>Last Name</label>
                                        <input type='text' class='form-control bg-dark bg-dark text-light' id='lname' name='lname'  placeholder='Rathnayake' >
                                        <span id='lname_error' class="text-danger"></span>
                                    </div>
                                    <div class='mb-3'>
                                        <label for='full_name' class='form-label'>Full Name</label>
                                        <input type='text' class='form-control bg-dark bg-dark text-light' id='full_name' name='full_name'  placeholder='Kamal Rathnayake'>
                                        <span id='full_name_error' class="text-danger"></span>
                                    </div>
                                    <div class='mb-3'>
                                        <label for='address' class='form-label'>Address</label>
                                        <input type='text' class='form-control bg-dark bg-dark text-light' id='address' name='address' placeholder='25, Olcott Road, Galle '>
                                        <span id='address_error' class="text-danger"></span>
                                    </div>
                                    <div class='mb-3'>
                                        <label for='text' class='form-label'>Email Address</label>
                                        <input type='text' class='form-control bg-dark bg-dark text-light' id='email' name='email'  placeholder='kamalrathnayke@gmail.com'  >
                                        <span id='email_error' class="text-danger"></span>
                                    </div>
                                    <div class='mb-3'>
                                        <label for='nic' class='form-label'> NIC Number</label>
                                        <input type='text' class='form-control bg-dark bg-dark text-light' id='nic' name='nic' placeholder='855664324V' >
                                        <span id='nic_error' class="text-danger"></span>
                                    </div>
                                    <div class='mb-3'>
                                        <label for='phone' class='form-label'>Contact No</label>
                                        <input type='text' class='form-control bg-dark bg-dark text-light' id='phone' placeholder="0770543422" name='phone'  placeholder='0772563145'>
                                        <span id='phone_error' class="text-danger"></span>
                                    </div>
                                    <input id='submit' type='submit' hidden='true'>`;
             add_user_modal.click();

         }
         if (selected_section == "officers") {
             add_update_heading.innerHTML = "Police Officer Details"
             add_update_heading.classList.add('col', 'text-center');
             modal_items.innerHTML = `
             <input type='hidden' name='officers'>
                                    <div class='mb-3'>
                                        <label for='police_id' class='form-label'> Police ID </label>
                                        <input type='text' class='form-control bg-dark bg-dark text-light' id='police_id' name='police_id'  placeholder='42531' >
                                        <span id='police_id_error' class="text-danger"></span>
                                    </div>
                                    <div class='mb-3'>
                                        <label for='fname' class='form-label'>First Name</label>
                                        <input type='text' class='form-control bg-dark bg-dark text-light' id='fname' name='fname'  placeholder='Kapila' >
                                        <span id='fname_error' class="text-danger"></span>
                                    </div>
                                    <div class='mb-3'>
                                        <label for='lname' class='form-label'>Last Name</label>
                                        <input type='text' class='form-control bg-dark bg-dark text-light' id='lname' name='lname'  placeholder='Weerasinghe' >
                                        <span id='lname_error' class="text-danger"></span>
                                    </div>
                                    <div class='mb-3'>
                                        <label for='full_name' class='form-label'>Full Name</label>
                                        <input type='text' class='form-control bg-dark bg-dark text-light' id='full_name' name='full_name'  placeholder='Kapila Weerasinghe' >
                                        <span id='full_name_error' class="text-danger"></span>
                                    </div>
                                    <div class='mb-3'>
                                        <label for='address' class='form-label'>Address</label>
                                        <input type='text' class='form-control bg-dark bg-dark text-light' id='address' name='address'  placeholder='842, Rambukkana Road, Mawathagama'>
                                        <span id='address_error' class="text-danger"></span>
                                    </div>
                                    <div class='mb-3'>
                                        <label for='text' class='form-label'>Email Address</label>
                                        <input type='text' class='form-control bg-dark bg-dark text-light' id='email' name='email'  placeholder='kapilaw@gmail.com' >
                                        <span id='email_error' class="text-danger"></span>
                                    </div>
                                    <div class='mb-3'>
                                        <label for='nic' class='form-label'> NIC Number</label>
                                        <input type='text' class='form-control bg-dark bg-dark text-light' id='nic' name='nic' placeholder='758264125V' >
                                        <span id='nic_error' class="text-danger"></span>
                                    </div>
                                    <div class='mb-3'>
                                        <label for='post' class='form-label'> Post</label>
                                        <input type='text' class='form-control bg-dark bg-dark text-light' id='post' name='post' placeholder='Inspector' >
                                        <span id='post_error' class="text-danger"></span>
                                    </div>
                                    <div class='mb-3'>
                                        <label for='phone' class='form-label'>Contact No</label>
                                        <input type='text' class='form-control bg-dark bg-dark text-light' id='phone' name='phone' placeholder='0713256698'>
                                        <span id='phone_error' class="text-danger"></span>
                                    </div>
                                    <input id='submit' type='submit' hidden='true'>`;
             add_user_modal.click();

         }
     }

     //start of save details function
     function saveDetails() {
         var allvalid = true;
         const police_id_error = document.getElementById('police_id_error');
         const police_id = document.getElementById('police_id');

         const post_error = document.getElementById('post_error');
         const post = document.getElementById('post');

         const nic_error = document.getElementById('nic_error');
         const nic = document.getElementById('nic');

         const fname_error = document.getElementById('fname_error');
         const fname = document.getElementById('fname');

         const lname_error = document.getElementById('lname_error');
         const lname = document.getElementById('lname');

         const full_name_error = document.getElementById('full_name_error');
         const full_name = document.getElementById('full_name');

         const address_error = document.getElementById('address_error');
         const address = document.getElementById('address');

         const email_error = document.getElementById('email_error');
         const email = document.getElementById('email');

         const phone_error = document.getElementById('phone_error');
         const phone = document.getElementById('phone');

         var emailCheck = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
         var nameCheck = /^[a-zA-Z\s]+$/;
         var addressCheck = /^[a-zA-Z0-9\/\s,]+$/;

         //check whether officer was selected
         if (selected_section == "officers") {
             //validate police id
             const police_id_check = /^\d{5}$/;
             if (police_id.value == "") {
                 police_id_error.innerHTML = "<i class = 'fas fa-exclamation-circle'></i> Police ID is required!";
                 if (allvalid) {
                     allvalid = false;
                 }
             } else if (!police_id_check.test(police_id.value)) {
                 police_id_error.innerHTML = "<i class = 'fas fa-exclamation-circle'></i> Police ID should be 5 digits";
                 if (allvalid) {
                     allvalid = false;
                 }
             } else {
                 police_id_error.innerHTML = "";
             }


             //validate post
             if (post.value == "") {
                 post_error.innerHTML = "<i class = 'fas fa-exclamation-circle'></i> Post is required!";
                 if (allvalid) {
                     allvalid = false;
                 }
             } else if (!nameCheck.test(post.value)) {
                 post_error.innerHTML = "<i class = 'fas fa-exclamation-circle'></i> Post is invalid!";
                 if (allvalid) {
                     allvalid = false;
                 }
             } else {
                 post_error.innerHTML = "";
             }
         }


         //validate nic
         var checkNICType1 = /^\d{9}[vxVX]{1}$/;
         var checkNICType2 = /^\d{12}$/
         if (nic.value == "") {
             nic_error.innerHTML = "<i class = 'fas fa-exclamation-circle'></i> NIC is required!";
             if (allvalid) {
                 allvalid = false;
             }
         } else if (!checkNICType1.test(nic.value) && (nic.value.length <= 10)) {
             nic_error.innerHTML = "<i class = 'fas fa-exclamation-circle'></i> NIC is invalid!";
             if (allvalid) {
                 allvalid = false;
             }
         } else if (!checkNICType2.test(nic.value) && (nic.value.length == 12)) {
             nic_error.innerHTML = "<i class = 'fas fa-exclamation-circle'></i> NIC is invalid!";
             if (allvalid) {
                 allvalid = false;
             }
         } else {
             nic_error.innerHTML = "";
         }



         //validate first name
         if (fname.value == "") {
             fname_error.innerHTML = "<i class = 'fas fa-exclamation-circle'></i> First name is required!";
             if (allvalid) {
                 allvalid = false;
             }
         } else if (!nameCheck.test(fname.value)) {
             fname_error.innerHTML = "<i class = 'fas fa-exclamation-circle'></i> Name should not include numbers or special characters!";
             if (allvalid) {
                 allvalid = false;
             }
         } else {
             fname_error.innerHTML = "";
         }

         //validate last name
         if (lname.value == "") {
             lname_error.innerHTML = "<i class = 'fas fa-exclamation-circle'></i> Last name is required!";
             if (allvalid) {
                 allvalid = false;
             }
         } else if (!nameCheck.test(lname.value)) {
             lname_error.innerHTML = "<i class = 'fas fa-exclamation-circle'></i> Last name should not include numbers or special characters!";
             if (allvalid) {
                 allvalid = false;
             }
         } else {
             lname_error.innerHTML = "";
         }

         //validate full name
         if (full_name.value == "") {
             full_name_error.innerHTML = "<i class = 'fas fa-exclamation-circle'></i> Full name is required!";
             if (allvalid) {
                 allvalid = false;
             }
         } else if (!nameCheck.test(full_name.value)) {
             full_name_error.innerHTML = "<i class = 'fas fa-exclamation-circle'></i>  Full name should not include numbers or special characters!";
             if (allvalid) {
                 allvalid = false;
             }
         } else {
             full_name_error.innerHTML = "";
         }

         //validate address
         if (address.value == "") {
             address_error.innerHTML = "<i class = 'fas fa-exclamation-circle'></i> Address is required!";
             if (allvalid) {
                 allvalid = false;
             }
         } else if (!addressCheck.test(address.value)) {
             address_error.innerHTML = "<i class = 'fas fa-exclamation-circle'></i> Address is invalid!";
             if (allvalid) {
                 allvalid = false;
             }
         } else {
             address_error.innerHTML = "";
         }

         //validate phone no
         const checkContactNo = /^\d{10}$/;
         if (phone.value == "") {
             phone_error.innerHTML = "<i class = 'fas fa-exclamation-circle'></i> Contact Number is required!";
             if (allvalid) {
                 allvalid = false;
             }
         } else {
             if (checkContactNo.test(phone.value)) {
                 phone_error.innerHTML = "";
             } else {
                 phone_error.innerHTML = "<i class = 'fas fa-exclamation-circle'></i> Contact Number shoud be 10 digits!";
             }

         }


         //validate email
         var checkEmail = /^(([^<>()[\]\\.,;:\s@]+(\.[^<>()[\]\\.,;:\s@]+)*)|(.+))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
         if (email.value == "") {
             email_error.innerHTML = "<i class = 'fas fa-exclamation-circle'></i> Email Address is required!";
             if (allvalid) {
                 allvalid = false;
             }
         } else if (!emailCheck.test(email.value)) {
             email_error.innerHTML = "<i class = 'fas fa-exclamation-circle'></i> A valid Email Address is required!";
             if (allvalid) {
                 allvalid = false;
             }
         } else {
             email_error.innerHTML = "";
         }

         if (allvalid) {
             document.getElementById('submit').click();
         }

     }
     //end of save details function


     //export as pdf
     document.getElementById("printBtn").addEventListener("click", () => {
         const table_body = document.getElementById('table_body');
         spaning_circle.classList.remove('visually-hidden');
         let tableHeading = ""; //need to change table heading acording because we have three types
         let listName = "";
         if (selected_section == "all_users") {
             listName = "User Details - All Users";
             tableHeading = `<th scope='col'>NIC NO</th>
                                <th scope='col'>First Name</th>
                                <th scope='col'>Last Name</th>
                                <th scope='col'>Full Name</th>
                                <th scope='col'>Email</th>
                                <th scope='col'>Contact No</td>
                                <th scope='col'>Address</th>`;
         } else if (selected_section == "officers") {
             listName = "User Details - Police Officers";
             tableHeading = `<th scope='col'>Police ID</th>
                                <th scope='col'>First Name</th>
                                <th scope='col'>Last Name</th>
                                <th scope='col'>Full Name</th>
                                <th scope='col'>Email</th>
                                <th scope='col'>NIC</th>
                                <th scope='col'>Contact No</td>
                                <th scope='col'>Post</td>
                                <th scope='col'>Address</td>`;
         } else if (selected_section == "drivers") {
             listName = "User Details - Drivers";
             tableHeading = `<th scope='col'>NIC NO</th>
                                <th scope='col'>First Name</th>
                                <th scope='col'>Last Name</th>
                                <th scope='col'>Full Name</th>
                                <th scope='col'>Email</th>
                                <th scope='col'>Contact No</td>
                                <th scope='col'>Address</th>`;
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
                                  ` + tableHeading + `
                                </tr>
                              </thead>
                              <tbody id="table_contents">`;

         //const element = document.getElementById("print");
         const element = printTemplate + table_body.innerHTML + `</tbody></table></div></div>`;
         html2pdf(element, {
             margin: 1,
             filename: listName + '.pdf',
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
                 format: 'a3',
                 orientation: 'portrait'
             }
         });
         setTimeout(() => {
             spaning_circle.classList.add('visually-hidden')
         }, 1000);

     });


 </script>
 <script type="text/javascript">
     function sendEmail() {
         Email.send({
                 Host: "smtp.gmail.com",
                 Username: "finexpayment@gmail.com",
                 Password: "cxbmyrkpzqunokzk",
                 To: 'lasitheranga1@gmail.com',
                 From: "finexpayment@gmail.com",
                 Subject: "Sending Email using javascript",
                 Body: `<th scope='col'>NIC NO</th>
                                <th scope='col'>First Name</th>
                                <th scope='col'>Last Name</th>
                                <th scope='col'>Full Name</th>
                                <th scope='col'>Email</th>
                                <th scope='col'>Contact No</td>
                                <th scope='col'>Address</th>` + table_body.innerHTML + `</tbody></table></div></div>`,
                 html: "",
             })
             .then(function(message) {
                 alert("mail sent successfully")
             });
     }

     document.getElementById('btn_share').addEventListener('click', () => {
         sendEmail();
     });
 </script>