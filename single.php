<?php require "template/nav.php"; ?>
<?php require "template/header.php"; ?>
<?php require "Model/accountModel.php"; ?>
<?php require "connexion.php"; ?>
<?php require "session.php"; ?>

<!-- set the main class for this page-->
<main class="container">

<?php 
$accountOperations = get_single_account($db,$_GET["id"],$_SESSION["user"]);
if ($accountOperations[0]){
  include "View/singleView.php";
}
else{ 
?>
    <div class="alert alert-danger">
      <p>Nous avons rencontré un problème, aucun compte ne correspond à votre demande</p>
    </div>
<?php
  }

if (isset($_POST["suppressAccount"]) && !empty($_POST)){
  suppressAccount($db, intval($accountOperations[0]["id"]));
  header("Location: index.php");
  exit();
}
?>
  <?php require "template/footer.php"; ?>
