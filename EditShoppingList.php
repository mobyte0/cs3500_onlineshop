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

        <div class="container">
            <div class="col-md-6">
                <h2>Edit Shopping List!</h2>
            </div>
            <div class="col-md-6">
                <form method="post" action="ShoppingCart.php">
                    <button type="submit" name="DoneEditing" class="btn btn-primary pull-right">Delete All</button>
                </form>
            </div>
        </div>
        <div class="col-md-12">



            <div class="container">
            <form method="post" action="ShoppingCart.php">

            <?php
                if(isset($_SESSION['UID'])) {
                    $sql_fetch_shopping_list = mysqli_query($db, "SELECT * FROM `UserShoppingCart`,`Product` WHERE UID = " . $_SESSION['UID'] . " AND Product.ProductID = UserShoppingCart.ProductID;");


                    while ($get_list = $sql_fetch_shopping_list->fetch_assoc()) {
                        echo '<div class="well">' .
                                '<div class="row">' .
                                    '<div class="col-md-12">' .
                                        '<div class="col-md-3">' .
                                            '<div class="list-group" style="background: white;">' .
                                                '<a href="SingleGame.php?id=' . $get_list['ProductID'] . '">' .
                                                    '<img class="img-thumbnail" src="images/Covers/' . $get_list['ImagePath'] . '" alt="random image">' .
                                                '</a>' .
                                            '</div>' .
                                        '</div>' .
                                    '<div class="col-md-6">' .
                                '<p class="desc"><span class="label label-primary">Title:</span>   ' . $get_list['Name'] . '</p>' .
                                '<p class="desc"<span style="font-weight: bold;">Price:</span><span class="label label-warning">  $ ' . $get_list['Price'] . '  Per Unit</span></p>' .
                                '<p class="desc"><span class="make_bold">Platform:</span>  ' . $get_list['Platform'] . '</p>' .
                                '<p class="desc"><span class="make_bold">Quantity:</span>  ' . $get_list['UnitsInCart'] . '</p>' .
                            '</div>' .

                            '<div class="col-md-3">' .
                            '<select class="form-control pull-right" name="'. $get_list['ProductID'] . '">' .
                                '<option value="Delete By Quantity" selected disabled>Delete by Quantity</option>' .
                            '<ol class="breadcrumb">';
                        $count = 1;
                        while ($count < $get_list['UnitsInCart']) {
                            echo '<option value="'. $count . '" id="'. $get_list['ProductID']. '">' . $count . '</option>';
                            $count++;
                        }
                        echo '<option value="Delete All" name="QuantityDelete" >Delete All</option>';
                        echo '</ol>' .
                            '</select>' .
                            '<div style="margin-top: 4em;"><input type="submit" style="margin-top: 1em;" value="Update" class="btn btn-block btn-primary" name="CustomEdit"/></div>'.
                            '</div>' .
                            '</div>' .
                            '</div>' .
                            '</div>';
                    }
                }
            ?>

                </form>

            </div>






        </div>  <!-- end main content column -->
    </div>  <!-- end main content row -->
</div>   <!-- end main content container -->

<div style="margin-bottom: 10em;"></div>
<?php include 'footer.php'; ?>

<script src="bootstrap3/dist/js/carousel.js"></script>
<script src="bootstrap3/assets/js/jquery.js"></script>
<script src="bootstrap3/dist/js/bootstrap.min.js"></script>
<script src="bootstrap3/assets/js/holder.js"></script>
</body>
</html>
</html>