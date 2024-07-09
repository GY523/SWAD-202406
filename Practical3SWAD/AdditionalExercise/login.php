<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>User Login</title>
</head>
<body>
<?php
require('database.php');

if (isset($_POST['email'])){
$email = stripslashes($_REQUEST['email']);
$email = mysqli_real_escape_string($con,$email);
$password = stripslashes($_REQUEST['password']);
$password = mysqli_real_escape_string($con,$password);
$query = "SELECT *
FROM `exercise3`
WHERE email='$email'
AND password='".md5($password)."'"
;
$result = mysqli_query($con,$query) or die(mysqli_error($con));
$rows = mysqli_num_rows($result);
if($rows==1){
$_SESSION['email'] = $email;
$_SESSION['username']=$username;
header("Location: index.php");
exit();
}else{
echo "<div class='form'>
<h3>email/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
}
}else{
?>
<div class="form">
<h1>User Log In</h1>
<form action="" method="post" name="login">
<input type="text" name="email" placeholder="Email" required /><br>
<input type="password" name="password" placeholder="Password" required /><br>
<input name="submit" type="submit" value="Login" />
</form>
<p>Not registered yet? <a href='registration.php'>Register Here</a></p>
</div>
<?php } ?>
</body>
</html>