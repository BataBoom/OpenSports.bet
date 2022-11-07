<!DOCTYPE html>
<html>
<?php
require_once 'includes/admin_config.php';
?>
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
                <a class="navbar-item brand-text" href="../index.html">
          OSB Admin
        </a>
                <div class="navbar-burger burger" data-target="navMenu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div id="navMenu" class="navbar-menu">
                <div class="navbar-start">
                    <a class="navbar-item" href="admin.html">
            Home
          </a>
                    <a class="navbar-item" href="admin.html">
            Betslip Activity
          </a>
                    <a class="navbar-item" href="admin.html">
            User Management
          </a>
                    <a class="navbar-item" href="admin.html">
            Betmin
          </a>
                                 <a class="navbar-item" href="admin.html">
            Payments
          </a>
                                <a class="navbar-item" href="admin.html">
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
                        <a href="allbets.php" class="is-active"><i class="fa fa-list fa-fw"></i> All Betslips</a>
                        <li><a href="#" class="<?php echo $active;?>"><i class="fa fa-clock-o"></i> Pending Betslips</a>
                        <li><a href="#" class="<?php echo $active;?>"><i class="fa fa-check"></i> Graded Betslips</a></li>
                    </ul>
                    <p class="menu-label">
                        User Management
                    </p>
                    <ul class="menu-list">
                         <li><a href="users.php"><i class="fa fa-user-circle-o"></i> Manage Users</a></li>
                         <li><a href="add_user.php"><i class="fa fa-user-plus"></i> Add User </a></li>
                         <li><a href="admin_users.php"><i class="fa fa-users fa-fw"></i>Admin Users</a></li>
                    </ul>
                     <p class="menu-label">
                        Betmin
                    </p>
                    <ul class="menu-list">
                         <li><a href="match_results.php"><i class="fa fa-cog"></i> Match Results</a></li>
                         <li> <a href="add_result.php"><i class="fa fa-cog"></i> Add Match Result</a> </li>
                         <li><a href="custom_bet.php"><i class="fa fa-cog"></i> Add Custom Bet</a></li>
                         <li><a href="cashier.php"><i class="fa fa-money"></i> Cashier</a></li>
                    </ul>
                      <p class="menu-label">
                        System
                    </p>
                    <ul class="menu-list">
                        <li><a href="control_center.php"><i class="fa fa-cog"></i> Control Center</a> </li>
                        <li><a href="bet_logs.php"><i class="fa fa-exclamation-triangle"></i> Logs</a> </li>
                        <li><a href="admin_users.php"><i class="fa fa-users fa-fw"></i> Admin Users</a></li>
                        <li><a href="settings.php"><i class="fa fa-wrench"></i> API Settings</a></li>
                </aside>
            </div>
    <!-- END NAV -->