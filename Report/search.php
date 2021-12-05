<?php
include('../db.php');

$from = $_REQUEST['from'];
$to = $_REQUEST['to'];
$list = $_REQUEST['list'];
$keyword = $_REQUEST['keyword'];

if ($list == "expired") {
    $query = "SELECT * FROM (SELECT receipt_driver.State, receipt_driver.fine_receipt_id,receipt_driver.full_name,receipt_driver.address,receipt_driver.nic,receipt_driver.date, cast(receipt_driver.amount as decimal(10,2)) as Amount, GROUP_CONCAT(rule.rule_name) as rules FROM(SELECT * FROM rules_broken rb INNER JOIN (SELECT * FROM fine_receipt fr INNER JOIN driver dr ON fr.driver_nic = dr.nic WHERE date >= " . $from . " AND date <= " . $to . " AND dr.full_name LIKE '".$keyword."%' OR dr.nic LIKE '".$keyword."%' OR fr.Ref_No LIKE '".$keyword."%' ) receipt_and_driver ON receipt_and_driver.Ref_No = rb.fine_receipt_id) receipt_driver INNER JOIN rule rule ON rule.rule_id = receipt_driver.rule_id GROUP BY (receipt_driver.fine_receipt_id)) as new
    WHERE new.date <= (CURRENT_DATE - 14) AND State = 0;";

} 
else if ($list == "allRecords") {
    $query = "SELECT receipt_driver.fine_receipt_id,receipt_driver.full_name,receipt_driver.address,receipt_driver.nic,receipt_driver.date, cast(receipt_driver.amount as decimal(10,2)) as Amount, GROUP_CONCAT(rule.rule_name) as rules FROM(SELECT * FROM rules_broken rb INNER JOIN (SELECT * FROM fine_receipt fr INNER JOIN driver dr ON fr.driver_nic = dr.nic WHERE date >= " . $from . " AND date <= " . $to . " AND dr.full_name LIKE '".$keyword."%' OR dr.nic LIKE '".$keyword."%' OR fr.Ref_No LIKE '".$keyword."%') receipt_and_driver ON receipt_and_driver.Ref_No = rb.fine_receipt_id) receipt_driver INNER JOIN rule rule ON rule.rule_id = receipt_driver.rule_id GROUP BY (receipt_driver.fine_receipt_id) ";
} 
else if ($list == "paid") {
    $query = "SELECT receipt_driver.fine_receipt_id,receipt_driver.full_name,receipt_driver.address,receipt_driver.nic,receipt_driver.date, cast(receipt_driver.amount as decimal(10,2)) as Amount, GROUP_CONCAT(rule.rule_name) as rules FROM(SELECT * FROM rules_broken rb INNER JOIN (SELECT * FROM fine_receipt fr INNER JOIN driver dr ON fr.driver_nic = dr.nic WHERE date >= " . $from . " AND date <= " . $to . " AND State = 1  AND dr.full_name LIKE '".$keyword."%' OR dr.nic LIKE '".$keyword."%' OR fr.Ref_No LIKE '".$keyword."%') receipt_and_driver ON receipt_and_driver.Ref_No = rb.fine_receipt_id) receipt_driver INNER JOIN rule rule ON rule.rule_id = receipt_driver.rule_id GROUP BY (receipt_driver.fine_receipt_id) ";

} 
else if ($list == "pending") {
    $query = "SELECT receipt_driver.fine_receipt_id,receipt_driver.full_name,receipt_driver.address,receipt_driver.nic,receipt_driver.date, cast(receipt_driver.amount as decimal(10,2)) as Amount, GROUP_CONCAT(rule.rule_name) as rules FROM(SELECT * FROM rules_broken rb INNER JOIN (SELECT * FROM fine_receipt fr INNER JOIN driver dr ON fr.driver_nic = dr.nic WHERE date >= " . $from . " AND date <= " . $to . " AND State = 0 AND dr.full_name LIKE '".$keyword."%' OR dr.nic LIKE '".$keyword."%' OR fr.Ref_No LIKE '".$keyword."%') receipt_and_driver ON receipt_and_driver.Ref_No = rb.fine_receipt_id) receipt_driver INNER JOIN rule rule ON rule.rule_id = receipt_driver.rule_id GROUP BY (receipt_driver.fine_receipt_id) ";

} 
else if ($list == "suedList") {
    $query = "SELECT receipt_driver.fine_receipt_id,receipt_driver.full_name,receipt_driver.address,receipt_driver.nic,receipt_driver.date, cast(receipt_driver.amount as decimal(10,2)) as Amount, GROUP_CONCAT(rule.rule_name) as rules FROM(SELECT * FROM rules_broken rb INNER JOIN (SELECT * FROM fine_receipt fr INNER JOIN driver dr ON fr.driver_nic = dr.nic WHERE date >= " . $from . " AND date <= " . $to . " AND State = 2  AND dr.full_name LIKE '".$keyword."%' OR dr.nic LIKE '".$keyword."%' OR fr.Ref_No LIKE '".$keyword."%') receipt_and_driver ON receipt_and_driver.Ref_No = rb.fine_receipt_id) receipt_driver INNER JOIN rule rule ON rule.rule_id = receipt_driver.rule_id GROUP BY (receipt_driver.fine_receipt_id) ";

}

$result = mysqli_query($conn, $query);
$html_code = "";
while ($data = mysqli_fetch_array($result)) {
    $html_code .= "<tr>
                            <td>" . $data['fine_receipt_id'] . "</td>
                            <td>" . $data['full_name'] . "</td>
                            <td>" . $data['address'] . "</td>
                            <td>" . $data['nic'] . "</td>
                            <td>" . $data['Date'] . "</td>
                            <td >" . $data['rules'] . "</td>
                            <td>" . $data['Amount'] . "</td>
                        </tr>";
}

echo $html_code;
