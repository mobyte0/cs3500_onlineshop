<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;
   charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>My Travel Photos</title>

    <!-- Google fonts used in this theme  -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,800,600,700,300' rel='stylesheet' type='text/css'>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap3_travelTheme/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="bootstrap3_travelTheme/theme.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="bootstrap3_travelTheme/assets/js/html5shiv.js"></script>
    <script src="bootstrap3_travelTheme/assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<?php include 'header.php'; ?>

<div class="container">  <!-- start main content container -->
    <div class="row">  <!-- start main content row -->
        <div class="col-md-3">  <!-- start left navigation rail column -->
            <?php include 'side.php'; ?>
            <?php
                if(isset($_SESSION['UID'])) {
                    if(isset($_POST['PurchaseReady'])) {
                        $get_shopping_list = mysqli_query($db, "SELECT * FROM UserShoppingCart, Product WHERE UserShoppingCart.ProductID = Product.ProductID and UID = " . $_SESSION['UID'] . ";");
                        $total_price = 0;

                        while($pull_Check_list = $get_shopping_list->fetch_assoc()) {

                            $quantity = $pull_Check_list['UnitsInCart'];
                            $price = $pull_Check_list['Price'];
                            $total = $quantity * $price;
                            $total_price += $total;
                        }

                        $get_user_balance = mysqli_query($db, "SELECT * FROM `User` WHERE UID = '". $_SESSION['UID']. "' ");
                        $get_balance = $get_user_balance->fetch_assoc();
                        $balance = $get_balance['GiftCardBalance'];

                        $update_user_gift = "UPDATE `User` SET `GiftCardBalance` = " .  ($balance - $total_price)  . " WHERE UID = ". $_SESSION['UID']. ";";



                        if($db->query($update_user_gift) === TRUE) {

                            $order_details = mysqli_query($db, "SELECT * FROM UserShoppingCart WHERE UID =" . $_SESSION['UID'] . ";");
                            $get_number_order = mysqli_query($db, "SELECT * FROM `OrderDetails` WHERE UID = ". $_SESSION['UID'] . ";");

                            $order_ID = mysqli_num_rows($get_number_order);
                            $order_ID++;
                            while($get_order_ready = $order_details->fetch_assoc()) {

                                date_default_timezone_set("UTC");

                                $add_order = "INSERT INTO `OrderDetails` (UID,	OrderID, ProductID,	UnitsPurchased,	TotalPrice,	`Date`) VALUES ('". $_SESSION['UID']."', '". $order_ID ."' , '". $get_order_ready['ProductID'] ."', '". $get_order_ready['UnitsInCart'] ."', '". $total_price ."', '". date('Y-m-d H:i:s') ."' )";
                                if($db->query($add_order) === TRUE) {

                                }else{
                                    echo '<script>window.location.href="error.php";</script>';
                                }

                            }

                            $delete_all_after_done = "DELETE FROM `UserShoppingCart` WHERE UID = " . $_SESSION['UID'] . ";";

                            if($db->query($delete_all_after_done) === TRUE) {

                            } else {
                                echo '<script>window.location.href="error.php";</script>';

                            }
                        } else {
                            echo '<script>window.location.href="error.php";</script>';
                        }




                    }

                } else {
                    echo '<script>window.location.href="error.php";</script>';
                }
            ?>
        </div>  <!-- end left navigation rail -->

        <div class="col-md-9">  <!-- start main content column -->
            <div class="jumbotron">
                <h2>Thank You For Your Purchase</h2>
                <p><a href="home.php" class="btn btn-warning btn-lg">Go back home &raquo;</a></p>
            </div>



            </div>  <!-- end main content column -->
    </div>  <!-- end main content row -->
</div>   <!-- end main content container -->

<?php include 'footer.php'; ?>



<!-- Bootstrap core JavaScript
 ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="bootstrap3_travelTheme/assets/js/jquery.js"></script>
<script src="bootstrap3_travelTheme/dist/js/bootstrap.min.js"></script>
<script src="bootstrap3_travelTheme/assets/js/holder.js"></script>
</body>
</html>