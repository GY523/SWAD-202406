<?php
//include("auth.php");
require('database.php');
$status = "";
if(isset($_POST['new']) && $_POST['new']==1){
$name =$_REQUEST['name'];
$description = $_REQUEST['description'];
$quantity = $_REQUEST['quantity'];
$date_record = date("Y-m-d H:i:s");
$ins_query="INSERT into category
(`name`,`description`,`quantity`,`date_record`)values
('$name','$description','$quantity','$date_record')";
mysqli_query($con,$ins_query)
or die(mysqli_error($con));
$status = "New Category Inserted Successfully.
</br></br><a href='view.php'>View Category Record</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Category</title>
</head>
<body>
<p><a href="dashboard.php">User Dashboard</a>
| <a href="view.php">View Category Records</a>
| <a href="logout.php">Logout</a></p>
<h1>Insert New Category</h1>
<form name="form" method="post" action="">
<input type="hidden" name="new" value="1" />
<p><input type="text" name="name" placeholder="Enter Category Name"
required /></p>
<p><input type="text" name="description" placeholder="Enter 
Category description " required /></p>
<p><input type="number" name="quantity" placeholder="Enter category Quantity"
required /></p>
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#008000;"><?php echo $status; ?></p>
</body>
</html>