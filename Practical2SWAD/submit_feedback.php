<html>
    <head>
        <title>
            Feedback Submitted
        </title>
    </head>
    <body>
        <h2>Feedback Submitted</h2>
        <?php
        $name = $_POST['name'] ?? '';

        echo "<p><strong> Student Name:<strong>$name</p>";
        ?>
    </body>
</html>