<?php 

class UserModel {
    private PDO $db;

    public function setDB(PDO $connect){
        $this->db =$connect;
    }
    public function getDB():PDO{
        return $this->db;
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