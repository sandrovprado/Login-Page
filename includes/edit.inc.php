
<?php

session_start();

$conn = new mysqli('localhost', 'root', '', 'login_page');

$name = ''; //set values to empty strings in case edit button has not been clicked
$phone = '';
$address = '';
$city = '';
$state = '';
$edit = false;

if(!$conn){
    die(mysqli_error($conn));
}

if(isset($_POST['editid'])){
    $id=$_GET['editid'];
    $edit = true;
    $sql="SELECT * FROM userInfo WHERE id=$id";
    $result=mysqli_query($conn,$sql);
    if(count($result)==1){
        $row = $result->fetch_array();
        $name=$row['name'];
        $phone=$row['phone'];
        $address=$row['address'];
        $city=$row['city'];
        $state=$row['state'];
    }
    else{
        die(mysqli_error($conn));
    }
}

if(isset($_POST['update'])){
    $id = $_POST['update'];
    $name=$row['name'];
    $phone=$row['phone'];
    $address=$row['address'];
    $city=$row['city'];
    $state=$row['state'];

    $sql->query("UPDATE userInfo SET name = '$name',phone='$phone',address='$address',city='$city',state='$state'
    WHERE id=$id") or die($mysqli->error);

    echo "Record has been updated";
    header("location: ../profile.php");
    exit();

}


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInfoInput($name,$phone,$address,$city,$state) !== false){
        header("location: ../edit.php?error=emptyInfoInput");
        exit(); //stops script from running 
    }
    if(invalidInfoInput($name,$city,$state) !==false){
        header("location: ../edit.php?error=invalidInfoInput");
        exit();  
    }
    if(invalidPhoneInput($phone) !==false){
        header("location: ../edit.php?error=invalidPhoneInput");
        exit();  
    }

    
    else{
        header("location: ../profile.php");
        exit();
    }

?>
