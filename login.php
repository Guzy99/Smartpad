<?php
session_start();
require 'connect.php';
$now_time  = mktime(0,0,0 ,date("m"), date("d"), date("y"));

    if (isset($_POST['email'])) 
    {
     $email = $_POST['email']; 
    }
    if (isset($_POST['pass'])) 
    { 
        $pass=$_POST['pass'];
    }
    if (empty($email) or empty($pass)) 
    {
    exit ("Не все поля заполнены, вернитесь назад и заполните все поля!");
    }


    $query = ("SELECT * FROM users WHERE `email` = '$email'");
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    $count = mysqli_num_rows($result);
    $data = mysqli_fetch_array($result);


    if($count == 1)
    {
        if($pass == $data['pass'])
        {
            $_SESSION['id-user'] = $data['id'];
            $_SESSION['namepers'] = $data['name'];
            $_SESSION['surnamepers'] = $data['surname'];
            $_SESSION['email'] = $email;
            
            $_SESSION['t'] = 0;
            $_SESSION['o'] = 0;
            
            $ce_obrez = $_SESSION['ce_obrez'];
            setcookie("to_graph", $ce_obrez);

            $result1 = mysqli_query($link,"SELECT `nuled`,`three`,`six`,`nine`,`twelve`,`fifty`,`eighteen`,`twentyone` FROM `time_doing_zd` WHERE `user_id` = 1");
            $data1 = mysqli_fetch_array($result1);
            $nuled = $data1[0];
            $three = $data1[1];
            $six = $data1[2];
            $nine = $data1[3];
            $twelve = $data1[4];
            $fifty = $data1[5];
            $eighteen = $data1[6];
            $twentyone = $data1[7];

            setcookie("nuled", $nuled);
            setcookie("three", $three);
            setcookie("six", $six);
            setcookie("nine", $nine);
            setcookie("twelve", $twelve);
            setcookie("fifty", $fifty);
            setcookie("eighteen", $eighteen);
            setcookie("twentyone", $twentyone);
        }
        else{
            exit(  "ошибка" );
        }
    }
    else{
        exit(  "ошибка" );
    }
    
    if(isset($_SESSION['email'])){
        $new_url = 'index.php';
        header('Location: '.$new_url);
    }
   
  
    
    ?>