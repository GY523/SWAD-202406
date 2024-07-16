<?php
include("auth.php");
require('database.php');
$id=$_REQUEST['id'];
$query = "SELECT * FROM category where id='".$id."'";
$result = mysqli_query($con, $query) or die ( mysqli_error($con));
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Category Record</title>
</head>
<body>
<p><a href="dashboard.php">User Dashboard</a>
| <a href="insert.php">Insert New Category</a>
| <a href="logout.php">Logout</a></p>
<h1>Update Category Record</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$name =$_REQUEST['name'];
$description = $_REQUEST['description'];
$quantity =$_REQUEST['quantity'];
$date_record = date("Y-m-d H:i:s");
$update="UPDATE category set date_record='".$date_record."',
name='".$name."', description='".$description."', quantity='".$quantity."'where id='".$id."'";
mysqli_query($con, $update) or die(mysqli_error($con));
$status = "Category Record Updated Successfully. </br></br>
<a href='view.php'>View Updated Record</a>";
echo '<p style="color:#008000;">'.$status.'</p>';
}else {
?>
<form name="form" method="post" action="">
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<p><input type="text" name="name" placeholder="Update Category Name"
required value="<?php echo $row['name'];?>" /></p>
<p><input type="text" name="description" placeholder="Update Category description"
required value="<?php echo $row['description'];?>" /></p>
<p><input type="text" name="quantity" placeholder="Update Category Quantity"
required value="<?php echo $row['quantity'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</body>
</html>