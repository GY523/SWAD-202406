<!DOCTYPE html>
<html>
    <head>
        <title>Week Checker
        </title>
    </head>
    <body>
        <h1>Week checker </h1>
        <?php 
        $day = 7;
        if($day>0 && $day <32)
            echo "<p>Day ". $day . " is in week ". ceil($day/7) . ".</p>";
        else echo "<p> The day value is out of range. </p>";
        ?>
    </body>
</html>