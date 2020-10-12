<?php
include "template/nav.php";
include "template/header.php";
?>

<h2>Ouvrir un compte</h2>
<div class="row my-5">
  <div class="col-12 offset-md-2 col-md-8">
    <?php
      if(!empty($error)) {
        echo "<div class='alert alert-danger'><p>Erreur : </p><ul>$error</ul></div>";
      }
    ?>
    <form class="" method="post" action="">
      <div class="form-group">
        <label for="countType">Type de compte</label>
        <select class="form-control" id="countType" name="account_type">
          <option selectd value="Compte courant">Courant</option>
          <option value="Livret A" selected>Livret A</option>
          <option value="PEL">PEL</option>
          <option value="PEA">PEA</option>
          <option value="PERP">PERP</option>
        </select>
    </div>
    <div class="form-group">
      <label for="amount">Montant à l'ouverture</label>
      <input type="number" name="amount" id="amount" min="50">
    </div>
    <div class="text-center">
      <button name="new_account" type="submit" class="btn btn-info">Ouvrir</button>
    </div>
    </form>
  </div>
</div>

<?php include "template/footer.php"; ?>
