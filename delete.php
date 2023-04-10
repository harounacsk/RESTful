<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include 'database.php';
$db = new Database();
$data = json_decode(file_get_contents("php://input"));
$id=$data->id;
$result = $db->delete('article', "id='$id'");
$db->close();

if ($result) {
    echo "Deleted !!!";
}
