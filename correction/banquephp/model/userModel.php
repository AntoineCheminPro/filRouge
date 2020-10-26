<?php
require_once "model.php";

final class UserModel extends Model {
  // Function used to log the user
  public function getUserByMail(User $user):?User {
    $query = $this->db->prepare("SELECT * FROM User WHERE email = :email");
    $query->execute([
      "email" => $user->getEmail()
    ]);
    $query->setFetchMode(PDO::FETCH_CLASS, 'User');
    return $query->fetch();
  }
}
