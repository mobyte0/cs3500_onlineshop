<?php
//SELECT AVG(Rating) AS AVG_RATING, ProductID FROM ProductRating
//GROUP BY ProductID
//HAVING AVG(Rating) > 4.0
// this will be used for rating games based on weighted average

include 'dbinfo.php';

$db = new mysqli('localhost', $user, $pass, $db) or die ("Unable to connect");

$query_favorite = mysqli_query($db, "SELECT AVG(Rating) AS AVG_RATING, ProductID FROM ProductRating GROUP BY ProductID HAVING AVG(Rating) > 3.0 LIMIT 12");
$number_fav = mysqli_num_rows($query_favorite);

$path_list = array();

$count = 0;
while($pull_data = mysqli_fetch_assoc($query_favorite)) {
    $path_list[$count] = $pull_data['ProductID'];
    $count++;
}

$name_list = array();

$count1 = 0;


while($count1 < sizeof($path_list)) {
    $query_names = mysqli_query($db, "SELECT * FROM `Product` where ProductID = ". $path_list[$count1] .";");
    $row_names = $query_names->fetch_assoc();


    $name_list[$count1] = $row_names['Name'];

    $count1++;
}


?>

         <div class="panel panel-info">
             <div class="panel-heading"><span class="glyphicon glyphicon-thumbs-up"></span> Popular Products</div>
           <ul class="list-group">               
              <li class="list-group-item"><a href="games.php?console=PS4">Playstation 4</a></li>
              <li class="list-group-item"><a href="games.php?console=XBOX">Xbox One X</a></li>
              <li class="list-group-item"><a href="games.php?console=Nintendo+Switch">Nintendo Switch</a></li>
               <li class="list-group-item"><a href="games.php?console=PC">PC</a></li>
           </ul>
         </div>  <!-- end continents panel -->  
         <div class="panel panel-info">
           <div class="panel-heading"><span class="glyphicon glyphicon-thumbs-up"></span>  Popular Games</div>
           <ul class="list-group">
               <?php
                    $count3 = 0;

                    while($count3 < sizeof($name_list)) {

                        echo '<li class="list-group-item"><a href="PopularGames.php?id='. $path_list[$count3] .'">'. $name_list[$count3] .'</a>';

                        $count3++;
                    }

               ?>
           </ul>
         </div>  <!-- end countries panel -->

<?php

if (isset($_SESSION['UID'])) {
    date_default_timezone_set("UTC");

    $date = date('Y-m-d H:i:s');


    $query_Purchases = mysqli_query($db, "SELECT * FROM OrderDetails WHERE UID = ". $_SESSION['UID'] ." AND Date >= '2017-12-05 00:00:00' LIMIT 9;");

    if(mysqli_num_rows($query_Purchases) !==0) {
        echo '<div class="panel panel-info">' .
            '<div class="panel-heading"><span class="glyphicon glyphicon-credit-card"></span> Recent Purchases</div><ul class="list-group">';
    }

    while($get_date = $query_Purchases->fetch_assoc()) {
        $query_game = mysqli_query($db, "SELECT * FROM `Product` WHERE ProductID ='" . $get_date['ProductID'] . "';");
        $get_game = $query_game->fetch_assoc();

        echo '<li class="list-group-item"><a href="SingleGame.php?id=' . $get_game['ProductID'] . '">' . $get_game['Name'] . '</a></li>';
    }
    if(mysqli_num_rows($query_Purchases) !==0) {
        echo '</ul></div>';
    }
}

?>
