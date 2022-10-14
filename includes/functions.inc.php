<?php

    //if result returns true, it means there is an error in user input. if result returns false it means the input of the user is valid.

function emptyInputSignup($name,$email,$username,$pwd,$pwdRepeat){ //checks for empty inputs
    $result;
    if(empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)){ //uses built in function empty() if input is empty error 
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function emptyInfoInput($name,$phone,$address,$city,$state){
    $result;
    if(empty($name) || empty($phone) || empty($address) || empty($city) || empty($state)){ //uses built in function empty() if input is empty error 
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidInfoInput($name,$city,$state){ //test if numbers are used for these fields
    $result;
    if(!preg_match("/^[a-zA-Z]*$/",$name) || !preg_match("/^[a-zA-Z]*$/",$city) || !preg_match("/^[a-zA-Z]*$/",$state) ){
        $result = true;
    }
    else{
        $result=false;
    }
    return $result;
}

function invalidPhoneInput($phone){ 
    $result;
    //!preg_match("/^[0-9]{10}+$/", $phone)
    if(!filter_var($phone,FILTER_SANITIZE_NUMBER_INT)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}


function invalidUid($username){  //if username is not proper, throw an error msg by makes result = true 
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidEmail($email){  
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){  //built in function, if email is not valid 
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd,$pwdRepeat){  
    $result;
    if($pwd !== $pwdRepeat){  
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}


function uidExists($conn, $username, $email){   //checks if username or email is taken
    $sql = "SELECT * from users WHERE usersUid = ? OR usersEmail = ?;"; //from database created from phpmyadmin, 
    //The "?" is a placeholder to prevent sql injection 
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username,$email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);

    

}

function createUsers($conn,$name,$email,$username,$pwd){  
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES(?,?,?,?);"; //inserts info into phpmyadmin database
    
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT); //built in function that makes password unreadable

    mysqli_stmt_bind_param($stmt, "ssss", $name,$email,$username,$hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../signup.php?error=none");
    exit();


}

function createUserInfo($conn,$name,$phone,$address,$city,$state){ //saves user info in database
    $sql = "INSERT INTO userInfo (name,phone,address,city,state) VALUES(?,?,?,?,?);";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../profile.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"sssss", $name,$phone,$address,$city,$state);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../profile.php?error=none");
    exit();
}


function emptyInputLogin($username,$pwd){ //checks for empty inputs
    $result;
    if(empty($username) || empty($pwd)){ //uses built in function empty() if input is empty error 
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function loginUser($conn,$username,$pwd){
    $uidExists = uidExists($conn, $username, $username); //user can log in using username or email

    if($uidExists == false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if($checkPwd == false){ //if password does not match
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if($checkPwd == true){ //user has logged in successfully 
        session_start(); //session will start under that username
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        header("location: ../index.php");
        exit();
    }
}


