<?php require "template/header.php"; ?>
<?php require_once "data/users.php"; ?>
<?php require_once "data/acounts.php"; ?>


<main class="container">
  <div id="layer">
  </div>
    <div id="overlay">
      <h2 class="center">Attention aux risques de fraudes</h2>
      <p id="textualWarning"></p>
      <button class="navbar-toggler bg-warning rounded-pill justify-content-around" onclick="off()">J'ai compris</button>
    </div>

<div class="row justify-content-around">
<?php $acounts = get_accounts(); ?>

<?php foreach ($acounts as $key => $value): ?>

<article class="card text-white bg-info my-4 px-0 col-4" style="max-width: 18rem;">
  <div class="card-header text-center"><?php echo $value["name"]?><br> <?php echo $value["owner"]?></div>
  <div class="card-header text-center">Numéro : <?php echo $value["number"]?></div>
  <div class="card-body bg-white">
    <h5 class="card-title text-warning text-center">Solde : <?php echo $value["amount"] ?> €</h5>
    <p class="card-text text-dark">Sous reserve des opérations en cours de traitement.</p>
    <p class="card-text text-dark">Derniére opération :<br> <?php echo $value["last_operation"]?></p>
    <div class="text-center">
      <a class="btn btn-warning text-center" href="<?php echo 'acountinfo.php?name='.$value["name"]
      .'</h1>&number='.$value["number"].'&lastop='.$value["last_operation"].'&owner='.$value["owner"].'&amount='.$value["amount"]?>">Consulter</a>
    </div>
  </div>
</article>

<?php endforeach ?>

<?php require "template/footer.php"; ?>
