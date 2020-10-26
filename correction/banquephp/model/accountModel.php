<?php
require_once "model.php";

class AccountModel extends Model {

  // Get all accounts with the last related operation for the logged user
  public function getAccounts(PDO $db, User $user):?Array {
    $query = $db->prepare(
      "SELECT a.id, a.amount, a.opening_date, a.account_type, o.amount AS operation_amount, o.registered, o.label
      FROM Account AS a
      LEFT JOIN Operation AS o
      ON a.id = o.account_id
      WHERE a.user_id = :user_id && (o.id = (
          SELECT MAX(o2.id)
          FROM Operation AS o2
          WHERE o2.account_id = a.id
      	)OR o.id IS NULL)"
    );
    $query->execute([
      "user_id" => $user->getId()
    ]);
    $accounts = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($accounts as $key => $account) {
      $accounts[$key] = new Account($account);
      if(!empty($account["operation_amount"]))
      $accounts[$key]->setLast_operation(new Operation($account));
    }
    return $accounts;
  }

  // Get one account withe all the related operations
  public function getSingleAccount($id, User $user) {
    $query = $this->db->prepare(
      "SELECT a.*, o.id AS operation_id, o.operation_type, o.amount AS operation_amount, o.label, o.registered FROM Account AS a
       LEFT JOIN Operation AS o
       ON a.id = o.account_id
       WHERE a.id = :id
       AND a.user_id = :user_id
       ORDER BY operation_id DESC
    ");
    $query->execute([
      "id" => $id,
      "user_id" => $user->getId()
    ]);
    $data = $query->fetchAll(PDO::FETCH_ASSOC);
    $account = new Account($data[0]);
    if(isset($data[0]["operation_amount"])) {
      foreach ($data as $key => $operation) {
        $operationObject = new Operation($operation);
        // Avoid to get account id in all operations
        $operationObject->setId($operation["operation_id"]);
        $account->addOperation($operationObject);
      }
    }
    return $account;
  }

  public function newAccount(Account $account) {
    $query = $this->db->prepare(
      "INSERT INTO Account(amount, opening_date, account_type, user_id)
      VALUES(:amount, NOW(), :account_type, :user_id)"
    );

    $result = $query->execute([
      "amount" => $account->getAmount(),
      "account_type" => $account->getAccount_type(),
      "user_id" => $account->getUser()->getId()
    ]);

    return $result;
  }

}

// Get one account information (used in the update amount process)
function get_only_account($db, $id, $user) {
  $query = $db->prepare(
    "SELECT id, amount FROM Account
     WHERE id = :id
     AND user_id = :user_id"
   );
  $query->execute([
    "id" => $id,
    "user_id" => $user["id"]
  ]);
  return $query->fetch(PDO::FETCH_ASSOC);
}

// Get the list of accounts for one user in order to make dropdown menus
function get_account_list($db, $user) {
  $query = $db->prepare(
    "SELECT id, account_type, amount FROM Account
    WHERE user_id = :user_id"
  );
  $query->execute([
    "user_id" => $user["id"]
  ]);
  return $query->fetchAll(PDO::FETCH_ASSOC);
}

// Update the amount of one account (used in operation process)
function update_account_amount($db, $account) {
  try {
    $this->pdo->beginTransaction();
    $query = $db->prepare(
      "UPDATE Account
      SET amount = :amount
      WHERE id = :id"
    );
    $result = $query->execute([
      "amount" => $account["amount"],
      "id" => $account["id"]
    ]);
    $this->pdo->commit();
    return $result;
  } catch (\Exception $e) {
    $this->pdo->rollBack();
  }
}
