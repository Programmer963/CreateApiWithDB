<?php

require_once "Database.php";

$data = json_decode(file_get_contents("php://input"), true);

$sql = "INSERT INTO employees (lastName, firstName, extension, email, officeId, reportsTo, jobTitle) VALUES (?,?,?,?,?,?,?)";

$data["officeId"] = ($data["officeId"] === "0") ? null : (int)$data["officeId"];

$db = new Database();
$customers = $db->insert($sql, array_values($data));

header("Content-type: application/json; charset=utf-8");
echo json_encode($customers);