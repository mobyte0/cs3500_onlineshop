<!DOCTYPE html>
<html lang="en">

<body>

<?php include 'header.php'; ?>

<div class="container">  <!-- start main content container -->
    <div  class="row">  <!-- start main content row -->
        <div class="col-md-3">  <!-- start left navigation rail column -->
            <?php include 'side.php'; ?>
        </div>  <!-- end left navigation rail -->

        <div class="col-md-9">  <!-- start main content column -->
            <div class="well">
                <div class="row">

                    <?php

                    if(isset($_GET['id'])) {

                        $img = $_GET['id'];

                        $display_img = mysqli_query($db,"SELECT * FROM `Product` WHERE ProductID = '". $img . "';" );

                        while ($pull_data = $display_img->fetch_assoc()) {

                            echo '<div class="col-md-7">
                                    <a href="images/Covers/'. $pull_data['ImagePath'] . '">
                                        <img class="img-responsive" src="images/Covers/' . $pull_data['ImagePath'] . '" alt="random image">' .
                                    '</a></div>';

                        }
                    }

                    ?>

                    <div class="pull-right col-md-5">
                        <div class=" pull-right panel panel-info">
                            <div class="panel-heading">Shopping Cart</div>
                            <ul class="list-group">
                                <?php
                                    $img = $_GET['id'];

                                    $display_img = mysqli_query($db,"SELECT * FROM `Product` WHERE ProductID = '". $img . "';" );
                                    $pull_data = $display_img->fetch_assoc();

                                    $rating = $_GET['id'];
                                    $display_rating = mysqli_query($db,"SELECT * FROM `ProductRating` WHERE ProductID = '". $rating . "';" );
                                    $pull_data2 = $display_rating->fetch_assoc();

                                echo '<li class="list-group-item">Price: $'. $pull_data['Price'].'</li>'.
                                    '<li class="list-group-item">Platform: '. $pull_data['Platform'].'</li>'.
                                        '<li class="list-group-item">Weight: '. $pull_data['Weight'].' oz</li>'.
                                        '<li class="list-group-item">Dimensions: '. $pull_data['Dimension'].' mm</li>';


                                if($pull_data2['Rating'] > 0){
                                    echo '<li class="list-group-item">Ratings: '. $pull_data2['Rating'] .'/5</li>';

                                }else{
                                    echo '<li class="list-group-item">Ratings: Not Rated</li>';
                                }


                                    if ($pull_data['UnitsInStorage'] > 0) {
                                        echo '<li class="list-group-item">In Stock: '.$pull_data['UnitsInStorage'] .' Units</li>';

                                        echo '<li class="list-group-item">'.
                                                '<form method="get" action="ShoppingCart.php">'.
                                                    '<button name="addToCart" value="'. $pull_data['ProductID'].'" type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart</button>'.
                                            '</form>'.'</li>';

                                    } else {
                                        echo '<li class="list-group-item">In Stock: No</li>' .
                                            '<li class="list-group-item"><a href="#"><button class="btn btn-warning" type="button" disabled><span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart</button></a></li>';

                                    }
                                ?>
                            </ul>
                        </div>
                    </div>  <!-- end continents panel -->

                    <div class=" pull-right col-md-5">
                        <div class=" pull-right panel panel-info">
                            <div class="panel-heading">Ratings</div>
                            <ul class="list-group">
                                <?php
                                $img = $_GET['id'];

                                $display_img = mysqli_query($db,"SELECT * FROM `Product` WHERE ProductID = '". $img . "';" );
                                $pull_data = $display_img->fetch_assoc();

                                $rating = $_GET['id'];
                                $display_rating = mysqli_query($db,"SELECT * FROM `ProductRating` WHERE ProductID = '". $rating . "';" );
                                $pull_data2 = $display_rating->fetch_assoc();



                                echo '<form method="post" oninput="x.value=\' \' + rng.value + \' \'">'.
                                    '<label style="padding-top: 10px; padding-left: 10px">Would buy again?</label>'.
                                    '<label style="padding-left: 10px; padding-right: 10px" for="yes">Yes</label>'.
                                    '<input  type="radio" id="yes">'.
                                    '<label style="padding-left: 10px; padding-right: 10px" for="no">No</label>'.
                                    '<input type="radio"  id="no">'.
                                    '<li class="list-group-item">'.
                                    '<label style="padding-left: 30px" for="rng" >Rate Game </label>'.
                                    '<output style="padding-left: 55px" id="x" for="rng"> 3 </output>'.
                                    '<span style="padding-left: 55px" class="glyphicon glyphicon-thumbs-up"></span><br>'.
                                    '<input type="range" id="rng" name="points" min="1" max="5" step="1">'.
                                    '<li class="list-group-item"><label>Add To Favorites</label> <button style="padding-left: 10px" class="btn btn-warning"><span class="glyphicon glyphicon-heart"></span></button></li>'.
                                    '<li class="list-group-item"><a href="#"><button class="btn btn-warning" type="button"><span class="glyphicon glyphicon-ok"></span> Submit</button></a></li>'.
                                    '</form>';


                                ?>
                            </ul>
                        </div>
                    </div>  <!-- end continents panel -->


                    <?php
                    $img = $_GET['id'];

                    $display_img = mysqli_query($db,"SELECT * FROM `Product` WHERE ProductID = '". $img . "';" );
                    $pull_data = $display_img->fetch_assoc();

                    echo'
                    <div style="padding-top: 15px" class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">Product Description</div>
                        <ul class="list-group">
                            <li class="list-group-item">'. $pull_data['Description'].'</li>
                        </ul>
                    </div>
                    </div>';


                    ?>


                </div>
            </div>

            <div class="well">
                <div class="row">
                    <div style="padding-top: 15px" class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">Game play images:</div>
                            <div class="panel-body">
            <?php
            if(isset($_GET['id'])) {

                $img = $_GET['id'];

                $display_img = mysqli_query($db,"SELECT * FROM `Images` WHERE ProductID = '". $img . "';" );


                while ($pull_data = $display_img->fetch_assoc()) {

                    echo'
                        <div class="col-md-3" style="padding: 10px">
                        
                        <a href="images/moreImages/'. $pull_data['ImagePath'] .'">
                        <img  class="img-thumbnail" src="images/moreImages/'.$pull_data['ImagePath'].'" alt="random image">'
                        .'</a>
                        </div>
                        ';
                }
            }
            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="well">
                <div class="row">

                <?php
            $img = $_GET['id'];

            $display_img = mysqli_query($db,"SELECT * FROM `Product` WHERE ProductID = '". $img . "';" );
            $pull_data = $display_img->fetch_assoc();


            echo'
                    <div style="padding-top: 15px" class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">Customer Reviews</div>
                        <ul class="list-group">
                            <li class="list-group-item"><p>Pedro: I love this game, i would definitely recommend it to others.</p>
                        
                            <li class="list-group-item"><p>Nathan: This game is so much fun, especially with friends. It can be very competitive though. </p></li>
                        </ul>
                    </div>
                    </div>';
            ?>
                </div>
            </div>


                    <?php
                    $img = $_GET['id'];

                    $display_img = mysqli_query($db,"SELECT * FROM `Product` WHERE ProductID = '". $img . "';" );
                    $pull_data = $display_img->fetch_assoc();

                    if(isset($_SESSION['UID']) && isset($_SESSION['username'])) {
                            echo '<div class="well">
                <div class="row">
                        <div style="padding-top: 15px" class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">Write a Review</div>
                          
                        
                        <div class="container" style="padding-top: 10px">
    
                        <form method="post">
                            <textarea class="col-md-8" id="field" onkeyup="countChar(this);" name="message" rows="10" cols="30" placeholder="Write your review." style="resize: vertical;"></textarea>
                        </form>
                        <div style="margin-top: 1em;" class="col-md-12">Words left: <span id="charNum">250</span></div>
                        </div>
                        <br>
                        <div class=" container" style="padding: 10px">
                            <button style="width: 100px" class="btn btn-primary" type="submit"> Submit</button>
                        </div>
    
                            </div>
                        </div>  </div>
            </div>';
                  

                    }
                    ?>


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