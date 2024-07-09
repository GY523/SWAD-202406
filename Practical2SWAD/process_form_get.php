<!DOCTYPE html>
<html>
    <head>
        <title>
            Process Input Form
        </title>
    </head>
    <body>
        <h1>Process Input Form</h1>
        <?php
        $name= $_GET['name'] ?? '';
        $age= $_GET['age'] ?? '';
        $email= $_GET['email'] ?? '';
        $gender= isset($_GET['gender']) ? $_GET['gender'] : "";
        $interests= isset($_GET['interests']) ? $_GET['interests'] : [];

        echo "User information (GET Method):<br>";
        echo "Name: $name<br>";
        echo "Age: $age<br>";
        echo "Email: $email<br>";
        echo "Gender: $gender<br>";
        echo "Interests: ". implode(", ",$interests)."<br>";
        ?>
    </body>
</html>