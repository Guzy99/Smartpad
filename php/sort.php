<?php
session_start();
// $vazh_zn_sql = $_SESSION['vazh_zn_sql'];
// $tm_zn_sql = $_SESSION['tm_zn_sql'];
require "connect.php";

    $desc = 'DESC';
    $asc = 'ASC';

    if(isset($_GET['t'])){
        $t = $_GET['t'];
        if($t == 0){
            $_SESSION['t'] = 1;
            $_SESSION['sort_t'] = $desc;
        }
        elseif($t == 1){
            $_SESSION['t'] = 0;
            $_SESSION['sort_t'] = $asc;
        }
    }

    if(isset($_GET['o'])){
        $o = $_GET['o'];
        if($o == 0){
            $_SESSION['o'] = 1;
            $_SESSION['sort_o'] = $desc;
        }
        elseif($o == 1){
            $_SESSION['o'] = 0;
            $_SESSION['sort_o'] = $asc;
        }
    }

    $new_url = '../all_zadachi.php';
    header('Location: '.$new_url);
?>