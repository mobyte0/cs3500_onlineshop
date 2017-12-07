<?php
if (!isset($_POST) or (($_POST['username'] === '') and ($_POST['password'] === ''))) {
    echo("<script>
alert('Invalid login. Empty username and password fields.');
window.location.href='index.php';
</script>;");
    die();
} else if (empty($_POST['username']) or empty($_POST['password'])) {
    echo("<script>
    alert('Invalid login. Username or password field left blank.');
    window.location.href='index.php';
    </script>;");
    die();
} else if (!ctype_alnum($_POST['username']) or !ctype_alnum($_POST['password'])) {
    echo("<script>
    alert('Invalid username or password.');
    window.location.href='index.php';
    </script>;");
    die();
} else {
    echo($_POST['username']);
    include "dbinfo.php";
    $loaddb = new PDO("mysql:host=" . $host . ";dbname=" . $db, $user, $pass);
    $query = $loaddb->query("SELECT * FROM User WHERE Username LIKE '" . $_POST['username'] . "'");
    $query->execute();
    $usernamecheck = $query->fetch();
    $loaddb = null;
    $validlogin = 0;
    if (sha1($_POST['password']) === $usernamecheck['Password']) {
        $validlogin = 1;
    }
    if (empty($usernamecheck)) {
        echo("<script>
    alert('Incorrect username and/or password.');
    window.location.href='index.php';
    </script>;");
        die();
    }
    if ($validlogin === 0) {
        echo("<script>
    alert('Incorrect username and/or password.');
    window.location.href='index.php';
    </script>;");
        die();
    }
    echo '<pre>';
    print_r($usernamecheck);
    echo '</pre>';
}