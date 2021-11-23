<?php
include ('./db.php');
$str = "";
$search_key = $_REQUEST['key'];
if ($search_key !== "") {
    $query = "SELECT * FROM `rule` WHERE rule_id= '".$search_key."'";
    $result = mysqli_query($conn,$query);
    while ($data = mysqli_fetch_array($result)){
        $str .= $data['rule_id'].",".$data['rule_name'].",".$data['description'].",".$data['penalty_amount'];
        
    }
    echo $str;
}

?>