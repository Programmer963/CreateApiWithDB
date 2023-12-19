<?php

class Customer
{
    public $id;
    public $company;
    public $name;
    public $address;

    public function __construct($value)
    {
        if(gettype($value) == 'integer'){
            
            $sql = "SELECT * FROM customers WHERE customerId = ?";
            $api = new Database();
            $details = $api->getRow($sql, $value);
            
            $this->id = $details->customerId;
            $this->company = $details->customerName;
            $this->name = "$details->contactFirstName $details->contactLastName";
            $arr = array(
                'addressLine1' => $details->addressLine1,
                'city' => $details->addressLine1,
                'country' => $details->country
            );
            $this->address = (object)$arr;
            // $cust = $api->getRow($sql, 123);
        }
        else if(gettype($value) == 'object'){
            $this->id = $value->customerId;
            $this->company = $value->customerName;
            $this->name = "$value->contactFirstName $value->contactLastName";
            $arr = array(
                'addressLine1' => $value->addressLine1,
                'city' => $value->addressLine1,
                'country' => $value->country
            );
            $this->address = (object)$arr;
        }

    }

    public function getName(){
        return $this->name;
    }

    // task-1
    public function getCompany(){
        return $this->company;       
    }

    public function getAddress(){
        return "addressLine1: " . $this->address->addressLine1 . " city: " . $this->address->city . " country: " . $this->address->country;
    }
}