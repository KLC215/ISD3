<?php

session_start();

if (isset($_SESSION['user'])) {
    header('Location: logged_in.php');
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login in</title>
    </head>
    <body>
        <h1>Please Log in</h1>
        <form action="./process.index.php" method="post">
            Username: <input type="text" name="username"><br><br>
            Password: <input type="password" name="password"><br><br>
            <input type="submit" name="login" value="Login">
        </form>
    </body>
</html>
