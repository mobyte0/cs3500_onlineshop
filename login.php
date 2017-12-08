
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;
 charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>login page</title>



    <!-- Google fonts  -->
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

<div class="container">

    <div class="row">  <!-- start main content row -->

        <div class="col-md-12">
            <img class="container" style="width:30%; height: 30%; margin-left:35% " src="images/oraclelogo.jpg">
        </div>

        <div class="col-md-12">  <!-- start main content column -->
            <div class="panel panel-info">
                <div class="panel-heading"><h3>User Login</h3></div>
                <div class="panel-body">

                        <div class=col-md-12>
                            <!-- IF THERE IS AN ERROR for the user or password information, then display this -->
                            <?php
                            if($if_error == -1) {
                                echo '<div class="alert alert-warning alert-dismissable">'.'<a href = "#" class="close" data-dismiss = "alert" aria-label= "close" >&times;</a >
                    '.'<strong > Error: </strong > Username or password did not match our records .</div >';
                            }
                            ?>
                            <!-- END display error -->

                            <form action="login.php" method="post">
                                <div class="form-group">
                                    <label for="username">Username:</label>
                                    <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username">
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Password:</label>
                                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                                </div>
                                <button name ="logInBtn" type="submit" class="btn btn-primary">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



    </div>  <!-- end main content column -->
</div>  <!-- end main content row -->


<?php include 'footer.php'; ?>


</body>
</html>

<script src="bootstrap3/dist/js/carousel.js"></script>
<script src="bootstrap3/assets/js/jquery.js"></script>
<script src="bootstrap3/dist/js/bootstrap.min.js"></script>
<script src="bootstrap3/assets/js/holder.js"></script>