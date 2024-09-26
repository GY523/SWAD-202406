<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['action']) && $_POST['action']==="submitName"){
        //get the name to construct the greeting msg and echo back the msg
        $name= $_POST['name'] ?? "";
        echo "<span> Hi $name,Welcome to UTAR fyp portal </span>";
    }
}
?>