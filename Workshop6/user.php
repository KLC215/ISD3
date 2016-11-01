<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
    <title>User Profile</title>
</head>
<?php
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
$user = $_SESSION['user'];
$pass = $_SESSION['pass'];

//Connect to the DB
include("sql.php");
$mysqli = connectDB();

//search the user in the database and return the current row of a result set as an object
$sql = "SELECT * from user where username = '$user' and password = '$pass';";
$result = $mysqli->query($sql);
$row = mysqli_fetch_object($result);

$mysqli->close();
?>

<body>
<p><strong>User Profile</strong></p>
<form method="post" action="user_update.php">
    <table width="400" border="0" cellspacing="5">
        <tr>
            <td><label>username </label></td>
            <td><?php echo $row->username; ?></td>
        </tr>
        <tr>
            <td><label>password </label></td>
            <td><input name="password" type="password" id="password"/></td>
        </tr>
        <tr>
            <td>phone</td>
            <td><input name="phone" type="text" id="phone" value="<?php echo $row->phone; ?>"/></td>
        </tr>
        <tr>
            <td>email</td>
            <td><input name="email" type="text" id="email" value="<?php echo $row->email; ?>"/></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="Submit" value="Update"/>
                <input type="reset" name="Reset" id="button" value=" Reset "/></td>
        </tr>
    </table>
</form>
<a href="login_check.php">Restricted Page </a>
</body>
</html>


