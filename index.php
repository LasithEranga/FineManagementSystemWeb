<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!--Stylesheets-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital@1&display=swap" rel="stylesheet">
    <style>
        body {
            overflow: hidden;
        }

        .font-merri {
            font-family: 'Merriweather', serif;
        }

        .form-select {
            background-image: url("data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'><path fill='none' stroke='white' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/></svg>");
        }
    </style>
    <!-- Javascripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.0/dist/chart.min.js"></script>

</head>

<body>
    <!-- container div -->
    <div class="d-flex flex-row ">
    <?php include("sidebar/sidebar.php");?>


    <div class="d-flex flex-column bg-dark pe-5" style="overflow-y: scroll; min-width: 88%; ">
        <?php

        if (isset($_GET['dashboard'])) {

            include("Home/dashboard.php");
            echo "<script> document.getElementById('dashboard').classList.add('active')</script>";
        }

        if (isset($_GET['statistics'])) {

            include("statistics.php");
            echo "<script> document.getElementById('statistics').classList.add('active')</script>";
        }

        if (isset($_GET['report'])) {

            include("Report/report.php");
            echo "<script> document.getElementById('report').classList.add('active')</script>";
        }

        if (isset($_GET['settings'])) {

            include("settings/setting.php");
            echo "<script> document.getElementById('settings').classList.add('active')</script>";
        }
        ?>

    </div>


    </div>
   
    <!--Scripts-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    
</body>

</html>