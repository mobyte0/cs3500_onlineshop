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
<div class="container">
    <div class="row">

        <form id="regForm" action="index.php">
            <h1>Create Account:</h1>
            <!-- One "tab" for each step in the form: -->
            <div class="tab">Name:
                <p><input placeholder="First name..." oninput="this.className = ''" name="fname"></p>
                <p><input placeholder="Last name..." oninput="this.className = ''" name="lname"></p>
            </div>
            <div class="tab">Contact Info:
                <p><input placeholder="E-mail..." oninput="this.className = ''" name="email"></p>
            </div>
            <div class="tab">Birthday:
                <?php
                echo '<select name="year">';
                echo '<option>Year</option>';
                for($i = date('Y'); $i >= date('Y', strtotime('-100 years')); $i--){
                    echo "<option value='$i'>$i</option>";
                }
                echo '</select>/';
                echo '<select name="month">';
                echo '<option>Month</option>';
                for($i = 1; $i <= 12; $i++){
                    $i = str_pad($i, 2, 0, STR_PAD_LEFT);
                    echo "<option value='$i'>$i</option>";
                }
                echo '</select>/';
                echo '<select name="day">';
                echo '<option>Day</option>';
                for($i = 1; $i <= 31; $i++){
                    $i = str_pad($i, 2, 0, STR_PAD_LEFT);
                    echo "<option value='$i'>$i</option>";
                }
                echo '</select>';
                ?>
            </div>
            <div class="tab">User Name & Password:
                <p><input placeholder="Username..." oninput="this.className = ''" name="uname"></p>
                <p><input placeholder="Password..." oninput="this.className = ''" name="pword" type="password"></p>
            </div>
        </form>
    </div>
</div>
</body>
</html>
