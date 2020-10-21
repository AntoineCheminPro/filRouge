<?php require "template/header.php"; ?>
<!-- <?php require_once "data/users.php"; ?> -->
<?php require "connexion.php"; ?>

<main class="container">
<!-- set layer -->
<?php require "template/layer.php" ?>
<?php 

setLayer();
//  if a login form is submitted
if (!empty ($_POST) && isset($_POST["login"])) {
    // never trust user input -> preparer la requête
    $query = $db->prepare(
        "SELECT id, email, password, lastname, firstname, sex FROM User
        WHERE email = :email"
    );
    $query->execute([
        "email" => $_POST['email']
    ]);
    $user = $query ->fetch (PDO::FETCH_ASSOC);
    if ($user) {
        // if an user has been found
        if(password_verify($_POST['password'], $user['password'])){
            //if pasword match
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

