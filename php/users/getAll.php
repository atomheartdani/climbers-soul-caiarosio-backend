<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, X-Requested-With, Authorization, Pragma, Cache-Control, Expires');
header('Content-Type: application/json; charset=UTF-8');

require '../config/authorization.php';
require '../config/database.php';
require '../datamodel/user.php';

managePreflight();
checkAuthorization();

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$ret = array();
$stmt = $user->getAll();
$num = $stmt->rowCount();

if ($num > 0) {
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    $user_item = array(
      'id' => $id,
      'username' => $username,
      'firstname' => $firstname,
      'lastname' => $lastname,
      'email' => $email,
      'isAdmin' => boolval($isAdmin),
      'updatePassword' => boolval($updatePassword)
    );
    array_push($ret, $user_item);
  }
}
echo json_encode($ret);
