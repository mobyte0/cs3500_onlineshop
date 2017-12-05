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

        <div class="col-md-12">
            <h2>Check Out Process for <?php echo $_SESSION['username'];?></h2>
            <a  class="label label-success pull-right" href="TopUpGiftCard.php">Top up your card balance!</a>
        </div>

        <div class="col-md-12">

            <div class="well">
                <div class="row">
                    <div class="panel panel-info">
                        <div class="panel-heading">Items to Check Out!</div>
                        <ul class="list-group">

                            <?php
                                $get_shopping_list = mysqli_query($db, "SELECT * FROM UserShoppingCart, Product WHERE UserShoppingCart.ProductID = Product.ProductID and UID = " . $_SESSION['UID'] . ";");
                                $total_price = 0;

                                if(mysqli_num_rows($get_shopping_list) === 0) {
                                    echo '<script type="text/javascript">
                                          alert("Shopping Cart Empty Please Add A Product")
                                          ;window.location.href="VideoGames.php";</script>';


                                }
                                while($pull_Check_list = $get_shopping_list->fetch_assoc()) {

                                    $quantity = $pull_Check_list['UnitsInCart'];
                                    $price = $pull_Check_list['Price'];
                                    $total = $quantity * $price;

                                    echo '<li class="list-group-item">'. $quantity .' x '. $pull_Check_list['Name'] .'<span class="pull-right label label-info">$ '. $total . '</span></li>';
                                    $total_price += $total;

                                }



                            ?>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="pull-right col-md-5">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <p style="font-size: 1.9em;">Total Price: <span class="label label-success pull-right" style="font-size: 1em;"> $ <?php echo $total_price; ?></span></p>
                    </div>
                </div>
                <div style="margin-bottom: 1em;">
                    <form action="Purchase.php" method="post">
                        <?php
                            $check_if_has_enough = mysqli_query($db, "SELECT * FROM `User` where UID = ". $_SESSION['UID'] .";");

                            while($has_Enough = $check_if_has_enough->fetch_assoc()) {
                                if($has_Enough['GiftCardBalance'] >= $total_price) {
                                    echo '<input type="submit" class="btn btn-block btn-success" placeholder="CheckOut" name="PurchaseReady" value="Check Out!"/>';
                                } else {
                                    echo '<p><span class="alert alert-danger">You Do Not have enough web coins to proceed you can</span></p>';
                                }
                            }

                        ?>

                    </form>

                </div>
                <div style="margin-bottom: 4em;">
                    <a href="home.php" class="btn btn-block btn-danger">Cancel</a>
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