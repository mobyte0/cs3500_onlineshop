<?php

$user = 'ibrahimitani';
$pass = 'Changeme90.';
$db = 'cs3500_StoreDB';

$db = new mysqli('localhost', $user, $pass, $db) or die ("Unable to connect");


// to display pictures with no filtering
$display_all = mysqli_query($db,"Select * from `Product`;");

// those two in <li> if selected filters company or platform
$display_company = mysqli_query($db, "SELECT DISTINCT Company FROM `Product`");

$display_console = mysqli_query($db, "SELECT DISTINCT Platform FROM `Product`");



// for form. if selected from company or platform display images related to one selected


?>



<!DOCTYPE html>
<html lang="en">

<body>

<?php include 'header.php'; ?>

<div class="container">  <!-- start main content container -->
    <div class="row">  <!-- start main content row -->
        <div class="col-md-3">  <!-- start left navigation rail column -->
            <?php include 'side.php'; ?>
        </div>  <!-- end left navigation rail -->

        <div class="col-md-9">  <!-- start main content column -->

            <h1>Video Games</h1>


                    <form class="breadcrumb" method="GET" action="VideoGames.php">

                        <div class="row"> <!-- row div -->
                            <div class="col-md-4">
                                <select class="form-control" name="Franchise">
                                    <option value="Filter By City" selected disabled>Filter By Company</option>
                                    <ol class="breadcrumb">
                                        <li>
                                            <?php
                                                while($pull_data2 = $display_company->fetch_assoc()) {
                                                    echo '<option value="' .$pull_data2['Company'] . '" id="' . $pull_data2['Company'] . '" name = "company">' . '<div>'. $pull_data2['Company'] .'</div></option>';
                                                }
//                                                for ($i = 0; $i < count($company); $i++) {
//                                                    if (isset($company[$i])) {
//                                                        echo '<option value="' . $company[$i] . '" id="' . $company[$i] . '" name = "company">' . '<div>'. $company[$i] .'</div></option>';
//                                                    }
//                                                }
                                            ?>
                                        </li>
                                    </ol>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <select class="form-control" name="console">
                                    <option value="Filter By Country" selected disabled>Filter By Platform</option>
                                    <ol class="breadcrumb">
                                        <li>
                                            <?php

                                            while ($pull_data3 = $display_console->fetch_assoc()) {
                                                echo '<option value="' . $pull_data3['Platform'] . '" id="' . $pull_data3['Platform'] . '" name = "company">' . '<div>'. $pull_data3['Platform'] .'</div></option>';

                                            }

//                                            for ($i = 0; $i < count($platform); $i++) {
//                                                if (isset($platform[$i])) {
//                                                    echo '<option value="' . $platform[$i] . '" id="' . $platform[$i] . '" name = "company">' . '<div>'. $platform[$i] .'</div></option>';
//                                                }
//                                            }
                                            ?>
                                        </li>
                                    </ol>
                                </select>
                            </div>

                            <button class="btn btn-primary" type="submit"> Filter</button>

                        </div><!--  end of row div-->
                    </form>


            <div class="well">
                <div class="row">

            <?php
            if(isset($_GET['Franchise']) && isset($_GET['console'])) {
                $companyId = $_GET['Franchise'];
                $consoleID = $_GET['console'];

                $query_both = mysqli_query($db, "SELECT DISTINCT * FROM `Product` where `Platform` = '". $consoleID ."' AND Company = '". $companyId ."';");

                while($pull_data = $query_both->fetch_assoc()) {
                    echo '<div class="col-md-3"><div class="list-group"><a href="SingleGame.php?id='. $pull_data['ProductID'] .'"><img class="img-thumbnail" src="images/Covers/' . $pull_data['ImagePath'] . '" alt="random image">' . '</a></div></div>';
                }

            }else if(isset ($_GET['Franchise'])) {
                $companyID = $_GET['Franchise'];

                $query_Comp = mysqli_query($db,"SELECT * FROM `Product` WHERE Company = '". $companyID . "';" );

                $flag = 0;
                if(mysqli_num_rows($query_Comp) == 0){
                    $flag = 1;
                }
                if ($flag == 0) {
                    while ($pull_data = $query_Comp->fetch_assoc()) {
                        echo '<div class="col-md-3"><div class="list-group"><a href="SingleGame.php?id='. $pull_data['ProductID'] .'"><img class="img-thumbnail" src="images/Covers/' . $pull_data['ImagePath'] . '" alt="random image">' . '</a></div></div>';
                    }
                } else {
                    echo '<div class="col-md-12"><p class="label-danger">Sorry no games in this selection!</p></div>';
                }


            } else if(isset($_GET['console'])) {
                $consoleID = $_GET['console'];

                $query_console = mysqli_query($db,"SELECT * FROM `Product` WHERE Platform = '". $consoleID . "';");

                $flag = 0;
                if(mysqli_num_rows($query_console) == 0){
                    $flag = 1;
                }

                if($flag == 0){
                    while($pull_data = $query_console->fetch_assoc()) {
                        echo '<div class="col-md-3"><div class="list-group"><a href="SingleGame.php?id='. $pull_data['ProductID'] .'"><img class="img-thumbnail" src="images/Covers/' . $pull_data['ImagePath'] . '" alt="random image">' . '</a></div></div>';
                    }
                } else {
                    echo '<div class="col-md-12"><p class="label-danger">Sorry no games in this selection!</p></div>';
                }
            }else {
                 while ($pull_data = $display_all->fetch_assoc()) {

                        echo '<div class="col-md-3"><div class="list-group"><a href="SingleGame.php?id='. $pull_data['ProductID'] .'"><img class="img-thumbnail" src="images/Covers/' . $pull_data['ImagePath'] . '" alt="random image">' . '</a></div></div>';

                    }

            }
            ?>
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