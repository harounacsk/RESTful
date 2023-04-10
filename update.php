<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include 'database.php';

$db = new Database();
$data = json_decode(file_get_contents("php://input"));
$name = $data->name;
$price = $data->price;
$backup = $data->backup;
$depot_id = $data->depot;
$id = $data->id;

$result= $db->update('article', [
    'name' => $name, 'price' => $price, 'backup' => $backup, 'depot_id' => $depot_id
], "id='$id'");
if ($result) {
    echo "Updated !!!";
}
