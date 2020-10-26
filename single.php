<?php require "template/nav.php"; ?>
<?php require "template/header.php"; ?>
<?php require_once "Model/accountModel.php"; ?>
<?php require_once "Model/operationModel.php"; ?>

<?php require_once "session.php"; ?>

<!-- set the main class for this page-->
<main class="container">

<?php 
$accounts = new AccountModel();
$account =$accounts->get_single_account($_GET["id"],$_SESSION["user"]);
$operations = new OperationModel();
$operationsOfThisAccount = $operations->get_operations($account);
if ($account){
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
  $accounts->suppress_account(intval($account->getId()));
  header("Location: index.php");
  exit();
}
?>
  <?php require "template/footer.php"; ?>
