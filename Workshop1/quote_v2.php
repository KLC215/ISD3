<!DOCTYPE html> 
<html> 
<head> 
    <meta charset=UTF-8" /> 
    <title>Quote of the day : Version 2</title> 
</head> 
<body> 
<h4>Quote of the day ... [version 2]</h4> 

<?php 
echo "<h4>".date("D M d Y")."</h4>"; 

$content = file('quotes.dat'); 

echo $content[0];

?> 
</body> 
</html> 
