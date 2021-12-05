<?php
include ('./db.php');
$str = "";
$search_key = $_REQUEST['key'];
if ($search_key !== "") {
    $query = "SELECT nic,full_name FROM driver WHERE full_name LIKE '".$search_key."%'";
    $result = mysqli_query($conn,$query);
    while ($data = mysqli_fetch_array($result)){
        $str .= "<div class='bg-light py-2 border border-dark border-bottom-2'><a href='result.php?".$data['nic']."'>".$data['full_name']."</a></div>";
        
    }

    echo $str;
}

?>