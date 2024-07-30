<?php
session_start();
$timeout=1000;
if(!isset($_SESSION['username']) || time()-$_SESSION['last_timestamp']>=$timeout ){
    session_unset();
    session_destroy();
    header("Location: login.php?session_expired=1");
    exit();
}else {
    session_regenerate_id(true);
    $_SESSION['last_timestamp'] = time();
}
   
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="refresh" content="60">
    </head>
</html>