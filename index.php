<?php

require_once("Database.php");
require_once("Customer.php");

$customer = new Customer(128);

// var_dump($customer);
echo $customer->getName() . "<br>";
echo $customer->getCompany() . "<br>";
echo $customer->getAddress();
