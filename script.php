<?php 
session_start();
//Берем id user 
$ses_id = $_SESSION['id-user'];
require 'connect.php';
//Проверяем отправленный GET
    if (isset($_GET['show']))
    {
        $shw =  $_GET['show'];
    }
//Создаем переменную shw в которой хранится id задачи
$_SESSION['shw'] = $shw;
$scoring = "SELECT * FROM `zadachi` WHERE `zadachi`.`id` = $shw "; 

//Запрос по полям к бд
$qr_result = mysqli_query($link,$scoring);
$data = mysqli_fetch_array($qr_result);

//сессия с именем задачи
$_SESSION['zd_name'] = $data['zd_name'];
$_SESSION['zd_time'] = $data['zd_time'];
$_SESSION['comment'] = $data['comment'];

?>
