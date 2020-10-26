<?php

include "template/nav.php";
include "template/header.php";

// if no error deteted
if(!isset($error)):
?>
    <h2>Détails du compte : </h2>
    <div class="row mt-5">
      <div class="col-12 col-md-6 col-lg-4">
        <article class="card">
          <div class="card-header">
            <h5 class="card-title"><?php echo $account["account_type"]; ?></h5>
            <h6 class="card-subtitle mb-2 text-muted">Numéro de compte : <?php echo $account["id"]; ?></h6>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush border-bottom mb-2">
              <li class="list-group-item">Propriétaire : <?php echo $_SESSION["user"]["firstname"] . " " . $_SESSION["user"]["lastname"]; ?></li>
              <li class="list-group-item">Solde : <?php echo $account["amount"]; ?></li>
              <li class="list-group-item">Date d'ouverture : <?php echo $account["opening_date"]; ?></li>
            </ul>
            <a href="#" class="btn btn-info">Côturer</a>
            <a href="operation.php" class="btn btn-info">Dépot/retrait</a>
            <a href="#" class="btn btn-info">Voir</a>
          </div>
        </article>
      </div>
      <div class="col-12 col-md-6 col-lg-8">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Label</th>
              <th scope="col">Date</th>
              <th scope="col">Type</th>
              <th scope="col">Montant</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($operations as $operation) : ?>
              <tr>
                <th><?php echo $operation["operation_id"]; ?></th>
                <td><?php echo $operation["label"]; ?></td>
                <td><?php echo $operation["registered"]; ?></td>
                <td><?php echo $operation["operation_type"]; ?></td>
                <td><?php echo $operation["operation_amount"]; ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
<?php else: ?>
  <div class="alert alert-danger">
    <p><?php echo $error ?></p>
  </div>
<?php endif; ?>

<?php include "template/footer.php"; ?>
