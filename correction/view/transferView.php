<?php include "template/nav.php"; ?>
<?php include "template/header.php"; ?>

<h2>Effectuer un virement</h2>
<form class="mt-5 fullForm" method="post" action="">
  <div class="form-group">
    <label for="debit">Compte à débiter</label>
    <select class="form-control" id="debit" name="debit">
      <option value="courant">Courant</option>
      <option value="livreta">Livret A</option>
      <option value="pel">PEL</option>
      <option value="pea">PEA</option>
      <option value="perp">PERP</option>
    </select>
  </div>
  <div class="form-group">
    <label for="credit">Compte à créditer</label>
    <select class="form-control" id="credit" name="credit">
      <option value="courant">Courant</option>
      <option value="livreta">Livret A</option>
      <option value="pel">PEL</option>
      <option value="pea">PEA</option>
      <option value="perp">PERP</option>
    </select>
  </div>
  <div class="form-group">
    <label for="amount">Montant en euros</label>
    <input type="number" name="amount" id="amount" min="0" value="0">
  </div>
  <div class="text-center">
    <button type="submit" class="btn btn-info">Exécuter</button>
  </div>
</form>

<?php include "template/footer.php"; ?>
