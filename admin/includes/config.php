<?php

$script = $_SERVER['SCRIPT_NAME'];
$active = array(range(0,20));
if ($script == "/admin/index.php"){
$active[0] = "is-active";
} elseif ($script == "/admin/allbets.php"){
$active[1] = "is-active";
}elseif ($script == "/admin/gradedbets.php"){
$active[2] = "is-active";
}elseif ($script == "/admin/add_result.php"){
$active[3] = "is-active";
$active[8] = "is-active";
}elseif ($script == "/admin/users.php"){
$active[4] = "is-active";
}elseif ($script == "/admin/add_user.php"){
$active[5] = "is-active";
}elseif ($script == "/admin/adminUsers.php"){
$active[6] = "is-active";
}elseif ($script == "/admin/match_results.php"){
$active[7] = "is-active";
}elseif ($script == "/admin/add_result.php"){
$active[8] = "is-active";
}elseif ($script == "/admin/custom_bet.php"){
$active[9] = "is-active";
}elseif ($script == "/admin/add_customresult.php"){
$active[10] = "is-active";
}elseif ($script == "/admin/payments.php"){
$active[11] = "is-active";
}elseif ($script == "/admin/control_center.php"){
$active[12] = "is-active";
}elseif ($script == "/admin/logs.php"){
$active[13] = "is-active";
}elseif ($script == "/admin/api_settings.php"){
$active[14] = "is-active";
}elseif ($script == "/admin/feedback.php"){
$active[15] = "is-active";
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Open Bet Administrator</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <!-- Bulma Version 0.9.0-->
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.0/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>

<body>

    <!-- START NAV -->
    <nav class="navbar is-white">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item brand-text" href="admin.php">
          OSB Admin
        </a>
                <div class="navbar-burger burger" data-target="navMenu">
                    <span><a class="navbar-item" href="admin.php">Home</a></span>
                    <span><a class="navbar-item" href="admin.php">Home</a></span>
                    <span><a class="navbar-item" href="admin.php">Home</a></span>
                </div>
            </div>
            <div id="navMenu" class="navbar-menu">
                <div class="navbar-start">
                    <a class="navbar-item" href="admin.php">
            Home
          </a>
                    <a class="navbar-item" href="allbets.php">
            Betslip Activity
          </a>
                    <a class="navbar-item" href="users.php">
            User Management
          </a>
                    <a class="navbar-item" href="match_results.php">
            Betmin
          </a>
                                 <a class="navbar-item" href="payments.php">
            Payments
          </a>
                                <a class="navbar-item" href="control_center.php">
            System
          </a>
                </div>

            </div>
        </div>
    </nav>
     <div class="container">
        <div class="columns">
      <div class="column is-3 ">
                <aside class="menu is-hidden-mobile">
                    <p class="menu-label">
                        Betslip Activity
                    </p>
                    <ul class="menu-list">
                        <a href="index.php" class="<?php echo $active[0];?>"><i class="fa fa-list fa-fw"></i> Dashboard</a>
                        <a href="allbets.php" class="<?php echo $active[1];?>"><i class="fa fa-clock-o"></i> Open Betslips</a>
                        <li><a href="gradedbets.php" class="<?php echo $active[2];?>"><i class="fa fa-check"></i> Graded Betslips</a></li>
                        <li> <a href="add_result.php" class="<?php echo $active[3];?>"><i class="fa fa-pencil-square-o"></i> Manually Grade Betslips</a> </li>
                    </ul>
                    <p class="menu-label">
                        User Management
                    </p>
                    <ul class="menu-list">
                         <li><a href="users.php" class="<?php echo $active[4];?>"><i class="fa fa-user-circle-o"></i> Manage Users</a></li>
                         <li><a href="add_user.php" class="<?php echo $active[5];?>"><i class="fa fa-user-plus"></i> Add User </a></li>
                         <li><a href="adminUsers.php" class="<?php echo $active[6];?>"><i class="fa fa-users fa-fw"></i> Admin Users</a></li>
                    </ul>
                     <p class="menu-label">
                        Betmin
                    </p>
                    <ul class="menu-list">
                         <li><a href="match_results.php" class="<?php echo $active[7];?>"><i class="fa fa-list"></i> View Match Results</a></li>
                         <li> <a href="add_result.php" class="<?php echo $active[8];?>"><i class="fa fa-pencil-square"></i> Manually Grade Betslips</a> </li>
                         <li><a href="custom_bet.php" class="<?php echo $active[9];?>"><i class="fa fa-plus"></i> Add Custom Bet</a></li>
                         <li> <a href="add_customresult.php" class="<?php echo $active[10];?>"><i class="fa fa-plus-circle"></i> Update Custom Bet Result</a> </li>
                         <li><a href="payments.php" class="<?php echo $active[11];?>"><i class="fa fa-money"></i> Cashier</a></li>
                    </ul>
                      <p class="menu-label">
                        System
                    </p>
                    <ul class="menu-list">
                        <li><a href="api_settings.php" class="<?php echo $active[14];?>"><i class="fa fa-wrench"></i> API Settings</a></li>
                        
                        <li><a href="control_center.php" class="<?php echo $active[12];?>"><i class="fa fa-cog"></i> Control Center</a> </li>
                        <li><a href="api_settings.php" class="<?php echo $active[20];?>"><i class="fa fa-exclamation-triangle"></i> Logs</a> </li>
                        <li><a href="api_settings.php" class="<?php echo $active[20];?>"><i class="fa fa-star"></i> User Feedback</a></li>
                </aside>
            </div>
    <!-- END NAV -->
