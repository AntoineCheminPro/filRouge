<?php 
 require "DBManager.php";

class UserModel extends DBManager {
         
    public function checkEmail($email){
            // never trust user input -> preparer la requête
        $query = $this->getDB()->prepare(
            "SELECT id, email, password, lastname, firstname, sex FROM User
            WHERE email = :email"
        );
        $query->execute([
            "email" => $email
        ]);
        $user = $query ->fetch (PDO::FETCH_ASSOC);
        return $user;
    }

    public function getUser(int $userID):user{
        $query = $this->getDB()->prepare(
            "SELECT *
            FROM User
            WHERE id = :id"
        );
        $query->execute([
            "id" => $userID
        ]);
        $user = $query ->fetch (PDO::FETCH_ASSOC);
        $user = new user($user);
        return $user;
    }



    public function newUser(user $user):bool{
        $query = $this->getDB()->prepare("INSERT INTO user(id, lastname, firstname, email, city, city_code, adress, sex, password, birth_date)
        VALUES (:id, :lastname, :firstname, :email, :city, :city_code, :adress, :sex, :password, :birth_date)");
        $result = $query->execute([
            "id" => $user->getID(),
            "lastname" => $user->getLastname(),
            "firstname" => $user->getFirstname(),
            "email" => $user->getEmail(),
            "city" => $user->getCity(),
            "city_code" => $user->getCityCode(),
            "adress" => $user->getAdress(),
            "sex" => $user->getSex(),
            "password" => $user->getPassword(),
            "birth_date"=> $user->getBirthDate()
        ]);
        return $result;    
    }
}