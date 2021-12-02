<?php
include('../db.php');
session_start();
$driver_id = $_SESSION['driver_nic'];//should be passed before calling session variable of login
//$query = "SELECT rules_receipt.Ref_no as id, rules_receipt.Date,DATE_ADD(rules_receipt.Date,INTERVAL 14 DAY) as due_date,rules_receipt.officer_id, rules_receipt.time, CAST(rules_receipt.Amount AS DECIMAL(10,2)) AS Amount ,GROUP_CONCAT(rule.description) as rules FROM (SELECT * FROM `fine_receipt` AS fr INNER JOIN rules_broken rb on rb.fine_receipt_id = fr.Ref_No WHERE fr.driver_nic = '".$driver_id."' AND fr.State = 0) as rules_receipt INNER JOIN rule ON rule.rule_id = rules_receipt.rule_id GROUP BY (rules_receipt.Ref_no)";
$query = "SELECT rules_receipt.Ref_no as id, rules_receipt.Date,DATE_ADD(rules_receipt.Date,INTERVAL 14 DAY) as due_date,rules_receipt.officer_id, rules_receipt.time, CAST(rules_receipt.Amount AS DECIMAL(10,2)) AS Amount ,GROUP_CONCAT(rule.description) as rules FROM (SELECT * FROM `fine_receipt` AS fr INNER JOIN rules_broken rb on rb.fine_receipt_id = fr.Ref_No WHERE fr.driver_nic = '".$driver_id."' AND Date >= (CURRENT_DATE-INTERVAL 14 DAY) AND State = 0 ) as rules_receipt INNER JOIN rule ON rule.rule_id = rules_receipt.rule_id GROUP BY (rules_receipt.Ref_no) ";
//echo $query;
$html = "";
$rule_list = "";
$count = 1; //counter for rules
$result = mysqli_query($conn, $query);
while($data = mysqli_fetch_array($result)){
    foreach (explode(",", $data['rules']) as $rule){
        $rule_list .=  "<div class=''>Offence(".$count."): <span id='rule'>".$rule."</span></div>";
        $count++;
    }
    $html .= " <div class=' d-flex  col-12 col-md-10 flex-column' style='border:1px solid white; margin-bottom:10px;'>
                <div class='d-flex flex-row col-12'>
                <div class='col-1 ms-md-3 mt-3'> <img src='./images/glogo.png' height='75px' alt=''></div>
                <div class='col-8 text-center mt-4 ps-4 ms-1 ms-md-0'>
                    <span class='fw-bold '> SPOT FINE STATEMENT </span><br> Road Safety Act 1985</p>
                </div>
                <div class='col-1 me-2 mt-3 ms-1 ms-md-0'><img src='./images/policeLogo.png' alt=''></div>
                </div>

                <div class='d-flex flex-column flex-md-row  col-10   ms-3 mt-3'>
                <div class='flex-row col'>
                    <div class='mb-3 fw-bold '>Fine Statement</div>

                    <div id='statement_id' class=''>Statement No: ".$data['id']."</div>
                    <div class=''>Officer ID: ".$data['officer_id']." </div>
                    <div class=''>Driver NIC: <span id='driver_nic'>". $driver_id ."</span></div>
                    <div class=''>Issue Date: <span id='issue_date'>".$data['Date']."</span></div>
                    <div class=''>Issue Time: <span id='issue_time'>".$data['time']."</span></div>
                    <div class=''>Street: Kaluthara Rd.</div>
                </div>
                <div class='flex-row col'>
                    <div class='mb-3 fw-bold'>Offence(s)</div>
                    ".$rule_list."
                    <div class=''> <span id='description'></span> <br>
                    Penalty : Rs.<span id='penalty".$data['id']."'>".$data['Amount']."</span><br>
                    Due Date : <span id='due_date'>".$data['due_date']."</span>
                </div>
                </div>
                </div>
                <div class='col-12 col-md-11 text-end'>
                <button type='button' class='btn btn-primary col-7 col-md-3 mx-3 mt-4 mb-5' onclick='openPaymentModal(".$data['id'].")'> Settle Fine Amount</button>
                </div>
            </div>";
            $rule_list = "";
            $count = 1;
}

echo $html;