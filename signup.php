<?php 
    include_once 'header.php';

?>

<div class = "row justify-content-center">
    <section class="signup-form"> 
        <h2>Sign Up</h2>
        <form action="includes/signup.inc.php" method="post">
            <div class = "form-group">
            <input type="text" name="name" placeholder="Full name...">
            </div>
            <div class = "form-group">
            <input type="text" name="email" placeholder="Email...">
            </div>
            <div class = "form-group">
            <input type="text" name="uid" placeholder="Username...">
            </div>
<div class = "form-group">
            <input type="password" name="pwd" placeholder="Password...">
            </div>
<div class = "form-group">
            <input type="password" name="pwdrepeat" placeholder="Repeat password...">
            </div>
<div class = "form-group">
            <button type="submit" name="submit" class = "btn btn-primary">Sign Up</button>
            </div>
        </form>

</div>


        <?php 
        
        if(isset($_GET["error"])){ //GET checks for data that we can see
            if($_GET["error"] == "emptyinput"){
                echo"<p>Fill in all fields!</p>";
            }
            else if($_GET["error"] == "invaliduid"){
                echo"<p>Choose a proper username!</p>";
            }
            else if($_GET["error"] == "invalidemail"){
                echo"<p>Choose a proper email!</p>";
            }
            else if($_GET["error"] == "pwddoesnotmatch"){
                echo"<p>Password doesn't match!</p>";
            }
            else if($_GET["error"] == "stmtfailed"){
                echo"<p>Something went wrong!</p>";
            }
            else if($_GET["error"] == "usernametaken"){
                echo"<p>Username already taken!</p>";
            }
            else if($_GET["error"] == "none"){
                echo"<p>You have successfully signed up!</p>";
            }
        } 
            
    ?>

    </section>

    


<?php 

    include_once 'footer.php';
?>