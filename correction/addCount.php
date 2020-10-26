<?php
require "model/accountModel.php";

session_start();
if(!isset($_SESSION["user"])) {
  header("Location: login.php");
}

if(isset($_POST["new_account"])) {
  // Will store the different error messages
  $error = "";
  $authorized_accounts = ["Livret A", "PEL", "PEA", "PERP"];
  // Sanitize inputs to be displayed later
  $_POST = array_map("htmlspecialchars", $_POST);
  // If the account type is not in the authorized list add error message
  if(!in_array($_POST["account_type"], $authorized_accounts)) {
    $error .= "<li>Type de compte non reconnu</li>";
  }
  // Filter validation rules for amount
  $amount_options = [
    'options' => [
        'min_range' => 50
      ]
    ];
  // If amount is not a valid integer add error message
  if(!filter_var($_POST["amount"], FILTER_VALIDATE_INT, $amount_options)) {
    $error .= "<li>Montant minimum : 50 euros</li>";
  }
  // If no error has been found
  if(empty($error)) {
    // Add the account in DB
    $result = new_account($db, $_POST, $_SESSION["user"]);
    // If insert is a success redirect on home page
    if($result) {
      header("Location: index.php");
      exit();
    }
    $error = "Une erreur est survenue, votre compte n'a pas été enregistré";
  }
}

require "view/addCountView.php";
