<?php
class Operation {

    protected ?int $id;
    protected string $operation_type;
    protected int $amount;
    protected string $registred; // date of operation registration
    protected string $label;
    protected int $account_id;

    public function __construct(array $data) {
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

    private function setId(int $id) {
        $this->id =$id;
    }
    public function getId() {
        return $this->id;
    }

    private function setOperation_type(string $operation_type) {
        $this->operation_type =$operation_type;
    }
    public function getOperation_type() {
        return $this->operation_type;
    }

    private function setAmount(int $amount) {
        $this->amount =$amount;
    }
    public function getAmount() {
        return $this->amount;
    }

    private function setRegistred(string $registred) {
        $this->registred =$registred;
    }
    public function getRegistred() {
        return $this->registred;
    }

    private function setLabel(string $label) {
        $this->label =$label;
    }
    public function getLabel() {
        return $this->label;
    }

    private function setAccount_id(int $account_id) {
        $this->account_id =$account_id;
    }
    private function getAccount_id() {
        return $this->account_id;
    }
  
}