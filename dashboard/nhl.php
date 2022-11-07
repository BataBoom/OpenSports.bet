<?php
/**
 * Template Name: Super Smoove Hockey Template
 * Created: Oct 2021
 * Author: BataBoom
 *
 */

?>
<?php
session_start();
require __DIR__ . '/../includes/config/config.php';
checkSession();
$time_start = microtime(true);
error_reporting(1);
ini_set('display_errors', 1);

include_once rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . '/libs/phpformbuilder/Form.php';

use phpformbuilder\Form;
use phpformbuilder\database\Mysql;
use phpformbuilder\Validator\Validator;

$username = $_SESSION['username'];
$uid = $_SESSION['uid'];
$balance = fetchBalance("$uid");
echo $_SESSION['empty_balance'];
unset($_SESSION['empty_balance']);

include_once('nhlOdds.php');

$update0 = 'false';
$framework = 'bulma';


/* Initiate Form All in a LOOP! */
$Menu = array('Q0', 'Q1', 'Q2', 'Q3', 'Q4', 'Q5', 'Q6', 'Q7', 'Q8', 'Q9', 'Q10', 'Q11', 'Q12', 'Q13', 'Q14');
$RLMenu = array(gmRL0, gmRL1, gmRL2, gmRL3, gmRL3, gmRL4, gmRL5, gmRL6, gmRL7, gmRL8, gmRL9, gmRL10, gmRL11, gmRL12, gmRL13, gmRL14);
$MLMenu = array(gmML0, gmML1, gmML2, gmML3, gmML3, gmML4, gmML5, gmML6, gmML7, gmML8, gmML9, gmML10, gmML11, gmML12, gmML13, gmML14);
$OUMenu = array(game0totals, game1totals, game2totals, game3totals, game4totals, game5totals, game6totals, game7totals, game8totals, game9totals, game10totals, game11totals, game12totals, game13totals, game14totals);
//$MLMenu = array("ML"=>range(0,20));
//$RLMenu = array("RL"=>range(0,20));
//$OUMenu = array("OU"=>range(0,20));
//$Menu = array("Menu"=>range(0,20));


$formNames = array('nhl0', 'nhl1', 'nhl2', 'nhl3', 'nhl4', 'nhl5', 'nhl6', 'nhl7', 'nhl8', 'nhl9', 'nhl10', 'nhl11', 'nhl12', 'nhl13','nhl14', 'nhl15', 'nhl16', 'nhl17', 'nhl18', 'nhl19', 'nhl20');
$endF = count($formNames);
for ($x = 0; $x < $endF; ++$x) {

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken($formNames[$x]) === true) {
        //$validator[$x] = new Validator($_POST);
    // create validator & auto-validate required fields
    $validator[$x] = Form::validate($formNames[$x]);
 if ($validator[$x]->hasErrors()) {
$_SESSION['errors'][$formNames[$x]] = $validator[$x]->getAllErrors();

} else {
Form::registerValues($formNames[$x]);

 if (1 > $balance){
    $msg = '<p class="alert alert-info">Error! No Betting Points (BP)!</p>';
    $_SESSION['empty_balance'] = '<p class="alert alert-info">Error! No Betting Points (BP)!</p>'; 
    die(header('Location:https://opensports.bet/dashboard/nba.php'));
    }
    
$addML = $_REQUEST['MLinput'];
$addOU = $_REQUEST['OUinput'];
$addRL = $_REQUEST['RLinput'];

$addi = $addML + $addOU + $addRL;
 if ($balance > $addi){
 $deduct = $balance - $addi;
 updateBalance("$uid", "$deduct");
  }
  
  

    /* Grab Bet Ratio */
$mlcnt = count($mlTeam);
 for ($wub = 0; $wub < $mlcnt; $wub++) {
    if ($_POST['mlSelection'] === $mlTeam[$wub][0]) {
    $MLL = $mlPrice[$wub][0];
    } elseif ($_POST['mlSelection'] === $mlTeam[$wub][1]) {
    $MLL = $mlPrice[$wub][1];
    }
    if ($_POST['ouSelection'] === $ouTeam[$wub][0]) {
    $OUR = $ouPrice[$wub][0];
    } elseif ($_POST['ouSelection'] === $ouTeam[$wub][1]) {
    $OUR = $ouPrice[$wub][1];
    }
    if ($_POST['rlSelection'] === $rlTeam[$wub][0]) {
    $RLR = $rlPrice[$wub][0];
    } elseif ($_POST['rlSelection'] === $rlTeam[$wub][1]) {
    $RLR = $rlPrice[$wub][1];
    }
}


 /* Removed PLusMoney for Grading, but kept it in here incase we revert */
     $amountML = $_POST['MLinput'];
     $optionML = $_POST['mlSelection'];
     $type = "Moneyline";
     $league = 'NHL';
     $ratio = $MLL;
     if ($ratio > 0) {
     $plusMoney = 'YES';
   } else {
     $plusMoney = 'NO';
          }
     $gidML = $_POST['MLID'];
     $startDate = $_POST['niceStart'];
     $MLdate = $_POST['MLDate'];
     $cat = '2';


     $amountOU = $_POST['OUinput'];
     $optionOU = $_POST['ouSelection'];
     $typeOU = "Totals";
     $league = 'NHL';
     $ratioOU = $OUR;
     if ($ratioOU > 0) {
     $plusMoneyOU = 'YES';
   } else {
     $plusMoneyOU = 'NO';
          }
     $gidOU = $_POST['OUID'];
     $OUdate = $_POST['OUDate'];
     $startDate = $_POST['niceStart'];
     $cat = '2';

     
     $amountRL = $_POST['RLinput'];
     $RLdate = $_POST['RLDate'];
     $optionRL = $_POST['rlSelection'];
     $typeRL = "Spread";
     $league = 'NHL';
     $ratioRL = $RLR;
     if ($ratioRL > 0) {
     $plusMoneyRL = 'YES';
   } else {
     $plusMoneyRL = 'NO';
          }
     $gidRL = $_POST['RLID'];
     $startDate = $_POST['niceStart'];
     $cat = '2';


if ($amountML != '' && $optionML != '') {
     createBet($amountML, $optionML, $type, $league, $ratio,  "$gidML", $username, $uid, "$MLdate", $cat, "NEW");
      $msgML = '<p class="alert alert-success">Successuflly Placed - '. '<b>'.($_POST['mlSelection']).'</b>'.' For '. '<b>'.$amountML.' BP</b>'.'<br>'.'Remaining Balance '. '<b>'.$deduct.' Betting Points </b>'." \n";    
       } elseif(empty($optionML)) {
        $msgML = '';  
       } elseif(!(empty($optionML))) {
        $msgML = '<p class="alert alert-danger">Error: Moneyline Not placed successfully!</b></p>';  
       }

if ($amountOU != '' && $optionOU != '') {
     createBet($amountOU, $optionOU, $typeOU, $league, $ratioOU,  "$gidOU", $username, $uid, "$OUdate", $cat, "NEW");
      $msgOU = '<p class="alert alert-success">Successuflly Placed - '. '<b>'.($_POST['ouSelection']).'</b>'.' For '. '<b>'.$amountOU.' BP</b>'.'<br>'.'Remaining Balance '. '<b>'.$deduct.' Betting Points </b>'." \n";    
       } elseif(empty($optionOU)) {
        $msgOU = '';  
       } elseif(!(empty($optionOU))) {
        $msgOU = '<p class="alert alert-danger">Error: Totals Not placed successfully!</b></p>';  
       }

if ($amountRL != '' && $optionRL != '') {
     createBet($amountRL, $optionRL, $typeRL, $league, $ratioRL,  "$gidRL", $username, $uid, "$RLdate", $cat, "NEW");
      $msgRL = '<p class="alert alert-success">Successuflly Placed - '. '<b>'.($_POST['rlSelection']).'</b>'.' For '. '<b>'.$amountRL.' BP</b>'.'<br>'.'Remaining Balance '. '<b>'.$deduct.' Betting Points </b>'." \n";    
       } elseif(empty($optionRL)) {
        $msgRL = '';  
       } elseif(!(empty($optionRL))) {
        $msgRL = '<p class="alert alert-danger">Error: Spread Not placed successfully!</b></p>';  
       }

    }
}
}

echo $msgML."\n";
echo $msgOU."\n";
echo $msgRL."\n";
for ($x = 0; $x < $endF; ++$x) {
Form::clear($formNames[$x]);
}


$button0 = array(
   'btnGroupClass'     => 'btn-grad btn-block'
   //'btnGroupClass'     => 'btn-block',
);

/* ==================================================
    The Form
 ================================================== */

$CountKeys = count($allML);
for($i=0; $i < $CountKeys; ++$i) { 
    for($c = 0; $c < 6; ++$c) { 
$z = range(0,$CountKeys);
$form[$i] = new Form(nhl.$i, $layout = 'vertical', $framework);



$mode = 'development';
$form[$i]->setMode($mode);



/*NHLe Menu*/
$form[$i]->startFieldset('');

$form[$i]->addCheckbox($MLMenu[$i], 'Moneyline?', 1, checked);
$form[$i]->addCheckbox($OUMenu[$i], 'Totals?', 2, unchecked);
$form[$i]->addCheckbox($RLMenu[$i], 'Spreads?', 3, checked);
$form[$i]->addHtml('<div id="cc">', '', '');
$form[$i]->printCheckboxGroup($MLMenu[$i], '');
$form[$i]->printCheckboxGroup($OUMenu[$i], '');
$form[$i]->printCheckboxGroup($RLMenu[$i], '');
$form[$i]->addHtml('</div>', '', '');
}

/*NHLe ML Menu */
$form[$i]->startDependentFields($MLMenu[$i], 1);
$form[$i]->addHtml('<div id="cc">', '', '');
//$form[$i]->addAddon('bpml', $addon, 'before');
//$form[$i]->addAddon('bpml', $cents, 'after');
$form[$i]->addAddon('MLinput', $addon, 'before');
$form[$i]->addAddon('MLinput', $cents, 'after');
$form[$i]->addInput('number', 'MLinput', '', '', "step=$step, min=$minbet, max=$maxbet");
$form[$i]->addRadio('mlSelection', $mlTeam[$i][0].' '.$mlPrice[$i][0], $mlTeam[$i][0], 'class=lcswitch MLM, data-theme=teal');
$form[$i]->addRadio('mlSelection', $mlTeam[$i][1].' '.$mlPrice[$i][1], $mlTeam[$i][1], 'class=lcswitch MLM, data-theme=teal');
$form[$i]->addInput('hidden', 'MLID', $mleid[$i][0]);
$form[$i]->addInput('hidden', 'MLDate', $newDBDate[$i]);
$form[$i]->printRadioGroup('mlSelection', '');
$form[$i]->addHtml('</div>', '', '');
$form[$i]->endDependentFields();


$form[$i]->startDependentFields($OUMenu[$i], 2);
$form[$i]->addAddon('OUinput', $addon, 'before');
$form[$i]->addAddon('OUinput', $cents, 'after');
//$form[$i]->addInput('number', 'bpou', '', '', 'placeholder=BP');
$form[$i]->addInput('number', 'OUinput', '', '', "step=$step, min=$minbet, max=$maxbet");
$form[$i]->addRadio('ouSelection', $ouTeam[$i][0].' '.$ouPrice[$i][0], $ouTeam[$i][0], 'class=lcswitch, data-theme=indigo');
$form[$i]->addRadio('ouSelection', $ouTeam[$i][1].' '.$ouPrice[$i][1], $ouTeam[$i][1], 'class=lcswitch, data-theme=indigo');
$form[$i]->addInput('hidden', 'OUDate', $newDBDate[$i]);
$form[$i]->addInput('hidden', 'OUID', $oueid[$i][0]);
$form[$i]->addHtml('<div id="cc">', '', '');
$form[$i]->printRadioGroup('ouSelection', '');
$form[$i]->addHtml('</div>', '', '');
$form[$i]->endDependentFields();

$form[$i]->startDependentFields($RLMenu[$i], 3);
$form[$i]->addAddon('RLinput', $addon, 'before');
$form[$i]->addAddon('RLinput', $cents, 'after');
//$form[$i]->addInput('number', 'bprl', '', '', 'placeholder=BP');
$form[$i]->addInput('number', 'RLinput', '', '', "step=$step, min=$minbet, max=$maxbet");
$form[$i]->addRadio('rlSelection', $rlTeam[$i][0].' '.$rlPrice[$i][0], $rlTeam[$i][0], 'class=lcswitch, data-theme=yellow');
$form[$i]->addRadio('rlSelection', $rlTeam[$i][1].' '.$rlPrice[$i][1], $rlTeam[$i][1], 'class=lcswitch, data-theme=yellow');
$form[$i]->addInput('hidden', 'RLDate', $newDBDate[$i]);
$form[$i]->addInput('hidden', 'RLID', $rleid[$i][0]);
$form[$i]->addHtml('<div id="cc">', '', '');
$form[$i]->printRadioGroup('rlSelection', '');

$form[$i]->endDependentFields();


$form[$i]->addInput('hidden', 'matchID', $all[$i]['ML'][0]['id']);
$form[$i]->addInput('hidden', 'start', $all[$i]['start']);
$form[$i]->addInput('hidden', 'niceStart', $all[$i]['start']);



//$form[$i]->setOptions($changeRadio);
$form[$i]->addBtn('submit', 'NHLe', 1, '<span class="fa fa-check-circle append"> Place Wager</span>', $attr = 'class=btn btn-success btn-lg submit, data-style=zoom-in', $Menu[$i]);
$form[$i]->addBtn('reset', 'reset-btn', 0, '<span class="fa fa-times-circle append"> Reset</span>', $attr = 'class=btn btn-danger btn-lg reset', $Menu[$i]);
$form[$i]->printBtnGroup($Menu[$i], $label = '');
$form[$i]->addPlugin('lcswitch', '', 'default', array('%language%' => 'en_US'));
$form[$i]->addPlugin('icheck', 'RLinput', 'theme', array('%theme%' => 'futurico'));
$form[$i]->addPlugin('icheck', 'MLinput', 'theme', array('%theme%' => 'polaris'));
$form[$i]->addPlugin('icheck', 'OUinput', 'theme', array('%theme%' => 'futurico'));
$form[$i]->endFieldset();
$form[$i]->groupInputs($MLMenu[$i], $OUMenu[$i], $RLMenu[$i]);
$form[$i]->endFieldset('');


?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
$form[$i]->printIncludes('css');

}



?>

 <!-- CSS only 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://nobuff.zone/bet/test/style003.css">-->
<link href="https://bootswatch.com/5/superhero/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<link href="https://bootswatch.com/5/superhero/bootstrap.css" rel="stylesheet" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
<link rel="stylesheet" href="css/cards2.css">

    <title>NHL</title>
    <style> 
         body{
            width: 100%;
            height: 100%;

        }
/*
    .submit {
            background-image: linear-gradient(to right, #F09819 0%, #EDDE5D  51%, #F09819  100%);
            text-align: center;
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;       
            font-weight: 500;       
            box-shadow: 0 0 10px #eee;
            border-radius: 5px;
            font-family: 'Roboto Mono', monospace;

                                }
          .submit:hover {
            background-position: right center; 
            color: #fff;
            text-decoration: none;
          }

.reset {
            
         background-image: linear-gradient(to right, #e52d27 0%, #b31217  51%, #e52d27  100%);
            margin: 10px;
            text-align: center;
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;  
            font-weight: 500;          
            box-shadow: 0 0 6px #eee;
            border-radius: 2px;
            font-family: 'Roboto Mono', monospace;
          }

          .reset:hover {
            background-position: right center; 
            color: #fff;
            text-decoration: none;
          }
*/

    #MLinput{

height: calc(1.5em + .75rem + 2px);
font-size: 18px;
width: 50%;
font-weight: 700;
line-height: 1.5;
color: #0d2335;
background-color: #add8e6;
border: 3px inset #00595c;

}

 #RLinput{
  
 display: flex;
width: 50%;
height: calc(1.5em + .75rem + 2px);
font-size: 18px;
font-weight: 700;
line-height: 1.5;
color: #0d2335;
background-color: #f9ed9b;
border: 3px inset #b2b500;
transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}

 #OUinput{
  
 display: flex;
width: 50%;
height: calc(1.5em + .75rem + 2px);
font-size: 18px;
font-weight: 700;
line-height: 1.5;
color: #0d2335;
background-color: #a5b6f8;
border: 2px inset #00595c;
}
   
     .form-check{
font-family: "Trebuchet MS", Helvetica, sans-serif;
font-size: 18px;
color: #B2E719;
font-weight: 700;
text-decoration: rgb(68, 68, 68);
font-variant: normal;
text-transform: uppercase;
  padding-top: 6px;
   padding-bottom: 10px;
  
    }
      img {
      margin: 13px;
      padding: 1px;
    }

</style>
<link rel="stylesheet" href="css/pagePreloaders.css">

<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
  </head>
<link rel="stylesheet" href="css/pagePreloaders.css">

</head>

  <?php include 'navbar.php';?>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r121/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.waves.min.js"></script>
<script>
VANTA.WAVES({
  el: "body",
  mouseControls: true,
  touchControls: true,
  gyroControls: false,
  minHeight: 200.00,
  minWidth: 200.00,
  scale: 1.00,
  scaleMobile: 1.00,
  color: 0x1c487a,
  shininess: 65.00,
  waveHeight: 19.00,
  zoom: 0.7
})
</script>


   
  


  <div class="container is-fluid">
 
<div class="columns is-mobile is-multiline is-centered">
      <?php for ($i = 0; $i < $CountKeys; ++$i) { ?>

    <div class="column">
        
  <div class="card">
        <button class="card-header-icon" onclick="slide(<?php echo $i;?>);" aria-label="more options">
      <span class="icon">
        <i class="fas fa-angle-down" aria-hidden="true"></i>
      </span>
    </button>
    <div class="card-content">
        <center>
  <header class="card-header">

       <figure class="image is-96x96">
<img src="logos/nhl/<?php echo $homeImages[$i].'.png'; ?>">
  <div class='block'></div>
 </figure><figure class="image is-96x96">
  <img src="logos/nhl/<?php echo $awayImages[$i].'.png'; ?>">
    <div class='block'></div>
</figure>

  <p class="card-header-title"> <?php
 echo $mlTeam[$i][0]  . '  VS   ' . $mlTeam[$i][1]."\n". "<i>Starts: " . $newtime[$i]."</i>"."\n";?></p>

  </header>


    
   <?php $form[$i]->render();?>    


</center>
</div>
</div>
</div>


<?php }; ?>


</div>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script type="text/javascript">
    for (let i = 0; i < <?php echo $CountKeys;?>; ++i) {
    function slide(i) {
    $(`#nhl${i}`).toggle();
    }
    console.log(i);
    }
    </script>

  <?php
    
  

  
   
    $time_end = microtime(true);
  $execution_time = ($time_end - $time_start)/60; 

echo '<b>Total Execution Time:</b> '.$execution_time.' Mins';
?>
   <?php for ($i = 0; $i < $CountKeys; ++$i) {
  $form[$i]->printIncludes('js');
    $form[$i]->printJsCode();
  }



 ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="assets/js/pagePreloaders.js"></script>
    <script>
        /*
        $(function () {
            $(document).pagePreloaders({
            
                //Main Options
                preloaderStyle: 'animation',    // Preloader style: animation, logo
                backgroundColor: '#53abb5', // Preloader background color
                backgroundOpacity: 1, // Preloader background opacity: 0.1 to 1
                animationTime: '3.5', // Minimum preloader display time in seconds (prevents the preloader from disappearing too fast)

                //Animation Preloader Options
                animationPreloader: '2', // Choose from 11 preload animations. Enter any value from 1 to 11
                animationPreloaderColor: '#fff', // Animation color
                animationPreloaderOpacity: '1', // Animation opacity: 0.1 to 1

                //Logo Preloader Options
                imageURL: 'assets/logo_white.png', // Path to your logo image
                logoSize: '150px', // Size of the displayed logo (image proportions will be constrained to retain the quality)
                logoBackgroundColor: 'transparent', // Logo background color
                logoOpacity: '1', // Logo opacity: 0.1 to 1
                logoBorderWidth: '5px', // Logo stroke color width
                logoBorderColor: '#3cf', // Logo stroke color
                logoBorderRadius: '50%', // Logo corner radius
            });
        });
        */
    </script>

  </body>

</html>


   
