<?php
session_start();

require 'includes/config/config.php';
// If User is logged in?
if (isset($_SESSION['logged_in']) && ($_SESSION['logged_in'] == TRUE))
{
	header('Location:/player/index.php');
} else {

	header('Location:/login/index.php');
}
/*
// If Session Expired
if (isset($_SESSION['login_expires']) && ($_SESSION['login_expires'] < $unixTime)){
	$_SESSION = array();
	session_destroy();
	header('Location:/login/index.php');
}
// If User is logged in?
elseif (isset($_SESSION['logged_in']) && ($_SESSION['logged_in'] === TRUE) && ($_SESSION['login_expires'] > $unixTime))
{
	header('Location:/player/index.php');
} 
// if Admin? 
elseif (isset($_SESSION['logged_in']) && ($_SESSION['logged_in'] === TRUE) && ($_SESSION['login_expires'] > $unixTime) && ($_SESSION['group_id'] === '1')) {

	header('Location:/admin/index.php');

}
// if Guest? 
 elseif (!(isset($_SESSION['logged_in']))) {
	header('Location:/login/index.php');
}

// If User is logged in?
if (isset($_SESSION['logged_in']) && ($_SESSION['logged_in'] == TRUE))
{
	header('Location:/player/index.php');
}
// if Guest? 
 elseif (!(isset($_SESSION['logged_in']))) {
	header('Location:/login/index.php');
}
*/
?>
