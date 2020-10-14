<?php require "session.php"; ?>
<?php require "connexion.php"; ?>
<?php require_once "data/users.php"; ?>
<?php require "accountModel.php"; ?>
<!-- template -->
<?php require "template/nav.php"; ?>
<?php require "template/header.php"; ?>

<main class="container">
<div class="row justify-content-around">

<!-- start page by loading session -->
<?php 

$userID= intval($_SESSION['user']["id"]);
$accounts = get_accounts($db, $_SESSION['user']);

// create an article for each account owned by user
foreach ($accounts as $key => $value): 
  $genre=($value['sex']=="h" ? "M" : "Mme");

  ?>
<article class="card text-white bg-info my-4 px-0 col-4" style="max-width: 18rem;">
  <div class="card-header text-center"><?php echo  $value["account_type"]?></div>
  <div class="card-header text-center"><?php echo $genre ." ".  $value["lastname"] . " " . $value["firstname"]?></div>
  <div class="card-header text-center">Numéro : <?php echo $value["id"]?></div>
  <div class="card-body bg-white">
    <h5 class="card-title text-warning text-center">Solde : <?php echo $value["amount"] ?> €</h5>
    <p class="card-text text-dark">Sous reserve des opérations en cours de traitement.</p>
    <div class="text-center">
      <a class="btn btn-warning text-center" href="single.php<?php echo "?id=".$value['id'];?>" >Consulter</a>
    </div>
  </div>
</article>

<?php endforeach ?>
</div>

<?php require "template/footer.php"; ?>
