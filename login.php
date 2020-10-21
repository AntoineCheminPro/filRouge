<?php require "template/header.php"; ?>
<?php require "connexion.php"; ?>
<?php require "Model/userModel.php"; ?>

<main class="container">
<!-- set layer -->
<?php require "template/layer.php" ?>
<?php 



setLayer();
$userModel = new UserModel();
$user = $userModel->checkEmail(htmlspecialchars($_POST['email']));
// //  if a login form is submitted
if (!empty ($_POST) && isset($_POST["password"])) {
    
    if ($user) {
        // if an user has been found
        if(password_verify($_POST['password'], $user['password'])){
            var_dump($user['password']);
            // if pasword match
            session_start();
            $_SESSION['user']=$user;
            header("Location: index.php");
            exit();
        }
    }
}

include "View/loginView.php";
?>
<?php require "template/footer.php"; ?>

