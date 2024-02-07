<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Your Directory</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<!--Linking Bootstrap CSS-->
</head>

<body class="m-3 bg-body-secondary">
	<div class="container">
		<div class="row">
			<div class="col rounded bg-dark-subtle">
				<?php
				session_start();
				if ($_SESSION['loggedin'] != true) {
					header("Location: loginpage.php");
					exit;
				}
				$username = $_SESSION['username'];
				$files = array_diff(scandir("/srv/protected/$username"), array('.', '..')); //Retrieving the files in the directory and storing it into an array and removing the . and .. entries from the array
				echo "<h2 class='border-bottom border-danger'>Files in " . htmlentities($username) . "'s directory</h2>";
				echo "<ul>";

				foreach ($files as $file) { //Displaying the files in the directory
					echo "<li>" . htmlentities($file) . "</li>";
				}
				echo "</ul>";
				?>
			</div>
			<div class="col">
				<form action="openfile.php" method="GET"> <!--Creating a form to send the filename to openfile.php-->
					<div class="container mb-5 mt-5">
						<div class="row">
							<div class="col">
								<input class="form-control" type="text" name="file" placeholder="Enter file name">
							</div>
							<div class="col">
								<button class="btn btn-success" type="submit">Open File</button>
							</div>
						</div>
					</div>
				</form>


				<form action="deletefile.php" method="GET">
					<!--Creating a form to send the filename to deletefile.php-->
					<div class="container mb-5">
						<div class="row">
							<div class="col">
								<input class="form-control" type="text" name="file" placeholder="Enter file name">
							</div>
							<div class="col">
								<button class="btn btn-danger" type="submit">Delete File</button>
							</div>
						</div>
					</div>
				</form>


				<form action="renamefile.php" method="GET">
					<!--Creating a form to send the filename to renamefile.php-->
					<div class="container mb-5">
						<div class="row">
							<div class="col">
								<input class="form-control" type="text" name="file"
									placeholder="Enter file to be renamed">
								<input class="form-control" type="text" name="filerename"
									placeholder="Enter new file name">
							</div>
							<div class="col">
								<button class="btn btn-success" type="submit">Rename File</button>
							</div>
						</div>
					</div>
				</form>
				<form enctype="multipart/form-data" action="uploader.php" method="POST">
					<!--Creating a form to upload a file-->
					<div class="container">
						<div class="row">
							<div class="col">
								<input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
								<label for="uploadfile_input">Choose a file to upload:</label> <input
									class="form-control" name="uploadedfile" type="file" id="uploadfile_input" />
							</div>
							<div class="col">
								<input class="btn btn-primary mt-4" type="submit" value="Upload File" />
							</div>
						</div>
					</div>
				</form>
				<form action="logout.php" method="GET"> <!--Creating a form to logout-->
					<button class="btn btn-secondary m-3">Logout</button>
				</form>
			</div>
		</div>
	</div>
	<?php
	if ($_SESSION['success'] == 'file uploaded') {
		echo "<p style='text-align: center;'>Successful Upload!</p>";
		unset($_SESSION["error"]);
	}
	if ($_SESSION['success'] == 'file deleted') {
		echo "<p style='text-align: center;'>Successful Deletion!</p>";
		unset($_SESSION["error"]);
	}
	if ($_SESSION['success'] == 'file renamed') {
		echo "<p style='text-align: center;'p>Successful Rename!</p>";
		unset($_SESSION["error"]);
	}
	if ($_SESSION['error'] == 'file not uploaded') {
		echo "<p style='text-align: center; color: red;'>ERROR: Failure to Upload!</p>";
		unset($_SESSION["error"]);
	}
	if ($_SESSION['error'] == 'invalid filename') {
		echo "<p style='text-align: center; color: red;'>ERROR: Invalid filename.</p>";
		unset($_SESSION["error"]);
	}
	if ($_SESSION['error'] == 'invalid username') {
		echo "<p style='text-align: center; color: red;'>ERROR: Invalid username</p>";
		unset($_SESSION["error"]);
	}
	if ($_SESSION['error'] == 'file not deleted') {
		echo "<p style='text-align: center; color: red;'>ERROR: Unable to delete file</p>";
		unset($_SESSION["error"]);
	}
	if ($_SESSION['error'] == 'file does not exist') {
		echo "<p style='text-align: center; color: red;'>ERROR: File does not exist.</p>";
		unset($_SESSION["error"]);
	}
	?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
		crossorigin="anonymous"></script>
</body>

</html>