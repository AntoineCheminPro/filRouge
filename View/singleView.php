<?php 
var_dump($accountOperations);
var_dump($account);

?>


  <!-- show the account -->
  <article class="card text-white bg-info my-4 px-0 col-4" style="max-width: 18rem;">
    <div class="card-header text-center"><?php echo $accountOperations->getAccount_type()?> <?php echo $_SESSION["user"]["lastname"]. " ".$_SESSION["user"]["firstname"] ?></div>
    <div class="card-header text-center">Numéro : <?php echo $accountOperations[0]["id"]?></div>
    <div class="card-body bg-white">
      <h5 class="card-title text-warning text-center">Solde : <?php echo $accountOperations[0]["sold"] ?> €</h5>
      <p class="card-text text-dark">Sous reserve des opérations en cours de traitement.</p>
      <p class="card text-white bg-info p-2 col-12 p-0 text-center">Derniére(s) opération(s) :</p>
      <?php foreach ($accountOperations as $key => $value):?>
        <p class="card-text text-dark p-1"><?php echo $accountOperations[$key]["label"]. " ".$accountOperations[$key]["operation_type"]. " ".$accountOperations[$key]["amount"]?></p>
      <?php endforeach; ?>
    </div>
    <form class="m-0 p-0" method="post" id="suppressAccount" name="suppAccount">
      <button type="submit" class="col-12 btn btn-danger btn-lg p-1 m-0 text-center" name="suppressAccount">Supprimer le compte</button>
    </form>
  </article>
    <!-- In case of error on getting single account -->

