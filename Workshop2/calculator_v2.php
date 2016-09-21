 <?php
/* ======================================================
   PHP Calculator example using "sticky" form (Version 1)
   ======================================================
   Author : P Chatterjee (adopted from an original example written by C J Wallace)

   Purpose : To multiply 2 numbers passed from a HTML form and display the result.

   input:
      x, y : numbers
      calc : submit button

   Date: 11 Sep 2012
*/

// grab the form values from $_POST hash
extract($_POST);

// Declare an operator array
$operators = ['+', '-', '*', '/'];

$GLOBALS['errors'] = [
    "x and y must be number!",
    "Cannot divide by zero"
];

$GLOBALS['error'] = null;       // Handle error
$GLOBALS['operator'] = null;     // Handle operator
$GLOBALS['selected'] = null;

function calculate($operator, $x, $y) {

    $GLOBALS['operator'] = $operator;

    switch($operator) {
        case '+':
            return $x + $y;
            break;
        case '-':
            return $x - $y;
            break;
        case '*':
            return $x * $y;
            break;
        case '/':
            if($y == 0) {
                $GLOBALS['error'] = $GLOBALS['errors'][1];
            } else {
                return $x / $y;
            }
            break;
    }

}

function isSelected($operator) {

    return strcmp($GLOBALS['operator'], $operator) === 0
            ? 'selected'
            : '';

}


// first compute the output, but only if data has been input
if(isset($calc)) { // $calc exists as a variable

    if(!is_numeric($x) || !is_numeric($y)) {
        $GLOBALS['error'] = $GLOBALS['errors'][0];
    }

    $prod = calculate($_POST['operator'], $x, $y);

}
else { // set defaults
    $x=0;
    $y=0;
    $prod=0;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>PHP Calculator (Version 2)</title>
    </head>

    <body>
        <h3>PHP Calculator (Version 2)</h3>
        <p>Multiply two numbers and output the result</p>

        <form method="POST" action="<?php print $_SERVER['PHP_SELF']; ?>">

            x = <input type="text" name="x" size="5" value="<?php print $x; ?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57"/>

            op = <select name="operator">

                    <?php

                    for($i = 0; $i < count($operators); $i++ ) {
                        print "<option ". isSelected($operators[$i]) . " value='$operators[$i]'>$operators[$i]</option>";
                    }

                    ?>
                </select>

            y =  <input type="text" name="y" size="5" value="<?php  print $y; ?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57"/>

            <input type="submit" name="calc" value="Calculate"/>
        </form>

        <!-- print the result -->
        <?php
        if(isset($calc)) {
            $GLOBALS['error']
                ? print "<br><div style='color: red'>".$GLOBALS['error']."</div>"
  		        : print "<p> $x". $_POST['operator'] ." $y = $prod</p>";
        }
        ?>

    </body>
</html>
