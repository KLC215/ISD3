<?php

session_start();

if (isset($_SESSION['login'])) {
    if ($_SESSION['login'] <> "TRUE") {
        echo "You haven't login!!!<p>";
        echo '<a href="login.html">Login</a>';
        exit();
    }
} else {
    echo "You haven't login!!!<p>";
    echo '<a href="login.html">Login</a>';
    exit();
}

//Connect to the DB
include("sql.php");
$mysqli = connectDB();

$username = $_SESSION["user"];
$phone = $_POST["phone"];
$email = $_POST["email"];

//update the user data in the database
$sql = "UPDATE user SET phone = '$phone', email = '$email'
          WHERE username = '$username';";
$result = $mysqli->query($sql);


if ($result)
    echo "User Update Completed<p>";
else
    echo "User Update Failed<p>";

$mysqli->close();
?>

<a href="user.php">Back to User Profile</a>
