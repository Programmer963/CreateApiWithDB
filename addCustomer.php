<?php

require_once "Database.php";

$data = json_decode(file_get_contents("php://input"), true);

$sql = "INSERT INTO customers (contactFirstName, contactLastName, customerName, addressLine1, addressLine2, city, state, country, postalCode, salesRepemployeeId, phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$data["salesRepemployeeId"] = ($data["salesRepemployeeId"] === "0") ? null : (int)$data["salesRepemployeeId"];

$db = new Database();
$customers = $db->insert($sql, array_values($data));

header("Content-type: application/json; charset=utf-8");
echo json_encode($customers);