<?php

class Employee
{
    public $id;
    public $name;
    public $email;

    public function __construct($value)
    {
        if(gettype($value) == 'integer'){
            $sql = "SELECT * FROM employees WHERE employeeId = ?";
            $api = new Database();
            $details = $api->getRow($sql, $value);
            
            $this->id = $details->employeeId;
            $this->name = "$details->firstName $details->lastName";
            $this->email = $details->email;
        }
        else if(gettype($value) == 'object'){
            $this->id = $value->employeeId;
            $this->name = "$value->firstName $value->lastName";
            $this->email = $value->email;
        }

    }

    public function getName(){
        return $this->name;
    }

    public function getEmail(){
        return $this->email;       
    }

}