<?php
//checkSession();
$username = $_SESSION['username'];
$email =  $_SESSION['email'];
$uid = $_SESSION['uid'];
/*
$balance = fetchBalance("$uid");

if ($balance < 19){
  $minW = 0;
  $stepW = 0;
} else {
  $minW = 20;
  $stepW = 20;
}
*/
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
    include_once 'includes/config/config.php';
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
$form->addHelper('Deposit Amount?', 'MLinput', '');
$form->addInput('number', 'MLinput', '', '', 'placeholder=Deposit Amount?, min=10, step=10');
$form->addHtml('<br>');
$form->addInput('text', 'promo', '', '', 'placeholder=Promo Code?');
$form->addHtml('<br>');
$form->addBtn('submit', 'submit-btn', 1, 'Proceed <i class="fa fa-check ml-2" aria-hidden="true"></i>', 'class=btn btn-success ladda-button, data-style=zoom-in');
//$form->addHtml('</center></div>');
$form->setOptions($button0);
$form->endFieldset();
$form->addPlugin('lcswitch', '', 'default', array('%language%' => 'en_US'));

?>

<!DOCTYPE html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>BataBoom | Cashier</title>
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fontisto@v3.0.4/css/fontisto/fontisto-brands.min.css" rel="stylesheet">


    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/fresh/app.css">
    <link rel="stylesheet" href="assets/fresh/mycore.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="https://opensports.bet/admin/bulma/css/table.css">
<style type="text/css">

#chart {
    background-color: white;

    display: inline-block;
}
#tabs-with-content .tabs:not(:last-child) {
  margin-bottom: 0;
}


.tabs.is-toggle ul li a:hover {
  background-color:#170c92;
  font-weight: 700;
}

.tabs.is-toggle ul li .is-active span {

  font-weight: 700;
}

.tabs.is-toggle ul li.is-active a {
  font-weight: 700;
  font-style: bold;
  font-size: 18px;
}


#tabs-with-content .tab-content {
  padding: 1rem;
  display: none;
}

#tabs-with-content .tab-content.is-active {
  display: block;
}
ion-icon {
  font-size: 30px;
}
   #MLinput{


min-width: 300px;
max-width: 100%;

}

    </style>
 
 <?php $form->printIncludes('css'); ?>
  </head>

<body class="is-dark">
  <?php require 'sidenav.php';?>
  <div id="posts-feed" class="container is-fluid" data-open-sidebar data-page-title="Cashier">
<div class="block"></div>
  <!-- Cashier Content -->
<div class="columns">
  <div class="column is-12">
  <div class="column is-8">
     
<h6 class="subtitle is-6"><?php echo $PROMO; ?></h6>
<?php if (isset($_SESSION['withdraw'])) { ?>

   <div class="notification is-primary" id="requests">
  <button class="delete"></button>
   <strong>Withdraw request successfully sent!</strong><?php unset($_SESSION['withdraw']); } elseif(isset($_SESSION['withdraw_error'])){ ?>
</div>
 <div class="notification is-danger" id="requests">
  <button class="delete"></button>
   <strong>Withdraw request error! Contact Support.</strong><?php unset($_SESSION['withdraw_error']); } ?>
</div>




<div id="tabs-with-content">
  <div class="tabs is-toggle is-success is-fullwidth">
    <ul>
       <li>
      <a>
        <span class="icon is-large is-success"><ion-icon name="cash"></ion-icon></span>
        <span class="has-text-danger-light">Deposit</span>
      </a>
    </li>
    <li>
      <a>
        <span class="icon is-large is-success"><ion-icon name="logo-bitcoin"></ion-icon></span>
        <span class="has-text-success">Withdrawl</span>
      </a>
    </li>
    <li>
      <a>
        <span class="icon is-large"><ion-icon name="help-buoy"></ion-icon></span>
        <span class="has-text-danger-light">Support</span>
      </a>
    </li>
    <li>
      <a>
        <span class="icon is-large"><ion-icon name="document"></ion-icon></span>
        <span class="has-text-primary">Documents</span>
      </a>
    </li>
    
    </ul>
  </div>
  

    <section class="tab-content"> 
  

        <article class="tile is-parent notification is-dark" id="depo">
         <center> <p class="title">Deposit</p></center>
         <br>
            <?php
            
            if (isset($sent_message)) {
                echo $sent_message;
            }
            $form->render();
            
            ?>
</article>
<div class="block"></div>
 <article class="tile is-child notification is-success">
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


  </section>


    <section class="tab-content">  

       <article class="tile is-parent notification is-info">
        <p class="title">Withdrawl</p>
      <form role="login" method="POST" action="withdrawlRequest.php">
<div class="field">
  <label class="label">Contact Email</label>
  <div class="control has-icons-left has-icons-right">
    <input class="input is-dark" type="email" name="email" placeholder="Email input" value="<?php echo $email;?>" readonly>
    <span class="icon is-small is-left">
      <i class="fas fa-email"></i>
    </span>
</div>
</div>

<div class="field">
  <label class="label">Username</label>
  <div class="control has-icons-left has-icons-right">
    <input class="input is-dark" type="text" placeholder="Text input" name="username" value="<?php echo $username;?>" readonly>
    <span class="icon is-small is-left">
      <i class="fas fa-user"></i>
    </span>
</div>
</div>
  <input type="hidden" id="custId" name="uid" value="<?php echo $uid;?>">
<input type="hidden" id="today" name="today" value="<?php echo $today;?>">
<input type="hidden" id="now" name="now" value="<?php echo $now;?>">
<div class="field">
 <div class="field has-addons">
 <div class="control">
    <span class="select is-fullwidth">
      <select name="coin">
        <option>Bitcoin</option>
        <option>Litecoin</option>
        <option>BNB</option>
      </select>
    </span>
  </div>
 <div class="control">
    <input class="input is-success is-light" type="number" step="<?php echo $stepW;?>" min="<?php echo $minW;?>" max="<?php echo $balance;?>" name="amount" placeholder="Withdrawl Amount">
  </div>
   <div class="control">
    <input class="input is-primary is-dark" type="text" name="addr" placeholder="Address?">
  </div>
 <div class="control">
  <button class="button is-success is-light">
      Transfer
    </button>
  </div>
</div>
</div>
</form>
</article>


</section>
    <section class="tab-content">
    SUPPORT

  </section>
  
    <section class="tab-content">Documents content</section>
</center></section>
</div></div>

</div>
</div>
</div>
</div>


  <script>
let tabsWithContent = (function () {
  let tabs = document.querySelectorAll('.tabs li');
  let tabsContent = document.querySelectorAll('.tab-content');

  let deactvateAllTabs = function () {
    tabs.forEach(function (tab) {
      tab.classList.remove('is-active');
    });
  };

  let hideTabsContent = function () {
    tabsContent.forEach(function (tabContent) {
      tabContent.classList.remove('is-active');
    });
  };

  let activateTabsContent = function (tab) {
    tabsContent[getIndex(tab)].classList.add('is-active');
  };

  let getIndex = function (el) {
    return [...el.parentElement.children].indexOf(el);
  };

  tabs.forEach(function (tab) {
    tab.addEventListener('click', function () {
      deactvateAllTabs();
      hideTabsContent();
      tab.classList.add('is-active');
      activateTabsContent(tab);
    });
  })

  tabs[0].click();
})();
</script>
<script>

        document.addEventListener('DOMContentLoaded', () => {
  (document.querySelectorAll('#requests') || []).forEach(($delete) => {
    const $notification = $delete.parentNode;

    $delete.addEventListener('click', () => {
      $notification.parentNode.removeChild($notification);
    });
  });
});

</script>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
     



  </body>

</html>
