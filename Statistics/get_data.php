<?php
include('../db.php');
$groupBy = $_REQUEST['groupBy'];
$category = $_REQUEST['category'];
$from = $_REQUEST['from'];
$to = $_REQUEST['to'];

if ($category == 'Revenue') {
    $query = "SELECT SUM(amount) as yaxis, DATE_FORMAT(date,'%Y-%m-%d') as xaxis FROM payment WHERE date >=" . $from . " AND date <=" . $to . " Group BY " . $groupBy . "(date)";
    $result = mysqli_query($conn, $query);
    $yaxis = '';
    $xaxis = '';
    while ($data = mysqli_fetch_array($result)) {
        $yaxis .= $data['yaxis'] . ",";
        $xaxis .= $data['xaxis'] . ",";
    };

    echo substr($yaxis, 0, -1) . "&" . substr($xaxis, 0, -1);
} 
else if($category == 'Cases') {
    $query = "SELECT COUNT(Ref_No) as yaxis, DATE_FORMAT(date,'%Y-%m-%d') as xaxis FROM fine_receipt WHERE date >=" . $from . " AND date <=" . $to . " Group BY ". $groupBy ."(date)";
    $result = mysqli_query($conn, $query);
    $yaxis = '';
    $xaxis = '';
    while ($data = mysqli_fetch_array($result)) {
        $yaxis .= $data['yaxis'] . ",";
        $xaxis .= $data['xaxis'] . ",";
    };

    echo substr($yaxis, 0, -1) . "&" . substr($xaxis, 0, -1);
}

