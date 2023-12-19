<?php

class Office{
    public $id;
    public $phone;
    public $address;
    
    public function __construct($value)
    {
        if(gettype($value) == 'integer'){
            
            $sql = "SELECT * FROM offices WHERE officeId = ?";
            $api = new Database();
            $details = $api->getRow($sql, $value);
            
            $this->id = $details->officeId;
            $this->phone = $details->phone;
            $arr = array(
                'addressLine1' => $details->addressLine1,
                'city' => $details->addressLine1,
                'country' => $details->country
            );
            $this->address = (object)$arr;
        }
        else if(gettype($value) == 'object'){
            $this->id = $value->officeId;
            $this->phone = $value->phone;
            $arr = array(
                'addressLine1' => $value->addressLine1,
                'city' => $value->addressLine1,
                'country' => $value->country
            );
            $this->address = (object)$arr;
        }

    }

    public function getPhone(){
        return $this->phone;
    }
    public function getAddress(){
        return "addressLine1: " . $this->address->addressLine1 . " city: " . $this->address->city . " country: " . $this->address->country;
    }
}
