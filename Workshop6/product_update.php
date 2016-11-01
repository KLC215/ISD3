<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
    <title>Product Update</title>
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

//get the product ID from the previous page
$ProdID = $_GET['id'];


//Connect to the DB
include("sql.php");
$mysqli = connectDB();

$result = $mysqli->query("SELECT * FROM product WHERE ProdID = '$ProdID'");
$row = $result->fetch_object();

if (isset($_POST['Update'])) {
//update the product in the database if the 'Update' button is clicked
    $product_name = $_POST['ProdName'];
    $product_desc = $_POST['ProdDes'];
    $product_price = $_POST['ProdPrice'];

    $sql = "UPDATE product SET ProdName = '$product_name', ProdDes = '$product_desc', ProdPrice = '$product_price'
          WHERE ProdID = '$ProdID';";

    $result = $mysqli->query($sql);

    if ($result)
        echo "Product Update Completed<p>";
    else
        echo "Product Update Failed<p>";

    echo "<a href='product_list.php'>Go back to Product List</a>";
    exit();
}

$mysqli->close();
?>

<body>
<p><strong>Product Update</strong></p>
<form method="post" action="<?php $_PHP_SELF ?>">
    <table width="400" border="0" cellspacing="5">
        <tr>
            <td>ProdID</td>
            <td><?php echo $row->ProdID; ?> </td>
        </tr>
        <tr>
            <td>Product Name </label></td>
            <td><input name="ProdName" type="text" value="<?php echo $row->ProdName; ?>"/></td>
        </tr>
        <tr>
            <td>Product Description</td>
            <td><input name="ProdDes" type="text" value="<?php echo $row->ProdDes; ?>"/></td>
        </tr>
        <tr>
            <td>Product Price</td>
            <td><input name="ProdPrice" type="text" value="<?php echo $row->ProdPrice; ?>"/></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="Update" value="Update"/>
                <input type="reset" name="Reset" value=" Reset "/></td>

        </tr>
    </table>
</form>
</body>
</html>
