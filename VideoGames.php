<?php
$company = array("Sony", "Microsoft", "Activision", "EA", "Nintendo", "Bathesda", "NaughtyDog", "Ubisoft", "Capcom", "Konami");

$platform = array("Playstation 3", "Playstation 4", "Xbox 360", "Xbox One", "Nintendo Switch", "Nintendo 3Ds", "PC");

$images = "/images/";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;  charset=UTF-8"/>
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

                                    for ($i = 0; $i < count($company); $i++) {
                                        if (isset($company[$i])) {
                                            echo '<option value="' . $company[$i] . '" id="' . $company[$i] . '" name = "company">' . '<div>' . $company[$i] . '</div></option>';
                                        }
                                    }
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

                                    for ($i = 0; $i < count($platform); $i++) {
                                        if (isset($platform[$i])) {
                                            echo '<option value="' . $platform[$i] . '" id="' . $platform[$i] . '" name = "company">' . '<div>' . $platform[$i] . '</div></option>';
                                        }
                                    }
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
                    $files = glob("images/Covers/*.*");
                    for ($i = 0; $i < count($files); $i++) {
                        $pic = $files[$i];
                        echo '<div class="col-md-3"><div class="list-group"><a href="SingleGame.php"><img class="img-thumbnail" src="' . $pic . '" alt="random image">' . '</a></div></div>';
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