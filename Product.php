<?php

class Product
{
    public $id;
    public $name;
    public $description;
    public $price;

    public function __construct($value)
    {
        if(gettype($value) == 'integer'){
            
            $sql = "SELECT * FROM products WHERE productId = ?";
            $api = new Database();
            $details = $api->getRow($sql, $value);
            
            $this->id = $details->productId;
            $this->name = $details->productName;
            $this->description = $details->productDescription;
            $this->price = $details->buyPrice;
        }
        else if(gettype($value) == 'object'){
            $this->id = $value->productId;
            $this->name = $value->productName;
            $this->description = $value->productDescription;
            $this->price = $value->buyPrice;
        }

    }

    public function getName(){
        return $this->name;
    }
    
    public function getDescription(){
        return $this->description;
    }

    public function getPrice(){
        return $this->price;
    }
}