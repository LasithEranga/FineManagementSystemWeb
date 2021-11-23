<?php 
include("sql.php");

class Officer{

    private $police_id;
    private $fname;
    private $lname;
    private $full_name;
    private $email;
    private $nic;
    private $contact_no;
    private $post;
    private $address;
    
   function  getId(){
        return $this->police_id;
    }

    function  getFirstName(){
        return $this->fname;
    }

    function getLastName(){
        return $this->lname;
    }

    function getFullName(){
        return $this->full_name;
    }

    function getEmail(){
        return $this->email;
    }
    
    function getNIC(){
        return $this->nic;
    }

    function getContactNo(){
        return $this->contact_no;
    }

    function getPost(){
        return $this->post;
    }

    function getAddrress(){
        return $this->address;
    }

    function setId($id){
         $this->police_id = $id;
    }

    function setFirstName($fname){
         $this->fname = $fname;
    }

    function setLastName($lname){
         $this->lname = $lname;
    }

    function setFullName($full_name){
         $this->full_name = $full_name;
    }

    function setEmail($email){
         $this->email = $email;
    }
    
    function setNIC($nic){
         $this->nic = $nic;
    }

    function setContactNo($contact_no){
         $this->contact_no = $contact_no;
    }

    function setPost($post){
         $this->post = $post;
    }

    function setAddrress($address){
         $this->address = $address;
    }


    function saveDetails(){

        $query = "INSERT INTO traffic_police_officer VALUES('$police_id','$fname' , '$lname' , '$full_name' , '$email' , '$nic' , '$contact_no' , '$post' , '$address')";

        $resultForStaff = mysqli_query($connection, $query);

        if ($resultForStaff) {
            $_SESSION['success'] = 'Data Saved to Database';
            header("");//replace with the page needed
            exit();
        } 
    }

    function updateDetails(){
        $query = "UPDATE traffic_police_officer SET  police_id = '$police_id' ,fname = '$fname' , lname = '$lname', full_name = '$full_name' , email = '$email', nic = '$nic' , contact_no = '$contact_no', post = '$post' , address = '$address')";

        $resultForStaff = mysqli_query($connection, $query);

        if ($resultForStaff) {
            $_SESSION['success'] = 'Data Saved to Database';
            header("");//replace with the page needed
            exit();
        }
    }

}

?>