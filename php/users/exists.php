<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, X-Requested-With, Authorization, Pragma, Cache-Control, Expires');
header('Content-Type: application/json; charset=UTF-8');

require '../config/authorization.php';
require '../config/database.php';
require '../datamodel/user.php';

managePreflight();

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

if (isset($_GET['username'])) {
  $stmt = $user->getByUsername($_GET['username']);
  $num = $stmt->rowCount();

  if ($num > 0) {
    echo json_encode(true);
  } else {
    echo json_encode(false);
  }
} else {
  echo json_encode(false);
}
