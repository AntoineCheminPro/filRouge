<?php
require "model/accountModel.php";
// Check if user is logged
session_start();
if(!isset($_SESSION["user"])) {
  header("Location: login.php");
}

// Get all the accounts with the last operation
$accounts = get_accounts($db, $_SESSION["user"]);

require "view/indexView.php";
?>
