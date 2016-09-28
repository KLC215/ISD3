<?php
if (!isset($_COOKIE['user'])) {
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
        if (isset($_COOKIE['user']) && isset($_COOKIE['count'])) {

            $_COOKIE['count'] += 1;
            setcookie('count', $_COOKIE['count'], time() + 24 * 3600);

            echo 'Welcome ' . $_COOKIE['user'] .
                "<br>" .
                "This is your " . $_COOKIE['count'] . " visit.";
        }
        ?>
        <br>
        <form action="./logout.php" method="post">
            <input type="submit" name="logout" value="Logout">
        </form>
    </body>

</html>