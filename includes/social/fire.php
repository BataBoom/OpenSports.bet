<?php
require '../config/config.php';
ini_set('enable_post_data_reading', true);
$data = array('betID'=>$_REQUEST['betID'], 'uid'=>$_REQUEST['uid'], 'action'=>$_REQUEST['action']);
$json = file_get_contents("php://input");
$betid = $data["betID"];
$userID = $data["uid"];
$axn  = $data["action"];
firePost("$userID", "$betid", "$axn");
