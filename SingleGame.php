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

        <div class="col-md-9">  <!-- start main content column -->
            <div class="well">
                <div class="row">
                    <div class=" pull-right col-md-3">
                        <div class=" pull-right panel panel-info">
                            <div class="panel-heading">Shopping Cart</div>
                            <ul class="list-group">
                                <li class="list-group-item"><a href="#">Price:</a></li>
                                <li class="list-group-item"><a href="#"><button class="btn btn-warning" type="button" ><span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart</button></a></li>
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