<?php 
session_start();
require 'connect.php';
$shw = $_SESSION['shw'];
// echo $shw.'/';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name_item = $_POST['name_item']; 
    $time_item =  $_POST["time_item"];
    $comment_item =  $_POST["comment_item"];
    // echo $name_item.'/'.$time_item.'/'. $comment_item.'/';

    $result = mysqli_query($link,"UPDATE `zadachi` SET `zd_name` = '$name_item' , `comment` = '$comment_item' , `zd_time` = '$time_item' WHERE `zadachi`.`id` = $shw");
        $new_url = 'all_zadachi.php';
        header('Location: '.$new_url);
}
?>