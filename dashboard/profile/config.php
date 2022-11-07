<?php 
    require '../../includes/config/config.php';
    
    $uidd = $_SESSION['uid'];
    $username = $_SESSION['username'];
    $us = fetchUser("$uidd");
    print_r($us);
?>
