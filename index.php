<!DOCTYPE html>
<html lang="en">
<head>
    <title>Oracle Game Store - Home</title>
</head>
<body>
<?php include 'header.php'; ?>


<div class="container">  <!-- Main Div content container -->
    <div class="row">  <!-- Main content row -->
        <div class="col-md-3">  <!-- start left navigation rail column -->
            <?php include 'side.php'; ?>
        </div>  <!-- end left navigation rail -->


        <div class="col-md-9">  <!-- start main content column -->

            <div class="well">

                <div class="row">
                    <div class="col-md-12">
                        <!--Carousel start-->
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <img src="images/ps4.jpg" alt="..." style="width: 100%;">
                                </div>
                                <div class="item">
                                    <img src="images/switch.png" alt="..." style="width: 100%;">
                                </div>
                                <div class="item">
                                    <img src="images/xboxonex.jpg" alt="..." style="width: 100%;">
                                </div>
                            </div>

                            <!-- Controls -->
                            <a class="left carousel-control" href="#carousel-example-generic" role="button"
                               data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" role="button"
                               data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <!--Carousel end-->
                    </div>
                </div>
            </div>
            <?php
            if (isset($_SESSION['UID'])) {
                echo '<div class="panel panel-info"><div class="panel-heading"><h4>Game Suggestions for "' . $_SESSION['username'] . '"</h4></div><div class="panel-body">';

            } else {
                echo '<div class="panel panel-info"><div class="panel-heading"><h4>Game Suggestions</h4></div><div class="panel-body">';

            }

            ?>



            <?php
            $sql_display_four = mysqli_query($db, "SELECT * FROM `Product` ORDER BY RAND() LIMIT 8;");
            while ($pull_data = $sql_display_four->fetch_assoc()) {
                echo '<div class="col-md-3 col-sm-4 col-xs-4"><div class="list-group"><a href="SingleGame.php?id=' . $pull_data['ProductID'] . '"><img class="img-thumbnail" src="images/Covers/' . $pull_data['ImagePath'] . '" alt="random image">' . '</a></div></div>';
            }
            ?>

        </div>
    </div>
    <?php if (isset($_SESSION['UID'])) {
        echo '</div></div>';
    } else {
        echo '</div></div>';

    }
    ?>

</div>   <!-- end main content container -->

<?php include 'footer.php'; ?>

<script src="bootstrap3/dist/js/carousel.js"></script>
<script src="bootstrap3/assets/js/jquery.js"></script>
<script src="bootstrap3/dist/js/bootstrap.min.js"></script>
<script src="bootstrap3/assets/js/holder.js"></script>
</body>
</html>