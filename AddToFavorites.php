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

if(isset($_POST['favbtn'])) {

    $check_if_favorite_exists = mysqli_query($db, "SELECT * from `ProductFavorite` where UID = ". $_SESSION['UID']." AND ProductID = ". $_SESSION['PID'].";");

    $sql_add_to_favorites = 0;
    if(mysqli_num_rows($check_if_favorite_exists) === 0) {
        $sql_add_to_favorites = "INSERT INTO `ProductFavorite` (UID, ProductID) VALUES (" . $_SESSION['UID'] . " , " . $_SESSION['PID'] . ");";
    }


}

?>

<div class="container">  <!-- start main content container -->
    <div class="row">  <!-- start main content row -->
        <div class="col-md-3">  <!-- start left navigation rail column -->
            <?php include 'side.php'; ?>
        </div>  <!-- end left navigation rail -->

        <div class="col-md-9">

            <div class="well">
                <div class="row">

                    <?php
                        if ($db->query($sql_add_to_favorites) === TRUE) {
                            echo '<div class="col-md-9"><h3>Game added to favorites.</h3></div>';
                        } else {
                            header("Location: error.php");
                        }

                    ?>

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
