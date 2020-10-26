<?php
// Model class to host a database connection as a PDO object
require "connexion.php";

abstract class Model {
  protected PDO $db;

  public function __construct() {
      $this->db = Connexion::getPDOConnexion();
  }
}

 ?>
