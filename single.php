<?php require "template/header.php"; ?>
<?php require "data/acounts.php"; ?>
<!-- set the main class for this page-->
<main class="container">

<?php

// test infos
if(!empty($_GET)):
  $position = htmlspecialchars($_GET["id"]);
  $account = get_accounts()[$position];
  if ($account):
    ?>
    <!-- show the account -->
    <article class="card text-white bg-info my-4 px-0 col-4" style="max-width: 18rem;">
      <div class="card-header text-center"><?php echo $account["name"]?> <?php echo $account["owner"]?></div>
      <div class="card-header text-center">Numéro : <?php echo $account["number"]?></div>
      <div class="card-body bg-white">
        <h5 class="card-title text-warning text-center">Solde : <?php echo $account["amount"] ?> €</h5>
        <p class="card-text text-dark">Sous reserve des opérations en cours de traitement.</p>
        <p class="card-text text-dark">Derniére opération : <?php echo $account["last_operation"]?></p>
      </div>
    </article>
  <?php endif; ?>
<?php else: ?>
  <div class="alert alert-danger">
    <p>Nous avons rencontré un problème, aucun compte ne correspond à votre demande</p>
  </div>
<?php endif; ?>

  <?php require "template/footer.php"; ?>
