<?php 
session_start();

ini_set('date.timezone', 'Asia/Yekaterinburg');
date_default_timezone_set('Asia/Yekaterinburg');
$currentDate = date("Y-m-d");
$now_time_to_sql = $currentDate."T23:59" ;

$seid = ($_SESSION['id-user']);

require 'connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //На хост
    $zad_name = ($_POST['zad_name']); 
    $zd_poyasn =  ($_POST["zd_poyasn"]);
    $zd_time =  ($_POST["zd_time"]);
    $zd_prior =  ($_POST["prioritet"]);

    $reDate1 = substr($currentDate, 0, 4);
    $reDate2 = substr($currentDate, 5, 2);
    $reDate3 = substr($currentDate, 8, 2);

    $reDate = $reDate1.$reDate2.$reDate3;
    $reDate = (int)$reDate;
    $reTime = substr($zd_time, 11, 2);
    $reTime = (int)$reTime;
    echo $reDate;

    $result = mysqli_query($link,"INSERT INTO 
    `zadachi` ( `zd_name`, `comment`, `zd_time`, `id-user`, `param`, `text-knop`, `vazhnost`, `date`, `time_index`, `date_index`) 
    VALUES ( '$zad_name', '$zd_poyasn', '$zd_time', $seid, 'success', 'Выполнил', $zd_prior, '$now_time_to_sql', $reTime, $reDate) ");
    //На хост
        if($result){
            echo "Нет проблем в 1";
        $qr_result = mysqli_query($link,"SELECT `colvo` FROM `done_zd` ");
        $data = mysqli_fetch_array($qr_result);
        $colvo_now = $data[0];
        $colvo_now = $colvo_now + 1;
        $result2 = mysqli_query($link,"UPDATE `done_zd` SET `colvo` = $colvo_now WHERE `done_zd`.`id` = 1;");
            if($result2){
                    $new_url = 'calendar_all_day.php';
                    header('Location: '.$new_url);
                echo "Нет Проблем в 2";
            }
        }

    else
        echo "Проблемы общий";
    }
?>