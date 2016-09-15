<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Quote of the day : Version 4</title>
    <style>
        .author{
            float: right;
         }
    </style>

</head>
<body>
    <h4>Quote of the day ... [version 4]</h4>

    <?php
    echo "<h4>" . date("D M d Y") . "</h4>";

    $content = file('quotes.dat');

    $randNumber = rand(0, sizeof($content));

    $newContent = explode("|", $content[$randNumber]);
    
    print(
        "<p>$newContent[0]</p>" .
        "<p class='author'>
            <a href='$newContent[3]'>$newContent[1]</a> ($newContent[2])
        </p>"
    );

    ?>
</body>
</html>
