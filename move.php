<?php 
session_start();

ini_set('date.timezone', 'Asia/Yekaterinburg');
date_default_timezone_set('Asia/Yekaterinburg');
$time_when_zd_done = date("H");
$time_when_zd_done = (int)$time_when_zd_done;

if(isset($_POST['number_check'])) {
    $number_check = $_POST['number_check'];
  }
$seid = ($_SESSION['id-user']);
$user_id = $seid;
require 'connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($time_when_zd_done >= 21){
        $result = mysqli_query($link,"SELECT `twentyone` FROM `time_doing_zd` WHERE `time_doing_zd`.`user_id` = $user_id");
        $data = mysqli_fetch_array($result);

        $twentyone = $data[0];
        $now_check = $twentyone + 1;

        setcookie("twentyone", $now_check);

        $result2 = mysqli_query($link,"UPDATE `time_doing_zd` SET `twentyone` = $now_check WHERE `time_doing_zd`.`user_id` = $user_id;");
        if($resul2)
            echo "ОГОНЬ";
        else
            echo "NOT VERY GOOD!";
    }
    //универсальная конструкция для получения и отправки значения времени совершения действия на сайте
    //взял пример с инстаграма
    //нужно добавить поля для остального времени
    elseif ($time_when_zd_done >=18 and $time_when_zd_done < 21){
        $result = mysqli_query($link,"SELECT `eighteen` FROM `time_doing_zd` WHERE `user_id` = $user_id");
        $data = mysqli_fetch_array($result);
        $now_check = $data[0];
        $now_check = $now_check + 1;
        setcookie("eighteen", $now_check);

        $result2 = mysqli_query($link,"UPDATE `time_doing_zd` SET `eighteen` = $now_check WHERE `time_doing_zd`.`user_id` = $user_id;");
        if($resul2)
            echo "ОГОНЬ";
        else
            echo "NOT VERY GOOD!";
    }

    elseif ($time_when_zd_done >=15 and $time_when_zd_done < 18){
        $result = mysqli_query($link,"SELECT `fifty` FROM `time_doing_zd` WHERE `user_id` = $user_id");
        $data = mysqli_fetch_array($result);
        $now_check = $data[0];
        $now_check = $now_check + 1;
        setcookie("fifty", $now_check);

        $result2 = mysqli_query($link,"UPDATE `time_doing_zd` SET `fifty` = $now_check WHERE `time_doing_zd`.`user_id` = $user_id;");
        if($resul2)
            echo "ОГОНЬ";
        else
            echo "NOT VERY GOOD!";
    }

    elseif ($time_when_zd_done >=12 and $time_when_zd_done < 15){
        $result = mysqli_query($link,"SELECT `twelve` FROM `time_doing_zd` WHERE `user_id` = $user_id");
        $data = mysqli_fetch_array($result);
        $now_check = $data[0];
        $now_check = $now_check + 1;
        setcookie("twelve", $now_check);

        $result2 = mysqli_query($link,"UPDATE `time_doing_zd` SET `twelve` = $now_check WHERE `time_doing_zd`.`user_id` = $user_id;");
        if($resul2)
            echo "ОГОНЬ";
        else
            echo "NOT VERY GOOD!";
    }

    elseif ($time_when_zd_done >=9 and $time_when_zd_done < 12){
        $result = mysqli_query($link,"SELECT `nine` FROM `time_doing_zd` WHERE `user_id` = $user_id");
        $data = mysqli_fetch_array($result);
        $now_check = $data[0];
        $now_check = $now_check + 1;
        setcookie("nine", $now_check);

        $result2 = mysqli_query($link,"UPDATE `time_doing_zd` SET `nine` = $now_check WHERE `time_doing_zd`.`user_id` = $user_id;");
        if($resul2)
            echo "ОГОНЬ";
        else
            echo "NOT VERY GOOD!";
    }

    elseif ($time_when_zd_done >=6 and $time_when_zd_done < 9){
        $result = mysqli_query($link,"SELECT `six` FROM `time_doing_zd` WHERE `user_id` = $user_id");
        $data = mysqli_fetch_array($result);
        $now_check = $data[0];
        $now_check = $now_check + 1;
        setcookie("six", $now_check);

        $result2 = mysqli_query($link,"UPDATE `time_doing_zd` SET `six` = $now_check WHERE `time_doing_zd`.`user_id` = $user_id;");
        if($resul2)
            echo "ОГОНЬ";
        else
            echo "NOT VERY GOOD!";
    }

    elseif ($time_when_zd_done >=3 and $time_when_zd_done < 6){
        $result = mysqli_query($link,"SELECT `three` FROM `time_doing_zd` WHERE `user_id` = $user_id");
        $data = mysqli_fetch_array($result);
        $now_check = $data[0];
        $now_check = $now_check + 1;
        setcookie("three", $now_check);

        $result2 = mysqli_query($link,"UPDATE `time_doing_zd` SET `three` = $now_check WHERE `time_doing_zd`.`user_id` = $user_id;");
        if($resul2)
            echo "ОГОНЬ";
        else
            echo "NOT VERY GOOD!";
    }

    elseif ($time_when_zd_done >=0 and $time_when_zd_done < 3){
        $result = mysqli_query($link,"SELECT `nuled` FROM `time_doing_zd` WHERE `user_id` = $user_id");
        $data = mysqli_fetch_array($result);
        $now_check = $data[0];
        $now_check = $now_check + 1;
        setcookie("nuled", $now_check);

        $result2 = mysqli_query($link,"UPDATE `time_doing_zd` SET `nuled` = $now_check WHERE `time_doing_zd`.`user_id` = $user_id;");
        if($resul2)
            echo "ОГОНЬ";
        else
            echo "NOT VERY GOOD!";
    }

    else{
        echo"WE HAVE A TROUBLE";
    }


    $result = mysqli_query($link,"DELETE FROM `zadachi` WHERE `zadachi`.`id` = $number_check");
    if($result)
    if($result){
        echo "Нет проблем в 1";
        $qr_result = mysqli_query($link,"SELECT `done_colvo` FROM `done_zd` ");
        $data = mysqli_fetch_array($qr_result);
        $colvo_now = $data[0];
        $colvo_now = $colvo_now + 1;

        $result2 = mysqli_query($link,"UPDATE `done_zd` SET `done_colvo` = $colvo_now WHERE `done_zd`.`id` = $user_id;");
        if($resul2){
            echo "Нет проблем в 2";
            $qr_result_carma = mysqli_query($link,"SELECT `carma` FROM `users` WHERE `users`.`id` = $user_id ");
            $data = mysqli_fetch_array($qr_result_carma);
            $colvo_now = $data[0];
            $colvo_now = $colvo_now + 1;

            $result3 = mysqli_query($link,"UPDATE `users` SET `carma` = '$colvo_now' WHERE `users`.`id` = $user_id;");
                if($result3){
                    echo "Нет Проблем в 3";
                } 
                else{
                    echo "Проблемы в 3 ";
                }
            }
        else
            echo "Проблемы в 2";
        }
    else
        echo "Проблемы 1";
    // $new_url = 'index.php';
    // header('Location: '.$new_url);
}
?>