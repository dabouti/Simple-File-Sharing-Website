<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!--Linking Bootstrap CSS-->
</head>

<body class="m-3 bg-body-secondary"> <!--Adding margin and background color to the body-->
    <h1>Login Page</h1>
    <form action="loginauth.php" method="GET"> <!--Creating a form to send the username to loginauth.php-->
        <div class="container m-0 mb-1 p-0"> <!--Using the Boostrap grid system to align the input and button-->
            <div class="row">
                <div class="col">
                    <input class="form-control" type="text" name="username" id="username" placeholder="Username">
                    <!--Input field for the username-->
                </div>
                <div class="col">
                    <button class="btn btn-success" type="submit">Login</button> <!--Button to submit the form-->
                </div>
            </div>
        </div>
    </form>
    <!--This is the end of the form. So in summary, I created a container inside the form, then a row inside the container, and then two columns inside the row which house each input.-->

    <?php
    session_start();
    if ($_SESSION['error'] == "invalid username") {
        echo "<p>Incorrect username or password. Please try again.</p>";
        unset($_SESSION['error']);
    }
    if ($_GET['logoutsuccess'] == 1) {
        echo "<p>You have succesfully logged out.</p>";
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script> <!--Some Bootstrap JS script-->

</body>

</html>