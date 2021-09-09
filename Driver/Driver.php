<?php 
include("sql.php");
class Driver{

    private $nic;
    private $fname;
    private $lname;
    private $full_name;
    private $email;
    private $contact_no;
    private $address;
    private $license_no;
    private $vehicle_no; // needs to be reevaluate
    
    function  getNIC(){
        return $this->nic;
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

    function getContactNo(){
        return $this->contact_no;
    }

    function getPost(){
        return $this->post;
    }

    function getAddrress(){
        return $this->address;
    }

    function getLicense(){
        return $this->license_no;
    }

    function getVehicleNo(){
        return $this->vehicle_no;
    }


    function setNIC($id){
         $this->nic = $id;
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
    
    function setContactNo($contact_no){
         $this->contact_no = $contact_no;
    }

    function setAddrress($address){
         $this->address = $address;
    }

    function setLicense($license_no){
        $this->license_no = $license_no;
    }

    function setVehicleNo($vehicle_no){
        return $this->vehicle_no = $vehicle_no;
    }

    function saveDetails(){

        $query = "INSERT INTO driver VALUES('$nic','$fname' , '$lname' , '$full_name' , '$email' , '$contact_no' , '$address' , '$license_no' , '$vehicle_no')";
        $resultForStaff = mysqli_query($connection, $query);

        if ($resultForStaff) {
            $_SESSION['success'] = 'Data Saved to Database';
            header("");//replace with the page needed
            exit();
        } 
    }

    function updateDetails(){
        $query = "UPDATE driver SET  nic = '$nic' ,fname = '$fname' , lname = '$lname', full_name = '$full_name' , email = '$email' , contact_no = '$contact_no' , address = '$address' , license_no = '$license_no' , vehicle_no = '$vehicle_no')";

        $resultForStaff = mysqli_query($connection, $query);

        if ($resultForStaff) {
            $_SESSION['success'] = 'Data Saved to Database';
            header("");//replace with the page needed
            exit();
        }
    }
}
?>
