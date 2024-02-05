<?php
session_start();

// Get the filename and make sure it is valid
$filename = basename($_FILES['uploadedfile']['name']);
if( !preg_match('/^[\w_\.\-]+$/', $filename) ){
	header("Location: listfiles.php?error=2");
	exit;
}

// Get the username and make sure it is valid
$username = $_SESSION['username'];
if( !preg_match('/^[\w_\-]+$/', $username) ){
	header("Location: listfiles.php?error=3");
	exit;
}

$full_path = sprintf("/srv/protected/%s/%s", $username, $filename);

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $full_path) ){
	header("Location: listfiles.php?success=1");
	exit;
}else{
	header("Location: listfiles.php?error=1");
	exit;
}

?>