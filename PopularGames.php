<!DOCTYPE html>
<html lang="en">
<body>

<?php include 'header.php'; ?>

<div class="container">  <!-- start main content container -->
    <div  class="row">  <!-- start main content row -->
        <div class="col-md-3">  <!-- start left navigation rail column -->
            <?php include 'side.php'; ?>
        </div>  <!-- end left navigation rail -->
        <div class="col-md-9">
        <?php

            if (isset($_GET['id'])) {

               $get_background = mysqli_query($db, "Select * from `Product` where `ProductID` = " . $_GET['id'] . ";");

               if(mysqli_num_rows($get_background) > 0) {
                   $pull_data = $get_background->fetch_assoc();
                   echo '<div class="container" style="padding-left: 0px;">'.
                            '<div class="col-md-9" style="padding-left: 0px;">'.
                                '<div class="well">'.
                                    '<div class="row">'.
                                        '<div class="col-md-12">'.
                                            '<img class="col-md-12 img-responsive" src="images/Background/'. $pull_data['BackgroundImages'].'"/>'.
                                        '</div>'.
                                    '</div>'.
                                '</div>'.
                            '</div>';
                   echo '</div>';
                    echo '<div class="well">';
                    echo '<div class="row">';
                   $get_copies = mysqli_query($db, "SELECT * FROM `Product` where `Name` = '". $pull_data['Name']."';");

                   while($pull_data = $get_copies->fetch_assoc()){
                       echo '<div class="col-md-3">'.
                                '<div class="list-group">'.
                                    '<a href="SingleGame.php?id='. $pull_data['ProductID'] .'">'.
                                        '<img class="img-thumbnail" src="images/Covers/'.$pull_data['ImagePath'].'" alt="random image">'.
                                    '</a>'.
                                '</div>'.
                           '</div>';
                   }
                   echo '</div>';
                   echo '</div>';

               }

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