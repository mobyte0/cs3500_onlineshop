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
date_default_timezone_set("UTC");


$flag = 0;

if(isset($_POST['SignUpBtn'])) {
    $sql = "INSERT INTO `User` (Username, Password, Email, Phone, Address, City, Country, DateOfRegistration, FirstName, LastName, GiftCardBalance) VALUES ('". $_POST['username']. "', '". sha1($_POST['pwd']) . "', '". $_POST['email']. "', '". $_POST['phone']. "', '". $_POST['address']. "', '". $_POST['city']. "', '". $_POST['country']. "','". date('Y-m-d H:i:s') . "', '". $_POST['FirstName']. "', '". $_POST['LastName']. "','500')";

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
            <img class="container" style="width:30%; height: 30%; margin-left:35% " src="images/Logo.jpg">
        </div>

        <div class="col-md-12">  <!-- start main content column -->
            <div class="panel panel-info">
                <div class="panel-heading"><h3>Create Account</h3></div>
                <div class="panel-body">

                    <div class="col-md-12">

                        <form name="SignUpForm" action="SignUp.php" method="post">
                            <div class="form-row">

                            <div class="form-group col-md-6" style="padding-right: 20%">
                                <label for=" First Name">First Name:</label>
                                <input type="text" class="form-control"   id="First Name" placeholder="Enter  First Name" name=" FirstName" required>
                            </div>

                            <div class="form-group col-md-6" style="padding-right: 20%">
                                <label for="Last Name"> Last Name:</label>
                                <input type="text" class="form-control"  id="Last Name" placeholder="Enter Last Name" name="LastName" required>
                            </div>

                            <div class="form-group col-md-6" style="padding-right: 20%">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control"  id="username" placeholder="Enter Username" name="username" required>
                            </div>

                            <div class="form-group col-md-6" style="padding-right: 20%">
                                <label for="pwd">Password:</label>
                                <input type="password" class="form-control" id="pwd" placeholder="Enter Password" name="pwd" required>
                            </div>

                            <div class="form-group col-md-6" style="padding-right: 20%">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control"  id="email" placeholder="Enter Email" name="email" required>
                            </div>

                            <div class="form-group col-md-6"style="padding-right: 20%">
                                <label for="phone">Phone:</label>
                                <input type="tel" class="form-control"  id="phone" placeholder="Enter  Phone Number" name="phone" required>
                            </div>

                            <div class="form-group col-md-9">
                                <label for="address">Address:</label>
                                <input type="text" class="form-control"  id="address" placeholder="Enter  Address" name="address" required>
                            </div>

                                <div class="form-row">
                            <div class="form-group col-md-6" style="padding-right: 20%">
                                <label for="city">City:</label>
                                <input type="text" class="form-control"  id="city" placeholder="Enter City" name="city" required>
                            </div>
                            <div class="form-group col-md-6" style="padding-right: 20%">
                                <label for="country">Country:</label>
                                <input type="text" class="form-control" id="country" placeholder="Enter  Country" name="country" required>
                            </div>

                                </div>
                            </div>

                            <div class="form-group col-md-6 ">
                                <button name ="SignUpBtn" type="submit" class="btn btn-primary ">Submit</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>





    </div>  <!-- end main content column -->
</div>  <!-- end main content row -->


<?php include 'footer.php';?>


</body>
</html>
