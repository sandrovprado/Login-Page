<?php

session_start();
session_unset();
session_destroy(); //destroys session when logging out 

header("location: ../index.php");
exit();