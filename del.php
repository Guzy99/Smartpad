<?php
 require 'connect.php';

 if (isset ($_GET['delete'])){
   $id = (int)$_GET['delete'];

   if (!empty ($id)){
       $sql = "DELETE FROM `zadachi` WHERE `id` = '$id'";
       mysqli_query($link,$sql);
   }

   $new_url = 'all_zadachi.php';
   header('Location: '.$new_url);

 } 
?>