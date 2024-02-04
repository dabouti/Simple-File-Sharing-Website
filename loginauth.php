<?php
$username = $_GET['username'];
$filePath = "/srv/protected/users.txt";
$usernames = file($filePath, FILE_IGNORE_NEW_LINES);
if (in_array($username, $usernames)) {
    header("Location: /srv/protected/$username");
}
else {
    echo "False";
}
?>