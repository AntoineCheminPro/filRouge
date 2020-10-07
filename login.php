<?php require "template/header.php"; ?>
<?php require_once "data/users.php"; ?>
<?php require_once "data/acounts.php";?>

<main class="container">
<!-- set layer -->
<div id="layer"></div>
<div id="overlay">
  <h2 class="center">Attention aux risques de fraudes</h2>
  <p id="textualWarning"></p>
  <button class="navbar-toggler bg-warning rounded-pill justify-content-around" onclick="off()">J'ai compris</button>
</div>

<?php 
//  if a login form is submitted
if (!empty ($_POST) && isset($_POST["login"])) {
    // connect to database
    try{
        $db = new PDO('mysql:host=localhost;dbname=banque_php', 'BanquePHP', 'banque76');
    
    } catch (PDOException $e){
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
    // never trust user input -> preparer la requête
    $query = $db->prepare(
        "SELECT * FROM User
        WHERE email = :email"
    );
    $query->execute([
        "email" => $_POST['email']
    ]);
    $user = $query ->fetch (PDO::FETCH_ASSOC);
    if ($user) {
        // if an user has been found
        if(password_verify($_POST['password'], $user['password'])){
            //if pasword match
            session_start();
            $_SESSION['user']=$user;
            header("Location: index.php");
        }
    }
}
?>

<!-- set login form -->
<div class="offset-4 col-4 margin-auto">
  <form class="px-4 py-3" method="post">
    <div class="form-group">
      <label>Adresse Mail</label>
      <input type="email" class="form-control" name="email" placeholder="email@exemple.com">
    </div>
    <div class="form-group">
      <label>Mot de passe</label>
      <input type="password" class="form-control" name="password" placeholder="Mot de passe">
    </div>
    <div class="dropdown-divider container"></div>
      <button type="submit" name="login" class="bg-warning rounded-pill p-2 col-5">Se connecter</button>
      <button class="bg-warning rounded-pill p-2 col-5" href="#">S'inscrire</button>
  </div>
  </form>

<?php require "template/footer.php"; ?>
<script src="js/main2.js"></script>
