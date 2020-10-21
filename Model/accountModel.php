<?php
require "DBManager.php";
require "Model/entities/accountClass.php";
class AccountModel extends DBManager
{
   
  function get_accounts (array $user):array{
  // load user accounts from DB
    $query = $this->getDB()->prepare(
      "SELECT * 
        FROM Account
        WHERE user_id = :user_id
    ");
    $query -> execute([
    "user_id" => $user["id"]
    ]);
  // Extract data from query as an associative array
  $accounts =$query -> fetchAll(PDO::FETCH_ASSOC);
    //On transforme alors chaque entrée du tableau en objet account en l'hydratant
    // ce qui permet de passer les valeurs aux setter (verifications)
   
    foreach ($accounts as $key => $account) {
      $accounts[$key] = new account($account);
    }
  return $accounts;
  }

  function get_single_account (int $accountID, $user){
  // load selected account from db
    $query = $this->getDB() -> prepare(
        "SELECT *
          FROM Account
          WHERE id = :account_id
          AND a.user_id = :user_id
    ");
    $query -> execute ([
      "account_id" => $accountID,
      "user_id" => $user["id"]
      ]);
  // Extract data from query as an associative array (fetch quand 1 seul, renvoi un tableau associatif et non pas un tableau dans un tableau)
    $query -> fetchAll(PDO::FETCH_ASSOC);  
    $account = new Account($query);
    return $account;
  }

  function get_accounts_types(int $userID){
    $query = $this->getDB() ->prepare(
      "SELECT account_type
      FROM Account
      WHERE user_id = :user_id
      AND account_type IN ('Livret A', 'Livret B', 'P E L', 'P E A', 'P E R')
      "
    );
    $query -> execute([
      "user_id" => $userID
    ]);
    return $query -> fetchAll(PDO::FETCH_ASSOC);
  }

  function create_account(int $userID):array{
    $query = $this->getDB() ->prepare(
      "INSERT INTO Account(amount, opening_date, account_type, user_id)
      VALUES (:amount,  NOW(), :account_type,:id)"
    );
    $result = $query->execute([
      "amount" => $_POST["amount"],
      "account_type" => $_POST["typeOfAccount"],
      "id" => $_SESSION["user"]["id"]
    ]);
    return $query -> fetchAll(PDO::FETCH_ASSOC);
  }

  function suppress_account (int $accountID){
    $query = $this->getDB() ->prepare(
      "DELETE FROM Account
      WHERE id = :account_id
    ");
    $result = $query->execute([
      "account_id" => $accountID
      ]);
  }
}
  ?>