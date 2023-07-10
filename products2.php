<?php
    session_start();
    require 'check_if_added.php';
    require 'connection.php';
    

    $query = mysqli_query($con, "SELECT * FROM items");
    $result = mysqli_fetch_array($query);

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title>Pizzaria</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="css/styles.css" type="text/css">
    </head>
    <body>
        <div>
            <?php
                require 'header.php';
            ?>
            <div class="container">
                <div id="backproduct" class="jumbotron" >
                    <h1 style="color: white;">Here is our Catalog of Meal</h1>
                    <p style="color: white;">We have the best Pizza, Pasta and Lasagna for you.</p>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail">
                            <a href="cart.php">
                                <img src="img/meatlover.jpg" alt="meatlover">
                            </a>
                            <?php foreach($result as $res) : ?>
                            <center>
                                <div class="caption">
                                    <h3><?= $res['name']; ?></h3>
                                    <p>Price: Rp. <?= $res['price']; ?></p>
                                    <?php endforeach; ?>
                                    <?php if(!isset($_SESSION['email'])){  ?>
                                        <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                        <?php
                                        }
                                        else{
                                            if(check_if_added_to_cart(1)){
                                                echo '<a href="#" class=btn btn-block btn-success disabled>Added to cart</a>';
                                            }else{
                                            ?>
                                                <a href="cart_add.php?id=1" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Add to cart</a>
                                            <?php
                                            }
                                        }
                                        ?>
                                    
                                </div>
                            </center>
                        </div>
                    </div>        
            </div>
            <center>
            <a href="?page=1">1</a>
            <a href="?page=2">2</a>
            </center>
            <br><br><br><br><br><br><br><br>
           <footer class="footer">
               <div class="container">
               <center>
                <p>All Rights Reserved || Since 2777 #WEARENUMBA1</p>
               </center>
               </div>
           </footer>
        </div>
    </body>
</html>
