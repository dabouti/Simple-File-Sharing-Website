<?php
session_start();
if ($_SESSION['loggedin'] != true) {
	header("Location: loginpage.php");
	exit;
}
// Get the filename and make sure it is valid
$filename = basename($_FILES['uploadedfile']['name']);
if (!preg_match('/^[\w_\.\-]+$/', $filename)) {
	$_SESSION['error'] = 'invalid filename';
	header("Location: listfiles.php");
	exit;
}

// Get the username and make sure it is valid
$username = $_SESSION['username'];
if (!preg_match('/^[\w_\-]+$/', $username)) {
	$_SESSION['error'] = 'invalid username';
	header("Location: listfiles.php");
	exit;
}

$i = 1;
$temp = $filename;
while (file_exists("/srv/protected/$username/$filename")) { //if file exists, add a number to the start of the filename
	$filename = $temp;
	$filename = "$i-" . $filename;
	$i++;
}

$full_path = sprintf("/srv/protected/%s/%s", htmlentities($username), htmlentities($filename));


if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $full_path)) { //move the file to the directory
	$_SESSION["success"] = "file uploaded";
	header("Location: listfiles.php");
	exit;
} else {
	$_SESSION["error"] = "file not uploaded";
	header("Location: listfiles.php");
	exit;
}
?>