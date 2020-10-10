<?php require "template/nav.php"; ?>
<?php require "template/header.php"; ?>

<?php require "data/acounts.php"; ?>
<!-- set the main class for this page-->
<main class="container">
<?php 
session_start();
if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
    header("Location: login.php");
}

// connect to database
try{
    $db = new PDO('mysql:host=localhost;dbname=banque_php', 'BanquePHP', 'banque76');

} catch (PDOException $e){
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

$accountNumber = $_GET["id"];

// send the query to mysql
$query = $db -> query(
    "SELECT a.id, a.amount, o.id, o.operation_type, a.account_type, o.amount, o.label 
    FROM Account AS a
    LEFT JOIN Operation AS o
    ON a.id = o.account_id
    WHERE a.id = $accountNumber
");


// Extract data from query as an associative array (fetch quand 1 seul, renvoi un tableau associatif et non pas un tableau dans un tableau)
$accountOperations = $query -> fetchAll(PDO::FETCH_ASSOC);
// var_dump($accountOperations);


  if ($accountOperations):
    ?>
    <!-- show the account -->
    <article class="card text-white bg-info my-4 px-0 col-4" style="max-width: 18rem;">
      <div class="card-header text-center"><?php echo $accountOperations[0]["account_type"]?> <?php echo $_SESSION["user"]["lastname"]. " ".$_SESSION["user"]["firstname"] ?></div>
      <div class="card-header text-center">Numéro : <?php echo $accountOperations[0]["id"]?></div>
      <div class="card-body bg-white">
        <h5 class="card-title text-warning text-center">Solde : <?php echo $accountOperations[0]["amount"] ?> €</h5>
        <p class="card-text text-dark">Sous reserve des opérations en cours de traitement.</p>
        <?php
      foreach ($accountOperations as $key => $value):
        ?>
        <p class="card-text text-dark">Derniére(s) opération(s) : <?php echo $accountOperations[$key]["label"]. " ".$accountOperations[$key]["operation_type"]. " ".$accountOperations[$key]["amount"]?></p>
      <?php endforeach; ?>
      </div>
    </article>
  <?php else: ?>
    <div class="alert alert-danger">
      <p>Nous avons rencontré un problème, aucun compte ne correspond à votre demande</p>
    </div>
  <?php endif; ?>

  <?php require "template/footer.php"; ?>
