<?php
require_once "Database.php";
require_once "Product.php";

$sql = "SELECT * FROM products";
$db = new Database();
$products = $db->getAll($sql);

$array = [];

foreach ($products as $product) {
    $array[] = new Product($product);
}


header("Content-type: application/json; charset=utf-8");
echo json_encode($array);