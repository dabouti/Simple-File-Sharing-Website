<?php
session_start();
$username = $_SESSION['username'];
$filename = $_GET['file'];

if( !preg_match('/^[\w_\-]+$/', $username) ){
	header("Location: listfiles.php?error=3");
	exit;
}

if (file_exists("/srv/protected/$username/$filename")) {
    if (unlink("/srv/protected/$username/$filename")) {
        header("Location: listfiles.php?success=2");
        exit;
    } else {
        header("Location: listfiles.php?error=4");
    }
} else {
    header("Location: listfiles.php?error=5");
}
?>