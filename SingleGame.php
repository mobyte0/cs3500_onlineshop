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
                        $_SESSION['PID'] = $_GET['id'];




                        $display_img = mysqli_query($db,"SELECT * FROM `Product` WHERE ProductID = '". $img . "';" );

                        while ($pull_data = $display_img->fetch_assoc()) {

                            echo '<div class="col-md-7">' .
                                '<a href="images/Covers/'. $pull_data['ImagePath'] . '">
                                        <img class="img-responsive myImg" src="images/Covers/' . $pull_data['ImagePath'] . '" alt="random image">' .
                                    '</a></div>';

                        }
                    }

                    ?>

                    <div class="pull-right col-md-4" >
                        <div class=" pull-right panel panel-info" style="width: 120%" >
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
                                    echo '<li class="list-group-item">Ratings: <span class="label label-warning">Not Rated</span></li>';
                                }


                                    if ($pull_data['UnitsInStorage'] > 0) {
                                        echo '<li class="list-group-item">In Stock: '.$pull_data['UnitsInStorage'] .' Units</li>';

                                        echo '<li class="list-group-item ">'.
                                                '<form method="Post" action="ShoppingCart.php">'.
                                                    '<button name="addToCart" value="'. $pull_data['ProductID'].'" type="submit" class="btn btn-block btn-warning"><span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart</button>'.
                                                '</form>'.
                                            '</li>';
                                    } else {
                                        echo '<li class="list-group-item">In Stock: <span class="label label-danger">No</span></li>';
                                        echo '<li class="list-group-item ">' .
                                            '<form method="post" action="ShoppingCart.php">' .
                                            '<button disabled name="addToCart" value="' . $pull_data['ProductID'] . '" type="submit" class="btn btn-block btn-warning"><span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart</button>' .
                                            '</form>' .
                                            '</li>';
                                    }

                                    if(isset($_GET['id'])) {
                                        if(isset($_SESSION['UID'])) {
                                            $check_if_favorite_exists = mysqli_query($db, "SELECT * from `ProductFavorite` where UID = " . $_SESSION['UID'] . " AND ProductID = " . $_SESSION['PID'] . ";");

                                            if (mysqli_num_rows($check_if_favorite_exists) === 0) {

                                                echo '<li class="list-group-item">' .
                                                    '<form method="post" action="AddToFavorites.php">' .
                                                    '<button class="btn btn-block btn-info" name="favbtn" type="submit" title="Add To Favorites"><span class="glyphicon glyphicon-heart"></span> Add to Favorites</button>' .
                                                    '</form>' .
                                                    '</li>';
                                            } else {
                                                echo '<li class="list-group-item">' .
                                                    '<form method="post" action="AddToFavorites.php">' .
                                                    '<button disabled class="btn btn-block btn-info" name="favbtn" type="submit" title="Add To Favorites"><span class="glyphicon glyphicon-heart"></span> Add to Favorites</button>' .
                                                    '</form>' .
                                                    '</li>';
                                            }

                                        }



                                    }
                                ?>
                                <?php

                                if(isset($_SESSION['UID']) && isset($_SESSION['username'])) {

                                $query_check_if_rating_done = mysqli_query($db, "Select * from `ProductRating` where UID = ". $_SESSION['UID']." and ProductID = ". $_SESSION['PID']);
                                if(mysqli_num_rows($query_check_if_rating_done) === 0) {


                                    echo '<div class="list-group-item" style="padding-top: 15px" style="width: 120%;">'.
                                        '<form method="post" action="Ratings.php">'.
                                        '<h4>Rate Game:</h4>'.
                                        '<ul class="list-inline list-unstyled">'.
                                                '<li class="form-check form-check-inline" style="padding-right: 1em;">
                                                      <label class="form-check-label" for="r1">
                                                        <input class="form-check-input" type="radio" name="points" id="r1" value="1">
                                                        <span>  1</span>
                                                   </label>
                                                </li>'.
                                            '<li class="form-check form-check-inline" style="padding-right: 1em;">
                                                  <label class="form-check-label" for="r2">
                                                    <input class="form-check-input" type="radio" name="points" id="r2" value="2">
                                                    <span>  2</span>
                                               </label>
                                            </li>'.
                                            '<li class=" form-check form-check-inline" style="padding-right: 1em;">
                                                  <label class="form-check-label" for="r3">
                                                    <input class="form-check-input" type="radio" name="points" id="r3" value="3">
                                                    <span>  3</span>
                                               </label>
                                            </li>'.
                                            '<li class="form-check form-check-inline" style="padding-right: 1em;">
                                                  <label class="form-check-label" for="r4">
                                                    <input class="form-check-input" type="radio" name="points" id="r4" value="4">
                                                    <span>  4</span>
                                               </label>
                                            </li>'.
                                            '<li class="form-check form-check-inline" style="padding-right: 1em;">
                                                  <label class="form-check-label" for="r5">
                                                    <input class="form-check-input" type="radio" name="points" id="r5" value="5">
                                                    <span>  5</span>
                                               </label>
                                            </li><button class="btn btn-block btn-info" style="margin-top: 1em;" name="Ratings">Submit</button>'.
                                        '</ul>'.
                                        '</div>'.'</form>';


                                }



                                ?>
                            </ul>
                        </div>
                    </div>  <!-- end continents panel -->





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

                $display_img = mysqli_query($db,"SELECT `Images`.`ImagePath`, `Product`.`Name`  FROM `Images`,`Product` where `Product`.`ProductID` = ". $img ." AND `Images`.`ProductID` = ".$img.";" );


                while ($pull_data = $display_img->fetch_assoc()) {

                    echo'
                        <div class="col-md-3" style="padding: 10px">
                        <img class="img-thumbnail myImg" onclick="modal_function(this);" src="images/moreImages/'.$pull_data['ImagePath'].'" alt="'.$pull_data['Name'].'" width="300" height="200">'.

                        '</div>';
                }
            }
            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="myModal" class="modal">
                <span class="close">&times;</span>
                <img class="modal-content" id="img01">
                <div id="caption"></div>
            </div>


            <div class="well">
                <div class="row" >

                <?php


                $display_reviews = mysqli_query($db, "SELECT * FROM `ProductReview`,`Product`,`User` where `ProductReview`.`ProductID` = " . $_GET['id'] . " and `Product`.`ProductID` = ". $_GET['id'] ." AND `ProductReview`.`UID` = `User`.`UID`");


                echo '<div style="padding-top: 15px" class="col-md-12">
                    <div class="panel panel-info" >'.
                        '<div class="panel-heading">Customer Reviews</div>'.
                            '<ul class="list-group" style="padding-bottom: 2em; ">';

                while($pull_reviews = $display_reviews->fetch_assoc()){
                    $buymeAgain = "No!";

                    if ($pull_reviews['WouldBuyAgain'] === '1') {
                        $buymeAgain = "Yes!";

                    }
                    if($pull_reviews['UID'] !== 25) {
                        echo '<div class="container">' .
                            '<div class="col-md-10" style="padding-right: 3em;">' .
                                '<p style="margin-top: 2em;"><span class="label label-info" style="font-size: 1em;"><span class="glyphicon glyphicon-user"></span> Customer:</span>  ' . $pull_reviews['FirstName'] . ' ' . $pull_reviews['LastName'] . '   |   <span class="label label-warning">Would Buy Again:</span>  '. $buymeAgain  .'</p>'.
                                '<div class="col-md-10 panel panel-info" style="height: 10em; background: ghostwhite;">'.
                                    '<p class="col-md-12" >'. $pull_reviews['ProductReviews'].'</p>'.
                                '</div>'.
                            '</div>'
                            . '</div>';
                    }
                }


                        echo '</ul>'.
                                '</div>'.
                                    '</div>';
            ?>
                </div>
            </div>



            <?php
                $img = $_GET['id'];

                $display_img = mysqli_query($db,"SELECT * FROM `Product` WHERE ProductID = '". $img . "';" );
                $pull_data = $display_img->fetch_assoc();





                    $query_check_if_review_done = mysqli_query($db, "Select * from `ProductReview` where UID = ". $_SESSION['UID']." and ProductID = ". $_SESSION['PID']);
                    if(mysqli_num_rows($query_check_if_review_done) === 0) {
                        echo '<div class="well">' .
                                '<div class="row">' .
                                   '<form action="Reviews.php" method="post" >' .
                                '<div style="padding-top: 15px" class="col-md-12">' .
                            '<div style="padding-top: 15px" class="col-md-pull-12">' .
                                 '<div class="panel panel-info">' .
                                      '<div class="panel-heading">Game Reviews:</div>' .

                                     '<h4 style="margin-left: 1vw;">Would buy <span class="label label-info">' . $pull_data['Name'] . '</span> Again?</h4>' .
                            '<div class="col-md-pull-12" style="margin-top: 2em;">' .
                                 '<div class="col-md-2">' .
                                     '<input type="radio" name="BuyAgain" value="1"><span class="label label-success" style="margin-left: 1em;">Yes!</span>' .
                            '</div>' .
                                '<div class="col-md-3">' .
                                    '<input type="radio" name="BuyAgain" value="0"><span class="label label-danger" style="margin-left: 1em;">No!</span>' .
                            '</div>' .
                            '</div>' .
                                 '<h4 style="margin-left: 1vw; margin-top: 5vw;">Write Review for <span class="label label-info">' . $pull_data['Name'] . '</span>:</h4>' .
                                 '<div class="container" style="padding-top: 10px">' .
                                     '<textarea class="col-md-8" id="field" onkeyup="countChar(this);" name="message" rows="10" cols="30" placeholder="Write your review." style="resize: vertical;"></textarea>' .
                                 '<div style="margin-top: 1em;" class="col-md-12">Words left: <span id="charNum">250</span></div>' .
                            '</div>' .
                              '<br>' .
                            '</div>' .
                                '</div>' .
                            '<div class="col-md-12">' .

                            '<button class="btn btn-block btn-info" name="Reviews" type="submit">Submit Review</button>'

                              . '</div>' .
                                '</form>' .
                               '</div>' .
                                  '</div></div>';
                    }
          

            }
            ?>


        </div>  <!-- end main content column -->
    </div>  <!-- end main content row -->
</div>   <!-- end main content container -->
<?php

    if(isset($_SESSION['UID'])) {

    } else {
        echo '</div></div></div></div>';
    }


?>

<?php include 'footer.php'; ?>

<script>
    // Get the modal

    // Get the image and insert it inside the modal - use its "alt" text as a caption

    function modal_function(value){
        var modal = document.getElementById('myModal');
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");

        modal.style.display = "block";
        modalImg.src = value.src;
        captionText.innerHTML = value.alt;

        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
    };

    function single_modal_function(value){
        var modal = document.getElementById('myModalSingleImage');
        var modalImg = document.getElementById("img02");
        var captionText = document.getElementById("caption1");

        modal.style.display = "block";
        modalImg.src = value.src;
        captionText.innerHTML = value.alt;

        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
    };

    // Get the <span> element that closes the modal

</script>

<script src="bootstrap3/dist/js/carousel.js"></script>
<script src="bootstrap3/assets/js/jquery.js"></script>
<script src="bootstrap3/dist/js/bootstrap.min.js"></script>
<script src="bootstrap3/assets/js/holder.js"></script>
</body>

</html>