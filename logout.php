<?php
session_start();
if ($_SESSION['loggedin'] != true) {
    header("Location: loginpage.php");
    exit;
}
session_destroy();
header("Location: loginpage.php?logoutsuccess=1");
?>