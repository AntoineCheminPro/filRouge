<?php require "session.php"; ?>
<?php require "connexion.php"; ?>
<?php require_once "data/users.php"; ?>
<?php require "Model/accountModel.php"; ?>
<!-- template -->
<?php require "template/nav.php"; ?>
<?php require "template/header.php"; ?>

<main class="container">
<div class="row justify-content-around">

<!-- start page by loading session -->
<?php 

$accounts = get_accounts($db, $_SESSION['user']);

include "View/indexView.php";

?>

<?php require "template/footer.php"; ?>
