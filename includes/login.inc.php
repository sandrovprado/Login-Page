<?php

if(isset($_POST["submit"])){

    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputLogin($username,$pwd) !== false){ //ensures the user populates all the inputs (username,password,etc.)
        header("location: ../login.php?error=emptyinput");
        exit(); //stops script from running 
    }
    loginUser($conn,$username,$pwd);

}
else{
    header("location: ../login.php");
    exit();
}