<?php require "session.php"; ?>
<?php require "Model/accountModel.php"; ?>

<!-- template -->
<?php require "template/nav.php"; ?>
<?php require "template/header.php"; ?>


<main class="container">
<div class="row justify-content-around">

<!-- start page by loading session -->
<?php 

$userModel = new UserModel();
$user = $userModel->getUser(intval($_SESSION['user']));

$accountsArray = new AccountModel();
$accounts = $accountsArray->get_accounts($user);


include "View/indexView.php";

?>

<?php require "template/footer.php"; ?>
