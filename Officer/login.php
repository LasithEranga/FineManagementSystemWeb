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
  <script src="md5.min.js"></script>
  <style>
    .m-50 {
      margin-top: 50px;
    }
  </style>
</head>

<body class="bg-dark d-flex justify-content-center">
  <div class="d-flex flex-column bg-dark text-white col-12 col-md-5">
    <div class="m-50 ms-3 fs-3 text-md-center">
      <img src="./images/logo.png" width="120px" alt="" />
    </div>
    <div id="login_label" class="m-50 ms-3 fs-3">LOGIN</div>
    <div class="ms-3 mb-4">Please sign in to continue</div>
    <div class="col-12 d-flex flex-column ms-3">
      <div class="mb-3 col-11">
        <label for="police_id" class="form-label">Username</label>
        <input type="text" class="form-control" id="police_id" value="45564" placeholder="45564" />
      </div>
      <div class="mb-3 col-11" id="show_new_password" style="display: none;">
        <label for="new_password" class="form-label" >New Password</label>
        <input type="password" class="form-control" id="new_password"  placeholder="******" />
      </div>
      <div class="mb-3 col-11">
        <label for="password" id="password_label" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" value="sineru@gmail.com" placeholder="******" />
      </div>
      <div id="login_failed_alert" class=" flex-row pt-1 col-11" style="display: none;">
        <div class="col text-danger">Login Failed ! </div>
        <div class="col text-end"><a href="#">Forgot password?</a></div>
      </div>
      <div id="reset_success" class=" flex-row pt-1" style="display: none;">
        <div class="col text-success">Password updated! please login using new password</div>
      </div>
      <button type="button" id="login_button" onclick="verifyUser()" class="btn btn-primary col-11 mt-5 mb-5">
        Login
      </button>
    </div>
  </div>

  <script>
    
    const police_id = document.getElementById('police_id');
    const password = document.getElementById('password');
    const login_failed_alert = document.getElementById('login_failed_alert');
    const password_label = document.getElementById('password_label');
    const show_new_password = document.getElementById('show_new_password');
    const login_button = document.getElementById('login_button');
    const login_label = document.getElementById('login_label');

    function validateEmail(value) {
      //validate email
      var checkEmail = /^(([^<>()[\]\\.,;:\s@]+(\.[^<>()[\]\\.,;:\s@]+)*)|(.+))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      if (checkEmail.test(value)) {
        return true;
      } else {
        return false;
      }

    }

    function verifyUser() {

      if (validateEmail(password.value)) {
        //if the password looks like email, user will be return to reset password section
        hashPassword = password.value;
      } else {
        hashPassword = md5(password.value);
      }
      const http_req = new XMLHttpRequest();
      http_req.onload = function() {
        //alert(this.responseText);
        if (this.responseText == "logged") {
          window.open('home.php', '_self');
        } else if (this.responseText == "reset") {
          //shows the password reset section 
          password.value = "";
          show_new_password.style.display = "block";
          password_label.innerHTML = "Verify Password";
          login_label.innerHTML = "Reset Password";
          login_button.setAttribute("onClick", "changePassword();")
          login_button.innerHTML = "Reset";

        } else {
          login_failed_alert.classList.add('d-flex');
        }

      }
      http_req.open('POST', "login_verify.php?police_id=" + police_id.value + "&password=" + hashPassword);
      http_req.send();
    }

    function changePassword() {
      //verify the passwords are same
      const http_req = new XMLHttpRequest();
      http_req.onload = function() {
        if (this.responseText == "success") {
          //resetting everything and letting user to login with new password
          password.value = "";
          login_label.innerHTML = "Login";
          show_new_password.style.display = "none";
          password_label.innerHTML = "Password";
          login_button.innerHTML = "Login";
          login_button.setAttribute("onClick", "verifyUser();");
          document.getElementById('reset_success').classList.add('d-flex');
        }
      }
      http_req.open('POST', "password_reset.php?password=" + md5(password.value));
      http_req.send();
    }
  </script>
</body>

</html>