<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once 'database.php';
require_once 'article.php';

$db = new Database();
$data = json_decode(file_get_contents("php://input"));
$article = new Article();
$article->setName($data->name)->setPrice($data->price)->setBackup($data->backup);
$id = $data->id;

$result = $db->update($article, $id);

if ($result) {
    echo "Updated !!!";
}
