<?php 
    include_once 'header.php';
?>


    <html>

    <div class="container">
    <h2 class ="text-center">Information Table:</h2>
       <?php
        $serverName = "localhost";
        $dBUsername = "root";
        $dBPassword = "";
        $dBName = "login_page";

       $conn = new mysqli($serverName,$dBUsername,$dBPassword,$dBName);

        if(!$conn){
           die("Could not connect to database" . mysqli_connect_error());
       }

       $sql = "SELECT * FROM userInfo";
       $result = $conn->query($sql);

       if(!$result){
           die("Invalid query: " . $conn->error);
       }

       ?>

       <div class = "row justify-content-center">
            <table class ="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>State</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>

            <?php
                while($row=mysqli_fetch_assoc($result)){
                    $id = $row['usersId'];
                    $name = $row['name'];
                    $phone = $row['phone'];
                    $address = $row['address'];
                    $city = $row['city'];
                    $state = $row['state'];
                    echo '<tr>
                    <td>' .$id. '</td>
                    <td>' .$name. '</td>
                    <td>' .$phone. '</td>
                    <td>' .$address. '</td>
                    <td>' .$city. '</td>
                    <td>' .$state. '</td>  
                    <td>
                        <button class ="btn btn-info"><a class="text-light" href="edit.php?editid=' .$id. '">Edit</a></button> 
                        <button class ="btn btn-danger"><a class="text-light" href="delete.php?deleteid=' .$id.' ">Delete</a></button>       
                    </td>
                    </tr>';
                }

            ?>
                
                  

            </table>
        </div>

      

    </div>
    
            <?php
            echo "<h3 class ='text-center'>Information about " . $_SESSION["useruid"] . "</h3>";  
            
            ?>


        <div class = "row justify-content-center">
            <form action="includes/edit.inc.php" method="post">
                <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="Enter your name:">
                </div>
                <div class="form-group">
                <label>Phone</label>
                <input type="phone" name="phone" class="form-control" value="<?php echo $phone; ?>" placeholder="Enter your phone numer:">
                </div>
                <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" class="form-control" value="<?php echo $address; ?>" placeholder="Enter your address:">
                </div>
                <div class="form-group">
                <label>City</label>
                <input type="text" name="city" class="form-control" value="<?php echo $city; ?>" placeholder="Enter your city:">
                </div>
                <div class="form-group">
                <label>State</label>
                <input type="text" name="state" class="form-control" value="<?php echo $state; ?>" placeholder="Enter your state:">
                </div>
                <div class="form-group">
                <?php 
                    
                ?>
                <button class ="btn btn-info"><a class="text-light" name="edit" href="edit.php?update=<?php echo $id ?> ">Update</a></button> 
                </div>
            </form>
        </div>

        <?php 
        
        if(isset($_GET["error"])){ //GET checks for data that we can see
            if($_GET["error"] == "emptyInfoInput"){
                echo"<p>All field must be complete!</p>";
            }
            else if($_GET["error"] == "invalidInfoInput"){
                echo"<p>Choose proper inputs for name, city and state! (No numbers)</p>";
            }
            else if($_GET["error"] == "invalidPhoneInput"){
                echo"<p>Choose a proper phone number!</p>";
            }
            else if($_GET["error"] == "stmtfailed"){
                echo"<p>Something went wrong!</p>";
            }
            else if($_GET["error"] == "none"){
                echo"<p>You have successfully added your info</p>";
            }
            
        } 
    
    ?>



    </html>