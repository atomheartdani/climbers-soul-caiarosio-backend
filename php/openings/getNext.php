<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, X-Requested-With, Authorization, Pragma, Cache-Control, Expires');
header('Content-Type: application/json; charset=UTF-8');

require '../config/database.php';
require '../datamodel/opening.php';
require '../datamodel/reservation.php';

$database = new Database();
$db = $database->getConnection();

$opening = new Opening($db);
$reservation = new Reservation($db);

$stmt = $opening->getNext($_GET['loadAll']);
$num = $stmt->rowCount();

$ret = array();
if ($num > 0) {
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    $opening_item = array(
      'id' => $id,
      'date' => $date,
      'from' => $from,
      'to' => $to,
      'special' => $special,
      'maxReservations' => $maxReservations,
      'reservations' => array()
    );

    $stmt_reservation = $reservation->getAllByOpeningId($opening_item['id']);
    $num_reservation = $stmt_reservation->rowCount();
    if ($num_reservation > 0) {
      while ($row_reservation = $stmt_reservation->fetch(PDO::FETCH_ASSOC)) {
        extract($row_reservation);
        $reservation_item = array(
          'id' => $id,
          'openingId' => $openingId,
          'userId' => $userId,
          'reservePartner' => $reservePartner
        );
        if (!isset($reservation_item)) {
          $reservation_item = array();
        }
        array_push($opening_item['reservations'], $reservation_item);
      }
    }
    array_push($ret, $opening_item);
  }
}
echo json_encode($ret);
