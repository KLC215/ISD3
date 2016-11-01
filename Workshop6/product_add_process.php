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

//Get the product data from the form and add the product data into the database
$product_name = $_POST['product_name'];
$product_desc = $_POST['product_desc'];
$price = $_POST['price'];

$sql = "INSERT INTO product (ProdID, ProdName, ProdDes, ProdPrice) 
            VALUES (NULL, '$product_name', '$product_desc', '$price');";

$mysqli->query($sql);

$mysqli->close();

echo "Product is inserted successfully.<p>";
echo "<a href='product_list.php'>Go to Product List</a>";
