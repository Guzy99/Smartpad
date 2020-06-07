<?php 
session_start();
$ses_id = $_SESSION['id-user'];
require 'connect.php';
 if (isset($_GET['showe'])) // Проверка существования переменной
 {
     // Складываем значение полученной переменной с 10
     
     echo $_GET['showe'];
     $shwa =  $_GET['showe'];
 }
 $bad = 'success';
 $_SESSION['shwa'] = $shwa;
 echo $_SESSION['shwa'];
// $scoring = "SELECT * FROM items2 WHERE id = ".$shwa; 
$scoring = "SELECT * FROM items2 WHERE `items2`.`id` = $shwa AND  `items2`.`id-user` = $ses_id"; 
 $qr_result = mysqli_query($link,$scoring);
 $data = mysqli_fetch_array($qr_result);
 $as = $data['path'];
 if ($as === $bad){
    $result = mysqli_query($link,"UPDATE `items2` SET `path` = 'danger' , `text-knop` = 'Указать как найденную'  WHERE `items2`.`id` = $shwa AND  `items2`.`id-user` = $ses_id");
    if($result){
    $new_url = 'allitems.php';
    header('Location: '.$new_url);
    }
 }
 else {
    $result = mysqli_query($link,"UPDATE `items2` SET `path` = 'success' , `text-knop` = 'Указать как пропавшую'  WHERE `items2`.`id` = $shwa AND  `items2`.`id-user` = $ses_id");
    if($result){
    $new_url = 'allitems.php';
    header('Location: '.$new_url);
 }
 }
//  $data = mysqli_fetch_array($qr_result);
//  echo $data['name'];
// //  $named = $data['name']; 
//  $_SESSION['name'] = $data['name'];
//  $_SESSION['phone'] = $data['phone'];
//  $_SESSION['cash'] = $data['cash'];
//  $_SESSION['comment'] = $data['comment'];
 
// if($_POST['show']){
//     echo 'success';
    // echo '<p>'.$_POST['show'].'</p>';
    // $durak = $_GET['show_low'];  
    // $get = $durak;
    // function Sum()
    // {
    //     global $get;
    //     $new_url = 'allitems.php#myModal';
    //     header('Location: '.$new_url);
    // } 

    // header("Location:allitems.php?post=$post");
    // function MyFunction()
    //     {
    //     return ($dura);
    //     }
//   }
?>
