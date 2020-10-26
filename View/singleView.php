


  <!-- show the account -->
  <article class="card text-white bg-info my-4 px-0 col-6" style="max-width: 30rem;">
    <div class="card-header text-center"><?php echo $account->getAccount_type()?> <?php echo $_SESSION["user"]["lastname"]. " ".$_SESSION["user"]["firstname"] ?></div>
    <div class="card-header text-center">Numéro : <?php echo $account->getId()?></div>
    <div class="card-body bg-white">
      <h5 class="card-title text-warning text-center">Solde : <?php echo $account->getAmount()?> €</h5>
      <p class="card-text text-dark">Sous reserve des opérations en cours de traitement.</p>
      <p class="card text-white bg-info p-2 col-12 p-0 text-center">Derniére(s) opération(s) :</p>
      <?php foreach ($operationsOfThisAccount as $operation):?>
        <p class="card-text text-dark p-1"><?php echo $operation->getLabel(). " ".$operation->getOperation_type(). " ".$operation->getAmount()?></p>
      <?php endforeach; ?>
    </div>
    <form class="m-0 p-0 row justify-content-center" method="post" id="operation" name="operations">
      <a type="submit" class="col-10 btn btn-warning btn-lg p-1 m-1 text-center border-1" name="operation" href="operation.php<?php echo "?id=".$account->getId();?>">Effectuer une opération</a>
    </form>
    <form class="m-0 p-0 row justify-content-center" method="post" id="suppressAccount" name="suppAccount">
      <button type="submit" class="col-10 btn btn-danger btn-lg p-1 m-1 text-center" name="suppressAccount">Supprimer le compte</button>
    </form>
  </article>
    <!-- In case of error on getting single account -->

