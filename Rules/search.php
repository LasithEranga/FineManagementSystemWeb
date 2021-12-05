<?php
include('../db.php');
$query = "";
$html_code = "";
$keyword = $_REQUEST['keyword'];
$query = "SELECT * FROM `rule` WHERE rule_id LIKE '".$keyword."%' OR rule_name LIKE '".$keyword."%' OR tag LIKE '".$keyword."%'";
$result = mysqli_query($conn, $query);
while ($data = mysqli_fetch_array($result)) {
$html_code .= "<tr>
                    <td>" . $data['rule_id'] . "</td>
                    <td>" . $data['rule_name'] . "</td>
                    <td>" . $data['description'] . "</td>
                    <td>" . $data['penalty_amount'] . "</td>
                    <td>" . $data['tag'] . "</td>
                    <td onclick=showUpdateModal('".$data['rule_id']."','driver')><i class='fas fa-user-edit'></i></td>
                </tr>";
}

echo $html_code;
