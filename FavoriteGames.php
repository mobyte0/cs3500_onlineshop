<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;  charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Online</title>

    <link href="bootstrap3/dist/bootstrap.css" rel="stylesheet">

    <link href="bootstrap3/dist/bootstrap-theme.css" rel="stylesheet">

    <script src="bootstrap3/assets/js/html5shiv.js"></script>
    <script src="bootstrap3/assets/js/respond.min.js"></script>

</head>

<body>

<?php include 'header.php'; ?>

<div class="container">  <!-- start main content container -->
    <div class="row">  <!-- start main content row -->
        <div class="col-md-3">  <!-- start left navigation rail column -->
            <?php include 'side.php'; ?>
        </div>  <!-- end left navigation rail -->

        <div class="col-md-9">

            <div class="container" style="padding-left: 0px;">
                <div class="col-md-9" style="padding-left: 0px;">
                    <div class="well">
                        <div class="row">
                            <img style="width: 100%; padding-left: 1em; padding-right: 1em;" alt="Games" title="Favorite Games" src="images/banner_games.jpg"/>
                        </div>
                    </div>
                </div>
            </div>

            <div class="well">
                <div class="row">

                    <div style="padding-top: 15px" class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">Favorite Games</div>
                            <div class="panel-body">
                            <ul class="list-group">


                    <?php
                        if(isset($_SESSION['UID']) && isset($_SESSION['username']) && isset($_SESSION['pwd'])) {
                            $query = mysqli_query($db, "SELECT * FROM `ProductFavorite`, `Product` where `ProductFavorite`.`UID` = ". $_SESSION['UID'] ." AND `Product`.`ProductID` = `ProductFavorite`.`ProductID`");


                            while($pull_games = $query->fetch_assoc()) {
                                echo '<div class="col-md-3">' .
                                    '<div class="list-group">' .
                                    '<a href="SingleGame.php?id=' . $pull_games['ProductID'] . '">' .
                                    '<img class="img-thumbnail" src="images/Covers/' . $pull_games['ImagePath'] . '" alt="random image">' .
                                    '</a>' .
                                    '</div>' .
                                    '</div>';

                            }

                        } else {
                            echo '<h2 class="col-md-offset-4">You are not logged in</h2>';
                        }
                    ?>
                            </ul>
                            </div>
                        </div>
                    </div>

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