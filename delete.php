<?php
    
    $conn = new mysqli('localhost', 'root', '', 'login_page');

    if(!$conn){
        die(mysqli_error($conn));
    }

    //GET allows us to access variables from url ('deleteid');
    if(isset($_GET['deleteid'])){
        $id=$_GET['deleteid'];

        $sql="DELETE FROM userInfo WHERE usersId=$id";
        $result=mysqli_query($conn,$sql);
        if($result){
            header('location:profile.php'); //allows users to stay in profile page when deleting record
        }
        else{
            die(mysqli_error($conn));
        }
    }


?>