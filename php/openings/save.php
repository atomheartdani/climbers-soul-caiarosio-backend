<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, X-Requested-With, Authorization, Pragma, Cache-Control, Expires');
header('Content-Type: application/json; charset=UTF-8');

require '../config/authorization.php';
require '../config/database.php';
require '../datamodel/opening.php';

managePreflight();
checkAuthorization();

$postData = file_get_contents('php://input');

if (isset($postData) && !empty($postData)) {
  $parsedData = json_decode($postData, true);
  $id = $parsedData['id'];
  $date = $parsedData['date'];
  $from = $parsedData['from'];
  $to = $parsedData['to'];
  $special = $parsedData['special'];
  $maxReservations = $parsedData['maxReservations'];
} else {
  http_response_code(400);
  die;
}

try {
  $database = new Database();
  $db = $database->getConnection();

  $opening = new Opening($db);

  if ($id == 0) {
    $opening->insert($date, $from, $to, $special, $maxReservations);
  } else {
    $opening->update($id, $date, $from, $to, $special, $maxReservations);
  }
  http_response_code(200);
} catch (Exception $e) {
  error_log('Error in openings/save: ' . $e, 0);
  http_response_code(500);
  die;
}
