database handler 
<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "login_page";

$conn = mysqli_connect($serverName,$dBUsername,$dBPassword,$dBName);

if(!$conn){
    die("Could not connect to database" . mysqli_connect_error());
}