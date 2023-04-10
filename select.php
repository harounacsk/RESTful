<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include 'database.php';
$db = new Database();

$result = $db->select("article","*");
$rows = $result->fetch_all(MYSQLI_ASSOC);
$db->close();
echo json_encode($rows);

?>