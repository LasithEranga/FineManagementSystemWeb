<?php
include('../db.php');
$query = "";
$html_code = "";
$keyword = $_REQUEST['keyword'];
if(isset($_REQUEST['selected_section'])){
    $selected_section = $_REQUEST['selected_section'];
    if($selected_section == "all_users"){
        $query = "SELECT `nic`, `fname`, `lname`, `full_name`, `email`, `contact_no`, `address` FROM `traffic_police_officer` WHERE full_name LIKE '".$keyword."%' OR nic LIKE '".$keyword."%' OR email LIKE '".$keyword."%' OR contact_no LIKE '".$keyword."%' ";
        $result = mysqli_query($conn, $query);
        $html_code .= "<tdead>
                            <tr>
                                <th scope='col'>NIC NO</th>
                                <th scope='col'>First Name</th>
                                <th scope='col'>Last Name</th>
                                <th scope='col'>Full Name</th>
                                <th scope='col'>Email</th>
                                <th scope='col'>Contact No</td>
                                <th scope='col'>Address</th>
                            </tr>
                         </thead>
                        <tbody id='table_body'>";

        while ($data = mysqli_fetch_array($result)) {
        $html_code .= "     <tr>
                                <td>" . $data['nic'] . "</td>
                                <td>" . $data['fname'] . "</td>
                                <td>" . $data['lname'] . "</td>
                                <td>" . $data['full_name'] . "</td>
                                <td>" . $data['email'] . "</td>
                                <td >" . $data['contact_no'] . "</td>
                                <td>" . $data['address'] . "</td>
                            </tr>";
        }
        $query = "SELECT `nic`, `fname`, `lname`, `full_name`, `email`, `contact_no`, `address` FROM `driver` WHERE full_name LIKE '".$keyword."%' OR nic LIKE '".$keyword."%' OR email LIKE '".$keyword."%' OR contact_no LIKE '".$keyword."%'";
        $result = mysqli_query($conn, $query);
        while ($data = mysqli_fetch_array($result)) {
            $html_code .= "     <tr>
                                    <td>" . $data['nic'] . "</td>
                                    <td>" . $data['fname'] . "</td>
                                    <td>" . $data['lname'] . "</td>
                                    <td>" . $data['full_name'] . "</td>
                                    <td>" . $data['email'] . "</td>
                                    <td >" . $data['contact_no'] . "</td>
                                    <td>" . $data['address'] . "</td>
                                </tr>";
            }

        $html_code .= "</tbody>";
    
    }
    else if($selected_section == "drivers"){
        $query = "SELECT * FROM `driver` WHERE full_name LIKE '".$keyword."%' OR nic LIKE '".$keyword."%' OR email LIKE '".$keyword."%' OR contact_no LIKE '".$keyword."%'";
        $result = mysqli_query($conn, $query);
        $html_code .= "<tdead>
                            <tr>
                                <th scope='col'>NIC NO</th>
                                <th scope='col'>First Name</th>
                                <th scope='col'>Last Name</th>
                                <th scope='col'>Full Name</th>
                                <th scope='col'>Email</th>
                                <th scope='col'>Contact No</td>
                                <th scope='col'>Address</th>
                                <th class='btn_edit' scope='col'>Edit</th>
                            </tr>
                         </thead>
                        <tbody id='table_body'>";

        while ($data = mysqli_fetch_array($result)) {
        $html_code .= "     <tr>
                                <td>" . $data['nic'] . "</td>
                                <td>" . $data['fname'] . "</td>
                                <td>" . $data['lname'] . "</td>
                                <td>" . $data['full_name'] . "</td>
                                <td>" . $data['email'] . "</td>
                                <td >" . $data['contact_no'] . "</td>
                                <td>" . $data['address'] . "</td>
                                <td class='btn_edit' onclick=showUpdateModal('".$data['nic']."','driver')><i class='fas fa-user-edit'></i></td>
                            </tr>";
        }
        $html_code .= "</tbody>";
    }
    else if($selected_section == "officers"){
        $query = "SELECT * FROM `traffic_police_officer` WHERE full_name LIKE '".$keyword."%' OR nic LIKE '".$keyword."%' OR email LIKE '".$keyword."%' OR police_id LIKE '".$keyword."%'";
        $result = mysqli_query($conn, $query);
        $html_code .= "<tdead>
                            <tr>
                                <th scope='col'>Police ID</th>
                                <th scope='col'>First Name</th>
                                <th scope='col'>Last Name</th>
                                <th scope='col'>Full Name</th>
                                <th scope='col'>Email</th>
                                <th scope='col'>NIC</th>
                                <th scope='col'>Contact No</td>
                                <th scope='col'>Post</td>
                                <th scope='col'>Address</td>
                                <th class='btn_edit' scope='col'>Edit</th>
                            </tr>
                         </thead>
                        <tbody id='table_body'>";

        while ($data = mysqli_fetch_array($result)) {
        $html_code .= "     <tr>
                                <td>" . $data['police_id'] . "</td>
                                <td>" . $data['fname'] . "</td>
                                <td>" . $data['lname'] . "</td>
                                <td>" . $data['full_name'] . "</td>
                                <td>" . $data['email'] . "</td>
                                <td >" . $data['nic'] . "</td>
                                <td>" . $data['contact_no'] . "</td>
                                <td>" . $data['post'] . "</td>
                                <td>" . $data['address'] . "</td>
                                <td class='btn_edit' onclick=showUpdateModal('".$data['police_id']."','officer')><i class='fas fa-user-edit'></i></td>
                            </tr>";
        }
        $html_code .= "</tbody>";
    }
}



echo $html_code;


