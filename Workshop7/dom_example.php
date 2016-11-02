<?php
$wines = new DOMDocument();
$wines->load('wines.xml');

$categorys = $wines->getElementsByTagName("category");

foreach ($categorys as $category) {
    echo "<p>";
    $name = $category->getAttribute("name");
    echo "<b>Type: $name</b><br/>";

    $products = $category->getElementsByTagName("product");

    foreach ($products as $product) {
        $titles = $product->getElementsByTagName("title");
        $title = $titles->item(0)->nodeValue;

        $descs = $product->getElementsByTagName("desc");
        $desc = $descs->item(0)->nodeValue;

        $prices = $product->getElementsByTagName("price");
        $price = $prices->item(0)->nodeValue;

        $images = $product->getElementsByTagName("image");
        $image = $images->item(0)->nodeValue;



        echo "$title<br/>";
        echo "$desc<br/>";
        echo "$price<br/>";
        echo "$image<br/>";
    }
    echo "</p>";
}
