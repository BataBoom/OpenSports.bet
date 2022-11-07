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
//checkSession();
$time_start = microtime(true);
error_reporting(1);
ini_set('display_errors', 1);

include_once rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . '/libs/phpformbuilder/phpformbuilder/Form.php';

use phpformbuilder\Form;
use phpformbuilder\database\Mysql;
use phpformbuilder\Validator\Validator;

$username = $_SESSION['username'];
$uid = $_SESSION['uid'];
$balance = fetchBalance("$uid");
if ($balance < 1){
   freePlay("$uid", "200");
   $_SESSION['empty_balance'] = '<p class="alert alert-info">Error! No Betting Points (BP)!</p>'; 
}

include_once('nbaOdds22.php');

$update0 = 'false';
$framework = 'bs4';
echo $_SESSION['empty_balance'];
unset($_SESSION['empty_balance']);

/* Initiate Form All in a LOOP! */
$Menu = array('Q0', 'Q1', 'Q2', 'Q3', 'Q4', 'Q5', 'Q6', 'Q7', 'Q8', 'Q9', 'Q10', 'Q11', 'Q12', 'Q13', 'Q14');
$RLMenu = array(gmRL0, gmRL1, gmRL2, gmRL3, gmRL3, gmRL4, gmRL5, gmRL6, gmRL7, gmRL8, gmRL9, gmRL10, gmRL11, gmRL12, gmRL13, gmRL14);
$MLMenu = array(gmML0, gmML1, gmML2, gmML3, gmML3, gmML4, gmML5, gmML6, gmML7, gmML8, gmML9, gmML10, gmML11, gmML12, gmML13, gmML14);
$OUMenu = array(game0totals, game1totals, game2totals, game3totals, game4totals, game5totals, game6totals, game7totals, game8totals, game9totals, game10totals, game11totals, game12totals, game13totals, game14totals);
//$MLMenu = array("ML"=>range(0,20));
//$RLMenu = array("RL"=>range(0,20));
//$OUMenu = array("OU"=>range(0,20));
//$Menu = array("Menu"=>range(0,20));


$formNames = array('nba0', 'nba1', 'nba2', 'nba3', 'nba4', 'nba5', 'nba6', 'nba7', 'nba8', 'nba9', 'nba10', 'nba11', 'nba12', 'nba13','nba14', 'nba15', 'nba16', 'nba17', 'nba18', 'nba19', 'nba20');
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
    } else {
      
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
     $gid = $_POST['matchID'];
     $type = "Moneyline";
     $league = 'NBA';
     $startDate = $_POST['start'];
     $ratio = $MLL;
     if ($ratio > 0) {
     $plusMoney = 'YES';
   } else {
     $plusMoney = 'NO';
          }
    
     $cat = '2';


     $amountOU = $_POST['OUinput'];
     $optionOU = $_POST['ouSelection'];
     $typeOU = "Totals";
     $league = 'NBA';
     $ratioOU = $OUR;
     if ($ratioOU > 0) {
     $plusMoneyOU = 'YES';
   } else {
     $plusMoneyOU = 'NO';
          }
    
     
     $cat = '2';

     
     $amountRL = $_POST['RLinput'];
     $optionRL = $_POST['rlSelection'];
     $typeRL = "Spread";
     $league = 'NBA';
     $ratioRL = $RLR;
     if ($ratioRL > 0) {
     $plusMoneyRL = 'YES';
   } else {
     $plusMoneyRL = 'NO';
          }
    
     
     $cat = '2';



if ($amountML != '' && $optionML != '') {
     createBet($amountML, $optionML, $type, $league, $ratio,  $gid, $username, $uid, $startDate, $cat, "NEW");
      $msgML = '<p class="alert alert-success">Successuflly Placed - '. '<b>'.($_POST['mlSelection']).'</b>'.' For '. '<b>'.$amountML.' BP</b>'.'<br>'.'Remaining Balance '. '<b>'.$deduct.' Betting Points </b>'." \n";    
       } elseif(empty($optionML)) {
        $msgML = '';  
       } elseif(!(empty($optionML))) {
        $msgML = '<p class="alert alert-danger">Error: Moneyline Not placed successfully!</b></p>';  
       }

if ($amountOU != '' && $optionOU != '') {
     createBet($amountOU, $optionOU, $typeOU, $league, $ratioOU,  $gid, $username, $uid, $startDate, $cat, "NEW");
      $msgOU = '<p class="alert alert-success">Successuflly Placed - '. '<b>'.($_POST['ouSelection']).'</b>'.' For '. '<b>'.$amountOU.' BP</b>'.'<br>'.'Remaining Balance '. '<b>'.$deduct.' Betting Points </b>'." \n";    
       } elseif(empty($optionOU)) {
        $msgOU = '';  
       } elseif(!(empty($optionOU))) {
        $msgOU = '<p class="alert alert-danger">Error: Totals Not placed successfully!</b></p>';  
       }


if ($amountRL != '' && $optionRL != '') {
     createBet($amountRL, $optionRL, $typeRL, $league, $ratioRL,  $gid, $username, $uid, $startDate, $cat, "NEW");
      $msgRL = '<p class="alert alert-success">Successuflly Placed - '. '<b>'.($_POST['rlSelection']).'</b>'.' For '. '<b>'.$amountRL.' BP</b>'.'<br>'.'Remaining Balance '. '<b>'.$deduct.' Betting Points </b>'." \n";    
       } elseif(empty($optionRL)) {
        $msgRL = '';  
       } elseif(!(empty($optionRL))) {
        $msgRL = '<p class="alert alert-danger">Error: Spread Not placed successfully!</b></p>';  
       }      

    }
}
}
}

echo $msg."\n";
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
$form[$i] = new Form(nba.$i, $layout = 'vertical', $framework);



$mode = 'production';
$form[$i]->setMode($mode);



/*nbae Menu*/
$form[$i]->startFieldset('');
$form[$i]->addCheckbox($MLMenu[$i], 'Moneyline?', 1, checked);
$form[$i]->addCheckbox($OUMenu[$i], 'Totals?', 2, unchecked);
$form[$i]->addCheckbox($RLMenu[$i], 'Spreads?', 3, checked);
$form[$i]->printCheckboxGroup($MLMenu[$i], '');
$form[$i]->printCheckboxGroup($OUMenu[$i], '');
$form[$i]->printCheckboxGroup($RLMenu[$i], '');
}

/*nbae ML Menu */
$form[$i]->startDependentFields($MLMenu[$i], 1);
//$form[$i]->addAddon('bpml', $addon, 'before');
//$form[$i]->addAddon('bpml', $cents, 'after');
$form[$i]->addAddon('MLinput', $addon, 'before');
$form[$i]->addAddon('MLinput', $cents, 'after');
$form[$i]->addInput('number', 'MLinput', '', '', "step=$step, min=$minbet, max=$maxbet");
$form[$i]->addRadio('mlSelection', $mlTeam[$i][0].' '.$mlPrice[$i][0], $mlTeam[$i][0], 'class=lcswitch MLM, data-theme=teal');
$form[$i]->addRadio('mlSelection', $mlTeam[$i][1].' '.$mlPrice[$i][1], $mlTeam[$i][1], 'class=lcswitch MLM, data-theme=teal');
$form[$i]->printRadioGroup('mlSelection', '');

$form[$i]->endDependentFields();

$form[$i]->startDependentFields($OUMenu[$i], 2);
$form[$i]->addAddon('OUinput', $addon, 'before');
$form[$i]->addAddon('OUinput', $cents, 'after');
$form[$i]->addInput('number', 'OUinput', '', '', "step=$step, min=$minbet, max=$maxbet");
$form[$i]->addRadio('ouSelection', $ouTeam[$i][0].' '.$ouPrice[$i][0], $ouTeam[$i][0], 'class=lcswitch, data-theme=yellow');
$form[$i]->addRadio('ouSelection', $ouTeam[$i][1].' '.$ouPrice[$i][1], $ouTeam[$i][1], 'class=lcswitch, data-theme=yellow');
$form[$i]->printRadioGroup('ouSelection', '');

$form[$i]->endDependentFields();

$form[$i]->startDependentFields($RLMenu[$i], 3);
$form[$i]->addAddon('RLinput', $addon, 'before');
$form[$i]->addAddon('RLinput', $cents, 'after');
$form[$i]->addInput('number', 'RLinput', '', '', "step=$step, min=$minbet, max=$maxbet");
$form[$i]->addRadio('rlSelection', $rlTeam[$i][0].' '.$rlPrice[$i][0], $rlTeam[$i][0], 'class=lcswitch, data-theme=yellow');
$form[$i]->addRadio('rlSelection', $rlTeam[$i][1].' '.$rlPrice[$i][1], $rlTeam[$i][1], 'class=lcswitch, data-theme=yellow');
$form[$i]->printRadioGroup('rlSelection', '');
$form[$i]->endDependentFields();


$form[$i]->addInput('hidden', 'matchID', $mleid[$i][0]);
$form[$i]->addInput('hidden', 'start', $start[$i][0]);
$form[$i]->addInput('hidden', 'niceStart', $niceStart[$i][0]);
$changeRadio = array(
   //'inlineRadioWrapper'      => '<div class="form-check">',
   //'radioWrapper' => '<div class="elementsWrapper"></div>',
   //'btnGroupClass'     => 'btn-block'
);

$form[$i]->setOptions($button0);
//$form[$i]->setOptions($changeRadio);
$form[$i]->addBtn('submit', 'nbae', 1, '<span class="fa fa-check-circle append"> Place Wager</span>', $attr = 'class=btn btn-success btn-lg submit, data-style=zoom-in', $Menu[$i]);
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

 <!-- CSS only -->
<link href="https://bootswatch.com/5/superhero/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<link href="https://bootswatch.com/5/superhero/bootstrap.css" rel="stylesheet" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">


    <title>NBA</title>
    <style> 
    
 body, html{
            width: 100%;
            height: 100%;
            background-color: darkblue;
        }


    #MLinput{

height: calc(1.5em + .75rem + 2px);
font-size: 18px;
width: 50%;
font-weight: 700;
line-height: 1.5;
color: #347b8d;
background-color: #b7e1b3;
border: 4px inset #1F6767;

}

 #RLinput{
  
 display: flex;
width: 50%;
height: calc(1.5em + .75rem + 2px);
font-size: 18px;
font-weight: 700;
line-height: 1.5;
color: #00143f;
background-color: #f9ed9b;
border: 3px solid #b2b500;
transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}

 #OUinput{
  
 display: flex;
width: 50%;
height: calc(1.5em + .75rem + 2px);
font-size: 18px;
font-weight: 700;
line-height: 1.5;
color: #006218;
background-color: #add8e6;
border: 3px solid #00595c;
transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
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
@import url("https://fonts.googleapis.com/css?family=Oswald:300,700");
@import url('https://fonts.googleapis.com/css2?family=Bangers&family=Fjalla+One&family=Fredoka:wght@300&family=Lato:wght@700&family=Londrina+Solid&family=Oswald:wght@300&family=Teko:wght@600&display=swap');

@import url("https://fonts.googleapis.com/css?family=Oswald:300,700");
@import url('https://fonts.googleapis.com/css2?family=Bangers&family=Fjalla+One&family=Fredoka:wght@300&family=Lato:wght@700&family=Londrina+Solid&family=Oswald:wght@300&family=Teko:wght@600&display=swap');



  .level-item {

  display: flex;
  flex-basis: auto;
  flex-grow: 2;
  flex-shrink: 0;

}



#dropbar{
  padding-right:0px;
}




#ok {
 background-color:rgb(66, 240, 139,0.9);
  border-radius:0px 0px 0px 20px;
border: 6px outset rgb(194, 247, 161);
  font-family: "Trebuchet MS", Helvetica, sans-serif;
font-size: 18px;
letter-spacing: 2px;
word-spacing: 2px;
color: #FFFFFF;
font-weight: 700;
text-decoration: none;
font-style: normal;
font-variant: normal;

}
  #MLinput{

height: calc(1.5em + .75rem + 2px);
font-size: 18px;
width: 50%;
font-weight: 700;
line-height: 1.5;
color: #347b8d;
background-color: #b7e1b3;
border: 4px inset #1F6767;

}

#clear {
 background-color:rgb(240, 71, 71,0.9);
 border-radius:0px 0px 20px 0px;
border: 6px outset rgb(240, 71, 71);
font-family: "Trebuchet MS", Helvetica, sans-serif;
font-size: 18px;
letter-spacing: 2px;
word-spacing: 2px;
color: #000;
font-weight: 700;
text-decoration: none;
font-style: normal;
font-variant: normal;

  
}

#clear:hover {
 background-color:rgb(240, 71, 71,0.9);
 border-radius:0px 0px 20px 0px;
border: 6px inset rgb(240, 71, 71);
text-transform: uppercase;
  
}

#ok:hover {
 background-color:rgb(66, 240, 139,0.9);
  border-radius:0px 0px 0px 20px;
border: 6px inset rgb(194, 247, 161);
text-transform: uppercase;
  
}


.betslip-card {
background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(215,223,252,1) 0%, rgba(255,255,255,1) 0%, rgba(215,223,252,1) 84% );
border-radius: 1rem;
box-shadow: 0 0.5em 1em -0.125em rgba(10, 10, 10, 0.2), 0 0px 0 5px rgba(10, 10, 10, 0.2);
color: #fff;


 


 
}


/* card header is simply for colors for header-bg dont need extra params tehy should prob switch names */
.card-header {
  background-color:rgb(239, 248, 175,0.9);
box-shadow: 26px 7px 122px -43px rgba(0,122,161,0.7) inset;
-webkit-box-shadow: 26px 7px 122px -43px rgba(0,122,161,0.7) inset;
-moz-box-shadow: 26px 7px 122px -43px rgba(0,122,161,0.7) inset;}



.card-content {

    background-color: #111927;
    background-image: 
        radial-gradient(at 47% 33%, hsl(162.00, 77%, 40%) 0, transparent 59%), 
        radial-gradient(at 82% 65%, hsl(218.00, 39%, 11%) 0, transparent 55%);
  
  position:flex;
  width:100%;
  padding: 2px 16px;
}


.card-footer {
  background-color: transparent;
  border-top: 1px solid #ededed;
  align-items: stretch;
  display: flex; }

.content{
      backdrop-filter: blur(6px) saturate(180%);
    -webkit-backdrop-filter: blur(6px) saturate(180%);
    background-color: rgba(17, 25, 40, 0.8);
    border-radius: 12px;
    border: 1px solid rgba(255, 255, 255, 0.125);
    margin-top:10vh;
    padding: 2px 16px;
  
    
  

}

.header-bg{
  backdrop-filter: blur(5px);
  border: 5px groove;
  border-color: rgb(244, 227, 118, 0.8);
  border-style: inset;

  border-radius:50%;

  width:100%;
  z-index:1;
  padding-top:1vh;
  padding-bottom:1vh;
  padding-right:20vw;
  padding-left:0vw;
  overflow: hidden;
  
}


.header-bg p{
 color: black;
 margin-left:-1.2em;
text-align: center;
  font-size:0.8em;
  
 
}

.quick{
font-family: 'Lato', sans-serif;
line-height:15px;
font-size:1em;


  
 }
.linker{
  color: rgb(132, 204, 245, 0.8);
  cursor: pointer;
}

.linker:hover{
  color: #fff;
   cursor: pointer;
}


  

</style>

  </head>
  <?php include 'navbar.php';
  /*

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
*/

?>







  <div class="container is-fluid">
    
 
<div class="columns is-multiline is-centered">
      <?php for ($i = 0; $i < $CountKeys; ++$i) { ?>
        
 <div class="column is-full-mobile is-half-tablet is-one-third-desktop is-one-third-widescreen is-one-quarter-fullhd">
   <div class="betslip-card">
  <header class="card-header header-bg">
 <button type="button" id="slip0" onclick="slide(<?php echo $i;?>);" class="button card-header-icon is-small is-clickable">
  <i class="fas fa-angle-down" aria-hidden="true"></i></button>
    <div class="level-item">
   <img src="logos/nba/<?php echo $awayI[$i][0].'.png';?>" class="image is-48x48 mr-5 ml-auto">     
        <ul class="quick">
            <p>View: +140 / +7 </p>
            <p>W/L: 36-12</p>
            <p>Public: 26%</p>
      </ul>
   <img src="logos/nba/<?php echo $homeI[$i][0].'.png'; ?>" class="image is-48x48 ml-auto mr-5">
         <ul class="quick">
            <p>View: -110 / -7 </p>
            <p>W/L: 36-12</p>
            <p>Public: 56%</p>
        </ul>
      </div></header>
  <div class="card-content">

        <center>
      <?php $form[$i]->render();?>    
      </center>
     
      <a class="linker" href="#">#news</a>
      <br>
      <time datetime="<?php echo $ntime[$i];?>"><?php echo $ntime[$i];?> </time>
    </div>

    <footer class="card-footer">
        
        
    <a href="#" class="card-footer-item" id="ok">Submit</a>
    <a href="#" class="card-footer-item" id="clear">Clear</a>
  </footer>
  
  
</div>  </div>




<?php }; ?>


</div>
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
    $(`#nba${i}`).toggle();
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

  </body>

</html>


   
