<?php
include("auth.php");
//include gives warning if not found, require() gives error 
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome to Home Page</title>
</head>
<body>
<div class="form">
<p>Welcome <?php echo $_SESSION['email']; 
//authentication comes with session management
?>!</p>

<p>This is secure area.</p><br>

<p><a href="dashboard.php">User Dashboard</a></p><br>
<a href="logout.php">Logout</a>

</div>
</body>
</html>