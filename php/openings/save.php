<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, X-Requested-With, Authorization');
header('Content-Type: application/json; charset=UTF-8');

require '../config/database.php';
require '../config/authorization.php';
require '../datamodel/opening.php';

managePreflight();
checkAuthorization();

$postData = file_get_contents("php://input");

if (isset($postData) && !empty($postData)) {
  $parsedData = json_decode($postData, true);
  $id = $parsedData["id"];
  $date = $parsedData["date"];
  $from = $parsedData["from"];
  $to = $parsedData["to"];
  $special = $parsedData["special"];
} else {
  http_response_code(400);
  die;
}

$database = new Database();
$db = $database->getConnection();

$opening = new Opening($db);

if($id==0) {
  $stmt = $opening->insert($date, $from, $to, $special);
} else {
  $stmt = $opening->update($id, $date, $from, $to, $special);
}
http_response_code(200);
