<?php
$errorMSG = "";
/* EMAIL */
include "dbinfo.php";
$loaddb = new PDO("mysql:host=".$host.";dbname="."$db", $user, $pass);
 $query = $loaddb->query("SELECT Email FROM User WHERE Email LIKE '" . filter_var($_POST["emailinput"], FILTER_VALIDATE_EMAIL) . "'");
$query->execute();
$emailcheck = $query->fetchAll();
$loaddb = null;
if (empty($_POST["emailinput"])) {
    $errorMSG .= "<li>Email is required</li>";
} else if (!filter_var($_POST['emailinput'], FILTER_VALIDATE_EMAIL)) {
    $errorMSG .= "<li>Invalid email</li>";
} else if (!empty($emailcheck)) {
    $errorMSG .= "<li>Email is already used</li>";
} else {
    $emailinput = $_POST["emailinput"];
}

/* USERNAME */
$loaddb = new PDO("mysql:host=".$host.";dbname="."$db", $user, $pass);
if (!ctype_alnum($_POST['unameinput'])){
    $_POST['unameinput'] = null;
}
$query = $loaddb->query("SELECT Username FROM User WHERE Username LIKE '" . $_POST['unameinput'] . "'");
$query->execute();
$usernamecheck = $query->fetchAll();
$loaddb = null;
if (empty($_POST["unameinput"])) {
    $errorMSG .= "<li>Username is required</li>";
} else if (!ctype_alnum($_POST['unameinput'])){
    $errorMSG .= "<li>Invalid username</li>";
} else if (!empty($usernamecheck)) {
    $errorMSG .= "<li>Username is already used</li>";
} else {
    $unameinput = $_POST["unameinput"];
}

/* FIRSTNAME */
if (empty($_POST['firstname'])) {
    $errorMSG .= "<li>First name is required</li>";
} else if (!preg_match('/^\p{L}+$/ui', $_POST['firstname'])){
    $errorMSG .= "<li>Invalid first name</li>";
} else {
    $firstname = $_POST['firstname'];
}

/* LASTNAME */
if (empty($_POST['lastname'])) {
    $errorMSG .= "<li>Last name is required</li>";
} else if (!preg_match('/^\p{L}+$/ui', $_POST['lastname'])){
    $errorMSG .= "<li>Invalid last name</li>";
} else {
    $lastname = $_POST['lastname'];
}

/* PASSWORD */
if (empty($_POST['passwd'])) {
    $errorMSG .= "<li>Password is required</li>";
} else if (empty($_POST['confpass'])) {
    $errorMSG .= "<li>Password must be confirmed</li>";
} else {
    if ($_POST['passwd'] !== $_POST['confpass']) {
        $errorMSG .= "<li>Passwords do not match</li>";
    } else if (strlen($_POST['passwd']) < 5) {
        $errorMSG .= "<li>Password must be longer than 5 characters</li>";
    } else {
        $passwd = $_POST['passwd'];
    }
}

/* ADDRESS */
if (empty($_POST['addressinput'])) {
    $errorMSG .= "<li>An address is required</li>";
} else if (!preg_match('/^[0-9]+ ([A-Z][a-z]*\s?)+$/ui', $_POST['addressinput'])) {
    $errorMSG .= "<li>Invalid address</li>";
} else {
    $addressinput = $_POST['addressinput'];
}

/* ZIPCODE */
if (empty($_POST['zipcode'])) {
    $errorMSG .= "<li>A zipcode is required</li>";
} else if (!preg_match('/^[0-9]{5}$/u', $_POST['zipcode'])){
    $errorMSG .= "<li>Invalid zip code</li>";
} else {
    $zipcode = $_POST['zipcode'];
}

/* STATE */
if (empty($_POST['stateinput'])) {
$errorMSG .= "<li>State is required</li>";
} else if (!preg_match('/^[A-Z]{2}$/u', $_POST['stateinput'])){
    $errorMSG .= "<li>Invalid state</li>";
} else {
    $stateinput = $_POST['stateinput'];
}

/* CITY */
if (empty($_POST['cityinput'])) {
    $errorMSG .= "<li>City is required</li>";
} else if (!preg_match('/^\w++(?:[.,_:()\s-](?![.\s-])|\w++)*$/ui', $_POST['cityinput'])) {
    $errorMSG .= "<li>Invalid city</li>";
} else {
    $cityinput = $_POST['cityinput'];
}

/* COUNTRY */
if (empty($_POST['countryinput'])) {
    $errorMSG .= "<li>A country is required</li>";
} else if (!preg_match('/^\w++(?:[.,_:()\s-](?![.\s-])|\w++)*$/ui', $_POST['countryinput'])) {
    $errorMSG .= "<li>Invalid country</li>";
} else {
    $countryinput = $_POST['countryinput'];
}

/* PHONE */
if (empty($_POST['phoneinput'])) {
    $errorMSG .= "<li>A phone number is required</li>";
} else if (!preg_match('/^(1-?)?([0-9]{3}-?){2}[0-9]{4}$/u', $_POST['phoneinput'])) {
    $errorMSG .= "<li>Invalid phone number</li>";
} else {
    $phoneinput = $_POST['phoneinput'];
}

if (empty($errorMSG)) {
    $msg = "Email: " . $emailinput . "Username: " . $unameinput . "First Name: " . $firstname . "Last Name: " . $lastname .
        $passwd = "Password: " . $addressinput = "Address: " . $zipcode . "Zip Code: " . $stateinput . "State: " .
                $cityinput = "City: " . $countryinput = "Country: " . $phoneinput = "Phone: ";
    echo json_encode(['code' => 200, 'msg' => $msg]);
    date_default_timezone_set("UTC");
    $loaddb = new PDO("mysql:host=".$host.";dbname="."$db", $user, $pass);
    $query = $loaddb->query("INSERT INTO `User` (Username, Password, Email, Phone, Address, Zipcode, State, City, Country, DateOfRegistration, FirstName, LastName, GiftCardBalance) VALUES ('" . $_POST['unameinput'] . "', '" . sha1($_POST['passwd']) . "', '" . $_POST['emailinput'] . "', '" . $_POST['phoneinput'] . "', '" . $_POST['addressinput'] . "', '" . $_POST['zipcode']  . "', '" . $_POST['stateinput'] . "', '" . $_POST['cityinput'] . "', '" . $_POST['countryinput'] . "','" . date('Y-m-d H:i:s') . "', '" . $_POST['firstname'] . "', '" . $_POST['lastname'] . "','500')");
    die();
}

echo json_encode(['code' => 404, 'msg' => $errorMSG]);