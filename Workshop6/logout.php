<?php
session_start();
session_unset();
session_destroy();
?>

You have logout.
<p>
    <a href="login.html">Login</a>
    <a href="login_check.php">Restricted Page</a>
