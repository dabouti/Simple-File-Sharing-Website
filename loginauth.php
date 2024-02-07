<?php
session_start();
$username = $_GET['username']; //Retrieving username from the loginpage.php form
if (!preg_match('/^[\w_\-]+$/', $username)) {
    $_SESSION['error'] = 'invalid username';
    header("Location: listfiles.php");
    exit;
}
$_SESSION['username'] = $username;
$filePath = "/srv/protected/users.txt";
$usernames = file($filePath, FILE_IGNORE_NEW_LINES); //Reading the users.txt file into an array
if (in_array($username, $usernames)) { //Checking if the username exists in the file
    $_SESSION['loggedin'] = true;
    header("Location: listfiles.php");
    exit;
} else {
    $_SESSION['error'] = "invalid username"; //Setting the session variable to indicate an error
    header("Location: loginpage.php"); //Redirecting to the loginpage.php page if username does not exist
    exit;
}
?>