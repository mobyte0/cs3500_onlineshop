<!DOCTYPE html>
<html lang="en">

<body>

<?php include 'header.php'; ?>

<div class="container">  <!-- start main content container -->
    <div  class="row">  <!-- start main content row -->
        <div class="col-md-3">  <!-- start left navigation rail column -->
            <?php include 'side.php'; ?>
        </div>  <!-- end left navigation rail -->

        <div  class="col-md-9">  <!-- start main content column -->
            <div class="well">
                <div class="row">
                    <?php

                    if(isset($_GET['id'])) {

                        $img = $_GET['id'];

                        $display_img = mysqli_query($db,"SELECT * FROM `Product` WHERE ProductID = '". $img . "';" );

                        while ($pull_data = $display_img->fetch_assoc()) {

                            echo '<div class="col-md-9"><div class="list-group"><a href="SingleGame.php"><img class="img-responsive" src="images/Covers/' . $pull_data['ImagePath'] . '" alt="random image">' . '</a></div></div>';

                        }
                    }

                    ?>

                    <div class=" pull-right col-md-3">
                        <div class=" pull-right panel panel-info">
                            <div class="panel-heading">Shopping Cart</div>
                            <ul class="list-group">
                                <?php
                                    $img = $_GET['id'];

                                    $display_img = mysqli_query($db,"SELECT * FROM `Product` WHERE ProductID = '". $img . "';" );
                                    $pull_data = $display_img->fetch_assoc();

                                    echo '<li class="list-group-item">Price: '. $pull_data['Price'].'</li>'.
                                    '<li class="list-group-item">Platform: '. $pull_data['Platform'].'</li>';

                                    if ($pull_data['UnitsInStorage'] > 0) {
                                        echo '<li class="list-group-item">In Stock: Yes</li>' .
                                            '<li class="list-group-item"><a href="#"><button class="btn btn-warning" type="button" onclick="addToCart('. $_GET['id'] .')" ><span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart</button></a></li>';

                                    } else {
                                        echo '<li class="list-group-item">In Stock: No</li>' .
                                            '<li class="list-group-item"><a href="#"><button class="btn btn-warning" type="button" disabled><span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart</button></a></li>';

                                    }
                                ?>
                            </ul>
                        </div>
                    </div>  <!-- end continents panel -->
                </div>
            </div>


        </div>  <!-- end main content column -->
    </div>  <!-- end main content row -->
</div>   <!-- end main content container -->

<?php include 'footer.php'; ?>

<script src="bootstrap3/dist/js/carousel.js"></script>
<script src="bootstrap3/assets/js/jquery.js"></script>
<script src="bootstrap3/dist/js/bootstrap.min.js"></script>
<script src="bootstrap3/assets/js/holder.js"></script>
</body>
</html>