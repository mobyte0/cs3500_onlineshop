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
                    <?php

                    echo '<h1>Consoles</h1>

                    <div class="well">
                        <div class="row">

                                <div class="col-md-8">
                                    <h2>Playstation 4 Pro</h2>
                               <a href="images/ps4%20pro.jpg"><img style="padding-bottom: 20px" src="images/ps4%20pro.jpg"></a>

                                </div>

                            <div style="margin-top: 30px" class=" pull-right col-md-4">
                                            <div class=" pull-right panel panel-info">
                                                <div class="panel-heading">Shopping Cart</div>
                                                <ul class="list-group">
                                                    <li class="list-group-item">Price:</li>
                                                    <li class="list-group-item">Platform:</li>
                                                    <li class="list-group-item">Release Date:</li>
                                                    <li class="list-group-item"><a href="#"><button class="btn btn-warning" type="button" ><span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart</button></a></li>
                                                </ul>
                                            </div>

                                        </div>  <!-- end continents panel -->

                            <div class="col-md-12">
                            <div class="panel panel-info">
                                <div class="panel-heading">Product Description</div>
                                <ul class="list-group">
                                    <li class="list-group-item">Spectacular graphics – Explore vivid game worlds with rich visuals heightened by PS4 Pro.</li>
                                    <li class="list-group-item">Enhanced gameplay – Support for faster frame rates delivers super-sharp action for select PS4 games.</li>
                                    <li class="list-group-item"> One unified gaming community – Compatible with every PS4 game. Play online with other PS4 players with PlayStation Plus.</li>
                                    <li class="list-group-item"> Extraordinary entertainment – With up to 4K streaming and 4K auto-upscaling for video content.</li>
                                </ul>
                            </div>
                            </div>




                        </div>
                    </div>';






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