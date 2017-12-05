<!DOCTYPE html>
<html lang="en">

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

                    <div class="container col-md-12">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">

                                <div class="item active">
                                   <a href="VideoGames.php?console=PS4"> <img src="images/ps4%20pro.jpg" alt="PlayStation 4 Pro" style="width:100%;"></a>
                                    <div class="carousel-caption">
                                        <h3>PlayStation 4 Pro</h3>
                                        <p>Check Out PS4 Pro Games!!</p>
                                    </div>
                                </div>

                                <div class="item">
                                    <a href="VideoGames.php?console=XBOX">
                                        <img src="images/xboxonex.jpg" alt="XboxOne" style="width:100%;"></a>
                                    <div class="carousel-caption">
                                        <h3>Xbox One</h3>
                                        <p>Check Out Xbox One X  Games!!</p>
                                    </div>
                                </div>

                                <div class="item">
                                    <a href="VideoGames.php?console=Nintendo+Switch">
                                        <img src="images/nintendo_switch.png" alt="Nintendo" style="width:100%;"></a>
                                    <div class="carousel-caption">
                                        <h3>Nintendo Switch</h3>
                                        <p>Play Your Games Anywhere with Nintendo Switch!!!</p>
                                    </div>
                                </div>

                                <div class="item">
                                    <a href="VideoGames.php?console=PC">
                                        <img src="images/steam.jpg" alt="Steam" style="width:100%;"></a>
                                    <div class="carousel-caption">
                                        <h3>Steam</h3>
                                        <p>Take gaming to a whole new level with Steam</p>
                                    </div>
                                </div>

                            </div>

                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div><!-- end of carousel-->

                </div>
            </div>
            <?php
            if(isset($_SESSION['UID'])){
                echo'<div class="panel panel-info"><div class="panel-heading"><h4>Game Suggestions for "'.$_SESSION['username'].'"</h4></div><div class="panel-body">';

            }else{
                echo'<div class="panel panel-info"><div class="panel-heading"><h4>Game Suggestions</h4></div><div class="panel-body">';

            }

            ?>



                    <?php


                    $sql_display_four = mysqli_query($db, "SELECT * FROM `Product` ORDER BY RAND() LIMIT 8;");
                    while($pull_data = $sql_display_four->fetch_assoc()) {
                        echo '<div class="col-md-3"><div class="list-group"><a href="SingleGame.php?id='. $pull_data['ProductID'] .'"><img class="img-thumbnail" src="images/Covers/'.$pull_data['ImagePath'].'" alt="random image">'.'</a></div></div>';
                    }
                    ?>

                </div>
            </div>
            <?php  if(isset($_SESSION['UID'])) {
                echo '</div></div>';
            }else{
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