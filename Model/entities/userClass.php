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

    private function setID(int $id):int {
        $this->id =$id;
    }
    private function getID() {
        return $this->id;
    }

    private function setID(string $lastname):string {
        $this->lastname=$lastname;
    }
    private function getID() {
        return $this->lastname;
    }

    private function setFirstname(string $firstname):string {
        $this->firstname=$firstname;
    }
    private function getFirstname() {
        return $this->firstname;
    }

    private function setEmail(string $email):string {
        $this->email=$email;
    }
    private function getEmail() {
        return $this->email;
    }

    private function setCity(string $city):string {
        $this->city=$city;
    }
    private function getCity() {
        return $this->city;
    }

    private function setCityCode(int $city_code):int {
        $this->city_code =$city_code;
    }
    private function getCityCode() {
        return $this->city_code;
    }

    private function setSex(string  $sex):string {
        $this->sex=$sex;
    }
    private function getSex() {
        return $this->sex;
    }

    private function setBirthDate(string $birth_date):string {
        $this->birth_date=$birth_date;
    }
    private function getBirthDate() {
        return $this->birth_date;
    }

    private function setPassword(string $password):string {
        $this->password=$password;
    }
    private function getPassword(){
        return $this->password;
    }

    public function __construct(array $data):array {
        $this->hydrate($data);
    }
    private function hydrate(array $data):array {
        foreach ($data as $key => $value) {
          $method = "set" . ucfirst($key);
          if(method_exists($this, $method)) {
            $this->$method(htmlspecialchars($value));
          }
        }
      }
}