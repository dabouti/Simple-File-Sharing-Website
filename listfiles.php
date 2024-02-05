<?php
session_start();
$username = $_SESSION['username'];
$path = "/srv/protected/$username";
$files = array_diff(scandir($path), array('.', '..'));
echo "<h2>Files in $username's directory</h2>";
echo "<ul>";

foreach ($files as $file) {
    echo "<li>$file</li>";
}

echo "</ul>";
?>
<form action="openfile.php" method="GET">
<input type="text" name="file" placeholder="Enter file name">
<button type="submit">Open File</button>
</form>
<form action="deletefile.php" method="GET">
<input type="text" name="file" placeholder="Enter file name">
<button type="submit">Delete File</button>
</form>
<form enctype="multipart/form-data" action="uploader.php" method="POST">
	<p>
		<input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
		<label for="uploadfile_input">Choose a file to upload:</label> <input name="uploadedfile" type="file" id="uploadfile_input" />
	</p>
	<p>
		<input type="submit" value="Upload File" />
	</p>
</form>

<?php
if($_GET['success'] == 1) {
    echo "<p>Successful Upload!</p>";
}
if($_GET['success'] == 2) {
    echo "<p>Successful Deletion!</p>";
}
if($_GET['error'] == 1) {
    echo "<p>Failure to Upload!</p>";
}
if($_GET['error'] == 2) {
    echo "<p>Invalid filename.</p>";
}
if($_GET['error'] == 3) {
    echo "<p>Invalid username</p>";
}
?>