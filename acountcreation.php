<?php require "template/nav.php"; ?>
<?php require "template/header.php"; ?>
<?php require "session.php"; ?>
<?php require "Model/accountModel.php"; ?>

<!-- set the main class for this page-->
<main class="container">

<?php 
// set the requested infos by url 

include "View\acountCreationFormView.php";
include "View\acountCreationNewAccountView.php";

?>
  <?php require "template/footer.php"; ?>