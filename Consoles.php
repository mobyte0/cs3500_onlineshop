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
        <div class="col-md-3">  <!-- start left navigation rail column -->
            <?php include 'side.php'; ?>
        </div>  <!-- end left navigation rail -->
        <h2>Pick A Console</h2>

        <?php
        $query_consoles = mysqli_query($db,"SELECT * FROM `Consoles`");

        while($pull_console = $query_consoles->fetch_assoc()) {


            echo '<div class="col-md-3">'.
                '<div class="list-group" style="background: white;">'.
                '<a href="SingleConsole.php?id='. $pull_console['ConsoleID'] .'">'.
                '<img class="img-thumbnail" src="images/' . $pull_console['ImagePath'] . '" alt="random image">'.
                '</a>'.
                '</div>'.
                '</div>';
        }






        ?>



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