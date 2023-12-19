<?php
require_once "Database.php";
require_once "Office.php";

$sql = "SELECT * FROM offices";
$db = new Database();
$offices = $db->getAll($sql);

$array = [];

foreach ($offices as $office) {
    $array[] = new Office($office);
}


header("Content-type: application/json; charset=utf-8");
echo json_encode($array);