      <p class="btn-success col-3 text-center"> <?php  echo "compte créé avec succés !"; ?></p>
     
      <!-- show the account -->
      <article class="card text-white bg-info my-4 px-0 col-3" style="max-width: 18rem;">
      <div class="card-header text-center"><?php echo $created_account->getAccount_type()?></div>
        <div class="card-header text-center"><?php echo $_SESSION["user"]["lastname"]. " ".$_SESSION["user"]["firstname"] ?></div>
        <div class="card-body bg-white">
          <h5 class="card-title text-warning text-center">Solde : <?php echo $created_account->getAmount()?> €</h5>
        </div>
      </article>
