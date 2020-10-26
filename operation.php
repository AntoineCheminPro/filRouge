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
  include "View/operationView.php";
}
else{ 
?>
    <div class="alert alert-danger">
      <p>Nous avons rencontré un problème, aucun compte ne correspond à votre demande</p>
    </div>
<?php
}
if (isset($_POST) && !empty($_POST)){
  $NewOperation = new OperationModel();
  if ($_POST["typeOfOperation"] == "Dépot"){
    $operation = $NewOperation->create_deposit($_GET["id"]);
    $account =$accounts->account_deposit($_GET["id"]);
  }
  else {
    $operation = $NewOperation->create_bank_withdrawal($_GET["id"]);
    $account =$accounts->account_bank_withdrawal($_GET["id"]);
  }
}

require "template/footer.php"; 
