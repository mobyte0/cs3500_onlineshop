<?php
session_start();

$user = 'ibrahimitani';
$pass = 'itani90';
$db = 'cs3500_StoreDB';

$db = new mysqli('127.0.0.1', $user, $pass, $db) or die ("Unable to connect");


if(isset($_SESSION['username']) && $_SESSION['pwd']) {
        $query = mysqli_query($db, "SELECT * FROM `User` where Username = '" . $_SESSION['username'] . "';");

        $pull_data = $query->fetch_assoc();
    }


?>


<?php

$if_error = 0;

if(isset($_POST['username']) && isset($_POST['pwd'])) {

    $query = mysqli_query($db, "SELECT * FROM `User` WHERE Username = '" . $_POST['username']. "' AND Password = '". $_POST['pwd'] ."';");
    $name = $query->fetch_assoc();

    $number = mysqli_num_rows($query);

    if($number > 0) {
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['pwd'] = $_POST['pwd'];
        $_SESSION['UID'] = $name['UID'];
        header("Location: home.php");
    } else {

        $if_error = -1;
    }

}

?>

<head>
    <meta http-equiv="Content-Type" content="text/html;  charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Oracle game store</title>

    <link href="bootstrap3/dist/bootstrap.css" rel="stylesheet">

    <link href="bootstrap3/dist/bootstrap-theme.css" rel="stylesheet">
    <link href="header.css" rel="stylesheet"/>

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
        };
    </script>
</head>
<header>
   <div id="topHeaderRow">
      <div class="container">
         <div class="pull-right">
            <ul class="list-inline">
                <?php
                    if(isset($_SESSION['username']) && isset($_SESSION['pwd'])) {
                        echo '<li>Welcome <a href="UserProfile.php">'. $pull_data['FirstName'] .' '. $pull_data['LastName'] .'</a></li><li><a href="LogOut.php">Log Out</a></li>';
                    } else {
                        echo '<li><a href="SignUp.php"><span class="glyphicon glyphicon-edit"></span> Sign Up</a></li><li> <a href="login.php">Log In</a></li>';
                    }
                ?>


                <li><a href="ShoppingCart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</a></li>
            </ul>
         </div>
      </div>
   </div>  <!-- end topHeaderRow -->

    <div class="navbar navbar-default ">
      <div class="container">
         <nav>
           <div class="navbar-header">
             <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
             </button>

           </div>
             <div>
                 <ul>
             <li class="navbar-brand list-unstyled" ><a href="home.php"><img title="home" style="width: 60px; height: 60px;" src="images/Logo.jpg" title="logo" align="logo"/> </a></li>
                 </ul>
             </div>
           <div class="navbar-collapse collapse">
             <ul class="nav navbar-nav">
                 <li style="margin-top: 1em;" ><a href="home.php"> Home</a></li>
                 <li style="margin-top: 1em;"><a href="Consoles.php">Consoles</a></li>
                 <li style="margin-top: 1em;"><a href="VideoGames.php">Video Games</a></li>
                 <li style="margin-top:1em;"><a href="FavoriteGames.php">Favorite Games</a></li>
             </ul>
           </div><!-- end navbar collapse -->

             <div class="panel-body"><!-- this is the search bar -->
                 <form method="post" action="SearchQuery.php">
                     <div class="input-group">
                         <input type="text" class="form-control" name="search" placeholder="Search Oracle...">
                         <span class="input-group-btn">
                             <button class="btn btn-warning" type="submit">
                                 <span class="glyphicon glyphicon-search"></span>
                             </button>
                         </span>
                     </div>
                 </form>
             </div>
         </nav>
      </div>
    </div>  <!-- end navbar -->
</header>
