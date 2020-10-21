<?php require "template/nav.php"; ?>
<?php require "template/header.php"; ?>
<?php require "Model/accountModel.php"; ?>
<?php require "session.php"; ?>

<!-- set the main class for this page-->
<main class="container">

<?php 
$accounts = new AccountModel();
$accountOperations =$accounts->get_single_account($_GET["id"],$_SESSION["user"]);
if ($accountOperations){
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
  $accounts->suppress_account(intval($accountOperations[0]["id"]));
  header("Location: index.php");
  exit();
}
?>
  <?php require "template/footer.php"; ?>
