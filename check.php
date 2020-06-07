<?php 
session_start();
$seid = ($_SESSION['id-user']);
require 'connect.php';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $zad_name = ($_POST['zad_name']); 
    $zd_poyasn =  ($_POST["zd_poyasn"]);
    $zd_time =  ($_POST["zd_time"]);
    $zd_prior =  ($_POST["prioritet"]);
    $zd_time_str = (string)$zd_time;

    $reDate1 = substr($zd_time_str, 0, 4);
    $reDate2 = substr($zd_time_str, 5, 2);
    $reDate3 = substr($zd_time_str, 8, 2);

    $reDate = $reDate1.$reDate2.$reDate3;

    $reTime = substr($zd_time_str, 11, 2);
    // $reTime2 = substr($zd_time_str, 14, 2);

    echo $reTime;

    $result = mysqli_query($link,"INSERT INTO `zadachi`
    ( `zd_name`, `comment`, `zd_time`, `id-user`, `param`, `text-knop`, `vazhnost`, `date`, `time_index`, `date_index`) VALUES 
    ( '$zad_name', '$zd_poyasn', '$zd_time', '1', 'success', 'Выполнил', $zd_prior, '$zd_time', $reTime, $reDate) ");
    
        if($result){
        $qr_result = mysqli_query($link,"SELECT `colvo` FROM `done_zd` ");
        $data = mysqli_fetch_array($qr_result);
        $colvo_now = $data[0];
        $colvo_now = $colvo_now + 1;
        $result2 = mysqli_query($link,"UPDATE `done_zd` SET `colvo` = $colvo_now WHERE `done_zd`.`id` = 1;");
            if($result2)
            {
                    $new_url = 'index.php';
                    header('Location: '.$new_url);
            }
            else
                echo "<br/>"."<p>"."NOT VERY GOOD!"."</p>"."<br/>";
        }
    else
        echo "<br/>"."<p>"."NOT VERY GOOD!"."</p>"."<br/>";

    // $new_url = 'index.php';
    // header('Location: '.$new_url);
}
?>