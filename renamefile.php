<?php
session_start();
if ($_SESSION['loggedin'] != true) {
    header("Location: loginpage.php");
    exit;
}
$file = $_GET['file'];
$filerename = $_GET['filerename'];
$username = $_SESSION['username'];
if (!preg_match('/^[\w_\-]+$/', $username)) {
    $_SESSION['error'] = 'invalid username';
    header("Location: listfiles.php");
    exit;
}
if (!preg_match('/^[\w_\.\-]+$/', $file)) {
    $_SESSION['error'] = 'invalid filename';
    header("Location: listfiles.php");
    exit;
}
if (file_exists("/srv/protected/$username/$file")) {
    rename("/srv/protected/$username/$file", "/srv/protected/$username/$filerename");
    $_SESSION["success"] = "file renamed";
    header("Location: listfiles.php");
} else {
    $_SESSION["error"] = "file does not exist";
    header("Location: listfiles.php");
}
?>