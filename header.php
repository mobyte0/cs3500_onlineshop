<?php
session_start();
include 'dbinfo.php';
$db = new mysqli('localhost', $user, $pass, $db) or die ("Unable to connect");
if (isset($_SESSION['username']) && $_SESSION['pwd']) {
    $query = mysqli_query($db, "SELECT * FROM `User` WHERE Username = '" . $_SESSION['username'] . "';");
    $pull_data = $query->fetch_assoc();
}
$if_error = 0;
if (isset($_POST['username']) && isset($_POST['pwd'])) {
    $query = mysqli_query($db, "SELECT * FROM `User` WHERE Username = '" . $_POST['username'] . "' AND PASSWORD = '" . sha1($_POST['pwd']) . "';");
    $name = $query->fetch_assoc();
    $number = mysqli_num_rows($query);
    if ($number > 0) {
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['pwd'] = $_POST['pwd'];
        $_SESSION['UID'] = $name['UID'];
        header("Location: index.php");
    } else {
        $if_error = -1;
    }
}
?>
<head>
    <meta http-equiv="Content-Type" content="text/html;  charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="bootstrap3/dist/bootstrap.css" rel="stylesheet">

    <link href="bootstrap3/dist/bootstrap-theme.css" rel="stylesheet">
    <link href="header.css" rel="stylesheet"/>
    <link href="css/modal_single_game.css" rel="stylesheet"/>
    <script src="bootstrap3/assets/js/html5shiv.js"></script>
    <script src="bootstrap3/assets/js/respond.min.js"></script>
    <script src="js/jquery-1.5.js"></script>
    <script>
        function countChar(val) {
            var len = val.value.length;
            if (len >= 250) {
                val.value = val.value.substring(0, 250);
                $('#charNum').text(0);
            } else {
                $('#charNum').text(250 - len);
            }
        }
    </script>
    <style>
        img:hover {
            opacity: 0.7;
        }

    </style>
</head>
<header>
    <div id="topHeaderRow">
        <div class="container">
            <div class="pull-right">
                <ul class="list-inline">
                    <?php
                    if (isset($_SESSION['username']) && isset($_SESSION['pwd'])) {
                        echo '<li><span class="glyphicon glyphicon-user"></span>  Welcome  <a href="UserProfile.php">' . $pull_data['FirstName'] . ' ' . $pull_data['LastName'] . '</a></li><li><a href="LogOut.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>';
                    } else {
                        echo '<li><a href="SignUp.php"><span class="glyphicon glyphicon-edit"></span> Sign Up</a></li><li> <a href="login.php">Log In</a></li>';
                    }
                    ?>
                    <?php
                    if (isset($_SESSION['UID'])) {
                        echo '<li><a href="ShoppingCart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</a></li>';
                    } // else {
                    //
                    //                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>  <!-- end topHeaderRow -->

    <!--Begin navbar-->
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img class="img-responsive" alt="Oracle Game Store Logo" src="images/oraclelogo.jpg"
                             style="height: 20px;">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
                        <li><a href="VideoGames.php">Games </a></li>
                        <li><a href="FavoriteGames.php">Favorites</a></li>
                    </ul>
                    <form class="navbar-form navbar-right">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search" style="width: 300px;">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </div>
    <!--End navbar-->

    <!--    <div class="navbar navbar-default">-->
    <!--      <div class="container">-->
    <!--         <nav>-->
    <!--           <div class="navbar-header">-->
    <!--             <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">-->
    <!--               <span class="icon-bar"></span>-->
    <!--               <span class="icon-bar"></span>-->
    <!--               <span class="icon-bar"></span>-->
    <!--             </button>-->
    <!---->
    <!--           </div>-->
    <!--             <div>-->
    <!--                 <ul>-->
    <!--             <li class="navbar-brand list-unstyled" ><a href="index.php"><img title="home" style="width: 60px; height: 60px;" src="images/Logo.jpg" title="logo" align="logo"/> </a></li>-->
    <!--                 </ul>-->
    <!--             </div>-->
    <!--           <div class="navbar-collapse collapse">-->
    <!--             <ul class="nav navbar-nav main-navbar">-->
    <!--                 <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>-->
    <!--                 <li><a href="VideoGames.php"><span class="glyphicon glyphicon-floppy-disk"></span> Video Games</a></li>-->
    <!--                 <li><a href="FavoriteGames.php"><span class="glyphicon glyphicon-heart"></span> Favorite Games</a></li>-->
    <!--             </ul>-->
    <!--           </div><!-- end navbar collapse -->
    <!---->
    <!--             <div class="panel-body"><!-- this is the search bar -->
    <!--                 <form method="post" action="SearchQuery.php">-->
    <!--                     <div class="input-group">-->
    <!--                         <input type="text" class="form-control" name="search" placeholder="Search Oracle...">-->
    <!--                         <span class="input-group-btn">-->
    <!--                             <button class="btn btn-warning" type="submit">-->
    <!--                                 <span class="glyphicon glyphicon-search"></span>-->
    <!--                             </button>-->
    <!--                         </span>-->
    <!--                     </div>-->
    <!--                 </form>-->
    <!--             </div>-->
    <!--         </nav>-->
    <!--      </div>-->
    <!--    </div>  <!-- end navbar -->
</header>
