<?php
    session_start();
    unset($_SESSION['email']);
    unset($_SESSION['id-user']);
    session_destroy();
    
    $new_url = 'logina.php';
    header('Location: '.$new_url);
?>