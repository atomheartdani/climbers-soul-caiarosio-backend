<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, X-Requested-With, Authorization');
header('Content-Type: application/json; charset=UTF-8');

require '../config/database.php';
require '../config/authorization.php';
require '../datamodel/reservation.php';

// For now, always return 200 OK per preflight request
if ( "OPTIONS" === $_SERVER['REQUEST_METHOD'] ) {
  http_response_code(200);
  die;
}

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

$stmt = $reservation->insert($openingId, $userId);
http_response_code(200);
?>
