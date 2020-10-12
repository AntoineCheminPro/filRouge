<?php include "template/nav.php"; ?>
<?php include "template/header.php"; ?>

<h2>L'économie en bref</h2>
<table class="table table-striped mt-3">
  <thead class="bg-info text-white">
    <tr>
      <th scope="col">Indicateur</th>
      <th scope="col">Valeur</th>
      <th scope="col">Variation</th>
    </tr>
  </thead>
  <tbody id="statTable">
  </tbody>
</table>

<?php
$script = "<script src='public/js/statistic.js'></script>";
include "template/footer.php";
?>
