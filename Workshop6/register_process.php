<?php

include("sql.php");

$mysqli = connectDB();

$username = $_POST["username"];
$password = md5($_POST["password"]);
$phone = $_POST["phone"];
$email = $_POST["email"];

$sql = "INSERT INTO user (username, password, phone, email) 
            VALUES ('$username', '$password', '$phone', '$email');";

$result = $mysqli->query($sql);

if ($result) {
    echo "User Registration Completed<p>";
} else {
    echo "User Registration Failed<p>";
}

$mysqli->close();
?>

<a href="login.html">Login</a>
