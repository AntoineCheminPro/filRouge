?>
<section class="row">
  <form action="" method="post" class="col-8" id="createAccount" name="createAccount">
    <div class="form-row">
      <div class="form-group col-md-8">
      <p class="mt-3 text-center">Titulaire : <?php echo $_SESSION["user"]["lastname"]. " ".$_SESSION["user"]["firstname"] ?></p>
        <label for="inputState">Type de compte</label>
        <select id="inputState" class="form-control" name="typeOfAccount">
          <option selected>Compte courant</option>
          <option>Compte commun</option>
          <option>Livret A</option>
          <option>Livret B</option>
          <option>P E L</option>
          <option>P E A</option>
          <option>P E R</option>
        </select>
      </div>
      <div class="form-group col-md-8">
        <label>Montant déposé (€)</label>
        <input type="number" class="form-control" name="amount" placeholder="50 minimum">
        <button type="submit" class="btn btn-warning text-center mt-3" >Créer le compte</button>
      </div>
    </div>
  </form>
</section>
<?php

