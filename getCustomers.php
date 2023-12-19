<?php

require_once "Database.php";
require_once "Customer.php";

$sql = "SELECT * FROM customers";
$db = new Database();
$customers = $db->getAll($sql);

$array = [];

foreach ($customers as $customer) {
    $array[] = new Customer($customer);
}


// task-2
$customerId = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($array != null && is_array($array)) {
    foreach ($array as $customer) {
        if ($customer->id == $customerId) {
            header('Content-Type: application/json');
            echo json_encode($customer);
            exit;
        }
    }
}
else{
    header('Content-Type: application/json');
    echo json_encode(array('error' => 'Client not found'));
}