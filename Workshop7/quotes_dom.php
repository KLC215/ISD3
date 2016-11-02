<?php

$quotes = new DOMDocument();
$quotes->load("quotes.xml");

$quote = $quotes->getElementsByTagName("quote");

foreach ($quote as $value) {

    echo "<table>";
    $category = $value->getAttribute("category");
    echo "<tr>" .
        "<td>Category</td>"
        . "<td>" . $category . "</td>"
        . "</tr>";

    $texts = $value->getElementsByTagName("text");
    foreach ($texts as $text) {
        echo "<tr>" .
            "<td>Quote</td>"
            . "<td>" . $text->nodeValue . "</td>"
            . "</tr>";
    }

    $authorData = $value->getElementsByTagName("author");
    foreach ($authorData as $item) {
        $names = $item->getElementsByTagName("name");
        $name = $names->item(0)->nodeValue;

        $dobs = $item->getElementsByTagName("dob");
        $dob = $dobs->item(0)->nodeValue;

        $dods = $item->getElementsByTagName("dod");
        $dod = $dods->item(0)->nodeValue;

        $urls = $item->getElementsByTagName("url");
        $url = $urls->item(0)->nodeValue;

        $imgs = $item->getElementsByTagName("img");
        $img = $imgs->item(0)->nodeValue;

        echo "<tr>" .
            "<td>Author</td>"
            . "<td><a href='$url'>" . ucfirst($name) . "</a></td>"
            . "</tr>";
        echo "<tr>" .
            "<td>Date</td>"
            . "<td>" . ($dod != null ? $dob . " - " . $dod : $dob) . "</td>"
            . "</tr>";
        echo "<tr>" .
            "<td>Image</td>"
            . "<td><img src='$img' height='200' width='200'></td>"
            . "</tr><br>";
    }
    echo "</table>";
}
