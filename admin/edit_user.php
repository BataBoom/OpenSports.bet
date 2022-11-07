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
                   
                $userID = $_REQUEST['id'];
                
$readUserz = fetchAUser("$userID");
$username = $readUserz["account"]['username'];
$uid = $readUserz["account"]['id'];
$email = $readUserz["account"]['email'];
$verified = $readUserz["account"]['verified'];
date_default_timezone_get();
$created = date("F j, Y, @ g:i A ", $readUserz["account"]["created"]);
$updated = date("F j, Y, @ g:i A ", $readUserz["account"]["updated"]);
$balance = fetchBalance("$uid");
if($verified === false){
            $verified = "NO";
        } else {
            $verified = "YES";
        }      

?>
<section class="section">
  
     <h1 class="title">Edit <?php echo $username;?></h1>
       <h2 class="subtitle">Balance & Email is editable</h2>
       <?php if (isset($_SESSION['edit_success'])){ ?>
       <div class="notification is-primary">
  <button class="delete"></button>
   <strong><?php echo $_SESSION['edit_success']; unset($_SESSION['edit_success']);?></strong>
</div>
<?php } ?>
<button class="button is-rounded">Send Reset Email</button>
<button class="button is-link is-rounded">Send Verification Email</button>
<button class="button is-danger is-rounded">Log <?php echo $username;?> Out</button>
      
         <form  action="forms/updateUser.php" method="post">
        <div class="field">
              <label class="label">UserID</label>
  <p class="control has-icons-left has-icons-right">
    <input class="input" name="id" type="text" value="<?php echo $uid;?>" readonly>
    <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>
    <span class="icon is-small is-right">
      <i class="fas fa-check"></i>
    </span>
  </p>
</div>
<div class="field">
      <label class="label">Username</label>
  <p class="control has-icons-left">
    <input class="input" type="text" value="<?php echo $username;?>" readonly>
    <span class="icon is-small is-left">
      <i class="fas fa-lock"></i>
    </span>
  </p>
</div>
<div class="field">
              <label class="label">Email</label>
  <p class="control has-icons-left has-icons-right">
    <input class="input" name="email" type="text" value="<?php echo $email;?>">
    <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>
    <span class="icon is-small is-right">
      <i class="fas fa-check"></i>
    </span>
  </p>
</div>
  <div class="field">
              <label class="label">Created</label>
  <p class="control has-icons-left has-icons-right">
    <input class="input" type="text" value="<?php echo $created;?>" readonly>
    <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>
    <span class="icon is-small is-right">
      <i class="fas fa-check"></i>
    </span>
  </p>
</div>
  <div class="field">
              <label class="label">Updated</label>
  <p class="control has-icons-left has-icons-right">
    <input class="input" type="text" value="<?php echo $updated;?>" readonly>
    <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>
    <span class="icon is-small is-right">
      <i class="fas fa-check"></i>
    </span>
  </p>
</div>
 <div class="field">
              <label class="label">Verified</label>
  <p class="control has-icons-left has-icons-right">
    <input class="input" type="text" value="<?php echo $verified;?>" readonly>
    <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>
    <span class="icon is-small is-right">
      <i class="fas fa-check"></i>
    </span>
  </p>
</div>
<div class="field">
              <label class="label">Balance</label>
  <p class="control has-icons-left has-icons-right">
    <input class="input" type="number" name="balance" value="<?php echo $balance;?>">
    <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>
    <span class="icon is-small is-right">
      <i class="fas fa-check"></i>
    </span>
  </p>
</div>
<div class="field">
  <p class="control">
    <button class="button is-success">
      Edit User
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