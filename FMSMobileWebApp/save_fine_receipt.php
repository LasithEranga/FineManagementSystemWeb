<?php
    include('./db.php');

    $officer_id = $_REQUEST['officer_id'];
    $amount = $_REQUEST['amount'];
    $driver_nic = $_REQUEST['driver_nic'];
    $date = $_REQUEST['date'];
    $time = $_REQUEST['time'];
    $offence_id_arr = explode(',',$_REQUEST['offence_id_arr']);
    $query = "INSERT INTO `fine_receipt`(`Ref_No`, `Date`, `time`, `Amount`, `State`, `driver_nic`, `officer_id`) VALUES (NULL, '".$date."','".$time."',".$amount.", 0 , '".$driver_nic."','".$officer_id."');";
    $run_query1 = mysqli_query($conn, $query);    
    $receipt_id = mysqli_insert_id($conn);
    $query = "";

    foreach ($offence_id_arr as $offence_id){
        $query .="INSERT INTO `rules_broken`(`fine_receipt_id`, `rule_id`) VALUES (".$receipt_id.",".$offence_id.");";
    }
    $run_query2 = mysqli_multi_query($conn, $query);  
    
    if($run_query1 && $run_query2){
        echo "<script> alert('Fine Receipt Saved!')</script>";
        echo "<script> window.open('./home.html','_self')</script>";
    }
