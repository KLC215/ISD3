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
$pdo = new PDO("mysql:host=localhost;dbname=bookdb", "root", "");

$result = $pdo->query("SELECT * FROM product order by ProdID");

echo "Number of products: " . $result->rowCount() . "<p>";

?>

<table width='800'>
    <tr>
        <td bgcolor="#003366"><span style="color:white">Product ID </span></td>
        <td bgcolor="#003366"><span style="color:white">Product Name </span></td>
        <td bgcolor="#003366"><span style="color:white">Product Decription </span></td>
        <td bgcolor="#003366"><span style="color:white">Price</span></td>
        <td bgcolor="#003366"><span style="color:white"></span></td>
        <td bgcolor="#003366"><span style="color:white"></span></td>
    </tr>
    <?php
    //show all products in a table, show the Edit and Delete links

    foreach ($result as $row) {
        echo '<tr>' .
            '<td>' . $row['ProdID'] . '</td>' .
            '<td>' . $row['ProdName'] . '</td>' .
            '<td>' . $row['ProdDes'] . '</td>' .
            '<td>' . $row['ProdPrice'] . '</td>' .
            '<td><a href="product_update.php?id=' . $row['ProdID'] . '">Edit</a></td>' .
            '<td><a href="product_delete.php?id=' . $row['ProdID'] . '">Delete</a></td>' .
            '</tr>';
    }

    ?>
</table>
<br/>
<a href="product_add.html">Add Product</a><p/>
<a href="login_check.php">Restricted Page</a>
