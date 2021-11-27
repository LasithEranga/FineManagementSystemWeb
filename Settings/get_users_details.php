<?php
include('../db.php');
$query = "";
$result = mysqli_query($conn, $query);
$html_code = "";
while ($data = mysqli_fetch_array($result)) {
    $html_code .= "<tr>
                            <th scope='row'>" . $data['fine_receipt_id'] . "</th>
                            <td>" . $data['full_name'] . "</td>
                            <td>" . $data['address'] . "</td>
                            <td>" . $data['nic'] . "</td>
                            <td>" . $data['Date'] . "</td>
                            <td >" . $data['rules'] . "</td>
                            <td>" . $data['Amount'] . "</td>
                        </tr>";
}

echo $html_code;


