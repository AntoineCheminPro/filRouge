
<?php

$userID = $_SESSION["user"]["id"];
$account = new AccountModel();
$accountsOwned =$account->get_accounts_types($userID);

if(isset($_POST)&& !empty($_POST)){
    $doublon=false;
    foreach($accountsOwned as $key => $value){
      if(in_array($_POST["typeOfAccount"],$value)){
        $doublon=true;
      }
    }
    if (intval($_POST["amount"])<50){
      ?>
      <p class="btn-danger col-3 text-center"> <?php  echo "montant minimum 50 euros"; ?></p>
     <?php
    } 
    elseif (($_POST["typeOfAccount"] !== "Compte courant") && ($_POST ["typeOfAccount"] !== "Compte commun") && $doublon ) {
      ?>
      <p class="btn-danger col-3 text-center"> <?php  echo "Vous ne pouvez pas posséder plusieurs comptes de ce type"; ?></p>
     <?php
    }

    else {
      ?>
      <p class="btn-success col-3 text-center"> <?php  echo "compte créé avec succés !"; ?></p>
     
      <!-- show the account -->
      <article class="card text-white bg-info my-4 px-0 col-3" style="max-width: 18rem;">
      <div class="card-header text-center"><?php echo $typeOfAccount?></div>
        <div class="card-header text-center"><?php echo $_SESSION["user"]["lastname"]. " ".$_SESSION["user"]["firstname"] ?></div>
        <div class="card-body bg-white">
          <h5 class="card-title text-warning text-center">Solde : <?php echo $amount ?> €</h5>
        </div>
      </article>
      <?php

    $created_account = $account->create_account($userID);
    }
}
?>
  