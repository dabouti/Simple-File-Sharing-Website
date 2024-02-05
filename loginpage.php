<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>

<body>
    <form action="loginauth.php" method="GET">
        <input type="text" name="username" id="username" placeholder="Username">
        <button type="submit">Login</button>
    </form>
    <?php
    if ($_GET['error'] == 1) {
        echo "<p style='color: red;'>Incorrect username or password. Please try again.</p>";
    }
    ?>
</body>

</html>