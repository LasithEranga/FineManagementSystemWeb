<?php
include('../db.php');
$rule_id = $_REQUEST['rule_id'];
$rule_name = $_REQUEST['rule_name'];
$description = $_REQUEST['description'];
$penalty_amount = $_REQUEST['penalty_amount'];
$tag = $_REQUEST['tag'];
$query = "";
$message = "";
if(isset($_REQUEST['previous_id'])){
    //having previous id denotes that the user is trying to update
    $previous_id = $_REQUEST['previous_id'];
    $query = "UPDATE `rule` SET `rule_id`=" . $rule_id . ",`rule_name`='". $rule_name."',`penalty_amount`=". $penalty_amount.",`description`='". $description ."',`tag`='". $tag ."' WHERE rule_id = ". $previous_id .";";
    $message = "Updated!";
}
else{
    //if no previous id then user is inserting data
    $query = "INSERT INTO `rule`(`rule_id`, `rule_name`, `penalty_amount`, `description`, `tag`) VALUES (". $rule_id .",'". $rule_name."',". $penalty_amount.",'". $description."','". $tag."') ";
    $message = "Added!";
}

$result = mysqli_query($conn,$query);
if($result){
    echo "<script> alert('Rule ".$message."')</script>";
    echo "<script> window.open('../?rules','_self')</script>";
}

?>