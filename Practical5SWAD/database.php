<?php 
$con = mysqli_connect("localhost","root","","product_db");
//Hostname, username,password, databasetobeconnected
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:". mysqli_connect_error();
}
?>