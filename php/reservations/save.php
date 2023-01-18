<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, X-Requested-With, Authorization, Pragma, Cache-Control, Expires');
header('Content-Type: application/json; charset=UTF-8');

require '../config/authorization.php';
require '../config/database.php';
require '../datamodel/opening.php';
require '../datamodel/reservation.php';

managePreflight();
checkAuthorization();

$postData = file_get_contents('php://input');

if (isset($postData) && !empty($postData)) {
  $parsedData = json_decode($postData, true);
  $openingId = $parsedData['openingId'];
  $userId = $parsedData['userId'];
  $reservePartner = intval($parsedData['reservePartner']);
} else {
  http_response_code(400);
  die;
}

try {
  $database = new Database();
  $db = $database->getConnection();

  $reservation = new Reservation($db);
  $opening = new Opening($db);

  $spotsMax = getMaxNumberOfReservationsForOpening($opening, $openingId);
  $spotsReserved = getNumberOfReservationsForOpening($reservation, $openingId);

  if($spotsMax >= $spotsReserved + 1 + $reservePartner ) {
    $reservation->insert($openingId, $userId, $reservePartner);
    http_response_code(200);
  } else {
    http_response_code(409);
  }
} catch (Exception $e) {
  error_log('Error in reservations/save: ' . $e, 0);
  http_response_code(500);
  die;
}

function getNumberOfReservationsForOpening($reservation, $openingId) {
  $stmt = $reservation->getNumberOfReservationsForOpening($openingId);
  $num = $stmt->rowCount();
  
  if ($num > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    extract($row);
    return $res;
  } else {
    throw new Exception('Couldn\'t calculate number of reserved spots');
  }
}

function getMaxNumberOfReservationsForOpening($opening, $openingId) {
  $stmt = $opening->getById($openingId);
  $num = $stmt->rowCount();
  
  if ($num > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    extract($row);
    return $maxReservations;
  } else {
    throw new Exception('Couldn\'t calculate max number of reservable spots');
  }
}
