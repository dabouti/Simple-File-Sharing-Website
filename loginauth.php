<?php
session_start();
$username = $_GET['username'];
$_SESSION['username'] = $username;
$filePath = "/srv/protected/users.txt";
$usernames = file($filePath, FILE_IGNORE_NEW_LINES);
if (in_array($username, $usernames)) {
   header("Location: listfiles.php");
   exit;
}
else {
    header("Location: loginpage.php?error=1");
    exit;
}
?>