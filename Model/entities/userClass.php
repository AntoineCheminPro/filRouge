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
    private string $password;

    private function setID(int $id):int {
        $this->id =$id;
    }
    private function getID(int $id):int {
        return $this->id;
    }

    private function setID(string $lastname):string {
        $this->lastname=$lastname;
    }
    private function getID(string $lastname):string {
        return $this->lastname;
    }

    private function setFirstname(string $firstname):string {
        $this->firstname=$firstname;
    }
    private function getFirstname(string $firstname):string {
        return $this->firstname;
    }

    private function setEmail(string $email):string {
        $this->email=$email;
    }
    private function getEmail(string $email):string {
        return $this->email;
    }

    private function setCity(string $city):string {
        $this->city=$city;
    }
    private function getCity(string $city):string {
        return $this->city;
    }

    private function setCityCode(int $city_code):int {
        $this->city_code =$city_code;
    }
    private function getCityCode(int $city_code):int {
        return $this->city_code;
    }

    private function setSex(string  $sex):string {
        $this->sex=$sex;
    }
    private function getSex(string  $sex):string {
        return $this->sex;
    }

    private function setBirthDate(string $birth_date):string {
        $this->birth_date=$birth_date;
    }
    private function getBirthDate(string $birth_date):string {
        return $this->birth_date;
    }

    private function setPassword(string $password):string {
        $this->password=$password;
    }
    private function getPassword(string $password):string {
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