<?php
require_once "DBManager.php";
require_once "Model/entities/accountClass.php";
require_once "Model/entities/operationClass.php";

class OperationModel extends DBManager
{
  function get_operations ($account):array{
  // load account accounts from DB
    $query = $this->getDB()->prepare(
      "SELECT * 
        FROM Operation
        WHERE account_id = :account_id
    ");
    $query -> execute([
    "account_id" => $account->getId()
    ]);
  // Extract data from query as an associative array
  $operations =$query -> fetchAll(PDO::FETCH_ASSOC);
    //On transforme alors chaque entrée du tableau en objet account en l'hydratant
    // ce qui permet de passer les valeurs aux setters (verifications)
   
    foreach ($operations as $key => $operation) {
      $operations[$key] = new Operation($operation);
    }
  return $operations;
  }

  function get_single_operation ($operationID, $account){

  // load selected operation from db
    $query = $this->getDB()->prepare(
        "SELECT *
          FROM Operation
          WHERE id = :operation_id
          AND account_id = :account_id
    ");
    $query->execute([
      "operation_id" => $operationID,
      "account_id" => $account["id"]
      ]);
  // Extract data from query as an associative array (fetch quand 1 seul, renvoi un tableau associatif et non pas un tableau dans un tableau)

  $operationFounded = $query->fetchAll(PDO::FETCH_ASSOC);  
    $operation = new Operation($operationFounded[0]);
    return $operation;
  }

  function create_deposit(int $accountID){
    $query = $this->getDB() ->prepare(
      "INSERT INTO Operation(operation_type, amount, registered, label, account_id)
      VALUES (:operation_type,:amount,  NOW(), :label,:account_id)"
    );
    $result = $query->execute([
      "operation_type"=>$_POST["typeOfOperation"],
      "amount" => $_POST["amount"],
      "label" => $_POST["label"],
      "account_id" => $accountID
    ]);
    return $result;
  }
  
  function create_bank_withdrawal(int $accountID){
    $query = $this->getDB() ->prepare(
      "INSERT INTO Operation(operation_type, amount, registered, label, account_id)
      VALUES (:operation_type,:amount,  NOW(), :label,:account_id)"
    );
    $result = $query->execute([
      "operation_type"=>$_POST["typeOfOperation"],
      "amount" => -$_POST["amount"],
      "label" => $_POST["label"],
      "account_id" => $accountID
    ]);
    return $result;
  }

  function suppress_operation (int $operationID):bool{
    $query = $this->getDB() ->prepare(
      "DELETE FROM Operation
      WHERE id = :operation_id
    ");
    $result = $query->execute([
      "operation_id" => $operationID
      ]);
  }
}
  ?>