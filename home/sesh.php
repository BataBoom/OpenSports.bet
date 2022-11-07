<?php
require 'includes/config/config.php';
var_dump($_SESSION);
//echo session_status();
//checkSession();
echo $_SESSION['logged_in'];
$username = $_SESSION['username'];
echo $username;
