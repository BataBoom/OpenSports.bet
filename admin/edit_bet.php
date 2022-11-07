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
<?php require_once 'includes/admin_config.php'; ?>

<div class="column is-9">
                <?php
                   
                $slipID = $_REQUEST['id'];
                
$formatSlip = readBetslip("$slipID");
$username = $formatSlip[0]['username'];
$uid = $formatSlip[0]['userID'];
$amount = $formatSlip[0]['amount'];
$ratio = $formatSlip[0]['ratio'];
$gameid = $formatSlip[0]['gameid'];
$option = $formatSlip[0]['option'];
$league = $formatSlip[0]['league'];
$start = $formatSlip[0]['start'];
$cat = $formatSlip[0]['category_id'];
$status = $formatSlip[0]['win_status'];


?>
<section class="section">
     <h1 class="title">Edit Bet</h1>
       <h2 class="subtitle">Amount, Odds & Status is Editable</h2>
       <?php if (isset($_SESSION['edit_success'])){ ?>
       <div class="notification is-primary">
  <button class="delete"></button>
   <strong><?php echo $_SESSION['edit_success']; unset($_SESSION['edit_success']);?></strong>
</div>
<?php } ?>
      
         <form  action="forms/updateBet.php" method="post">
        <div class="field">
              <label class="label">BetID</label>
  <p class="control has-icons-left has-icons-right">
    <input class="input" name="id" type="id" placeholder="<?php echo $slipID;?>" value="<?php echo $slipID;?>" readonly>
    <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>
    <span class="icon is-small is-right">
      <i class="fas fa-check"></i>
    </span>
  </p>
</div>
<div class="field">
      <label class="label">User</label>
  <p class="control has-icons-left">
    <input class="input" type="username" placeholder="<?php echo $username;?>" value="<?php echo $username;?>" readonly>
    <span class="icon is-small is-left">
      <i class="fas fa-lock"></i>
    </span>
  </p>
   <p class="control has-icons-left">
    <input class="input" type="username" name="uid" placeholder="<?php echo $uid;?>" value="<?php echo $uid;?>" readonly>
    <span class="icon is-small is-left">
      <i class="fas fa-lock"></i>
    </span>
  </p>
</div>
<div class="field">
              <label class="label">Bet Amount</label>
  <p class="control has-icons-left has-icons-right">
    <input class="input" name="amount" type="number" placeholder="<?php echo $amount;?>" value="<?php echo $amount;?>" readonly>
    <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>
    <span class="icon is-small is-right">
      <i class="fas fa-check"></i>
    </span>
  </p>
</div>
  <div class="field">
              <label class="label">Game ID</label>
  <p class="control has-icons-left has-icons-right">
    <input class="input" type="id" placeholder="<?php echo $gameid;?>" value="<?php echo $gameid;?>" readonly>
    <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>
    <span class="icon is-small is-right">
      <i class="fas fa-check"></i>
    </span>
  </p>
</div>
  <div class="field">
              <label class="label">Bet Selection</label>
  <p class="control has-icons-left has-icons-right">
    <input class="input" type="id" placeholder="<?php echo $option;?>" value="<?php echo $option;?>" readonly>
    <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>
    <span class="icon is-small is-right">
      <i class="fas fa-check"></i>
    </span>
  </p>
</div>
 <div class="field">
              <label class="label">Bet Start</label>
  <p class="control has-icons-left has-icons-right">
    <input class="input" type="id" placeholder="<?php echo $start;?>">
    <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>
    <span class="icon is-small is-right">
      <i class="fas fa-check"></i>
    </span>
  </p>
</div>
<div class="field">
              <label class="label">Odds [include (-) for minus lines, don't include (+) for plus lines</label>
  <p class="control has-icons-left has-icons-right">
    <input class="input" type="id" name="odds" placeholder="<?php echo $ratio;?>" value="<?php echo $ratio;?>" readonly>
    <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>
    <span class="icon is-small is-right">
      <i class="fas fa-check"></i>
    </span>
  </p>
</div>
  <div class="field">
              <label class="label">Bet Status</label>
  <p class="control has-icons-left has-icons-right">
   
    <div class="select is-info">
  <select name="status">
    <option name="status"><?php echo $status;?></option>
    <option name="status">LOSE</option>
    <option name="status">WIN</option>
    <option name="status">NEW</option>
    <option name="status">GRADED</option>
  </select>
</div>
  </p>
</div>

<div class="field">
  <p class="control">
    <button class="button is-success">
      Update
    </button>
  </p>
</div>
</form>














                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        //X Notifys
        document.addEventListener('DOMContentLoaded', () => {
  (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
    const $notification = $delete.parentNode;

    $delete.addEventListener('click', () => {
      $notification.parentNode.removeChild($notification);
    });
  });
});
</script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script async type="text/javascript" src="../js/bulma.js"></script>
</body>

</html>