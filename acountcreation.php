<?php require "template/nav.php"; ?>
<?php require "template/header.php"; ?>
<?php require "session.php"; ?>
<?php require "Model/accountModel.php"; ?>

<!-- set the main class for this page-->
<main class="container">

<?php 
// set the requested infos by url 

include "View/acountCreationFormView.php";

$userID = $_SESSION["user"]["id"];
$account = new AccountModel();
$accountsOwned =$account->get_accounts_types($userID);

if(isset($_POST)&& !empty($_POST)){
    $doublon=false;
    foreach($accountsOwned as $key => $value){
      if(in_array($_POST["account_type"],$value)){
        $doublon=true;
      }
    }
    if (intval($_POST["amount"])<50){
      ?>
      <p class="btn-danger col-3 text-center"> <?php  echo "montant minimum 50 euros"; ?></p>
     <?php
    } 
    elseif (($_POST["account_type"] !== "Compte courant") && ($_POST ["account_type"] !== "Compte commun") && $doublon ) {
      ?>
      <p class="btn-danger col-3 text-center"> <?php  echo "Vous ne pouvez pas posséder plusieurs comptes de ce type"; ?></p>
     <?php
    }
    else {
      $data = $_POST;
      $data["user_id"]=$userID;
      $created_account = new Account ($data);
      $accountCreation = $account->create_account($created_account);
    
      include "View/acountCreationNewAccountView.php";

    }
}
?>
  <?php require "template/footer.php"; ?>