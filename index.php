<?php require "template/nav.php"; ?>
<?php require "template/header.php"; ?>
<?php require_once "data/users.php"; ?>
<?php require_once "data/acounts.php"; ?>

<main class="container">

<div class="row justify-content-around">

<!-- start page by loading session -->
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

$userID= intval($_SESSION['user']["id"]);

// load user accounts from DB
$query = $db -> query(
  "SELECT * 
FROM User AS u
INNER JOIN Account AS a
ON u.id = a.user_id
WHERE u.id = $userID
"
);
// Extract data from query as an associative array (fetch quand 1 seul, renvoi un tableau associatif et non pas un tableau dans un tableau)
$accounts = $query -> fetchAll(PDO::FETCH_ASSOC);

// create an article for each account owned by user
foreach ($accounts as $key => $value): 
  $genre=($value['sex']=="h" ? "M" : "Mme");
  ?>

<article class="card text-white bg-info my-4 px-0 col-4" style="max-width: 18rem;">
  <div class="card-header text-center"><?php echo  $value["account_type"]?></div>
  <div class="card-header text-center"><?php echo $genre ." ".  $value["lastname"] . " " . $value["firstname"]?></div>
  <div class="card-header text-center">Numéro : <?php echo $value["id"]?></div>
  <div class="card-body bg-white">
    <h5 class="card-title text-warning text-center">Solde : <?php echo $value["amount"] ?> €</h5>
    <p class="card-text text-dark">Sous reserve des opérations en cours de traitement.</p>
    <div class="text-center">
      <a class="btn btn-warning text-center" href="single.php<?php echo "?id=".$value['id'];?>" >Consulter</a>
    </div>
  </div>
</article>

<?php endforeach ?>
</div>

<?php require "template/footer.php"; ?>
