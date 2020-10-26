<?php
require "connexion.php";
abstract class DBManager {

  private PDO $_db;

  public function setDB(PDO $connect){
      $this->_db =$connect;
  }
  public function getDB():PDO{
      return $this->_db;
  }
  function __construct()
  {
      $this->setDB(dataBase::DB());
  }
}