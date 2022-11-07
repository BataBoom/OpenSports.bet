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
$email =  $_SESSION['email'];
$uid = $_SESSION['uid'];
$balance = fetchBalance("$uid");

if ($balance < 19){
  $minW = 0;
  $stepW = 0;
} else {
  $minW = 20;
  $stepW = 20;
}

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<style type="text/css">
    #tab-content p {
  display: none;
}

#tab-content p.is-active {
  display: block;
}
#chart {
    background-color: white;

    display: inline-block;
}
#tabs-with-content .tabs:not(:last-child) {
  margin-bottom: 0;
}

#tabs-with-content .tab-content {
  padding: 1rem;
  display: none;
}

#tabs-with-content .tab-content.is-active {
  display: block;
}

    </style>

       <!-- Script to illustrates slideToggle() method 
    <script>
        $(document).ready(function() {
            $("button").click(function() {
                $("#depo").toggle();
            });
        });
    </script>
-->

    <title>Cashier</title>
  
 <?php $form->printIncludes('css'); ?>
  </head>
  <?php include 'navbar.php';?>
 <body>

<div class="container is-fluid">
  <!-- Cashier Content -->
<div class="columns">
  <div class="column is-7">
  <div class="column is-5">
      <h1 class="title">Cashier</h1>
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
  <div class="tabs is-toggle is-fullwidth">
    <ul>
       <li>
      <a>
        <span class="icon is-small"><i class="fa fa-image"></i></span>
        <span>Deposit</span>
      </a>
    </li>
    <li>
      <a>
        <span class="icon is-small"><i class="fa fa-music"></i></span>
        <span>Withdrawl</span>
      </a>
    </li>
    <li>
      <a>
        <span class="icon is-small"><i class="fa fa-film"></i></span>
        <span>Support</span>
      </a>
    </li>
    <li>
      <a>
        <span class="icon is-small"><i class="fa fa-file-text-o"></i></span>
        <span>Documents</span>
      </a>
    </li>
    
    </ul>
  </div>
  

    <section class="tab-content"> 
   <div class="tile">

        <article class="tile is-child notification is-dark" id="depo">
         <center> <p class="title">Deposit</p></center>
         <br>
            <?php
            
            if (isset($sent_message)) {
                echo $sent_message;
            }
            $form->render();
            
            ?>
</article>
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
</div>
</div>

  </section>


    <section class="tab-content">  

       <article class="tile is-child notification is-info">
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
    </a>
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
<article class="tile is-child notification is-info">
<div class="column">
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
     <div id="apex">
<?php

      $series = array('NHL'=>44,'NBA'=>55,'World Football'=>41,'American Football'=>17,'MMA'=>15);
      ?>
<script type="text/javascript">
   
// Using PHP implode() function
/*
var passedArray = <?php echo '[' . implode(',', $series) . ']'; ?>;
   
   document.write(passedArray);
 */  

      var options = {
        series: <?php echo '[' . implode(',', $series) . ']'; ?>,
        labels: ['NHL', 'NBA', 'NCAAB', 'MMA', 'NFL'],
          chart: {
          type: 'donut',
        },
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
      };
        

        var chart = new ApexCharts(document.querySelector("#apex"), options);
        chart.render();


      </script>

    </div>
    <div id="linez">
    <script type="text/javascript">
      
        var options = {
          series: [{
            name: "Desktops",
            data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
        }],
          chart: {
          height: 350,
          type: 'line',
        },
          zoom: {
            enabled: false
          },
        
         theme: {
      mode: 'light', 
      palette: 'palette9', 
      monochrome: {
          enabled: false,
          color: '#255aee',
          shadeTo: 'light',
          shadeIntensity: 0.65
      },
    },
  

        dataLabels: {
          enabled: false,

        },
        stroke: {
          curve: 'straight'
        },
        title: {
          text: 'Product Trends by Month',
          align: 'left'
        },

          xaxis: {
      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
     },
      
  
        };

        var chart = new ApexCharts(document.querySelector("#linez"), options);
        chart.render();

    </script>
  </div>
  <div id="barz">
    <script type="text/javascript">
      

        var options = {
          series: [{
          data: [400, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380]
        }],
          chart: {
          type: 'bar',
          height: 350
        },
        fill: {
  colors: ['#F44336', '#E91E63', '#9C27B0']
},
markers: {
   colors: ['#F44336', '#E91E63', '#9C27B0']
},

        plotOptions: {
          bar: {
            borderRadius: 4,
            horizontal: true,
          }
        },
        dataLabels: {
          enabled: false
        },
        xaxis: {
          categories: ['South Korea', 'Canada', 'United Kingdom', 'Netherlands', 'Italy', 'France', 'Japan',
            'United States', 'China', 'Germany'
          ],
        }
        };

        var chart = new ApexCharts(document.querySelector("#barz"), options);
        chart.render();
    </script>
        </article>
      </div>
      </div>
      </div>
    </article>

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


   
