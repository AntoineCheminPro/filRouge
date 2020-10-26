<?php
include "view/template/nav.php";
include "view/template/header.php";
?>

<h2>Vous connectez</h2>
  <form action="" method="POST" class="w-75 mx-auto">
    <?php if(isset($error)){ echo "<div class='alert alert-danger'>$error</div>"; }?>
    <div class="form-group">
      <label for="mail">Votre email</label>
      <input type="email" class="form-control" id="mail" aria-describedby="emailHelp" name="email">
      <small id="emailHelp" class="form-text text-muted">Votre email d'inscription</small>
    </div>
    <div class="form-group">
      <label for="password">Mot de passe</label>
      <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="text-center">
      <button type="submit" name="connexion" value="connexion" class="btn btn-success">Connection</button>
    </div>
  </form>

<?php
 include "view/template/footer.php";
?>
