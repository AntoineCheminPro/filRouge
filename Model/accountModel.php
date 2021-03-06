<?php
require_once "DBManager.php";
require_once "Model/entities/accountClass.php";

class AccountModel extends DBManager
{
  function get_accounts (user $user){
  // load user accounts from DB
    $query = $this->getDB()->prepare(
      "SELECT * 
        FROM Account
        WHERE user_id = :user_id
    ");
    $query -> execute([
    "user_id" => $user->getId()
    ]);
  // Extract data from query as an associative array
  $accounts =$query -> fetchAll(PDO::FETCH_ASSOC);
    //On transforme alors chaque entrée du tableau en objet account en l'hydratant
    // ce qui permet de passer les valeurs aux setter (verifications)
   
    foreach ($accounts as $key => $account) {
      $accounts[$key] = new Account($account);
    }
  return $accounts;
  }

  function get_single_account ($accountID, $user){

  // load selected account from db
    $query = $this->getDB()->prepare(
        "SELECT *
          FROM Account
          WHERE id = :account_id
          AND user_id = :user_id
    ");
    $query->execute([
      "account_id" => $accountID,
      "user_id" => $user["id"]
      ]);
  // Extract data from query as an associative array (fetch quand 1 seul, renvoi un tableau associatif et non pas un tableau dans un tableau)

  $accountFounded = $query->fetchAll(PDO::FETCH_ASSOC);  
    $account = new Account($accountFounded[0]);
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

  function create_account(account $account):bool{
    $query = $this->getDB()->prepare(
      "INSERT INTO Account(amount, opening_date, account_type, user_id)
      VALUES (:amount,  NOW(), :account_type,:user_id)"
    );
    $result=$query->execute([
      "amount" => $account->getAmount(),
      "account_type" => $account->getAccount_type(),
      "user_id" => $account->getUser_id()
    ]);
    return $result;
  }

  function suppress_account (account $account){
    $query = $this->getDB() ->prepare(
      "DELETE FROM Account
      WHERE id = :account_id
    ");
    $result = $query->execute([
      "account_id" => $account->getId()
      ]);
      return $result;
  }

  function account_deposit($account_id){
    $query = $this->getDB() ->prepare(
      "SELECT amount
      FROM Account
      WHERE id = :account_id
      "
    );
    $query -> execute([
      "account_id" => $account_id
    ]);
    $old_sold = $query -> fetchAll(PDO::FETCH_ASSOC);
    $new_Sold = floatval($old_sold[0]["amount"]) + floatval($_POST["amount"]) ;

    Var_dump($new_Sold);

    $query = $this->getDB() ->prepare(
      "UPDATE Account 
      SET amount =:amount
      WHERE id = :account_id"
    );
    $result = $query->execute([
      "amount" => $new_Sold,
      "account_id" => $_GET["id"]
    ]);
    return $query -> fetchAll(PDO::FETCH_ASSOC);
  }

  function Account_bank_withdrawal($account_id){
    $query = $this->getDB() ->prepare(
      "SELECT amount
      FROM Account
      WHERE id = :account_id
      "
    );
    $query -> execute([
      "account_id" => $account_id
    ]);
    $old_sold = $query -> fetchAll(PDO::FETCH_ASSOC);
    $new_Sold = floatval($old_sold[0]["amount"]) - floatval($_POST["amount"]) ;

    Var_dump($new_Sold);

    $query = $this->getDB() ->prepare(
      "UPDATE Account 
      SET amount =:amount
      WHERE id = :account_id"
    );
    $result = $query->execute([
      "amount" => $new_Sold,
      "account_id" => $_GET["id"]
    ]);
    return $query -> fetchAll(PDO::FETCH_ASSOC);
  }

}
  ?>