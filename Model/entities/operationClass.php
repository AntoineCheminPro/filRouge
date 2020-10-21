<?php
class Operation {

    protected int $id;
    protected string $operation_type;
    protected int $amount;
    protected string $registred; // date of operation registration
    protected string $label;
    protected int $account_id;

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

    private function setID(int $id):int {
        $this->id =$id;
    }
    private function getID(int $id):int {
        return $this->id;
    }

    private function setOperationType(string $operation_type):string {
        $this->operation_type =$operation_type;
    }
    private function getOperationType(string $operation_type):string {
        return $this->operation_type;
    }

    private function setAmount(int $amount):int {
        $this->amount =$amount;
    }
    private function getAmount(int $amount):int {
        return $this->amount;
    }

    private function setRegistred(string $registred):string {
        $this->registred =$registred;
    }
    private function getRegistred(string $registred):string {
        return $this->registred;
    }

    private function setLabel(string $label):string {
        $this->label =$label;
    }
    private function getLabel(string $label):string {
        return $this->label;
    }

    private function setAccountID(int $account_id):int {
        $this->account_id =$account_id;
    }
    private function getAccountID(int $account_id):int {
        return $this->account_id;
    }
  
}