<?php
$filename = $_GET['file'];
if (file_exists($filename)) {
    if (unlink($filename)) {
        echo "File $filename has been deleted.";
    } else {
        echo "Unable to delete $filename.";
    }
} else {
    echo "File $filename does not exist.";
}
?>