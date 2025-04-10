<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once 'database.php';
require_once 'article.php';
$db = new Database();
$requestMethod = strtoupper($_SERVER["REQUEST_METHOD"]);

switch ($requestMethod) {
	case 'GET':
		$rows = $db->select();
		echo json_encode($rows);
		break;
	case 'POST':
		$data = json_decode(file_get_contents("php://input"));
		$article = new Article();
		$article->setName($data->name)->setPrice($data->price)->setBackup($data->backup);
		$result = $db->insert($article);
		echo "Added !!!";
		break;
	case 'PUT':
		$data = json_decode(file_get_contents("php://input"));
		$article = new Article();
		$article->setName($data->name)->setPrice($data->price)->setBackup($data->backup);
		$id = $data->id;
		$result = $db->update($article, $id);
		echo "Updated !!!";
		break;
	case 'DELETE':
		$data = json_decode(file_get_contents("php://input"));
		$id = $data->id;
		$result = $db->delete($id);
		echo "Deleted !!!";
		break;
	default:
		echo "Error !!!";
}
$db->close();