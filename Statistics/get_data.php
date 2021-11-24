<?php
    include('../db.php');

    $from = $_REQUEST['from'];
    $to = $_REQUEST['to'];
    $query = "SELECT SUM(amount) as yaxis, DATE_FORMAT(date,'%Y-%m-%d') as xaxis FROM payment WHERE date >=".$from." AND date <=".$to." Group by Date(date)";
    $result = mysqli_query($conn,$query);
    $yaxis = '';
    $xaxis = '';
    while($data= mysqli_fetch_array($result)){
        $yaxis.= $data['yaxis'].",";
        $xaxis.= $data['xaxis'].",";
    };
    echo substr($yaxis, 0,-1) ."&". substr($xaxis, 0,-1);

?>