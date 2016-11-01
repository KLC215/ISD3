<?php

include("sql.php");
$mysqli = connectDB();

$id = $_GET['id'];

$result = $mysqli->query("DELETE FROM product WHERE ProdID = '$id';");

if ($result)
    echo "Product Delete Completed<p>";
else
    echo "Product Delete Failed<p>";

echo "<a href='product_list.php'>Go back to Product List</a>";