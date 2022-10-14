 <?php

 if(isset($_POST["submit"])){ //ensures that the user entered the page by clicking the submit button
        
    $name = $_POST["name"]; //references super global "name"
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($name,$email,$username,$pwd,$pwdRepeat) !== false){ //ensures the user populates all the inputs (username,password,etc.)
        header("location: ../signup.php?error=emptyinput");
        exit(); //stops script from running 
    }
    if(invalidUid($username) !== false){ 
        header("location: ../signup.php?error=invaliduid");
        exit();  
    }
    if(invalidEmail($email) !== false){ 
        header("location: ../signup.php?error=invalidemail");
        exit(); 
    }
    if(pwdMatch($pwd,$pwdRepeat) !== false){  //makes sure both passwords are the same
        header("location: ../signup.php?error=passworddoesntmatch");
        exit(); 
    }
    if(uidExists($conn, $username, $email) !== false){  //makes sure username is available to use
        header("location: ../signup.php?error=usernametaken");
        exit(); 
    }

    createUsers($conn,$name,$email,$username,$pwd); //creates account if user makes no mistakes

 }
 else{
    header("location: ../signup.php");
    exit();
 }

 