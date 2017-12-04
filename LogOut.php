<?php
session_start();

unset($_SESSION['username']);
unset($_SESSION['pwd']);
unset($_SESSION['UID']);

if(isset($_SESSION['username'])) {
    echo $_SESSION['username'];
} else {
    echo 'log out succes';
    header('Location: index.php' );
}
?>