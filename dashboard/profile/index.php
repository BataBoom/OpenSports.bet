
<?php 
session_start();
    require '../../includes/config/config.php';
    
    $uidd = $_SESSION['uid'];
    $username = $_SESSION['username'];
    $fetchUser = fetchUser("$uid");
    $username = $fetchUser['username'];
    $uid = $fetchUser['uid'];
    $email = $fetchUser['email'];
    $verified = $fetchUser['verified'];
    $created = $fetchUser['created'];
    $updated = $fetchUser['updated'];
    $balance = fetchBalance("$uidd");
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title> OSB | Settings</title>
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <!-- Core CSS -->
   
    <link rel="stylesheet" href="assets/css/core.css">

    

</head>

<body class="is-dark">


        <!-- /partials/settings/settings-sidebar.html -->
        <div class="settings-sidebar is-active is-dark">
            <div class="settings-sidebar-inner">
                <div class="user-block">
                    <a class="close-settings-sidebar is-hidden">
                        <i data-feather="x"></i>
                    </a>
                    <div class="avatar-wrap">
                        <img src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/jenna.png" data-user-popover="0" alt="">
                        <div class="badge">
                            <i data-feather="check"></i>
                        </div>
                    </div>
                    <h4>Welcome <?php echo $username;?></h4>
                    <p>Balance: <?php echo $balance;?></p>
                </div>
                <div class="user-menu">
                    <div class="user-menu-inner has-slimscroll">
                        <div class="menu-block">
                            <ul>
                                <li data-section="general" class="is-active">
                                    <a>
                                        <i data-feather="settings"></i>
                                        <span>General</span>
                                    </a>
                                </li>
                                <li data-section="security">
                                    <a>
                                        <i data-feather="shield"></i>
                                        <span>Security</span>
                                    </a>
                                </li>
                                <li data-section="personal">
                                    <a>
                                        <i data-feather="alert-triangle"></i>
                                        <span>Account</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="separator"></div>
                        <div class="menu-block">
                            <ul>
                                <li data-section="privacy">
                                    <a>
                                        <i data-feather="lock"></i>
                                        <span>Privacy</span>
                                    </a>
                                </li>
                                <li data-section="preferences">
                                    <a>
                                        <i data-feather="sliders"></i>
                                        <span>Preferences</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="separator"></div>
                        <div class="menu-block">
                            <ul>
                                <li data-section="notifications">
                                    <a>
                                        <i data-feather="bell"></i>
                                        <span>Notifications</span>
                                    </a>
                                </li>
                                <li data-section="support">
                                    <a>
                                        <i data-feather="life-buoy"></i>
                                        <span>Help</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="settings-wrapper">

            <!-- /partials/settings/sections/general-settings.html -->
            <div id="general-settings" class="settings-section is-active">
                <div class="settings-panel">

                    <div class="title-wrap">
                        <a class="mobile-sidebar-trigger">
                            <i data-feather="menu"></i>
                        </a>
                        <h2>General Settings</h2>
                    </div>

                    <div class="settings-form-wrapper">
                        <div class="settings-form">
                            <div class="columns is-multiline">

                                <div class="column is-6">
                                    <!--Field-->
                                    <div class="field field-group">
                                        <label>First Name</label>
                                        <div class="control has-icon">
                                            <input type="text" class="input is-fade" placeholder="">
                                            <div class="form-icon">
                                                <i data-feather="user"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Field-->
                                    <div class="field field-group">
                                        <label>Email</label>
                                        <div class="control has-icon">
                                            <input type="text" class="input is-fade" placeholder="<?php echo $email;?>">
                                            <div class="form-icon">
                                                <i data-feather="mail"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="column is-6">
                                    <!--Field-->
                                    <div class="field field-group">
                                        <label>Last Name</label>
                                        <div class="control has-icon">
                                            <input type="text" class="input is-fade" placeholder="">
                                            <div class="form-icon">
                                                <i data-feather="user"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Field-->
                                    <div class="field field-group">
                                        <label>Backup Email</label>
                                        <div class="control has-icon">
                                            <input type="text" class="input is-fade" placeholder="">
                                            <div class="form-icon">
                                                <i data-feather="mail"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="column is-12">
                                    <!--Field-->
                                    <div class="field field-group">
                                        <label>Crypto Address's</label>
                                        <div class="control">
                                            <textarea type="text" class="textarea is-fade" rows="1" placeholder="Bitcoin"></textarea>
                                            <textarea type="text" class="textarea is-fade" rows="1" placeholder="Litecoin"></textarea>
                                            <textarea type="text" class="textarea is-fade" rows="1" placeholder="BNB"></textarea>
                                            <textarea type="text" class="textarea is-fade" rows="1" placeholder="Monero"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="column is-12">
                                    <!--Field-->
                                    <div class="form-text">
                                        <p>Be sure to fill out your crypto settings.</p>
                                    </div>
                                </div>

                                <div class="column is-6">
                                    <!--Field-->
                                    <div class="field field-group">
                                        <label>Location</label>
                                        <div class="control has-icon">
                                            <input type="text" class="input is-fade" placeholder="Mars">
                                            <div class="form-icon">
                                                <i data-feather="map-pin"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="column is-6">
                                    <!--Field-->
                                    <div class="field field-group is-autocomplete">
                                        <label>Country</label>
                                        <div class="control has-icon">
                                            <input id="country-autocpl" type="text" class="input is-fade" placeholder="">
                                            <div class="form-icon">
                                                <i data-feather="globe"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="column is-12">
                                    <div class="buttons">
                                        <button class="button is-solid accent-button form-button">Save Changes</button>
                                        <button class="button is-light form-button">Advanced</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="illustration">
                            <img class="light-image" src="assets/img/illustrations/settings/1.svg" alt="">
                            <img class="dark-image" src="assets/img/illustrations/settings/1-dark.svg" alt="">
                            <p>If you'd like to learn more about general settings, you can read about it in the <a>user guide</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /partials/settings/sections/security-settings.html -->
            <div id="security-settings" class="settings-section">
                <div class="settings-panel">

                    <div class="title-wrap">
                        <a class="mobile-sidebar-trigger">
                            <i data-feather="menu"></i>
                        </a>
                        <h2>Security</h2>
                    </div>

                    <div class="settings-form-wrapper">
                        <div class="settings-form">
                            <div class="columns is-multiline">

                                <div class="column is-12">
                                    <!--Field-->
                                    <div class="field field-group">
                                        <label>Update </label>
                                        <div class="control has-icon">
                                            <input type="password" class="input is-fade" value="">
                                            <div class="form-icon">
                                                <i data-feather="lock"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="column is-6">
                                    <!--Field-->
                                    <div class="field field-group">
                                        <label> New Password?</label>
                                        <div class="control has-icon">
                                            <input type="password" class="input is-fade" value="">
                                            <div class="form-icon">
                                                <i data-feather="lock"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="column is-6">
                                    <!--Field-->
                                    <div class="field field-group">
                                        <label>Repeat New Password</label>
                                        <div class="control has-icon">
                                            <input type="password" class="input is-fade" value="">
                                            <div class="form-icon">
                                                <i data-feather="lock"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="column is-12">
                                    <!--Field-->
                                    <div class="form-text">
                                        <p>You can enable 2 factor authentication anytime to improve your account privacy and security.</p>
                                    </div>
                                </div>

                                <div class="column is-6">
                                    <!--Field-->
                                    <div class="field">
                                        <div class="switch-block">
                                            <label class="f-switch is-accent">
                                                <input type="checkbox" class="is-switch is-success">
                                                <i></i>
                                            </label>
                                            <div class="meta">
                                                <h4>Enable 2 factor auth</h4>
                                                <p>This will send an additional code to your phone number.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="column is-6">
                                    <!--Field-->
                                    <div class="field field-group">
                                        <label>Phone Number</label>
                                        <div class="control has-icon">
                                            <input type="text" class="input is-fade" value="">
                                            <div class="form-icon">
                                                <i data-feather="smartphone"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="column is-12">
                                    <div class="buttons">
                                        <button class="button is-solid accent-button form-button">Save Changes</button>
                                        <button class="button is-light form-button">Advanced</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="illustration">
                            <img src="assets/img/illustrations/settings/2.svg" alt="">
                            <p>If you'd like to learn more about security settings, you can read about it in the <a>user guide</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /partials/settings/sections/personal-settings.html -->
            <div id="personal-settings" class="settings-section">
                <div class="settings-panel">

                    <div class="title-wrap">
                        <a class="mobile-sidebar-trigger">
                            <i data-feather="menu"></i>
                        </a>
                        <h2>Personal</h2>
                    </div>

                    <div class="settings-form-wrapper">
                        <div class="settings-form">
                            <div class="columns is-multiline flex-portrait">
                                <!--link-->
                                <div class="column is-4">
                                    <a class="setting-sublink">
                                        <div class="link-content">
                                            <div class="link-icon">
                                                <i data-feather="user"></i>
                                            </div>
                                            <h4>Personal Info</h4>
                                            <p>Access your personal info</p>
                                        </div>
                                    </a>
                                </div>
                                <!--link-->
                                <div class="column is-4">
                                    <a class="setting-sublink">
                                        <div class="link-content">
                                            <div class="link-icon">
                                                <i data-feather="clock"></i>
                                            </div>
                                            <h4>History</h4>
                                            <p>Access private history</p>
                                        </div>
                                    </a>
                                </div>
                                <!--link-->
                                <div class="column is-4">
                                    <a class="setting-sublink">
                                        <div class="link-content">
                                            <div class="link-icon">
                                                <i data-feather="download-cloud"></i>
                                            </div>
                                            <h4>Download</h4>
                                            <p>Download your data</p>
                                        </div>
                                    </a>
                                </div>
                                <!--link-->
                                <div class="column is-4">
                                    <a class="setting-sublink">
                                        <div class="link-content">
                                            <div class="link-icon">
                                                <i data-feather="codepen"></i>
                                            </div>
                                            <h4>Connected Apps</h4>
                                            <p>Manage connected apps</p>
                                        </div>
                                    </a>
                                </div>
                                <!--link-->
                                <div class="column is-4">
                                    <a class="setting-sublink">
                                        <div class="link-content">
                                            <div class="link-icon">
                                                <i data-feather="credit-card"></i>
                                            </div>
                                            <h4>Payment Info</h4>
                                            <p>Manage payment info</p>
                                        </div>
                                    </a>
                                </div>
                                <!--link-->
                                <div class="column is-4">
                                    <a class="setting-sublink">
                                        <div class="link-content">
                                            <div class="link-icon">
                                                <i data-feather="hexagon"></i>
                                            </div>
                                            <h4>Account</h4>
                                            <p>Manage account info</p>
                                        </div>
                                    </a>
                                </div>
                                <!--link-->
                                <div class="column is-4">
                                    <a class="setting-sublink">
                                        <div class="link-content">
                                            <div class="link-icon">
                                                <i data-feather="github"></i>
                                            </div>
                                            <h4>Integrations</h4>
                                            <p>Manage integrations</p>
                                        </div>
                                    </a>
                                </div>
                                <!--link-->
                                <div class="column is-4">
                                    <a class="setting-sublink">
                                        <div class="link-content">
                                            <div class="link-icon">
                                                <i data-feather="shopping-cart"></i>
                                            </div>
                                            <h4>Shop Settings</h4>
                                            <p>Manage your store</p>
                                        </div>
                                    </a>
                                </div>
                                <!--link-->
                                <div class="column is-4">
                                    <a class="setting-sublink">
                                        <div class="link-content">
                                            <div class="link-icon">
                                                <i data-feather="database"></i>
                                            </div>
                                            <h4>System Settings</h4>
                                            <p>Manage preferences</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="illustration">
                            <img class="light-image" src="assets/img/illustrations/settings/3.svg" alt="">
                            <img class="dark-image" src="assets/img/illustrations/settings/3-dark.svg" alt="">
                            <p>If you'd like to learn more about account settings, you can read about it in the <a>user guide</a>.</p>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /partials/settings/sections/privacy-settings.html -->
            <div id="privacy-settings" class="settings-section">
                <div class="settings-panel">

                    <div class="title-wrap">
                        <a class="mobile-sidebar-trigger">
                            <i data-feather="menu"></i>
                        </a>
                        <h2>Privacy Settings</h2>
                    </div>

                    <div class="settings-form-wrapper">
                        <div class="settings-form">
                            <div class="columns is-multiline">
                                <div class="column is-8">
                                    <!--Field-->
                                    <div class="field spaced-field">
                                        <div class="switch-block">
                                            <label class="f-switch">
                                                <input type="checkbox" class="is-switch" checked>
                                                <i></i>
                                            </label>
                                            <div class="meta">
                                                <h4>Public Profile</h4>
                                                <p>Enable to make your profile viewable by anyone.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Field-->
                                    <div class="field spaced-field">
                                        <div class="switch-block">
                                            <label class="f-switch is-accent">
                                                <input type="checkbox" class="is-switch">
                                                <i></i>
                                            </label>
                                            <div class="meta">
                                                <h4>Public Posts</h4>
                                                <p>Enable to make your posts viewable by anyone.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Field-->
                                    <div class="field spaced-field">
                                        <div class="switch-block">
                                            <label class="f-switch is-accent">
                                                <input type="checkbox" class="is-switch">
                                                <i></i>
                                            </label>
                                            <div class="meta">
                                                <h4>Free Tagging</h4>
                                                <p>Enable to disable tags verification before publish.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Field-->
                                    <div class="field spaced-field">
                                        <div class="switch-block">
                                            <label class="f-switch is-accent">
                                                <input type="checkbox" class="is-switch" checked>
                                                <i></i>
                                            </label>
                                            <div class="meta">
                                                <h4>Public List</h4>
                                                <p>Enable to make your friend list viewable by anyone.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Field-->
                                    <div class="field">
                                        <div class="switch-block">
                                            <label class="f-switch is-accent">
                                                <input type="checkbox" class="is-switch" checked>
                                                <i></i>
                                            </label>
                                            <div class="meta">
                                                <h4>SEO</h4>
                                                <p>Enable to make your profile indexable by search engines.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="illustration">
                            <img class="light-image" src="assets/img/illustrations/settings/4.svg" alt="">
                            <img class="dark-image" src="assets/img/illustrations/settings/4-dark.svg" alt="">
                            <p>If you'd like to learn more about privacy settings, you can read about it in the <a>user guide</a>.</p>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /partials/settings/sections/preferences-settings.html -->
            <div id="preferences-settings" class="settings-section">
                <div class="settings-panel">

                    <div class="title-wrap">
                        <a class="mobile-sidebar-trigger">
                            <i data-feather="menu"></i>
                        </a>
                        <h2>Preferences</h2>
                    </div>

                    <div class="settings-form-wrapper">
                        <div class="settings-form">
                            <div class="columns is-multiline flex-portrait">
                                <!--link-->
                                <div class="column is-4">
                                    <a class="setting-sublink">
                                        <div class="link-content">
                                            <div class="link-icon">
                                                <i data-feather="monitor"></i>
                                            </div>
                                            <h4>Devices</h4>
                                            <p>Manage connected devices</p>
                                        </div>
                                    </a>
                                </div>
                                <!--link-->
                                <div class="column is-4">
                                    <a class="setting-sublink">
                                        <div class="link-content">
                                            <div class="link-icon">
                                                <i data-feather="codesandbox"></i>
                                            </div>
                                            <h4>Authentication</h4>
                                            <p>Authentication settings</p>
                                        </div>
                                    </a>
                                </div>
                                <!--link-->
                                <div class="column is-4">
                                    <a class="setting-sublink">
                                        <div class="link-content">
                                            <div class="link-icon">
                                                <i data-feather="box"></i>
                                            </div>
                                            <h4>API</h4>
                                            <p>API settings</p>
                                        </div>
                                    </a>
                                </div>
                                <!--link-->
                                <div class="column is-4">
                                    <a class="setting-sublink">
                                        <div class="link-content">
                                            <div class="link-icon">
                                                <i data-feather="search"></i>
                                            </div>
                                            <h4>Search</h4>
                                            <p>Search settings</p>
                                        </div>
                                    </a>
                                </div>
                                <!--link-->
                                <div class="column is-4">
                                    <a class="setting-sublink">
                                        <div class="link-content">
                                            <div class="link-icon">
                                                <i data-feather="cloud-snow"></i>
                                            </div>
                                            <h4>Cloud Settings</h4>
                                            <p>Manage storage</p>
                                        </div>
                                    </a>
                                </div>
                                <!--link-->
                                <div class="column is-4">
                                    <a class="setting-sublink">
                                        <div class="link-content">
                                            <div class="link-icon">
                                                <i data-feather="cpu"></i>
                                            </div>
                                            <h4>Cache</h4>
                                            <p>Cache settings</p>
                                        </div>
                                    </a>
                                </div>
                                <!--link-->
                                <div class="column is-4">
                                    <a class="setting-sublink">
                                        <div class="link-content">
                                            <div class="link-icon">
                                                <i data-feather="gift"></i>
                                            </div>
                                            <h4>Reedeem</h4>
                                            <p>Reedeem your points</p>
                                        </div>
                                    </a>
                                </div>
                                <!--link-->
                                <div class="column is-4">
                                    <a class="setting-sublink">
                                        <div class="link-content">
                                            <div class="link-icon">
                                                <i data-feather="command"></i>
                                            </div>
                                            <h4>Shortcuts</h4>
                                            <p>manage shortcuts</p>
                                        </div>
                                    </a>
                                </div>
                                <!--link-->
                                <div class="column is-4">
                                    <a class="setting-sublink">
                                        <div class="link-content">
                                            <div class="link-icon">
                                                <i data-feather="layout"></i>
                                            </div>
                                            <h4>Layout</h4>
                                            <p>Layout settings</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="illustration">
                            <img class="light-image" src="assets/img/illustrations/settings/5.svg" alt="">
                            <img class="dark-image" src="assets/img/illustrations/settings/5-dark.svg" alt="">
                            <p>If you'd like to learn more about preferences settings, you can read about it in the <a>user guide</a>.</p>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /partials/settings/sections/notifications-settings.html -->
            <div id="notifications-settings" class="settings-section">
                <div class="settings-panel">

                    <div class="title-wrap">
                        <a class="mobile-sidebar-trigger">
                            <i data-feather="menu"></i>
                        </a>
                        <h2>Notifications</h2>
                    </div>

                    <div class="settings-form-wrapper">
                        <div class="settings-form">
                            <div class="columns is-multiline">
                                <div class="column is-8">

                                    <div class="sub-heading">
                                        <h3>General notifications</h3>
                                    </div>

                                    <!--Field-->
                                    <div class="field spaced-field">
                                        <div class="switch-block">
                                            <label class="f-switch">
                                                <input type="checkbox" class="is-switch" checked>
                                                <i></i>
                                            </label>
                                            <div class="meta">
                                                <h4>Notifications</h4>
                                                <p>Enable to activate notifications.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Field-->
                                    <div class="field spaced-field">
                                        <div class="switch-block">
                                            <label class="f-switch is-accent">
                                                <input type="checkbox" class="is-switch">
                                                <i></i>
                                            </label>
                                            <div class="meta">
                                                <h4>Sounds</h4>
                                                <p>Enable to play a sound on new notification.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="sub-heading">
                                        <h3>Social notifications</h3>
                                    </div>

                                    <!--Field-->
                                    <div class="field spaced-field">
                                        <div class="switch-block">
                                            <label class="f-switch is-accent">
                                                <input type="checkbox" class="is-switch" checked>
                                                <i></i>
                                            </label>
                                            <div class="meta">
                                                <h4>Friend Request</h4>
                                                <p>Enable to receive friend request notifications.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Field-->
                                    <div class="field">
                                        <div class="switch-block">
                                            <label class="f-switch is-accent">
                                                <input type="checkbox" class="is-switch" checked>
                                                <i></i>
                                            </label>
                                            <div class="meta">
                                                <h4>New Comment</h4>
                                                <p>Enable to receive new comment notifications.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="sub-heading">
                                        <h3>Chat notifications</h3>
                                    </div>

                                    <!--Field-->
                                    <div class="field spaced-field">
                                        <div class="switch-block">
                                            <label class="f-switch is-accent">
                                                <input type="checkbox" class="is-switch" checked>
                                                <i></i>
                                            </label>
                                            <div class="meta">
                                                <h4>New Message</h4>
                                                <p>Enable to receive new message notifications.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Field-->
                                    <div class="field">
                                        <div class="switch-block">
                                            <label class="f-switch is-accent">
                                                <input type="checkbox" class="is-switch" checked>
                                                <i></i>
                                            </label>
                                            <div class="meta">
                                                <h4>New Participant</h4>
                                                <p>Enable to receive new participant notifications.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="sub-heading">
                                        <h3>Payment notifications</h3>
                                    </div>

                                    <!--Field-->
                                    <div class="field spaced-field">
                                        <div class="switch-block">
                                            <label class="f-switch is-accent">
                                                <input type="checkbox" class="is-switch" checked>
                                                <i></i>
                                            </label>
                                            <div class="meta">
                                                <h4>Payment Status</h4>
                                                <p>Enable to receive a notification on payment status change.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="illustration">
                            <img src="assets/img/illustrations/settings/6.svg" alt="">
                            <p>If you'd like to learn more about notifications settings, you can read about it in the <a>user guide</a>.</p>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /partials/settings/sections/support-settings.html -->
            <div id="support-settings" class="settings-section">
                <div class="settings-panel">

                    <div class="title-wrap">
                        <a class="mobile-sidebar-trigger">
                            <i data-feather="menu"></i>
                        </a>
                        <h2>Assistance</h2>
                    </div>

                    <div class="settings-form-wrapper">
                        <div class="settings-form">
                            <div class="columns is-multiline flex-portrait">
                                <!--link-->
                                <div class="column is-4">
                                    <a class="setting-sublink">
                                        <div class="link-content">
                                            <div class="link-icon">
                                                <i data-feather="book-open"></i>
                                            </div>
                                            <h4>User Guide</h4>
                                            <p>Learn more about the app</p>
                                        </div>
                                    </a>
                                </div>
                                <!--link-->
                                <div class="column is-4">
                                    <a class="setting-sublink">
                                        <div class="link-content">
                                            <div class="link-icon">
                                                <i data-feather="mail"></i>
                                            </div>
                                            <h4>Message</h4>
                                            <p>Contact the support team</p>
                                        </div>
                                    </a>
                                </div>
                                <!--link-->
                                <div class="column is-4">
                                    <a class="setting-sublink">
                                        <div class="link-content">
                                            <div class="link-icon">
                                                <i data-feather="message-circle"></i>
                                            </div>
                                            <h4>Chat</h4>
                                            <p>Chat with support</p>
                                        </div>
                                    </a>
                                </div>
                                <!--link-->
                                <div class="column is-4">
                                    <a class="setting-sublink">
                                        <div class="link-content">
                                            <div class="link-icon">
                                                <i data-feather="slash"></i>
                                            </div>
                                            <h4>Blocked Users</h4>
                                            <p>Manage blocked users</p>
                                        </div>
                                    </a>
                                </div>
                                <!--link-->
                                <div class="column is-4">
                                    <a class="setting-sublink">
                                        <div class="link-content">
                                            <div class="link-icon">
                                                <i data-feather="archive"></i>
                                            </div>
                                            <h4>Stats</h4>
                                            <p>View Stats</p>
                                        </div>
                                    </a>
                                </div>
                                <!--link-->
                                <div class="column is-4">
                                    <a class="setting-sublink">
                                        <div class="link-content">
                                            <div class="link-icon">
                                                <i data-feather="flag"></i>
                                            </div>
                                            <h4>Bookie Optioons</h4>
                                            <p>Manage Bookie</p>
                                        </div>
                                    </a>
                                </div>
                                <!--link-->
                                <div class="column is-4">
                                    <a class="setting-sublink">
                                        <div class="link-content">
                                            <div class="link-icon">
                                                <i data-feather="award"></i>
                                            </div>
                                            <h4>Rewards</h4>
                                            <p>See your rewards</p>
                                        </div>
                                    </a>
                                </div>
                                <!--link-->
                                <div class="column is-4">
                                    <a class="setting-sublink">
                                        <div class="link-content">
                                            <div class="link-icon">
                                                <i data-feather="check-circle"></i>
                                            </div>
                                            <h4>Partners</h4>
                                            <p>Partner Programs</p>
                                        </div>
                                    </a>
                                </div>
                                <!--link-->
                                <div class="column is-4">
                                    <a class="setting-sublink">
                                        <div class="link-content">
                                            <div class="link-icon">
                                                <i data-feather="briefcase"></i>
                                            </div>
                                            <h4>Sponsors</h4>
                                            <p>Sponsor programs</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="illustration">
                            <img class="light-image" src="assets/img/illustrations/settings/7.svg" alt="">
                            <img class="dark-image" src="assets/img/illustrations/settings/7-dark.svg" alt="">
                            <p>If you'd like to learn more about support, you can read about it in the <a>user guide</a>.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

  
    <script src="assets/js/app.js"></script>
    
    <script src="assets/js/settings.js"></script>

</body>

</html>
