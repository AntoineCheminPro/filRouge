<?php require "template/nav.php"; ?>
<?php require "template/header.php"; ?>
<?php require "template/nav.php"; ?>


<!-- set the main class for this page-->
<main class="container">

<?php 

// set the requested infos by url 
$infos = ["firstname","lastname","typeOfAccount","amount"];

// test infos
foreach($infos as $key => $value) :
  $$value="donnée absente";
  if(isset($_POST[$value]) && !empty($_POST[$value])){
    $$value=htmlspecialchars($_POST[$value]);
}
endforeach;
?>

<section class="row">
  <form action="" method="post" class="col-8" id="createAcount" name="createAcount">
    <div class="form-row">
      <div class="form-group col-md-8">
        <label>Nom</label>
        <input type="text" name="firstname" class="form-control" placeholder="Nom">
      </div>
    </div>
    <div class="form-group col-md-8">
      <label>Prénom</label>
      <input type="text" class="form-control" name="lastname" placeholder="Prénom">
    </div>
    <div class="form-group col-md-8">
      <label for="inputState">Type de compte</label>
      <select id="inputState" class="form-control" name="typeOfAccount">
        <option selected>Compte courant</option>
        <option>compte commun</option>
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
    </div>
    <button type="submit" class="btn btn-warning text-center" name="createAcount">Créer le compte</button>
</form>

<?php 
  if(isset($_POST["createAcount"])){ 
    ?>
    <!-- show the account -->
    <article class="card text-white bg-info my-4 px-0 col-3" style="max-width: 18rem;">
    <div class="card-header text-center"><?php echo $typeOfAccount?></div>
      <div class="card-header text-center"><?php echo $firstname?> <?php echo $lastname?></div>
      <div class="card-body bg-white">
        <h5 class="card-title text-warning text-center">Solde : <?php echo $amount ?> €</h5>
      </div>
    </article>
  </section> 
<?php
}
?>
  <?php require "template/footer.php"; ?>