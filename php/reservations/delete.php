<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, X-Requested-With, Authorization');
header('Content-Type: application/json; charset=UTF-8');

require '../config/database.php';
require '../datamodel/reservation.php';
require '../vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

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

$stmt = $reservation->delete($openingId, $userId);
http_response_code(200);

function checkAuthorization() {
  require '../config/include/config.php';

  // Check if Authorization header is present
  if (! preg_match('/Bearer\s(\S+)/', $_SERVER['HTTP_AUTHORIZATION'], $matches)) {
    http_response_code(401);
    die;
  }

  // Check if Authorization header contains data
  $token = $matches[1];
  if (! $token) {
    http_response_code(401);
    die;
  }
  $decoded = JWT::decode($token, new Key($jwt_key, "HS256"));
  
  $now = new DateTimeImmutable();
  $serverName = "climbers-soul-caiarosio-backend";

  // Check if jwt token is valid
  if ($decoded->iss !== $serverName || $decoded->nbf > $now->getTimestamp() || $decoded->exp < $now->getTimestamp()) {
    http_response_code(401);
    die;
  }
}
?>
