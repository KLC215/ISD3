<?php

if (!isset($_POST['username']) || !isset($_POST['password'])) {
    exit("Please enter username and password");
}

if ($_POST['username'] === 'Joe' && $_POST['password'] === 'Bloggs') {
    setcookie('user', $_POST['username'], time() + 24 * 3600);
    setcookie('count', 0, time() + 24 * 3600);
    header('Location: logged_in.php');
} else {
    exit("Wrong username or password");
}
