<?php
/**
 * Template Name: Super Smoove Baseball Template
 * Created: Oct 2021
 * Author: BataBoom
 * NOTE: Everything works great but only processing ML right now. Need a way to identify questionID, aswell as add all 3 ML/RL/OU together into 3 seperate DB Records
 *
 */

?>
<?php
session_start();
require __DIR__ . '/../includes/config/config.php';
checkSession();
$username = $_SESSION['username'];
$uid = $_SESSION['uid'];
$balance = fetchBalance($uid);
error_reporting(1);
ini_set('display_errors', 1);

if(!(empty($_REQUEST['payment']))){
$cryptonator = '<p class="alert alert-danger">'.$_REQUEST['payment'].'!</b></p>';
echo $cryptonator;  
}

use Curl\Curl;
use phpformbuilder\Form;
use phpformbuilder\Validator\Validator;

$userSample = array('User'=>'JINZER', 'Balance'=>'0.00', 'Wins'=> 1, 'Losses'=> 10, 'Win%'=> '10%', 'Value Lines'=> '70%');

/* =============================================
    start session and include form class
============================================= */


include_once rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . '/libs/phpformbuilder/phpformbuilder/Form.php';

/* =============================================
    validation if posted
============================================= */

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken('order-form') === true) {
    // create validator & auto-validate required fields
    $validator = Form::validate('order-form');

    // check for errors
    if ($validator->hasErrors()) {
        $_SESSION['errors']['order-form'] = $validator->getAllErrors();
    } else {

$username = $_SESSION['username'];
$dash = $username . '-';
$orderID = uniqid($dash, false);
$amount = $_POST['MLinput'];
$promoCode = $_POST['promo'];
$name = "Custom $"."$amount Deposit";
newInvoice($username, $orderID, $amount, $promoCode);

createInvoice($name, $orderID, $amount, $promoCode);
    }
}
Form::clear('order-form');

/* ==================================================
    The Form
================================================== */

$form = new Form('order-form', 'horizontal', 'novalidate');
$form->setMode('development');
$button0 = array(
   'btnGroupClass'     => 'btn-grad btn-block'
   //'btnGroupClass'     => 'btn-block',
);

$addon = '<span class="input-group-text">$</span>';
$cents = '<span class="input-group-text">.00</span>';

$MLMenu = array(range(0,2));
$form->startFieldset();
//$form->startDependentFields($MLMenu[1], 0);
$form->addAddon('MLinput', $addon, 'before');
//$form->addAddon('MLinput', $cents, 'after');
//$form->endDependentFields();
$form->addHelper('Deposit Amount?', 'MLinput', 'id=#userRight');
$form->addInput('number', 'MLinput', '', '', 'id=#MLinput, placeholder=Deposit Amount?, min=10, step=10');
$form->addHtml('<br>');
$form->addInput('text', 'promo', '', '', 'id=#MLinput, placeholder=Promo Code?');
$form->addHtml('<br>');
$form->addBtn('submit', 'submit-btn', 1, 'Proceed <i class="fa fa-check ml-2" aria-hidden="true"></i>', 'class=btn btn-success ladda-button, data-style=zoom-in');
//$form->addHtml('</center></div>');
$form->setOptions($button0);
$form->endFieldset();
$form->addPlugin('lcswitch', '', 'default', array('%language%' => 'en_US'));

?>
<html>
  <head>
 

 <!-- CSS only 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->
   <link rel="stylesheet" href="https://nobuff.zone/bet/test/style003.css">
<link href="https://bootswatch.com/5/superhero/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<link href="https://bootswatch.com/5/superhero/bootstrap.css" rel="stylesheet" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
<link rel="stylesheet" href="https://opensports.bet/admin/bulma/css/table.css">
    <title>Cashier</title>
   
<script src="https://kit.fontawesome.com/8861fe9653.js" crossorigin="anonymous"></script>
 <?php $form->printIncludes('css'); ?>
  </head>
 

  <!-- Navbar -->
<?php 
/*
<nav class="navbar" role="navigation" aria-label="main navigation">
<div class="navbar-item has-dropdown is-hoverable">
     <div class="dropdown-trigger">
    <a class="navbar-link" ><i class="fas fa-bars">
    Menu
  </a></i>
  <div class="navbar-dropdown">
    <a class="navbar-item" href="nba.php" target="new_window"><i class="fas fa-basketball-ball">&nbsp; NBA Picks</a></i>
    </a>
    <a class="navbar-item" href="ufc.php" target="new_window"><i class="fas fa-hockey-puck">&nbsp;NHL Picks</a></i>
    </a>
    <a class="navbar-item" href="ncaab.php" target="new_window"><i class="fas fa-basketball-ball">&nbsp; NCAAB Picks</a></i>
    </a>
      <a class="navbar-item" href="mlb.php" target="new_window"><i class="fas fa-baseball-ball">&nbsp; MLB Picks</a></i>
    </a>
      <a class="navbar-item" href="ufc.php" target="new_window"><i class="far fa-hand-rock">&nbsp;UFC Picks</a></i>
    </a>
    <hr class="navbar-divider">
    <p class="dropdown-item">BATABOOM</p>
     <hr class="navbar-divider">

    <div class="navbar-item">
       <a class="navbar-item" href="#" target="new_window"><i class="fas fa-running">&nbsp; Player Pass+Recieve Picks</a></i>
    </div>
  </div>

</div>
  
 <div class="navbar-menu">
       <a class="nav-link"><span style="color:#e3ff48">Welcome <?php echo strtoupper($username);?></span></a>
    <a class="nav-link" href="../cashier/index.php" target="_blank"><span style="color:#11d448">Balance: <?php echo "$".$balance.".00";?></span></a>
</div>
</nav>
*/
?>

 <!-- Tabs navs -->
  <ul class="nav nav-tabs">

 <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bars">&nbsp; Menu</a></i>
         
 <div class="dropdown-menu" aria-labelledby="navbarDropdown">
             <a class="dropdown-item" href="nba.php" target="new_window"><i class="fas fa-basketball-ball">&nbsp; NBA Picks</a></i>

             <a class="dropdown-item" href="ufc.php" target="new_window"><i class="fas fa-hockey-puck">&nbsp;NHL Picks</a></i>
              <a class="dropdown-item" href="ncaab.php" target="new_window"><i class="fas fa-basketball-ball">&nbsp; NCAAB Picks</a></i>
            <a class="dropdown-item" href="mlb.php" target="new_window"><i class="fas fa-baseball-ball">&nbsp; MLB Picks</a></i>
            <a class="dropdown-item" href="ufc.php" target="new_window"><i class="far fa-hand-rock">&nbsp;UFC Picks</a></i>
        

            <div class="dropdown-divider"></div>
            <p class="dropdown-item">BATABOOM</p>
         <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" target="new_window"><i class="fas fa-crosshairs">&nbsp; NFL $urivor</a></i>
            <a class="dropdown-item" href="#" target="new_window"><i class="fas fa-football-ball">&nbsp; NFL Pick'em</a></i>
        
        <a class="dropdown-item" href="#" target="new_window"><i class="fas fa-running">&nbsp; Player Pass+Recieve Picks</a></i>
      
   
  </div>
      </li>
       <li class="nav-item">
    <a class="nav-link"><span style="color:#e3ff48">Welcome <?php echo strtoupper($username);?></span></a>
  </li>
   <li class="nav-item">
    <a class="nav-link" href="../cashier/index.php" target="_blank"><span style="color:#11d448">Balance: <?php echo "$".$balance.".00";?></span></a>
  </li>
</ul>

<div class="container is-fluid">
  <!-- Cashier Content -->
<div class="columns">
  <div class="column is-5">
   <center> <h1 class="title">Cashier</h1>
<h6 class="subtitle is-6"><?php echo $PROMO;?></h6></center>
</div>
<div class="column">
<div class="tile">
  
        <article class="tile is-child notification is-dark">
         <center> <p class="title">Deposit</p></center>
         <br>
            <?php
            if (isset($sent_message)) {
                echo $sent_message;
            }
            $form->render();
            ?>
        </article>
    </div>


 </div>
     
</div>


<div class="tile is-ancestor">
  <div class="tile is-vertical is-3">
    <div class="tile">

      <div class="tile is-parent is-vertical">
        <article class="tile is-child notification is-info">
          <p class="title">User Stats</p>
           <?php 
    foreach ($userSample as $key => $value){
      echo '<p class="cards"><b>'.$key.'</b>: '.$value."<br></p>";
   //   echo "<br>";
    }
   

     ?>
        </article>
      </div>
      </div>
    </div> 

  <div class="tile is-parent">
    <div class="tile is-vertical">
    <article class="tile is-child notification is-success">
      <div class="content">
        <p class="title">Invoices</p>
        <p class="subtitle">Recent Transactions</p>
        
         <div class="table-container">
  <table class="table">
   <thead>
    <tr>
      <th scope="col">Invoice#</th>
      <th scope="col">Username</th>
      <th scope="col">Amount</th>
      <th scope="col">Expires (EST)</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
     <?php
    $readInvoices = readInvoices("$username");
    $end = count($readInvoices);
    for ($i = 0; $i < $end; ++$i){

    ?>
    <tr>
     <?php echo "<td>".$readInvoices[$i]['id']."</td>";?>
      <?php echo "<td>".$readInvoices[$i]['username']."</td>";?>
    <?php echo "<td>".$readInvoices[$i]['amount']."</td>";?>
     <?php echo "<td>".$readInvoices[$i]['expires']."</td>";?>
    <?php echo "<td>".$readInvoices[$i]['status']."</td>";?>
    </tr>
   
  <?php };?>
  </tbody>
</table>
</div>
</div>
</div>
 </div> 
 
   
  

</div>


              

            
             



<div class="collapse" id="Recent">
  <div class="card card-body Recent">
  <table class="table table-sm table-dark border">

  <thead>
    <tr>
      <th scope="col">Invoice#</th>
      <th scope="col">Username</th>
      <th scope="col">Amount</th>
      <th scope="col">Expires</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
     <?php
    $readInvoices = readInvoices("$username");
    $end = count($readInvoices);
    for ($i = 0; $i < $end; ++$i){

    ?>
    <tr>
     <?php echo "<td>".$readInvoices[$i]['id']."</td>";?>
      <?php echo "<td>".$readInvoices[$i]['username']."</td>";?>
    <?php echo "<td>".$readInvoices[$i]['amount']."</td>";?>
     <?php echo "<td>".$readInvoices[$i]['expires']."</td>";?>
    <?php echo "<td>".$readInvoices[$i]['status']."</td>";?>
    </tr>
   
  <?php };?>
  </tbody>
</table>
</div>
</div>
<div class="row">
  <div class="col">
 
</div>
</div>
</div>
</div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
     

  <?php
    
  

  
   
    
?>
   

  </body>

</html>


   
