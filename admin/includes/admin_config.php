<?php
session_start();
if($_SESSION['uid'] !== "11d127b492bb"){
    $_REQUEST['code'] = 'abc';
header("Location:https://opensports.bet/login/index.php?code=abc");
}
require __DIR__ . '/../../includes/config/config.php';
include_once 'includes/sidenav.php';
checkSession();
if (isset($_GET["page"])) {
    $page = $_GET["page"];
    if ($page === '0'){
        unset($page);
        $page = '1';
    } 
    } 
    elseif(!(isset($_GET["page"]))) { 
    $page = '1';
    }

    $pageClass = array(range(0,20));
    $script = $_SERVER['SCRIPT_NAME'];
    $nextPage = $page + 1;
    $prevPage = $page - 1;


