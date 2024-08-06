<?php
session_start();
var_dump($_SESSION);
//include("auth.php");
require("database.php");
$status= "";
if(isset($_POST['new']) && $_POST['new']==1){
    $message = $_REQUEST['message'];
    $phone_no=$_REQUEST['phone_no'];
    $email= $_REQUEST['email'];
    $userId= $_SESSION['user_id']  ?? 0;

    if (empty($message) || empty($phone_no) || empty($email) || $userId === 0) {
        $errors = array();
        if (empty($message)) {
        $errors[] = "Message is required.";
        }
        if (empty($phone_no)) {
        $errors[] = "Phone number is required.";
        }
        if (empty($email)) {
        $errors[] = "Email address is required.";
        }
        if ($userId === 0) {
        $errors[] = "User ID is not set properly.";
        }
        foreach ($errors as $error) {
        echo $error . "<br>";
        }
    } else {
        $ins_query = "INSERT INTO test_error (`message`, `phone_no`, `email`, `user_id`)
        VALUES ('$message', '$phone_no', '$email', '$userId')";
        var_dump($ins_query);
        mysqli_query($con, $ins_query) or die(mysqli_error($con));
        $status = "Data has been inserted successfully.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert Data - Example of Error Handling</title>
</head>
<body>
<p>
<a href="dashboard.php">User Dashboard</a> |
<a href="logout.php">Logout</a>
</p>
<h1>Example Test Error - Insert Data</h1>
<form name="form" method="post" action="">
<input type="hidden" name="new" value="1" />
<p><input type="text" name="" placeholder="Enter Your Message"
required /></p>
<p><input type="text" name="" placeholder="Enter Your Phone Number"
required /></p>
<p><input type="text" name="" placeholder="Enter Your Email Address"
required /></p>
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#008000;"><?php echo $status; ?></p>
</body>
</html>