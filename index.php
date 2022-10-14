<?php 
    include_once 'header.php';

?>

            <?
                if(isset($_SESSION["useruid"])){
                    echo "<h2>Hello " . $_SESSION["useruid"] . "</h2>"; //displays name when logged in
                    
                }
                
            ?>

        <h4>categories</h2>
        <div class ="index-categories-list">
            <div>
                <h5>Fluff</h5>
            </div>
            <div>
                <h5>More Fluff</h5>
            </div>
            <div>
                <h5>Even Fluff</h5>
            </div>
            <div>
                <h5>Alot Fluff</h5>
            </div>
        </div>
    </section>


<?php 

    include_once 'footer.php';
?>

    

