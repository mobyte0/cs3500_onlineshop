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
<?php
    $flag = 0;

    if(isset($_GET['addToCart'])) {
        $sql = "INSERT INTO `UserShoppingCart` (UID, ProductID, UnitsInCart) VALUES ('" . $_SESSION['UID'] . "', '" . $_GET['addToCart'] . "' ,'1')";

        if ($db->query($sql) === TRUE) {
            $flag = 1;
        } else {
            $flag = 0;
        }
    }
?>
<div class="container">  <!-- start main content container -->
    <div class="row">  <!-- start main content row -->
        <div class="col-md-3">  <!-- start left navigation rail column -->

        </div>  <!-- end left navigation rail -->

        <div class="col-md-12">


            <h1>Shopping Cart</h1>
            <?php
                if(isset($_GET['addToCart'])) {
                    if ($flag === 1) {
                        echo '<div class="col-md-12"><h1 class="label label-warning h1">Added to Shopping Cart!</h1></div>';
                    }
                }
            ?>


            <div class="well">
                <div class="row">




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