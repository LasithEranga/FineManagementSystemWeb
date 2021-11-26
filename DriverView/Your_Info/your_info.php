<!-- container div -->

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand">
            <h1 class="pt-2 px-3">Your Info</h1>
        </a>

    </div>
</nav>

<div class="d-flex container flex-column  bg-dark  text-white col-lg-11 h-auto " style="width: 95%;">
    <div class=" col-10">
        <div class="d-flex">
            <div class="flex-row col-5">
                <div class="form-group mb-2">
                    <label for="nic" class="mb-2">NIC</label>
                    <input type="text" class="form-control bg-dark text-light" id="nic" aria-describedby="emailHelp" placeholder="Enter email" value="998566530V">
                </div>
                <div class="form-group mb-2">
                    <label for="fname" class="mb-2">First Name</label>
                    <input type="text" class="form-control bg-dark text-light" id="fname" value="Lasith">
                </div>
                <div class="form-group mb-2">
                    <label for="lname" class="mb-2">Last Name</label>
                    <input type="text" class="form-control bg-dark text-light" id="lname" value="Eranda">
                </div>
                <div class="form-group mb-2">
                    <label for="fullname" class="mb-2">Full Name</label>
                    <input type="text" class="form-control bg-dark text-light" id="fullname" value="Lasith Eranda">
                </div>
                <div class="form-group mb-2">
                    <label for="email" class="mb-2">Email</label>
                    <input type="email" class="form-control bg-dark text-light" id="email" value="lasith@gmail.com">
                </div>

            </div>
            <div class="flex-row col-5 ms-3">
                <div class="form-group mb-2">
                    <label for="contactNo" class="mb-2">Contact No</label>
                    <input type="text" class="form-control bg-dark text-light" id="contactNo" aria-describedby="emailHelp" value="0770543422">
                </div>
                <div class="form-group mb-2">
                    <label for="address" class="mb-2">Address</label>
                    <textarea class="form-control bg-dark text-light"  id="address" style="height: 100px">B16,Inamaluwa,Matara</textarea>
                </div>
                

            </div>
        </div>
        <div class="col-10 text-end ms-3">
            <button type="submit" class="btn btn-primary mt-3 ">Update Info</button>
        </div>
    </div>


</div>
<!--Scripts-->