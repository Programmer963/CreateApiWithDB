<?php
// require_once "Database.php";
// require_once "Employee.php";

// $sql = "SELECT * FROM employees";
// $db = new Database();
// $employees = $db->getAll($sql);

// $array = [];

// foreach ($employees as $employee) {
//     $array[] = new Employee($employee);
// }


// header("Content-type: application/json; charset=utf-8");
// echo json_encode($array);


require_once "Database.php";
require_once "Customer.php";

$sql = "SELECT * FROM employees";

$db = new Database();
$employees = $db->getAll($sql);

header("Content-type: application/json; charset=utf-8");
echo json_encode($employees, JSON_PRETTY_PRINT);