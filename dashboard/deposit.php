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
newInvoice("$uid", $orderID, $amount, $promoCode);

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
 

 <!-- CSS only -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
<link rel="stylesheet" href="https://opensports.bet/admin/bulma/css/table.css">
<link href="https://bootswatch.com/5/superhero/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<link href="https://bootswatch.com/5/superhero/bootstrap.css" rel="stylesheet" crossorigin="anonymous">
    <title>Cashier</title>
  <style type="text/css">
      

      body {
  height: 100%;
  /* max-height: 600px; */
  width: 100%;
  background-color: hsla(200,40%,30%,.4);
  background-image:   
    url('https://78.media.tumblr.com/cae86e76225a25b17332dfc9cf8b1121/tumblr_p7n8kqHMuD1uy4lhuo1_540.png'), 
    url('https://78.media.tumblr.com/66445d34fe560351d474af69ef3f2fb0/tumblr_p7n908E1Jb1uy4lhuo1_1280.png'),
    url('https://78.media.tumblr.com/8cd0a12b7d9d5ba2c7d26f42c25de99f/tumblr_p7n8kqHMuD1uy4lhuo2_1280.png'),
    url('https://78.media.tumblr.com/5ecb41b654f4e8878f59445b948ede50/tumblr_p7n8on19cV1uy4lhuo1_1280.png'),
    url('https://78.media.tumblr.com/28bd9a2522fbf8981d680317ccbf4282/tumblr_p7n8kqHMuD1uy4lhuo3_1280.png');
  background-repeat: repeat-x;
  background-position: 
    0 20%,
    0 100%,
    0 50%,
    0 100%,
    0 0;
  background-size: 
    2500px,
    800px,
    500px 200px,
    1000px,
    400px 260px;
  animation: 50s para infinite linear;
  }

@keyframes para {
  100% {
    background-position: 
      -5000px 20%,
      -800px 95%,
      500px 50%,
      1000px 100%,
      400px 0;
    }
  }
  </style>
 <?php $form->printIncludes('css'); ?>
  </head>
  <?php include 'navbar.php';?>
 <body>
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
          <p class="title">User Betting Statistics</p>
           <?php 
           $userSample = Stats("$uid");
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


   
