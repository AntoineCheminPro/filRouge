<?php

class User {
    protected int $id;
    protected string $lastname;
    protected string $firstname;
    protected string $email;
    protected string $city;
    protected int $city_code;
    protected string $sex;
    protected string $birth_date;
    protected string $password;

    private function setId(int $id){
        $this->id =$id;
    }
    public function getId() {
        return $this->id;
    }

    private function setLastname(string $lastname) {
        $this->lastname= htmlspecialchars($lastname);
    }
    private function getLastname() {
        return $this->lastname;
    }

    private function setFirstname(string $firstname) {
        $this->firstname=htmlspecialchars($firstname);
    }
    private function getFirstname() {
        return $this->firstname;
    }

    private function setEmail(string $email) {
        $this->email=$email;
    }
    public function getEmail() {
        return $this->email;
    }

    private function setCity(string $city) {
        $this->city=htmlspecialchars($city);
    }
    public function getCity() {
        return $this->city;
    }

    private function setCityCode(int $city_code) {
        $this->city_code =htmlspecialchars($city_code);
    }
    public function getCityCode() {
        return $this->city_code;
    }

    private function setSex(string  $sex) {
        $this->sex=htmlspecialchars($sex);
    }
    public function getSex() {
        return $this->sex;
    }

    private function setBirthDate(string $birth_date) {
        $this->birth_date=$birth_date;
    }
    public function getBirthDate() {
        return $this->birth_date;
    }

    private function setPassword(string $password) {
        $this->password=$password;
    }
    public function getPassword(){
        return $this->password;
    }

    public function __construct($data) {
        $this->hydrate($data);
    }
    private function hydrate(array $data) {
        foreach ($data as $key => $value) {
          $method = "set" . ucfirst($key);
          if(method_exists($this, $method)) {
            $this->$method(htmlspecialchars($value));
          }
        }
    }
}