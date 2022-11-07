<!DOCTYPE html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title> OSB | Timeline</title>
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fontisto@v3.0.4/css/fontisto/fontisto-brands.min.css" rel="stylesheet">


    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/fresh/app.css">
    <link rel="stylesheet" href="assets/fresh/mycore.css">
   <style type="text/css">
 /* brand logo is brand new */
            .brand-logo {
            position: relative;
            top: -100px;
            
                        }

        .sidebar-v1 .bottom-section ul li a {
  color: #9afbff8c;
}
     
        .bball{
         --fa-primary-color: rgb(0, 0, 0);
         --fa-primary-opacity:  0.6;
         --fa-secondary-color: rgb(238, 173, 43);
         --fa-secondary-opacity: 0.9;
         --fa-animation-iteration-count:  5;
        }
        .bball:hover{
         --fa-primary-color: rgb(238, 173, 43);
         --fa-primary-opacity:  0.6;
         --fa-secondary-color: rgb(0, 0, 0);
         --fa-secondary-opacity: 0.9;
         --fa-animation-iteration-count:  5;

        }
        .sticks {

         --fa-primary-color:  rgb(136,230,2);
         --fa-primary-opacity:  1;
         --fa-secondary-color: rgb(240,248,255);
         --fa-secondary-opacity:1;
         --fa-animation-iteration-count:  5;
        }

        .sticks:hover {

         --fa-primary-color:  rgb(240,248,255);
         --fa-primary-opacity:  1;
         --fa-secondary-color: rgb(136,230,2);
         --fa-secondary-opacity: 1;
      
        }
        
        .amfootball {

         --fa-primary-color:  rgb(130,182,219);
         --fa-primary-opacity:  0.6;
         --fa-secondary-color: rgb(29,31,38);
         --fa-secondary-opacity: 0.8;
         --fa-animation-iteration-count:  5;
        }

        .amfootball:hover {

         --fa-primary-color:  rgb(183,196,240);
         --fa-primary-opacity:  0.6;
         --fa-secondary-color: rgb(36,61,158);
         --fa-secondary-opacity: 0.8;
      
        }
        .bat {

               --fa-primary-color:  rgb(255,236,143);
         --fa-primary-opacity:  0.6;
         --fa-secondary-color: rgb(38,35,21);
         --fa-secondary-opacity: 0.8;

        }
        .sunny{
               --fa-primary-color:  rgb(255,255,25);
         --fa-primary-opacity:  1;
         --fa-secondary-color:rgb(255,203,135);
         --fa-secondary-opacity: 1;
         --fa-animation-iteration-count:  15;
        }
</style>



<style type="text/css">
  .emoji-picker {
  margin: 0 0.5em;
  border: 1px solid #999999;
  border-radius: 5px;
  box-shadow: 0px 0px 3px 1px #CCCCCC;
  background: #FFFFFF;
  width: 20.5rem;
  height: 27.5rem;
  font-family: Arial, Helvetica, sans-serif;
}

.emoji-picker__content {
  padding: 0.5em;
  height: 20.5rem;
}

.emoji-picker__preview {
  height: 2em;
  padding: 0.5em;
  border-top: 1px solid #999999;
  display: flex;
  flex-direction: row;
  align-items: center;
}

.emoji-picker__preview-emoji {
  font-size: 2em;
  margin-right: 0.25em;
  font-family: "Segoe UI Emoji", "Segoe UI Symbol", "Segoe UI", "Apple Color Emoji", "Twemoji Mozilla", "Noto Color Emoji", "EmojiOne Color", "Android Emoji";
}

.emoji-picker__preview-name {
  color: #666666;
  font-size: 0.85em;
  overflow-wrap: break-word;
  word-break: break-all;
}

.emoji-picker__tabs {
  margin: 0;
  padding: 0;
  display: flex;
}

.emoji-picker__tab {
  list-style: none;
  display: inline-block;
  padding: 0 0.5em;
  cursor: pointer;
  flex-grow: 1;
  text-align: center;
}

.emoji-picker__tab.active {
  border-bottom: 3px solid #4F81E5;
  color: #4F81E5;
}

.emoji-picker__tab-body {
  display: none;
  margin-top: 0.5em;
}

.emoji-picker__tab-body h2 {
  font-size: 0.75rem;
  text-transform: uppercase;
  color: #333333;
  margin: 0;
}

.emoji-picker__tab-body.active {
  display: block;
}

.emoji-picker__emojis {
  height: 17.5rem;
  overflow-y: scroll;
  display: flex;
  flex-wrap: wrap;
  align-content: flex-start;
  width: calc(1.3rem * 1.5 * 10);
  margin: auto;
}

.emoji-picker__emojis.search-results {
  height: 21rem;
}

.emoji-picker__emoji {
  background: transparent;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 1.3rem;
  width: 1.5em;
  height: 1.5em;
  padding: 0;
  margin: 0;
  font-family: "Segoe UI Emoji", "Segoe UI Symbol", "Segoe UI", "Apple Color Emoji", "Twemoji Mozilla", "Noto Color Emoji", "EmojiOne Color", "Android Emoji";
}

.emoji-picker__emoji:hover {
  background: #E8F4F9;
}

.emoji-picker__search-container {
  margin: 0.5em;
  position: relative;
  height: 2em;
  display: flex;
}

.emoji-picker__search-container input {
  box-sizing: border-box;
  width: 100%;
  border-radius: 5px;
  border: 1px solid #CCCCCC;
  padding-right: 2em;
}

.emoji-picker__search-icon {
  position: absolute;
  color: #CCCCCC;
  width: 1em;
  height: 1em;
  right: 0.75em;
  top: calc(50% - 0.5em);
}

.emoji-picker__search-not-found {
  color: #666666;
  text-align: center;
  margin-top: 2em;
}

.emoji-picker__search-not-found-icon {
  font-size: 3em;
}

.emoji-picker__search-not-found h2 {
  margin: 0.5em 0;
  font-size: 1em;
}

.emoji-picker__variant-overlay {
  background: rgba(0, 0, 0, 0.7);
  position: absolute;
  top: 0;
  left: 0;
  width: 20.5rem;
  height: 27.5rem;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.emoji-picker__variant-popup {
  background: #FFFFFF;
  margin: 0.5em;
  padding: 0.5em;
  text-align: center;
}

.emoji-picker__variant-popup-close-button {
  cursor: pointer;
  background: transparent;
  border: none;
  position: absolute;
  right: 1em;
  padding: 0;
  top: calc(50% - 0.5em);
  height: 1em;
  width: 1em;
}
.sc{
    background-color: black;
    color: blue;
}

</style>
</head>

<body class="is-dark">

  <?php 
    //require 'includes/config/config.php';
    require 'sidenav.php';
  
   ?>

 


        
        
    
                    
<!-- <div id="shop-page" class="container sidebar-boxed" data-open-sidebar data-page-title="Payment"> -->

  <div class="signup-wrapper">
<div class="fake-nav">
<p> 
    <?php
    /*
    if(isset($_POST['submit'])) 
   {

    $username = $_SESSION['username'];
    $email =  $_SESSION['email'];
    $uid = $_SESSION['uid'];
    $coin = $_POST['coin'];
    $product = $_POST['plan'];
    if ($product = 'basic'){
        $amount = 20;

    } elseif ($product = 'starter'){
        $amount = 30;
    } elseif($product = 'advanced'){
        $amount = 50;
    } else{
        $amount = 69;
    }
    $generateInvoice = newInvoice("$uid", $amount, "newnew");
    $oid = $generateInvoice[0];
    $addy = $generateInvoice[1];
    $_SESSION['orderID'] = $generateInvoice[0];
    $_SESSION['addy']  = $generateInvoice[1];
    header("Location:https://bataboom.bet/pay4.php?product=$product&coin=btc&address=$addy&amount=$amount");


   }
   */
   ?>
</p>

</div>
<div class="process-bar-wrap">
    <div class="process-bar">
        <div class="progress-wrap">
            <div class="track"></div>
            <div class="bar"></div>
            <div id="step-dot-1" class="dot is-first is-active is-current" data-step="0">
                <i data-feather="smile"></i>
            </div>
          
            <div id="step-dot-2" class="dot is-third" data-step="25">
                <i data-feather="image"></i>
            </div>
            
            
            <div id="step-dot-3" class="dot is-fifth" data-step="50">
                <i data-feather="flag"></i>
            </div>
        </div>
    </div>
</div>

<div class="outer-panel">
    <div class="outer-panel-inner">
        <div class="process-title">
            <h2 id="step-title-1" class="step-title is-active">Welcome, select an account type.</h2>
            <h2 id="step-title-2" class="step-title">Select a Currency.</h2>
            <h2 id="step-title-3" class="step-title">Invoice Created</h2>
        </div>
          <form method="post" id="invoice" action="gopay2.php">
        <div id="signup-panel-1" class="process-panel-wrap is-active">
            <div class="columns mt-4">
                 
                <div class="column is-4">
                    <div class="account-type">
                        <div class="type-image">
                            <img class="type-illustration" src="assets/img/illustrations/signup/type-1.svg" alt="">
                            <img class="type-bg light-image" src="assets/img/illustrations/signup/type-1-bg.svg" alt="">
                            <img class="type-bg dark-image" src="assets/img/illustrations/signup/type-1-bg-dark.svg" alt="">
                        </div>
                        <h3>Starter</h3>
                         <label class="material-radio">
        <input type="radio" name="plan" value="basic">
        <span class="dot"></span>
        <span class="radio-label">$20/mo | Select</span>
                         </label>
                    </div>
                </div>
                <div class="column is-4">
                    <div class="account-type">
                        <div class="type-image">
                            <img class="type-illustration" src="assets/img/illustrations/signup/type-2.svg" alt="">
                            <img class="type-bg light-image" src="assets/img/illustrations/signup/type-2-bg.svg" alt="">
                            <img class="type-bg dark-image" src="assets/img/illustrations/signup/type-2-bg-dark.svg" alt="">
                        </div>
                        <h3>Builder</h3>
                          <label class="material-radio">
        <input type="radio" name="plan" value="builder">
        <span class="dot"></span>
        <span class="radio-label">$75/mo | Select</span>
                         </label>
                    </div>
                </div>
                <div class="column is-4">
                    <div class="account-type">
                        <div class="type-image">
                            <img class="type-illustration" src="assets/img/illustrations/signup/type-3.svg" alt="">
                            <img class="type-bg light-image" src="assets/img/illustrations/signup/type-3-bg.svg" alt="">
                            <img class="type-bg dark-image" src="assets/img/illustrations/signup/type-3-bg-dark.svg" alt="">
                        </div>
                        
                        <h3>TCP Engineer</h3>
                         <label class="material-radio is-centered">
        <input type="radio" name="plan" value="advanced">
        <span class="dot"></span>
        <span class="radio-label">$125/mo | Select</span>
                         </label>
                    </div>
                </div>
            </div>
            <div class="column is-12">
                    <div class="buttons">
                <a class="button is-fullwidth process-button" data-step="step-dot-2">Continue</a>
                
            </div>
        </div>
     </div>   
        <div id="signup-panel-2" class="process-panel-wrap">
            
             <div class="columns mt-4">
              
      
                <div class="column is-4">
                    <div class="account-type is-center">
                        <div class="type-image">
                            <img src="assets/img/illustrations/cc.png" alt="">
                           
                        </div>
                         <h3>Bitcoin</h3>
                           <label class="material-radio">
        <input type="radio" name="coin" value="btc">
        <span class="dot"></span>
        <span class="radio-label">$BTC</span>
                         </label>
                    </div>
                </div>
                
                <div class="column is-4">
                    <div class="account-type is-center">
                        <div class="type-image">
                            <img src="assets/img/illustrations/Litecoin-Currency-on-transparent-background-PNG.png"  width="60%" alt="">
                        
                        </div>
                        <h3>Litecoin</h3>
                       
                          <label class="material-radio">
        <input type="radio" name="coin" value="ltc">
        <span class="dot"></span>
        <span class="radio-label">$LTC</span>
                         </label>
                    </div>
                </div>
              
                <div class="column is-4">
                    <div class="account-type is-center">
                        <div class="type-image">
                            <img src="assets/img/illustrations/monero.svg"  name="coin" value="xmr" width="60%" alt="">
                            
                        </div>
                        <h3>Monero</h3>
                
                          <label class="material-radio">
        <input type="radio" name="coin" value="xmr">
        <span class="dot"></span>
        <span class="radio-label">$XMR</span>
                         </label>
                    </div>
                </div>
                
                
            </div>
            <div class="column is-12">
                    <div class="buttons">
                <a class="button is-one-third process-button" data-step="step-dot-1">Back</a>
                <button class="button is-half process-button" type="submit" id="invoice" data-step="step-dot-2">Continue</a>
            </div>
        </div>
            </div>
            </form>
        </div>
                </div>


                  
                

 <!-- Compose --> 
    <script src="assets/fresh/js/signup.js"></script>
  

    <!-- Alertify -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>


