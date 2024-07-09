<!Doctype html>
<html>
    <head>
        <title>
            Arithmetic
        </title>
    </head>
    <body>
        <?php
        $x= 25;
        $y=5.5;
        $addition = $x + $y;
        $subtraction = $x - $y;
        $multiplication = $x * $y;
        $division =  $x /$y;
        echo "<p> Addition = ". $addition;
        echo "</p> <p> Subtraction = ". $subtraction;
        echo "</p> <p> Multiplication = ". $multiplication;
        echo "</p> <p> Division = ". $division. "</p>";
        printf("<p> Division = %.2f",$division);
        ?>
        <h1>Calculate BMI</h1>
    </body>
</html>