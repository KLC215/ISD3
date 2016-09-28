<?php

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Logged In</title>
    </head>

    <body>
        <?php
        if (isset($_SESSION['user']) && isset($_SESSION['count'])) {

            $_SESSION['count'] += 1;

            echo 'Welcome ' . $_SESSION['user'] .
                "<br>" .
                "This is your " . $_SESSION['count'] . " visit.";
        }
        ?>
        <br>
        <form action="./logout.php" method="post">
            <input type="submit" name="logout" value="Logout">
        </form>
    </body>

</html>