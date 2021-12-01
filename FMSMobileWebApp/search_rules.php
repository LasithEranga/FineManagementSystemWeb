<?php
include ('./db.php');
$str = "";
$search_key = $_REQUEST['key'];
if ($search_key !== "") {
    $query = "SELECT rule_id,tag FROM `rule` WHERE tag LIKE '".$search_key."%'";
    $result = mysqli_query($conn,$query);
    while ($data = mysqli_fetch_array($result)){
        $str .= "<div class=' bg-light'  style='border-bottom: 1px solid white;'><p class='pt-3 ms-3' id='".$data['rule_id']."' onclick='setRuleDetails(this.id)'>".$data['tag']."</p></div>";
        
    }
    echo $str;
}

?>