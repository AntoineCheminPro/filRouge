<?php

abstract class Connexion {
  const HOST = "localhost";
  const DBNAME = "banque_php";
  const USER = "BanquePHP";
  const PASSWORD = "banque76";

  public static function getPDOConnexion() {
    try {
      $db = new PDO("mysql:host=" . self::HOST . ";dbname=" . self::DBNAME, self::USER, self::PASSWORD);
      return $db;
    } catch (\Exception $e) {
      echo "Erreur lors de la connexion à la base de donée: " . $e->getMessage() . "<br/>";
      die();
    }
  }

}

try {
  $db = new PDO('mysql:host=localhost;dbname=banque_php', "BanquePHP", "banque76");
  return $db;
} catch (\Exception $e) {
  echo "Erreur lors de la conenxion à la base de donée: " . $e->getMessage() . "<br/>";
  die();
}
