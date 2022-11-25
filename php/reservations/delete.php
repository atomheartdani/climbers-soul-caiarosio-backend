<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, X-Requested-With, Authorization');
header('Content-Type: application/json; charset=UTF-8');

require '../config/authorization.php';
require '../config/database.php';
require '../datamodel/reservation.php';

managePreflight();
checkAuthorization();

$postData = file_get_contents("php://input");

if (isset($postData) && !empty($postData)) {
  $parsedData = json_decode($postData, true);
  $openingId = $parsedData["openingId"];
  $userId = $parsedData["userId"];
} else {
  http_response_code(400);
  die;
}

$database = new Database();
$db = $database->getConnection();

$reservation = new Reservation($db);

$stmt = $reservation->delete($openingId, $userId);
http_response_code(200);
