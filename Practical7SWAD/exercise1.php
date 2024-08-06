<?php
function customErrorHandler($errno,$errstr,$errfile,$errline){
    
    $error_message= "Error: [$errno] $errstr in $errfile on line $errline";
    ini_set('log_errors',1);
    ini_set('error_log','./error.log');
    error_log($error_message);
    echo "Oosp, somehting went wrong. Please try again later";

}

set_error_handler("customErrorHandler");
ini_set("display_errors",1);
error_reporting(E_ALL);

ob_start();

//$undefinedVariable= "hello world";

$array= array("0" => "item 1" , "1"=> "item2 ");
function undefinedFunction(){
    echo "This is a defined function";
}


//Undefined variable
$y= $undefinedVariable;
//gives warning error

//Undefined index in array;
echo $array['0'];
//gives warning error

//Undefined function
undefinedFunction();
//gives warning error

//fatal error( dvision by zero)
$result= 100/0;
echo $result;




?>
