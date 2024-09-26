<?php
//if(isset($_GET['action']) && $_GET['action']==='display')
$arr=array('toyota','myvi','honda','BMW','mers','porsche','ferrari','hyundai','BYD','Mclaren');
$item_per_page=3;
$total_item=count($arr);
$page_needed=ceil($total_item/$item_per_page);
if(isset($_GET['page'])){
    $current_page=$_GET['page'];
    //the range of data to be displayed is page*itemperpage
    $start_index=($current_page-1)*$item_per_page;

    $selected_arr=array_slice($arr,$start_index,$item_per_page);
    echo json_encode($selected_arr);
}




?>