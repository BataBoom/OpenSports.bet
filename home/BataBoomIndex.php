<?php
/*
require 'includes/config/config.php';
// If Session Expired
if (isset($_SESSION['login_expires']) && ($_SESSION['login_expires'] < $unixTime)){
    $_SESSION = array();
    session_destroy();
    header('Location:/login/index.php');
}
// If User is logged in?
elseif (isset($_SESSION['logged_in']) && ($_SESSION['logged_in'] === TRUE) && ($_SESSION['login_expires'] > $unixTime))
{
    header('Location:index.php');
} 
// if Admin 
/*
elseif (isset($_SESSION['logged_in']) && ($_SESSION['logged_in'] === TRUE) && ($_SESSION['login_expires'] > $unixTime) && ($_SESSION['group_id'] === '1')) {

    header('Location:/admin/index.php');

}

// if Guest? 
 elseif (!(isset($_SESSION['logged_in']))) {
    header('Location:/login/index.php');
}
*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>BataBoom.Bet</title>
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fontisto@v3.0.4/css/fontisto/fontisto-brands.min.css" rel="stylesheet">

