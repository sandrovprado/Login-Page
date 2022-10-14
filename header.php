<?php
    session_start(); //ensures user is logged in on every page of the website 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

  

       <div class="wrapper">
            <div class="navbar-logo">
           <img src="img/faviconAP.png" alt="navLogo" class="navLogo">
           </div>
           <ul>
               <li><a class='text-light navbar-header' href='index.php'>Home</a></li>
               <?php
                    if(isset($_SESSION["useruid"])){ //what users sees when logged in
                        echo "<li><a class='text-light' href='profile.php'>Profile Page</a></li>";
                        echo "<li><a class='text-light' href='includes/logout.inc.php'>Logout</a></li>";
                    }
                    else{ //what user sees when not logged in 
                        echo "<li><a class='text-light' href='signup.php'>Sign Up</a></li>";
                        echo "<li><a class='text-light' href='login.php'>Login</a></li>"; 
                    }

               ?>
           </ul>

       </div> 
    
       

   

    <section class="index-categories">
    