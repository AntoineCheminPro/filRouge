<?php require "template/nav.php"; ?>
<?php require "template/header.php"; ?>
<?php require "accountModel.php"; ?>
<?php require "connexion.php"; ?>
<?php require "session.php"; ?>

<!-- set the main class for this page-->
<main class="container">

<?php 
$accountOperations = get_single_account($db,$_GET["id"]);
if ($accountOperations):
  ?>
  <!-- show the account -->
  <article class="card text-white bg-info my-4 px-0 col-4" style="max-width: 18rem;">
    <div class="card-header text-center"><?php echo $accountOperations[0]["account_type"]?> <?php echo $_SESSION["user"]["lastname"]. " ".$_SESSION["user"]["firstname"] ?></div>
    <div class="card-header text-center">Numéro : <?php echo $accountOperations[0]["id"]?></div>
    <div class="card-body bg-white">
      <h5 class="card-title text-warning text-center">Solde : <?php echo $accountOperations[0]["sold"] ?> €</h5>
      <p class="card-text text-dark">Sous reserve des opérations en cours de traitement.</p>
      <p class="card text-white bg-info p-2 col-12 text-center">Derniére(s) opération(s) :</p>
      <?php
      // Show the operations
    foreach ($accountOperations as $key => $value):
      ?>
      <p class="card-text text-dark p-1"><?php echo $accountOperations[$key]["label"]. " ".$accountOperations[$key]["operation_type"]. " ".$accountOperations[$key]["amount"]?></p>
    <?php endforeach; ?>
    </div>
  </article>

  <!-- In case of error on getting single account -->
<?php else: ?>
  <div class="alert alert-danger">
    <p>Nous avons rencontré un problème, aucun compte ne correspond à votre demande</p>
  </div>
<?php endif; ?>

  <?php require "template/footer.php"; ?>
