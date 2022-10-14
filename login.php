<?php 
    include_once 'header.php';

?>

    <div class = "row justify-content-center">
    <section class="signup-form"> 
        <h2>Login</h2>
        <form action="includes/login.inc.php" method="post">
        <div class = "form-group">
            <input type="text" name="uid" placeholder="Username/Email...">
            </div>
            <div class = "form-group">
            <input type="password" name="pwd" placeholder="Password...">
            </div>
            <div class = "form-group">
            <button type="submit" name="submit" class = "btn btn-primary">Login</button>
</div>
        </form>

        </div>
        <?php 
        if(isset($_GET["error"])){ //GET checks for data that we can see
            if($_GET["error"] == "emptyinput"){
                echo"<p>Fill in all fields!</p>";
            }
            else if($_GET["error"] == "wronglogin"){
                echo"<p>Incorrect login information!</p>";
            }
            
        } 
            
    ?>

    </section>


<?php 

    include_once 'footer.php';
?>