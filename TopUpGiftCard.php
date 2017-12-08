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
        </div>  <!-- end left navigation rail -->

        <div class=" col-md-9">  <!-- start main content column -->
            <div class="pull-right col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <p style="font-size: 1.9em;">Add Funds:</p>
                    </div>
                        <div class="panel-body">
                        <?php
                        if(isset($_SESSION['UID'])){
                            $query_Balance = mysqli_query($db,"SELECT * FROM `User` WHERE UID='".$_SESSION['UID']."';");
                            $pull_Balance = $query_Balance->fetch_assoc();

                            echo'<div class="col-md-9">'.
                                '<form method="POST" action="TopUpGiftCard.php">'.
                                '<h4>Current Balance:</h4>'.
                                '<p class="col-md-3 h3" ><span class="label label-info">$ '.$pull_Balance['GiftCardBalance'].'</span></p>'.
                                '</div>'.

                                '<div class="col-md-3">' .
                                    '<select class="form-control pull-right" name="NewBalance">' .
                                       '<ol class="breadcrumb">'.
                                         '<option value="Select" name="Balance" selected disabled >Select Gift Card</option>'.
                                         '<option value="100" name="Balance" >$ 100</option>'.
                                         '<option value="500" name="Balance" >$ 500</option>'.
                                         '<option value="1000" name="Balance" >$ 1000</option>'.
                                       '</ol>' .
                                    '</select>'.
                                '<div style="margin-top: 4em;"><button type="submit" style="margin-top: 1em;" class="btn btn-block btn-primary" name="AddFunds">Add Funds</button></div>'.
                                '</form>'.
                                '</div>';


                        }
                        if(isset($_POST['AddFunds'])){
                            if(isset($_POST['NewBalance'])) {

                                $sql_add_funds = "UPDATE `User` SET GiftCardBalance = " . ($pull_Balance['GiftCardBalance'] + $_POST['NewBalance']) . " WHERE UID = " . $_SESSION['UID'] . ";";

                                if($db->query($sql_add_funds) === TRUE) {
                                    echo '<script>window.log.href("home.php");</script>';
                                } else {
                                    echo '<script>window.log.href("error.php");</script>';
                                }
                            }

                        }
                        ?>
                    </div>
                </div>
            </div>


            <div class="col-md-12" style="margin-bottom: 1em;">
                <div class="col-md-6">
                    <a class="btn btn-block  btn-warning " href="index.php"><span class="glyphicon glyphicon-backward"></span> Go Back Home</a>
                </div>
                <div class="col-md-6">

                    <a class="btn btn-block btn-primary" href="VideoGames.php">Continue Shopping <span class="glyphicon glyphicon-forward"></span> </a>
                </div>
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
