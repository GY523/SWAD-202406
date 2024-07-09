<!DOCTYPE html>
<html>
    <head>
        <title>
            Process input form
        </title>
    </head>
    <body>
        <?php
        $num1= $_GET['num1'] ?? 0;
        $num2= $_GET['num2'] ?? 0;
        $sum=$num1 + $num2;
        echo "<p> number1 = $num1</p>";
        echo "<p> number2 = $num2 </p>";
        echo "<p> sum = $sum</P>";
        ?>    

    </body>
</html>