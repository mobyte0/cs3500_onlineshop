<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;  charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Oracle Game Store - Sign Up</title>

    <link href="bootstrap3/dist/bootstrap.css" rel="stylesheet">

    <link href="bootstrap3/dist/bootstrap-theme.css" rel="stylesheet">

    <script src="bootstrap3/assets/js/html5shiv.js"></script>
    <script src="bootstrap3/assets/js/respond.min.js"></script>

</head>

<body>

<?php include 'header.php'; ?>



<?php
date_default_timezone_set("UTC");

$flag = 0;

if (isset($_POST['SignUpBtn'])) {
    $sql = "INSERT INTO `User` (Username, Password, Email, Phone, Address, City, Country, DateOfRegistration, FirstName, LastName, GiftCardBalance) VALUES ('" . $_POST['username'] . "', '" . sha1($_POST['pwd']) . "', '" . $_POST['email'] . "', '" . $_POST['phone'] . "', '" . $_POST['address'] . "', '" . $_POST['city'] . "', '" . $_POST['country'] . "','" . date('Y-m-d H:i:s') . "', '" . $_POST['FirstName'] . "', '" . $_POST['LastName'] . "','500')";

    if ($db->query($sql) === TRUE) {
        $flag = 1;
    } else {
        $flag = 0;
    }
}


?>

<div class="container">

    <div class="row">  <!-- start main content row -->

        <div class="col-md-12">
            <img class="container" style="width:30%; height: 30%; margin-left:35% " src="images/oraclelogo.jpg">
        </div>

        <div class="col-md-12">  <!-- start main content column -->
            <div class="panel panel-info">
                <div class="panel-heading"><h3>Create Account</h3></div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <form name="SignUpForm" action="signup.php" method="post">
                            <div class="form-group" style="padding-bottom: 35px;">
                                <div class="col-md-5">
                                    <input type="email" class="form-control" id="emailinput" placeholder="Email">
                                </div>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" id="unameinput" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group" style="padding-bottom: 35px;">
                                <div class="col-md-5">
                                    <input type="text" class="form-control" id="firstname" placeholder="First Name">
                                </div>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" id="lastname" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="form-group" style="padding-bottom: 35px;">
                                <div class="col-md-5">
                                    <input type="password" class="form-control" id="passwd" placeholder="Password">
                                </div>
                                <div class="col-md-5">
                                    <input type="password" class="form-control" id="confpass" placeholder="Confirm Password">
                                </div>
                            </div>
                            <div class="form-group" style="padding-bottom: 35px;">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="addressinput" placeholder="Address">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" id="zipcode" placeholder="Zip Code">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" id="stateinput" placeholder="State">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3">
                                    <input type="text" class="form-control" id="addressinput" placeholder="City">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="addressinput" placeholder="Country">
                                </div>
                                <div class="col-md-3">
                                    <input type="tel" class="form-control" id="addressinput" placeholder="Phone Number">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6" style="margin-top: 20px;">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
<!--                            <div class="form-row">-->
<!--                                <div class="form-group col-md-6" style="padding-right: 20%">-->
<!--                                    <input type="text" class="form-control" id="First Name" placeholder="First Name"-->
<!--                                           name=" FirstName" required>-->
<!--                                </div>-->
<!---->
<!--                                <div class="form-group col-md-6" style="padding-right: 20%">-->
<!--                                    <input type="text" class="form-control" id="Last Name" placeholder="Last Name"-->
<!--                                           name="LastName" required>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="form-row">-->
<!--                                <div class="form-group col-md-6" style="padding-right: 20%">-->
<!--                                    <input type="text" class="form-control" id="username" placeholder="Username"-->
<!--                                           name="username" required>-->
<!--                                </div>-->
<!--                                <div class="form-group col-md-6" style="padding-right: 20%">-->
<!--                                    <input type="email" class="form-control" id="email" placeholder="Email" name="email"-->
<!--                                           required>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="form-row">-->
<!--                                <div class="form-group col-md-6" style="padding-right: 20%">-->
<!--                                    <input type="password" class="form-control" id="pwd" placeholder="Password"-->
<!--                                           name="pwd" required>-->
<!--                                </div>-->
<!--                                <div class="form-group col-md-6" style="padding-right: 20%">-->
<!--                                    <input type="password" class="form-control" id="pwd" placeholder="Password"-->
<!--                                           name="pwd" required>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="form-row">-->
<!--                                <div class="form-group col-md-6" style="padding-right: 20%;">-->
<!--                                    <input type="text" class="form-control" id="address" placeholder="Address"-->
<!--                                           name="address" required>-->
<!--                                </div>-->
<!--                                <div class="form-group col-md-6" style="padding-right: 20%">-->
<!--                                    <input type="tel" class="form-control" id="phone" placeholder="Phone Number"-->
<!--                                           name="phone" required>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="form-row">-->
<!--                                <div class="form-group col-md-6" style="padding-right: 20%">-->
<!--                                    <input type="text" class="form-control" id="city" placeholder="City" name="city"-->
<!--                                           required>-->
<!--                                </div>-->
<!--                                <div class="form-group col-md-6" style="padding-right: 20%">-->
<!--                                    <input type="text" class="form-control" id="country" placeholder="Country"-->
<!--                                           name="country" required>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                    </div>-->
<!--                    <div class="form-group col-md-6 ">-->
<!--                        <button name="SignUpBtn" type="submit" class="btn btn-primary ">Submit</button>-->
<!--                    </div>-->


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
