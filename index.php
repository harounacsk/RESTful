<?php
const URL_SERVICE = "http://localhost/projekts/restful/service.php";

function _curl_init(&$curl, $method)
{
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, URL_SERVICE);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
}

function _curl_exec($curl)
{
	$result = curl_exec($curl);
	$result = json_decode($result);
	curl_close($curl);
	return $result;
}

function curl_get()
{
	_curl_init($curl, "GET");
	return _curl_exec($curl);
}



function curl_del($id)
{
	$json = json_encode(["id" => $id]);
	_curl_init( $curl, 'DELETE');
	curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
	return _curl_exec($curl);
}

function curl_post($name, $price, $backup)
{
	$json = json_encode(["name" => $name, "price" => $price, "backup" => $backup]);
	_curl_init($curl, "POST");
	curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
	return _curl_exec($curl);
}

function curl_put($id, $name, $price, $backup)
{
	$json = json_encode(["id" => $id, "name" => $name, "price" => $price, "backup" => $backup]);
	_curl_init( $curl, "PUT");
	curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
	return _curl_exec($curl);
}


/**
 * $method = POST, PUT, DELETE or GET
 * 
 * curl_del($url, 5);
 * curl_post($url,"Banane", 45.44,false);
 * curl_put($url, 18,"Ananas", 45.44,false);
 */

$result = curl_get();
if($result){
	foreach ($result as $res) {
		echo $res->id . " " . $res->name . " " . $res->price . "<br/>";
	}
}else
	echo "Momentan gibt es keine Artikel";

?>