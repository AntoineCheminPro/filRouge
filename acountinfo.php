<?php require "template/header.php"; ?>
<!-- set the main class for this page-->
<main class="container">

<?php
// set the requested infos by url
$infos = ["name","owner","number","amount","lastop"];

// test infos
foreach($infos as $key => $value) :
  $$value="donnée manquante";
  if(isset($_GET[$value]) && !empty($_GET[$value])){
    $$value=htmlspecialchars($_GET[$value]);
}
endforeach
?>

<!-- show the account -->
<article class="card text-white bg-info my-4 px-0 col-4" style="max-width: 18rem;">
  <div class="card-header text-center"><?php echo $name?> <?php echo $owner?></div>
  <div class="card-header text-center">Numéro : <?php echo $number?></div>
  <div class="card-body bg-white">
    <h5 class="card-title text-warning text-center">Solde : <?php echo $amount ?> €</h5>
    <p class="card-text text-dark">Sous reserve des opérations en cours de traitement.</p>
    <p class="card-text text-dark">Derniére opération : <?php echo $lastop?></p>
  </div>
</article>


  <?php require "template/footer.php"; ?>
