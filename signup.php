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


<!--        <script src="bootstrap3/assets/js/html5shiv.js"></script>-->
<!--        <script src="bootstrap3/assets/js/respond.min.js"></script>-->
<!--        <script src="js/jquery-1.5.js"></script>-->
</head>

<body>

<?php include 'header.php'; ?>



<?php
//date_default_timezone_set("UTC");
//
//$flag = 0;
//
//if (isset($_POST['SignUpBtn'])) {
//    $sql = "INSERT INTO `User` (Username, Password, Email, Phone, Address, City, Country, DateOfRegistration, FirstName, LastName, GiftCardBalance) VALUES ('" . $_POST['username'] . "', '" . sha1($_POST['pwd']) . "', '" . $_POST['email'] . "', '" . $_POST['phone'] . "', '" . $_POST['address'] . "', '" . $_POST['city'] . "', '" . $_POST['country'] . "','" . date('Y-m-d H:i:s') . "', '" . $_POST['FirstName'] . "', '" . $_POST['LastName'] . "','500')";
//
//    if ($db->query($sql) === TRUE) {
//        $flag = 1;
//    } else {
//        $flag = 0;
//    }
//}
//
//
//?>

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
                        <div class="row" style="margin: auto; max-width: 300px;">
                            <div class="alert alert-danger" id="form-error" style="display: none; background-image: none;"></div>
                        </div>
                        <form method="post" class="col-md-offset-2">
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
                                    <input type="text" class="form-control" id="cityinput" placeholder="City">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="countryinput" placeholder="Country">
                                </div>
                                <div class="col-md-3">
                                    <input type="tel" class="form-control" id="phoneinput" placeholder="Phone Number">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6" style="margin-top: 20px;">
                                    <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>  <!-- end main content column -->
</div>  <!-- end main content row -->

<?php include 'footer.php'; ?>
<script type="text/javascript">
    $(document).ready(function () {

        $('#submit').click(function (e) {
            e.preventDefault();

            var emailinput = $("#emailinput").val();
            var unameinput = $("#unameinput").val();
            var firstname = $("#firstname").val();
            var lastname = $("#lastname").val();
            var passwd = $("#passwd").val();
            var confpass = $("#confpass").val();
            var addressinput = $("#addressinput").val();
            var zipcode = $("#zipcode").val();
            var stateinput = $("#stateinput").val();
            var cityinput = $("#cityinput").val();
            var countryinput = $("#countryinput").val();
            var phoneinput = $("#phoneinput").val();
            $.ajax({
                type: "POST",
                url: "processform.php",
                dataType: "json",
                data: {emailinput: emailinput,
                unameinput: unameinput,
                firstname: firstname,
                lastname: lastname,
                passwd: passwd,
                confpass: confpass,
                addressinput: addressinput,
                zipcode: zipcode,
                stateinput: stateinput,
                cityinput: cityinput,
                countryinput: countryinput,
                phoneinput: phoneinput},
                success: function (data) {
                    if (data.code === 200) {
                        // Success
                        // alert(data.msg);
                        window.location = "index.php";
                    } else {
                        // invalid form
                        $("#form-error").html("<ul>"+data.msg+"</ul>");
                        $("#form-error").css("display","flex");
                    }
                }
            });

        });
    });
</script>

<script src="bootstrap3/dist/js/carousel.js"></script>
<script src="bootstrap3/assets/js/jquery.js"></script>
<script src="bootstrap3/dist/js/bootstrap.min.js"></script>
<script src="bootstrap3/assets/js/holder.js"></script>
</body>
</html>
