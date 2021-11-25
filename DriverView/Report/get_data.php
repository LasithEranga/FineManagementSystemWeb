<?php
include('../db.php');

$from = $_REQUEST['from'];
$to = $_REQUEST['to'];

$query = "SELECT receipt_driver.fine_receipt_id,receipt_driver.full_name,receipt_driver.address,receipt_driver.contact_no,receipt_driver.date, receipt_driver.amount, GROUP_CONCAT(rule.rule_name) as rules FROM(SELECT * FROM rules_broken rb INNER JOIN (SELECT * FROM fine_receipt fr INNER JOIN driver dr ON fr.driver_nic = dr.nic WHERE date >= ".$from." AND date <= ".$to.") receipt_and_driver ON receipt_and_driver.Ref_No = rb.fine_receipt_id) receipt_driver INNER JOIN rule rule ON rule.rule_id = receipt_driver.rule_id GROUP BY (receipt_driver.fine_receipt_id) ";
$result = mysqli_query($conn, $query);
$html_code = "";
while ($data = mysqli_fetch_array($result)) {
    $html_code .= "<tr>
                            <th scope='row'>" . $data['fine_receipt_id'] . "</th>
                            <td>" . $data['full_name'] . "</td>
                            <td>" . $data['address'] . "</td>
                            <td>" . $data['contact_no'] . "</td>
                            <td>" . $data['Date'] . "</td>
                            <td>" . $data['rules'] . "</td>
                            <td>" . $data['Amount'] . "</td>
                        </tr>";
}

echo $html_code;
