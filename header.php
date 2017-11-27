<style>
    #topHeaderRow {
        padding-top: 10px;
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
        border: 1px solid #888;
        padding: 5em;
        width: 50%; /* Could be more or less, depending on screen size */
    }

    #username[type=text], #pass[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    .cancelbtn {
        margin-bottom: 10px;
        margin-top:10px

    }

    /* Center the image and position the close button */

    .profile {
        text-align: center;
        margin: 24px 0 12px 0;
        position: relative;
    }

    #profile {
        width: 40%;
        border-radius: 50%;
    }

    /* The Close Button (x) */
    .close {
        position: absolute;
        right: 25px;
        top: 0;
        color: #000;
        font-size: 35px;
        font-weight: bold;
    }

    .close:hover,

    .close:focus {
        color: red;
        cursor: pointer;
    }

    /* Add Zoom Animation */
    .animate {
        -webkit-animation: animatezoom 0.6s;
        animation: animatezoom 0.6s
    }


    @-webkit-keyframes animatezoom {
        from {-webkit-transform: scale(0)}
        to {-webkit-transform: scale(1)}
    }

    @keyframes animatezoom {
        from {transform: scale(0)}
        to {transform: scale(1)}
    }

    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }
    }

    span.psw {
        float: right;
        padding-top: 16px;
    }

    #logIn {
        margin-bottom: 10px;
        margin-top:10px
        padding: 14px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
    }
    .contain{
        padding-left: 10px;
        padding-right: 10px;
    }

</style>

<header>
   <div id="topHeaderRow">
      <div class="container">
         <div class="pull-right">
            <ul class="list-inline">
              <li><a href="signup.php"><span class="glyphicon glyphicon-edit"></span> Sign Up</a></li>
                <li>
                    <a href="#" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</a>

                    <div id="id01" class="modal">

                        <form class="modal-content animate" action="/index.php">

                            <div class="profile">


                                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>


                                <img id="profile" src="images/profile.jpg" alt="Avatar" class="avatar">

                            </div>



                            <div class="contain">

                                <label><b>Username</b></label>

                                <input class="input" id="username" type="text" placeholder="Enter Username" name="uname" required>

                                <label><b>Password</b></label>

                                <input id="pass" type="password" placeholder="Enter Password" name="psw" required>


                                <button id="logIn" class="btn btn-primary" type="submit">Login</button>

                                <input id="checkbox" type="checkbox" checked="checked"> Remember me

                            </div>


                            <div class="contain">

                                <button class="btn btn-primary cancelbtn" type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>

                                <span class="psw">Forgot <a href="#">password?</a></span>
                            </div>
                        </form>
                    </div>





                        </li>
<!--                <li><a href="#">Log Out</a></li> -->
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
             <a class="navbar-brand" href="#">Online Store</a>
           </div>
           <div class="navbar-collapse collapse">
             <ul class="nav navbar-nav">
               <li><a href="index.php"> Home</a></li>
               <li><a href="#">About Us</a></li>
               <li><a href="#">Specials</a></li>
               <li class="dropdown">
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Store <b class="caret"></b></a>
                 <ul class="dropdown-menu">
                   <li><a href="#">Consoles</a></li>
                     <li class="divider"></li>
                     <li><a href="#">PC</a></li>
                     <li class="divider"></li>
                   <li><a href="VideoGames.php">VideoGames</a></li>
                 </ul>
               </li>
             </ul>
           </div><!-- end navbar collapse -->
                 <div class="panel-body"><!-- this is the search bar -->
                     <form>
                         <div class="input-group">
                             <input type="text" class="form-control" placeholder="search ...">
                             <span class="input-group-btn">
                    <button class="btn btn-warning" type="button"><span class="glyphicon glyphicon-search"></span>
                    </button>
                  </span>
                         </div>
                     </form>

         </nav>
      </div>
    </div>  <!-- end navbar -->
</header>

<script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

</script>