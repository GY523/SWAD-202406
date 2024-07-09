<!DOCTYPE html>
<html>
    <head>
        <title>
            Student Grade
        </title>
    </head>
    <body>
        <h1>Student Grade </h1>
        <?php 
        $score = 50;

        echo "<p>Student's Score: ". $score. "</p>";
        echo "<p>Grade: ";

        switch(true){
            case ($score>=80):
                echo 'A';
                break;
            case ($score>=70):
                echo 'B';
                break;
            case ($score>=50):
                echo 'C';
                break;
            case ($score>=40):
                echo 'D';
                break;
            default:
                echo 'F';
        }

        echo "</p>";

        //Additional exercise
        $day= 4;
        echo "<hr><p> Day: ". $day. " </P>";
        echo "<p> is ";
        switch($day){
            case 1:
                echo "Monday";
                break;
            case 2:
                echo 'Tuesday';
                break;
            case 3: 
                echo 'Wednesday';
                break;
            case 4:
                echo "Thursday";
                break;
            case 5:
                echo 'Friday';
                break;
            case 6 :
                echo 'Saturday';
                break;
            case 7: 
                echo "Sunday";
                break;
        }
        ?>

    </body>
</html>