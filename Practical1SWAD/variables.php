<html>
    <head>

    </head>
    <?php 
        $food = "TunaPizza";
        $price = 24.63;
        $quantity= 5;
        $isSpicy = true;
    ?>
    <body>
        <p>The selected food item is: <?php echo $food?></p>
        <p> The price is: RM<?php echo $price?></p>
        <p> Order quantity is: <?php echo $quantity?></p>
        <p>Do you want the food to be spicy? <?php echo $isSpicy ? 'Yes' : 'No'; 
        echo "<br> hih meinu"?></p>
        <hr>
        <p><u><b>Additional exercises</b></u></p>
        <?php $code = "UCCN3243";
        $name= "Server-side web application development";
        $stdName= "Chwa Guang Yao";
        //PHP one line comment 
        /* multi-line comment */
        ?>
        <!--html comment -->
        <p>Subject Code: <?php echo $code ?></p>
        <p>Subject Name: <?php echo $name ?></p>
        <p>Student's Name: <?php echo $stdName;
        print("<BR> HEllwo World". " hahah". 10.93 . "marks"); ?></p>
    </body>
    
</html>