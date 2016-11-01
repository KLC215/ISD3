<?php
session_start();
?>

Restricted page<p>

    <?php

    if (isset($_SESSION["login"])) {
        if ($_SESSION["login"] <> "TRUE") {
            echo "You haven't login!!!<p>";
            echo "<a href='login.html'>Login</a>";
            exit();
        } else {
            echo "You can browse this page.<p>";
            echo "<a href='logout.php'>Logout</a>";
        }
    } else {
        echo "You haven't login!!!<p>";
        echo "<a href='login.html'>Login</a>";
        exit();
    }

    ?>

    <p/><br><br>
Restricted content
<p/>
XXXXXXXXXXXXXXXXXXXXXXXX<br />
XXXXXXXXXXXXXXXXXXXXXXXX
<p>
    <a href="user.php">User Profile</a>
<p>
    <a href="product_list.php">Product</a>





