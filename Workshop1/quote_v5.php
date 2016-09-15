<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Quote of the day : Version 5</title>
    <style>
        .border {
            border-style: solid;
        }
        .author  {
            text-align: right;
         }
    </style>

</head>
<body>
    <div class="border">
        <h4>Quote of the day ... [version 5]</h4>

            <?php
            echo "<h4>" . date("D M d Y") . "</h4>";

            $content = file('quotes.dat');

            $randNumber = rand(0, sizeof($content));

            $newContent = explode("|", $content[$randNumber]);

            $explodeContent = [
                'sentense' => $newContent[0],
                'author' => $newContent[1],
                'date' => $newContent[2],
                'url' => $newContent[3],
            ];

            echo "<p>" . $explodeContent['sentense'] .
                    "<div class='author'>" .
                        "<a href='" . $explodeContent['url'] . "'>" .
                            $explodeContent['author'] .
                        "</a> " .
                        "(" . $explodeContent['date'] . ")" .
                    "</div>" .
                "</p>";
            ?>
    </div>
</body>
</html>
