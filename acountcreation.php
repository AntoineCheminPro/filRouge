<?php require "template/nav.php"; ?>
<?php require "template/header.php"; ?>


<!-- set the main class for this page-->
<main class="container">

<?php 
session_start();

// connect to database
try{
  $db = new PDO('mysql:host=localhost;dbname=banque_php', 'BanquePHP', 'banque76');

} catch (PDOException $e){
  print "Erreur !: " . $e->getMessage() . "<br/>";
  die();
}

// set the requested infos by url 
$infos = ["typeOfAccount","amount"];

// test infos
foreach($infos as $key => $value) :
  $$value="donnée absente";
  if(isset($_POST[$value]) && !empty($_POST[$value])){
    $$value=htmlspecialchars($_POST[$value]);
}
endforeach;

?>
<section class="row">
  <form action="" method="post" class="col-8" id="createAccount" name="createAccount">
    <div class="form-row">
      <div class="form-group col-md-8">
      <p class="mt-3 text-center">Titulaire : <?php echo $_SESSION["user"]["lastname"]. " ".$_SESSION["user"]["firstname"] ?></p>
        <label for="inputState">Type de compte</label>
        <select id="inputState" class="form-control" name="typeOfAccount">
          <option selected>Compte courant</option>
          <option>Compte commun</option>
          <option>Livret A</option>
          <option>Livret B</option>
          <option>P E L</option>
          <option>P E A</option>
          <option>P E R</option>
        </select>
      </div>
      <div class="form-group col-md-8">
        <label>Montant déposé (€)</label>
        <input type="number" class="form-control" name="amount" placeholder="50 minimum">
        <button type="submit" class="btn btn-warning text-center mt-3" >Créer le compte</button>
      </div>
    </div>
  </form>
</section>

<?php 

$user_id = $_SESSION["user"]["id"];
$queryAccountType = $db ->query(
  "SELECT account_type
  FROM Account
  WHERE user_id = $user_id 
  "
);
$accountsOwned = $queryAccountType -> fetchAll(PDO::FETCH_ASSOC);



  if(isset($_POST)&& !empty($_POST)){
    foreach($accountsOwned as $key => $value){
      $doublon=false;
      if(in_array($_POST["typeOfAccount"],$value)){
        $doublon=true;
      }
    }
    if (intval($_POST["amount"])<50){
      ?>
      <p class="btn-danger col-3 text-center"> <?php  echo "montant minimum 50 euros"; ?></p>
     <?php
    } 
    elseif ( (($_POST["typeOfAccount"] !== "Compte courant") || ($_POST ["typeOfAccount"] !== "Compte commun")) && $doublon ) {
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

// var_dump($_SESSION["user"]["id"]);
      $query = $db ->prepare(
        "INSERT INTO Account(amount, opening_date, account_type, user_id)
        VALUES (:amount,  NOW(), :account_type,:id)"
    );
    // execution de la requête avec les valeurs récuoérées par la session et le POST
    $result = $query->execute([
        "amount" => $_POST["amount"],
        "account_type" => $_POST["typeOfAccount"],
        "id" => $_SESSION["user"]["id"]
        ]);
    }
}
?>
  <?php require "template/footer.php"; ?>