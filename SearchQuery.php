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

        <div class="col-md-9">


            <h1>Search Results</h1>
            <?php
                if($_POST['search'] !== '') {
                    $query = mysqli_query($db, "Select * from `Product` where Name Like '%" . $_POST['search'] . "%'or Tags LIKE '%". $_POST['search']."%';");

                    while ($pull_search_games = $query->fetch_assoc()) {
                        echo '<div class="well">'.
                                '<div class="row">' .
                                    '<div class="col-md-9">'.
                                        '<div class="col-md-3">'.
                                            '<div class="list-group" style="background: white;">'.
                                                '<a href="SingleGame.php?id='. $pull_search_games['ProductID'] .'">'.
                                                    '<img class="img-thumbnail" src="images/Covers/' . $pull_search_games['ImagePath'] . '" alt="random image">'.
                                                '</a>'.
                                            '</div>'.
                                        '</div>'.
                                        '<div class="col-md-6">'.
                                            '<p>Title: '. $pull_search_games['Name'].'</p>'.
                                            '<p>Platform: '. $pull_search_games['Platform'].'</p>'.
                                            '<p>Description: '. $pull_search_games['Description'].'</p>'.
                                            '<p>Price: $ '. $pull_search_games['Price'].'</p>'.
                                        '</div>'.
                                  '</div>'.
                                '</div>'.
                            '</div>';
                    }

                }
            ?>





        </div>  <!-- end main content column -->
    </div>  <!-- end main content row -->
</div>   <!-- end main content container -->

<?php include 'footer.php'; ?>
<script>
    window.onbeforeunload = function() {"";};
</script>
<script src="bootstrap3/dist/js/carousel.js"></script>
<script src="bootstrap3/assets/js/jquery.js"></script>
<script src="bootstrap3/dist/js/bootstrap.min.js"></script>
<script src="bootstrap3/assets/js/holder.js"></script>
</body>
</html>