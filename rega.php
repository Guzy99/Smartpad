<?php
session_start();
require 'connect.php';

$prise_t_m = mktime(0,0,0, date("m")+1, date("d"), date("y"));
echo $prise_t_m;

    // if (isset($_POST['phone'])) 
    // {
    //  $phone = $_POST['phone']; 
    // }

    if (isset($_POST['name'])) 
    { 
        $name = $_POST['name'];
    }

    // if (isset($_POST['l-name'])) 
    // { 
    //     $lname = $_POST['l-name'];
    // }

    if (isset($_POST['email'])) 
    {
     $email = $_POST['email']; 
    }

    if (isset($_POST['pass'])) 
    {
     $pass = $_POST['pass']; 
    }

    if (empty($email) or empty($pass)) 
    {
    exit ("Не все поля заполнены, вернитесь назад и заполните все поля!");
    }
   
    $result = mysqli_query($link,"INSERT INTO `users` ( `email`, `pass`, `name` ) VALUES ( '$email', '$pass', '$name') ");
    if($result){
        $_SESSION['email']=$email;
        // $_SESSION['phoned']=$phone;
        $_SESSION['pass']=$pass;
        $_SESSION['namepers']=$name;
        // $_SESSION['lname']=$lname;
        $new_url = 'logina.php';
        header('Location: '.$new_url);
    }
    else{
        echo mysql_errno($link) . ": " . mysql_error($link). "\n";
    }
    // $login = $_SESSION['login'];
   // echo "<a href=' .php'></a>"// в странице след прописываем SESSION_START()
    //SESSION_DESTROY() ДЛЯ РАЗРУШЕНИЯ СЕССИИ ЧТО БЫ ЗАЙТИ ЕЩЕ РАЗ
?>