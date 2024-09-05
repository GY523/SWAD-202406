<?php
function customErrorHandler($errno,$errstr,$errfile,$errline){
    $error_msg="Error[$errno]: $errstr in $errfile on line $errline";
    error_reporting(E_ALL);
    ini_set("display_errors","on");
    ini_set("log_errors","on");
    ini_set("error_log","./error.log");
    error_log($error_msg);
}
set_error_handler("customErrorHandler");
ob_start();
?>