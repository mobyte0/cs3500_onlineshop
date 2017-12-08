
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Oracle Game Store - Profile</title>


    <!-- Google fonts used -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic,700italic' rel='stylesheet' type='text/css'>

    <link href="bootstrap3/dist/bootstrap.css" rel="stylesheet">

    <link href="bootstrap3/dist/bootstrap-theme.css" rel="stylesheet">
    <link href="header.css" rel="stylesheet"/>

    <script src="bootstrap3/assets/js/html5shiv.js"></script>
    <script src="bootstrap3/assets/js/respond.min.js"></script>


</head>

<body>

<?php include 'header.php'; ?>
<?php

include "dbinfo.php";
//echo '<pre>'; print_r($pul_review); echo '</pre>';
$loaddb = new PDO("mysql:host=" . $host . ";dbname=" . $db, $user, $pass);
$query = $loaddb->query("SELECT * FROM User WHERE UID LIKE '" . $_SESSION['UID'] . "'");
$query->execute();
$pull_info = $query->fetch();

$query = $loaddb->query("SELECT * FROM ProductReview WHERE UID LIKE '" . $pull_info['UID'] . "'");
$query->execute();
$pul_review = $query->fetchAll();

$query = $loaddb->query("SELECT * FROM ProductRating WHERE UID LIKE '" . $pull_info['UID'] . "'");
$query->execute();
$pull_data7 = $query->fetchAll();

$query = $loaddb->query("SELECT DISTINCT ProductID FROM ProductRating WHERE UID LIKE '" . $pull_info['UID'] . "'");
$query->execute();
$pull_data8 = $query->fetchAll();

$query = $loaddb->query("SELECT DISTINCT ProductID FROM ProductFavorite WHERE UID LIKE '" . $pull_info['UID'] . "'");
$query->execute();
$pull_Fav = $query->fetchAll();

$query = $loaddb->query("SELECT * FROM OrderDetails WHERE UID LIKE '" . $_SESSION['UID'] . "'");
$query->execute();
$pull_purchases = $query->fetchAll();
?>
<div class="container">
    <div class="row">  <!-- start main content row -->

        <div class="col-md-2">  <!-- start left navigation rail column -->
            <?php include 'side.php'; ?>
        </div>  <!-- end left navigation rail -->

        <div class="col-md-10">  <!-- start main content column -->

            <!-- Customer panel  -->
            <div class="panel panel-info">
                <div class="panel-heading"><h4> <?php echo $pull_info['FirstName'].' '. $pull_info['LastName'] ?>'s Profile Page</h4></div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading"><h4>Login Details</h4></div>
                                <ul class="list-group">
                                    <li class="list-group-item"><strong class="text-primary">Username</strong><br> <?php echo $_SESSION['username']; ?></li>
                                    <li class="list-group-item"><strong class="text-primary">Password</strong>
                                        <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">
                                            <span class="glyphicon glyphicon-eye-open"></span> Show
                                        </button>
                                        <div id="demo" class="d-inline collapse">
                                        </div> </li>
                                    <li class="list-group-item"><strong class="text-primary">Date Of Registration</strong><br> <?php echo utf8_encode($pull_info['DateOfRegistration']); ?> </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading"><h4>User Information</h4></div>
                                <ul class="list-group">
                                    <li class="list-group-item"><strong class="text-primary">First Name</strong><br><?php echo utf8_encode($pull_info['FirstName']); ?></li>

                                    <li class="list-group-item"><strong class="text-primary">Last Name</strong><br><?php echo utf8_encode($pull_info['LastName']); ?></li>

                                    <li class="list-group-item"><strong class="text-primary">Address</strong><br><?php echo utf8_encode($pull_info['Address']); ?> </li>

                                    <li class="list-group-item"><strong class="text-primary">City</strong><br><?php echo utf8_encode($pull_info['City']); ?> </li>

                                    <li class="list-group-item"><strong class="text-primary">Country</strong><br><?php echo utf8_encode($pull_info['Country']); ?> </li>

                                    <li class="list-group-item"><strong class="text-primary">Phone</strong><br><?php echo $pull_info['Phone']; ?></li>

                                    <li class="list-group-item"><strong class="text-primary">E-Mail</strong><br><?php echo $pull_info['Email']; ?></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading"><h4>User Activity</h4></div>
                                <ul class="list-group">
                                    <li class="list-group-item"><strong class="text-primary">Products Purchased</strong><br><?php echo count($pull_purchases) ?> </li>
                                    <li class="list-group-item"><strong class="text-primary">Products Reviewed</strong><br><?php echo count($pul_review); ?> </li>
                                    <li class="list-group-item"><strong class="text-primary">Products Rated</strong><br><?php echo count($pull_data8); ?> </li>
                                    <li class="list-group-item"><strong class="text-primary">Favorite Products</strong><br><?php echo count($pull_Fav); ?></li>
                                    <li class="list-group-item"><strong class="text-primary">Gift Card Balance</strong><br><span class="label label-warning ">&curren; <?php echo $pull_info['GiftCardBalance']; ?></span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


            </div>


        </div>  <!-- end main content column -->
    </div>  <!-- end main content row -->
</div>   <!-- end container -->

<?php include 'footer.php'; ?>
</body>
</html>

<script src="bootstrap3/dist/js/carousel.js"></script>
<script src="bootstrap3/assets/js/jquery.js"></script>
<script src="bootstrap3/dist/js/bootstrap.min.js"></script>
<script src="bootstrap3/assets/js/holder.js"></script>