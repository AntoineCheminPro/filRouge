<?php require "template/header.php"; ?>
<?php require_once "data/acounts.php"; ?>

<?php 

$content ="rien à afficher";

if(isset($_POST["my_btn"]) && !empty($_POST["my_btn"])) {
    $content = htmlspecialchars($_POST["my_btn"]);
}

$site_title="index";

?>

<main class="container">

<?php $acounts = get_accounts(); ?>

<article class="card text-white bg-info my-4 px-0 col-4" style="max-width: 18rem;">
  <div class="card-header text-center"><?php echo $value["name"]?> <?php echo $value["owner"]?></div>
  <div class="card-header text-center">Numéro : <?php echo $value["number"]?></div>
  <div class="card-body bg-white">
    <h5 class="card-title text-warning text-center">Solde : <?php echo $value["amount"] ?> €</h5>
    <p class="card-text text-dark">Sous reserve des opérations en cours de traitement.</p>
    <p class="card-text text-dark">Derniére opération : </p>
    <p class="card-text text-dark"><?php echo $value["last_operation"]?></p>
    <button type="button" name="my_btn" value="consulter" class="btn btn-warning">Consulter</button>
  </div>
</article>

  <?php require "template/footer.php"; ?>
