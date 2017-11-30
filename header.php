<head>
    <meta http-equiv="Content-Type" content="text/html;  charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Online</title>

    <link href="bootstrap3/dist/bootstrap.css" rel="stylesheet">

    <link href="bootstrap3/dist/bootstrap-theme.css" rel="stylesheet">
    <link href="header.css" rel="stylesheet"/>

    <script src="bootstrap3/assets/js/html5shiv.js"></script>
    <script src="bootstrap3/assets/js/respond.min.js"></script>

</head>
<header>
   <div id="topHeaderRow">
      <div class="container">
         <div class="pull-right">
            <ul class="list-inline">
              <li><a href="SignUp.php"><span class="glyphicon glyphicon-edit"></span> Sign Up</a></li>
                <li>
                    <a href="#" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</a>

                    <div id="id01" class="modal">

                        <form class="modal-content animate" method="POST">


                                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>



                            <div class="contain">

                                <label><b>Email</b></label>

                                <input class="input" id="email" type="email" placeholder="Enter Email" name="email" required>

                                <label><b>Password</b></label>

                                <input id="pass" type="password" placeholder="Enter Password" name="psw" required>


                                <button id="logIn" class="btn btn-primary" name="btnLogin" type="submit">Login</button>

                                <input id="checkbox" type="checkbox" checked="checked"> Remember me

                            </div>


                            <div class="contain">

                                <button class="btn btn-primary cancelbtn" type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>

                                <span class="psw">Forgot <a href="#">password?</a></span>
                            </div>
                        </form>
                    </div>


                        </li>
                <li><a href="#">Log Out</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</a></li>
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
             <li class="navbar-brand list-unstyled" ><a href="home.php"><img style="width: 50px; height: 50px;" src="images/logo.png" title="logo" align="logo"/> </a></li>
                 </ul>
             </div>
           <div class="navbar-collapse collapse">
             <ul class="nav navbar-nav">
                 <li style="margin-top: 1em;" ><a href="home.php"> Oracle</a></li>
                 <li style="margin-top: 1em;"><a href="home.php"> Home</a></li>
                 <li style="margin-top: 1em;"><a href="AboutUs.php">About Us</a></li>
                 <li style="margin-top: 1em;"><a href="Consoles.php">Consoles</a></li>
                 <li style="margin-top: 1em;"><a href="VideoGames.php">VideoGames</a></li>
             </ul>
           </div><!-- end navbar collapse -->

             <div class="panel-body"><!-- this is the search bar -->
                 <form method="post">
                     <div class="input-group">
                         <input type="text" class="form-control" placeholder="search ...">
                         <span class="input-group-btn">
                             <button class="btn btn-warning" type="button">
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

<script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    }

</script>