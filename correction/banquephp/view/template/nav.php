<!doctype html>
<html class="no-js" lang="fr">

<head>
  <meta charset="utf-8">
  <title>Projet banque</title>
  <meta name="description" content="Gérer vos comptes facilement et rapidement">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Alata&family=Comfortaa&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="public/css/main.css">

  <meta name="theme-color" content="#fafafa">
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-info fixed-top">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link text-white" href="index.php">Accueil</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link text-white dropdown-toggle" href="#" id="operations" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Opération
          </a>
          <div class="dropdown-menu" aria-labelledby="operations">
            <a class="dropdown-item" href="addCount.php">Nouveau compte</a>
            <a class="dropdown-item" href="operation.php">Retrait/depôt</a>
            <a class="dropdown-item" href="transfer.php">Virement</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="statistic.php">Statistiques</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="blog.php">Actualités</a>
        </li>
      </ul>
    </div>
    <aside class="text-white">
      <?php
        if(isset($_SESSION) && isset($_SESSION["user"])) {
          echo $_SESSION["user"]->getFirstname() . " " . $_SESSION["user"]->getLastname();
          echo "<a href='logout.php' class='btn btn-secondary mx-1'>Deconnexion</a>";
        }
      ?>
    </aside>
  </nav>
