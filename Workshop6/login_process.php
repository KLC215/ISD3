<?php

session_start();

include("sql.php");

$mysqli = connectDB();

$user = $_POST["username"];
$pass = md5($_POST["password"]);

$sql = "SELECT * from user 
          WHERE username = '$user' AND password = '$pass';";

$result = $mysqli->query($sql);

if(!$row = mysqli_fetch_array($result)) {
    echo "<html>\n<head>\n<title>nil</title>";
    echo "<meta http-equiv=\"refresh\" content=\"0; ";
    echo "URL=login.html\">\n";
    echo "</head>\n</html>";
    $_SESSION['login'] = "FALSE";
} else {
    $_SESSION['login'] = "TRUE";
    $_SESSION['user'] = $user;
    $_SESSION['pass'] = $pass;
    echo "You have successfully login the page";
}
$mysqli->close();

?>

<p>
    <a href="login_check.php">Enter restricted page</a>
</p>
<a href="logout.php">Logout</a>
