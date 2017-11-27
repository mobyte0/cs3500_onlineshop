<?php
$user = 'ibrahimitani';
$pass = 'Chnageme90.';
$db = 'cs3500_StoreDB';

$db = new mysqli('localhost', $user, $pass, $db) or die ("Unable to connect");
?>

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
                                   <a href="images/ps4%20pro.jpg"> <img src="images/ps4%20pro.jpg" alt="PlayStation 4 Pro" style="width:100%;"></a>
                                    <div class="carousel-caption">
                                        <h3>PlayStation 4 Pro</h3>
                                        <p>Sony's Current Generation Console!</p>
                                    </div>
                                </div>

                                <div class="item">
                                    <img src="images/xbox-one.jpg" alt="XboxOne" style="width:100%;">
                                    <div class="carousel-caption">
                                        <h3>Xbox One</h3>
                                        <p>Microsoft's Current Generation Console</p>
                                    </div>
                                </div>

                                <div class="item">
                                    <img src="images/nintendo_switch.png" alt="New York" style="width:100%;">
                                    <div class="carousel-caption">
                                        <h3>Nintendo Switch</h3>
                                        <p>Nintendo's Current Generation Console</p>
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

            <div class="well">
                <div class="row">

                    <?php
                    $files = glob("images/randomImages/*.*");
                  for ($i = 0; $i < 4; $i++) {
                        $pic = $files[array_rand($files)];
                        echo '<div class="col-md-3"><div class="list-group"><a href="SingleGame.php"><img class="img-thumbnail" src="'.$pic.'" alt="random image">'.'</a></div></div>';
                 }
                    ?>

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