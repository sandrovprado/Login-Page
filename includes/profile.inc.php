<?php

if(isset($_POST["save"])){
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInfoInput($name,$phone,$address,$city,$state) !== false){
        header("location: ../profile.php?error=emptyInfoInput");
        exit(); //stops script from running 
    }
    if(invalidInfoInput($name,$city,$state) !==false){
        header("location: ../profile.php?error=invalidInfoInput");
        exit();  
    }
    if(invalidPhoneInput($phone) !==false){
        header("location: ../profile.php?error=invalidPhoneInput");
        exit();  
    }

    createUserInfo($conn,$name,$phone,$address,$city,$state);

    }
    else{
        header("location: ../profile.php");
        exit();
    }

?>

