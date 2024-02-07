<?php
session_start();
if ($_SESSION['loggedin'] != true) {
    header("Location: loginpage.php");
    exit;
}
$username = $_SESSION['username'];
$filename = $_GET['file'];

if (!preg_match('/^[\w_\-]+$/', $username)) {
    $_SESSION['error'] = 'invalid username';
    header("Location: listfiles.php");
    exit;
}

if (file_exists("/srv/protected/$username/$filename")) {
    if (unlink("/srv/protected/$username/$filename")) {
        $_SESSION["success"] = "file deleted";
        header("Location: listfiles.php");
        exit;
    } else {
        $_SESSION["error"] = "file not deleted";
        header("Location: listfiles.php");
    }
} else {
    $_SESSION["error"] = "file does not exist";
    header("Location: listfiles.php");
}
?>