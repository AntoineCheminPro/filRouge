<?php

class Account {
    public int $id;
    public float $amount;
    public string $opening_date;
    public string $account_type;
    public int $user_id;

    public function setId($id) {
        $this->id =$id;
    }
    public function getId() {
        return $this->id;
    }

    public function setAmount($amount) {
        $this->amount =$amount;
    }
    public function getAmount() {
        return $this->amount;
    }

    public function setOpening_date($opening_date) {
        $this->opening_date =$opening_date;
    }
    public function getOpening_date() {
        return $this->opening_date;
    }

    public function setAccount_type($account_type) {
        $this->account_type =$account_type;
    }
    public function getAccount_type() {
        return $this->account_type;
    }

    public function setUser_id($user_id) {
        $this->user_id =$user_id;
    }
    public function getUser_id() {
        return $this->user_id;
    }

    public function __construct($data) {
        // var_dump($data);
        $this->hydrate($data);
    }

    private function hydrate($data) {
        foreach ($data as $key => $value) {
            $method = "set" . ucfirst($key);
            if(method_exists($this, $method)) {
                $this->$method(htmlspecialchars($value));
            }
        }
    }
}