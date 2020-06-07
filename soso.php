<?php 
//   $aDoor = $_POST['formDoor'];
//   if(empty($aDoor)) 
//   {
//     echo("Вы не выбрали ни одного здания.");
//   } 
//   else
//   {
//     $N = count($aDoor);

//     echo("Вы выбрали $N здание(й): ");
//     for($i=0; $i < $N; $i++)
//     {
//       echo($aDoor[$i] . " ");
//     }

//   }

require 'connect.php';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // наш код
    $id_new = $_POST['id_new']; 
    $result = mysqli_query($link,"DELETE FROM `items2` WHERE `items2`.`id` = $id_new;");
        if($result)
        echo "<br/>"."<p>"."VERY GOOD!"."</p>"."<br/>";
    else
        echo "<br/>"."<p>"."NOT VERY GOOD!"."</p>"."<br/>";
    $new_url = 'index.php';
    header('Location: '.$new_url);
}
?>
