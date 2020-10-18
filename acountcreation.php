<?php require "template/nav.php"; ?>
<?php require "template/header.php"; ?>
<?php require "connexion.php"; ?>
<?php require "session.php"; ?>
<?php require "Model/accountModel.php"; ?>

<!-- set the main class for this page-->
<main class="container">

<?php 
// set the requested infos by url 
$infos = ["typeOfAccount","amount"];
// test infos
foreach($infos as $key => $value) :
  $$value="donnée absente";
  if(isset($_POST[$value]) && !empty($_POST[$value])){
    $$value=htmlspecialchars($_POST[$value]);
}
endforeach;

include "View\acountCreationFormView.php";
include "View\acountCreationNewAccountView.php";

?>
  <?php require "template/footer.php"; ?>