<?php
session_start();
if (isset($_GET['confirm']) and isset($_SESSION['username'])){
    if ($_GET['confirm'] == 'deleteAccount') {
        echo('alright u asked for it boi');
        include "dbinfo.php";
        $loaddb = new PDO("mysql:host=" . $host . ";dbname=" . $db, $user, $pass);
        $query = $loaddb->query("DELETE FROM User WHERE Username LIKE '" . $_SESSION['username'] . "'");
        $query->execute();
        unset($_SESSION['username']);
        unset($_SESSION['pwd']);
        unset($_SESSION['UID']);
        unset($_SESSION['PID']);
        if(isset($_SESSION['username'])) {
            echo $_SESSION['username'];
        } else {
            header('Location: index.php' );
        }
    } else {
        echo("<script>
window.location.href='userhome.php';
</script>;");
    }
} else {
    echo("<script>
window.location.href='userhome.php';
</script>;");
}
