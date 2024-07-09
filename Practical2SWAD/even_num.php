<!Doctype html>
<html>
    <head>
        <title>Even Numbers</title>
    </head>
    <body>
        <h1>Even numbers using for loop</h1>
        <p>Range from 2 to 100:</p>
        <?php 

        for($i=2;$i<=200;$i+=2){
            echo $i. "<br>";

        }

        ?>
        <h1>Odd numbers</h1>
        <p>Range from 60 to 70:</p>
        <?php 
        $x=60;
        while($x<=70){
            echo $x. "<br>";
            $x++;
        }
        echo "<p> Range from 95 to 88<p>";
        $x=95;
        do{
            echo $x. "<br>";
            $x--;
        } while ($x>=88);

        ?>
    </body>
</html>