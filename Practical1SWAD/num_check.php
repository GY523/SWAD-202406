<!DOCTYPE html>
<html> 
    <head>
        <title>Odd of Even number Checker</title>
    </head>
    <body>
        <h1>Odd or Even Number Checker</h1>
        <form action="localhost\Practical1SWAD\num_check.php" method="post">
            <input type="number" name="num">
            <input type="button" value="submit">
        </form>
        <?php $number = -20;
        echo "<p> Input Number:". $number. "</p>";

        if($number%2==0){
            echo "<p>". $number. " is an even number.</p>";
        } else{
            echo "<p>".$number. " is an odd number.</p>";
        }
        
        if($number>0){
            echo "<p>". $number. " is positive.</p>";
        }else if ($number==0)
            echo "<p>". $number. " is zero.</p>";
        else echo "<p>" . $number . " is negative.</p>";
        ?>
    </body>
</html>