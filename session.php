<?php 
require "Model/userModel.php";
require  "Model/entities/userClass.php";
session_start();

if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

