<?php
session_start();
if ($_SESSION['loggedin'] != true) {
    header("Location: loginpage.php");
    exit;
}
session_destroy(); //Destroying the session
header("Location: loginpage.php?logoutsuccess=1");
?>