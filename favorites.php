<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;  charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Oracle Game Store - Favorites</title>

    <link href="bootstrap3/dist/bootstrap.css" rel="stylesheet">

    <link href="bootstrap3/dist/bootstrap-theme.css" rel="stylesheet">

    <script src="bootstrap3/assets/js/html5shiv.js"></script>
    <script src="bootstrap3/assets/js/respond.min.js"></script>

    <style>
        .fav-delete {
            position: absolute;
            top: -5px;
            right: 10px;
            height: 35px;
            width: 35px;
            background-color: red;
            color: white;
            font-size: 20px;
            padding: 5px;
            text-align: center;
            border-radius: 100%;
        }
    </style>
</head>

<body>

<?php
include 'header.php';
if (isset($_GET['remove'])){
    include 'dbinfo.php';
    $loaddb = new PDO("mysql:host=".$host.";dbname="."$db", $user, $pass);
    $query = $loaddb->query("SELECT ProductID FROM ProductFavorite WHERE UID LIKE '" . $_SESSION["UID"] . "' AND ProductID LIKE '" . $_GET['remove'] . "'");
    $query->execute();
    $verifyfav = $query->fetchAll();
    if (!empty($verifyfav)){
        $query = $loaddb->query("DELETE FROM ProductFavorite WHERE UID LIKE '" . $_SESSION["UID"] . "' AND ProductID LIKE '" . $_GET['remove'] . "'");
        $query->execute();
    }
}
?>

<div class="container">  <!-- start main content container -->
    <div class="row">  <!-- start main content row -->
        <div class="col-md-3">  <!-- start left navigation rail column -->
            <?php include 'side.php'; ?>
        </div>  <!-- end left navigation rail -->

        <div class="col-md-9">

            <div class="container" style="padding-left: 0;">
                <div class="col-md-9" style="padding-left: 0;">
                    <div class="well">
                        <div class="row">
                            <img style="width: 100%; padding-left: 1em; padding-right: 1em;" alt="Games" title="Favorite Games" src="images/banner_games.jpg"/>
                        </div>
                    </div>
                </div>
            </div>

            <div class="well">
                <div class="row">

                    <div style="padding-top: 15px" class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">Favorite Games</div>
                            <div class="panel-body">
                            <ul class="list-group">
                    <?php
                        if(isset($_SESSION['UID']) && isset($_SESSION['username'])) {
                            include "dbinfo.php";
                            $loaddb = new PDO("mysql:host=".$host.";dbname="."$db", $user, $pass);
                            $query = $loaddb->query("SELECT ProductID FROM ProductFavorite WHERE UID LIKE '" . $_SESSION["UID"] . "'");
                            $query->execute();
                            $pull_games = $query->fetchAll();
                            for ($x=0;$x<count($pull_games);$x++) {
                                $query = $loaddb->query("SELECT ImagePath FROM Product WHERE ProductID LIKE '" . $pull_games[$x]["ProductID"] . "'");
                                $query->execute();
                                $path = $query->fetch();
                                $pull_games[$x]['Path'] = $path['ImagePath'];
                            }
                            for ($x=0;$x<count($pull_games);$x++){
                                echo '<div class="col-md-3">' . '<a href="favorites.php?remove='.$pull_games[$x]['ProductID'].'"><div class="fav-delete"><span class="glyphicon glyphicon-remove"></span></div></a>' .
                                    '<div class="list-group">' .
                                    '<a href="SingleGame.php?id=' . $pull_games[$x]['ProductID'] . '">' .
                                    '<img class="img-thumbnail" src="images/Covers/' . $pull_games[$x]['Path'] . '" alt="random image">' .
                                    '</a>' .
                                    '</div>' .
                                    '</div>';

                            }

                        } else {
                            echo '<h2 class="col-md-offset-4">You are not logged in</h2>';
                        }
                    ?>
                            </ul>
                            </div>
                        </div>
                    </div>

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