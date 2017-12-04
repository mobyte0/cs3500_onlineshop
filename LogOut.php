<?php
session_start();

unset($_SESSION['username']);
unset($_SESSION['pwd']);
unset($_SESSION['UID']);
unset($_SESSION['PID']);

if(isset($_SESSION['username'])) {
    echo $_SESSION['username'];
} else {
    echo 'log out succes';
    header('Location: home.php' );
}
?>