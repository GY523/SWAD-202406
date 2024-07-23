<?php
session_start();
if(time()-$_SESSION['login_time_stamp']>=20 ){
    header("Location: logout.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="refresh" content="10">
    </head>
</html>
