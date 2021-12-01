<?php
include('../db.php');
session_start();
$driver_nic = $_SESSION['driver_nic'];
$query = "SELECT receipt_rule.Ref_No as id,receipt_rule.officer_id, receipt_rule.Date, receipt_rule.time,receipt_rule.Amount, DATE_ADD((receipt_rule.Date),INTERVAL 14 DAY) as due, GROUP_CONCAT(rule.description) as rules FROM ( SELECT * FROM rules_broken rb INNER JOIN fine_receipt ON rb.fine_receipt_id = fine_receipt.Ref_No AND fine_receipt.driver_nic = '". $driver_nic ."') as receipt_rule INNER JOIN rule ON receipt_rule.rule_id = rule.rule_id GROUP BY(receipt_rule.Ref_No)";
if(isset($_REQUEST['from'])){
    $from = $_REQUEST['from'];
    $to = $_REQUEST['to'];
    $query = "SELECT receipt_rule.Ref_No as id,receipt_rule.officer_id, receipt_rule.Date, receipt_rule.time,receipt_rule.Amount, DATE_ADD((receipt_rule.Date),INTERVAL 14 DAY) as due, GROUP_CONCAT(rule.description) as rules FROM ( SELECT * FROM rules_broken rb INNER JOIN fine_receipt ON rb.fine_receipt_id = fine_receipt.Ref_No AND fine_receipt.driver_nic = '". $driver_nic ."' AND fine_receipt.Date >= '".$from."' AND fine_receipt.Date <= '".$to."') as receipt_rule INNER JOIN rule ON receipt_rule.rule_id = rule.rule_id GROUP BY(receipt_rule.Ref_No) ";
}
$result = mysqli_query($conn, $query);
$html_code = "";
$rule_list = "";
while ($data = mysqli_fetch_array($result)) {
    foreach (explode(",", $data['rules']) as $rule){
        $rule_list .= $rule."</br>";
    }
    $html_code .= "<tr>
                            <th scope='row'>" . $data['id'] . "</th>
                            <td>" . $data['officer_id'] . "</td>
                            <td>" . $data['Date'] . "</td>
                            <td>" . $data['time'] . "</td>
                            <td>" . $data['Amount'] . "</td>
                            <td width='20%'>" . $rule_list . "</td>
                            <td>" . $data['due'] . "</td>
                        </tr>";
    $rule_list = "";
}

echo $html_code;
?>