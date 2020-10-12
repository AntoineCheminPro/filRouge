<?php
include "view/template/nav.php";
include "view/template/header.php";
?>

<h2>Vos comptes bancaires</h2>
<div class="row mt-5">
  <?php foreach ($accounts as $account): ?>
  <div class="col-12 col-md-6 col-lg-4 my-2">
    <article class="card">
      <div class="card-header">
        <h5 class="card-title"><?php echo $account["account_type"]; ?></h5>
        <h6 class="card-subtitle mb-2 text-muted">Numéro de compte : <?php echo $account["id"]; ?></h6>
      </div>
      <div class="card-body">
        <ul class="list-group list-group-flush border-bottom mb-2">
          <li class="list-group-item">Propriétaire : <?php echo $_SESSION["user"]["firstname"] . " " . $_SESSION["user"]["lastname"]; ?></li>
          <li class="list-group-item">Solde : <?php echo $account["amount"]; ?></li>
          <li class="list-group-item">Dernière opération : <?php echo $account["label"] . " " . $account["operation_amount"] . " le " . $account["registered"]; ?></li>
        </ul>
        <a href="#" class="btn btn-info">Côturer</a>
        <a href="operation.php" class="btn btn-info">Dépot/retrait</a>
        <a href="single.php?id=<?php echo $account['id']; ?>" class="btn btn-info">Voir</a>
      </div>
    </article>
  </div>
<?php endforeach; ?>

</div>

<?php
 $script = "<script src='public/js/layer.js'></script>";
 include "view/template/footer.php";
?>
