<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Fine Payment Management System</title>
  <link rel="icon" type="image/x-icon" href="./logo.ico" />

  <!--Stylesheets-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
  <link rel="stylesheet" href="landing.css" />
  <!-- Javascripts -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.0/dist/chart.min.js"></script>
  <style>
    .m-50 {
      margin-top: 50px;
    }
  </style>
</head>

<body class="bg-dark">
  <div class="d-flex flex-column bg-dark text-white col-12">
    <div class="m-50 ms-3 fs-3 text-center">
      <img src="./images/logo.png" width="120px" alt="" />
    </div>
    <div class="m-50 ms-3 fs-3">LOGIN</div>
    <div class="ms-3 mb-4">Please sign in to continue</div>
    <div class="col-12 d-flex flex-column ms-3">
      <div class="mb-3 col-11">
        <label for="police_id" class="form-label">Username</label>
        <input type="text" class="form-control" id="police_id" value="45564" placeholder="Eg: -45564" />
      </div>
      <div class="mb-3 col-11">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" value="sineru@gmail.com" placeholder="******" />
      </div>
      <button type="button" onclick="verifyUser()" class="btn btn-primary col-11 mt-5 mb-5">
        Login
      </button>
    </div>
  </div>

  <script>
    function verifyUser() {
      username = document.getElementById("police_id").value;
      password = document.getElementById("password").value;
      const http_req = new XMLHttpRequest();
      http_req.onload = function() {
        alert(this.responseText);
        if (this.responseText == "logged") {
          window.open("home.php", "_self");
        } else {
          //document.getElementById("login_failed_alert").classList.add("d-flex");
        }
      };
      http_req.open("GET","login_verify.php?police_id=" + username + "&password=" + password);
      http_req.send();
    }
  </script>
</body>

</html>