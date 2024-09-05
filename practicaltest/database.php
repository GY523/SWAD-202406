<?php
//connec t to db
$con= new mysqli("localhost","root","","library_db");
if($con->connect_error){
    echo "Falied to connect to db: ". $con->connect_error;
    exit();
}
?>