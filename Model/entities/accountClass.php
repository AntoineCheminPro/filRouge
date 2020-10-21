<?php

class Account {
    protected int $id;
    protected int $amount;
    protected string $opening_date;
    protected int $account_type;
    protected int $user_id;

    private function setID(int $id):int {
        $this->id =$id;
    }
    private function getID(int $id):int {
        return $this->id;
    }

    private function setAmount(int $amount):int {
        $this->amount =$amount;
    }
    private function getAmount(int $amount):int {
        return $this->amount;
    }

    private function setOpeningDate(string $opening_date):string {
        $this->opening_date =$opening_date;
    }
    private function getOpeningDate(string $opening_date):string {
        return $this->opening_date;
    }

    private function setAccountType(int $account_type):int {
        $this->account_type =$account_type;
    }
    private function getAccountType(int $account_type):int {
        return $this->account_type;
    }

    private function setUserID(int $user_id):int {
        $this->user_id =$user_id;
    }
    private function getUserID(int $user_id):int {
        return $this->user_id;
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