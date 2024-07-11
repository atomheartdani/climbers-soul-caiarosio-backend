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

try {
  $database = new Database();
  $db = $database->getConnection();

  $opening = new Opening($db);
  $reservation = new Reservation($db);

  $ret = array();
  error_log($_GET['id']);
  if (isset($_GET['id'])) {
    $reservation->deleteByOpening($_GET['id']);
    $opening->delete($_GET['id']);
  }
  http_response_code(200);
} catch (Exception $e) {
  error_log('Error in openings/delete: ' . $e, 0);
  http_response_code(500);
  die;
}
