<?php

session_start();

if (!isset($_POST['username']) || !isset($_POST['password'])) {
    exit("Please enter username and password");
}

if ($_POST['username'] === 'Joe' && $_POST['password'] === 'Bloggs') {
    $_SESSION['user'] = $_POST['username'];
    $_SESSION['count'] = 0;
    header('Location: logged_in.php');
} else {
    exit("Wrong username or password");
}
