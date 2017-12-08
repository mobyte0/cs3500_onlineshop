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
    <style>
        .desc {
            font-size: 1.3em;

        }
        .make_bold {
            font-weight: bold;
        }
    </style>
</head>

<body>

<?php include 'header.php'; ?>

<?php
    if(isset($_SESSION['UID'])) {
        if(isset($_POST['DoneEditing'])) {
            $delete_all = "DELETE FROM `UserShoppingCart` WHERE UID = " . $_SESSION['UID'] . ";";


            if($db->query($delete_all) === TRUE) {

            } else {
                header("Location: error.php");
                exit();
            }
            // delete all from table sql statement
            // since its delete all its going to delete everything from shoppping cart for this UID
            // delete all from table where uid is == session uid


        } else if(isset($_POST['CustomEdit'])) {


            // this is for the checkboxes to delete by selection
            // if everything except delete all was returned you only have update units in cart in db else you would have to remove the entire row from db

            $shopping_list_delete_selection = mysqli_query($db, "SELECT * FROM `UserShoppingCart` WHERE UID = ". $_SESSION['UID'].";");

            $get_product_id = 0;

            while($get_values_list = $shopping_list_delete_selection->fetch_assoc()) {
                if(isset($_POST["" . $get_values_list['ProductID']])) {
                    $get_product_id = $get_values_list['ProductID'];
                }
            }

            if(isset($_POST[$get_product_id])) {
                if ($_POST[$get_product_id] === 'Delete All') {
                    $delete_all_selection = "DELETE FROM `UserShoppingCart` WHERE UID = " . $_SESSION['UID'] . " AND ProductID = " . $get_product_id . ";";

                    if ($db->query($delete_all_selection) === TRUE) {

                    } else {

                    }
                } else {
                    $Update_Select_cart = "UPDATE `UserShoppingCart` SET UnitsInCart = '" . $_POST[$get_product_id] . "' WHERE UID = " . $_SESSION['UID'] . " AND ProductID =" . $get_product_id . ";";

                    if ($db->query($Update_Select_cart) === TRUE) {

                    } else {

                    }
                }
            }

    //    WHERE UID = 25
    //    AND ProductID = 1
    //    UPDATE `UserShoppingCart`
    //    SET UnitsInCart = 2




    //        DELETE FROM `UserShoppingCart`
    //        WHERE UID = 25
    //        AND ProductID = 5



        }
    } else {
        echo '<script>window.location.href="login.php";</script>';
    }
?>

<?php


//SELECT DISTINCT * FROM `UserShoppingCart` ,`Product` WHERE `UserShoppingCart`.`ProductID` = `Product`.`ProductID` AND `UserShoppingCart`.UID = 25
    $flag = 0;
    if(isset($_SESSION['UID']) ) {
        if (isset($_POST['addToCart'])) {
            $check_if_exists = mysqli_query($db, "SELECT * FROM `UserShoppingCart` WHERE UID = " . $_SESSION['UID'] . " AND ProductID = " . $_POST['addToCart'] . ";");

            if (mysqli_num_rows($check_if_exists) > 0) {
                // update
                $pull_values = $check_if_exists->fetch_assoc();

                $units = $pull_values['UnitsInCart'];

                $units++;

                $Update_Cart = "UPDATE UserShoppingCart SET UnitsInCart = " . $units . " WHERE UID = " . $_SESSION['UID'] . " AND ProductID = " . $_POST['addToCart'] . ";";

                if ($db->query($Update_Cart) === TRUE) {
                    $flag = 1;
                } else {
                    $flag = 0;
                }
            } else {
                // it doesnt exist so insert new data
                $add_to_cart = "INSERT INTO `UserShoppingCart` (UID, ProductID, UnitsInCart) VALUES ('" . $_SESSION['UID'] . "', '" . $_POST['addToCart'] . "' ,'1')";


                if ($db->query($add_to_cart) === TRUE) {
                    $flag = 1;
                } else {
                    $flag = 0;
                }
            }
        }
    }
?>
<div class="container">  <!-- start main content container -->
      <!-- start main content row -->
    <div class="container" style="padding-top: 1em; padding-bottom: 1em;">
        <p class="h2"><?php if(isset($_SESSION['UID'])) { echo $_SESSION['username']; }?>'s Shopping List!<a href="EditShoppingList.php" class="btn btn-info pull-right" style="font-size: 0.4em;">Edit Shopping List</a></p>
    </div>
    <div class="container">
          <?php
          if(isset($_SESSION['UID'])) {
              $get_shopping_list = mysqli_query($db, "SELECT * FROM UserShoppingCart, Product WHERE UserShoppingCart.ProductID = Product.ProductID AND UID = " . $_SESSION['UID'] . ";");
              $total_price = 0;

              while ($pull_search_games = $get_shopping_list->fetch_assoc()) {
                  $total_price += ($pull_search_games['Price'] * $pull_search_games['UnitsInCart']);
                  echo '<div class="well">' .
                      '<div class="row">' .
                      '<div class="col-md-9">' .
                      '<div class="col-md-3">' .
                      '<div class="list-group" style="background: white;">' .
                      '<a href="SingleGame.php?id=' . $pull_search_games['ProductID'] . '">' .
                      '<img class="img-thumbnail" src="images/Covers/' . $pull_search_games['ImagePath'] . '" alt="random image">' .
                      '</a>' .
                      '</div>' .
                      '</div>' .
                      '<div class="col-md-6">' .
                      '<p class="desc"><span class="label label-primary">Title:</span>   ' . $pull_search_games['Name'] . '</p>' .
                      '<p class="desc"<span style="font-weight: bold;">Price:</span><span class="label label-warning">  $ ' . $pull_search_games['Price'] . '  Per Unit</span></p>' .
                      '<p class="desc"><span class="make_bold">Platform:</span>  ' . $pull_search_games['Platform'] . '</p>' .
                      '<p class="desc"><span class="make_bold">Quantity:</span>  ' . $pull_search_games['UnitsInCart'] . '</p>' .
                      '</div>' .
                      '</div>' .
                      '</div>' .
                      '</div>';
              }
          }
          ?>
        <div class="pull-right col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <p style="font-size: 1.9em;">Total Price: <span class="label label-success pull-right" style="font-size: 1em;"> $ <?php if(isset($_SESSION['UID']) ){echo $total_price;} ?></span></p>
                </div>
            </div>
        </div>
        <div class="col-md-12" style="margin-bottom: 1em;">
            <div class="col-md-6">
                <a class="btn btn-block btn-primary" href="games.php"><span class="glyphicon glyphicon-backward"></span> Continue Shopping</a>
            </div>
            <div class="col-md-6">

                <a class="btn btn-block btn-warning" href="CheckOutProcess.php">CheckOut <span class="glyphicon glyphicon-forward"></span> </a>
            </div>
        </div>
    </div>
         <!-- end main content row -->
</div>   <!-- end main content container -->

<?php include 'footer.php'; ?>



<script src="bootstrap3/dist/js/carousel.js"></script>
<script src="bootstrap3/assets/js/jquery.js"></script>
<script src="bootstrap3/dist/js/bootstrap.min.js"></script>
<script src="bootstrap3/assets/js/holder.js"></script>
</body>
</html>