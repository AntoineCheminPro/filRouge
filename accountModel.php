<?php require "connexion.php"; ?>
<?php

function get_accounts (PDO $db, array $user){
// load user accounts from DB
  $query = $db -> prepare(
    "SELECT * 
      FROM User AS u
      INNER JOIN Account AS a
      ON u.id = a.user_id
      WHERE u.id = :user_id
  ");
  $query -> execute([
  "user_id" => $user["id"]
  ]);
// Extract data from query as an associative array
return $query -> fetchAll(PDO::FETCH_ASSOC);
}

function get_single_account (PDO $db, int $accountID, $user){
// load selected account from db
  $query = $db -> prepare(
      "SELECT a.id, a.amount as sold, o.id, o.operation_type, a.account_type, o.amount, o.label 
        FROM Account AS a
        LEFT JOIN Operation AS o
        ON a.id = o.account_id
        WHERE a.id = :account_id
        AND a.user_id = :user_id
  ");
  $query -> execute ([
    "account_id" => $accountID,
    "user_id" => $user["id"]
    ]);
// Extract data from query as an associative array (fetch quand 1 seul, renvoi un tableau associatif et non pas un tableau dans un tableau)
  return $query -> fetchAll(PDO::FETCH_ASSOC);
}

function get_accounts_types(PDO $db, int $userID){
  $query = $db ->prepare(
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

function create_account(PDO $db, int $userID){
  $query = $db ->prepare(
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
?>