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

$numberOfUsers = $user->count();
error_log('numberOfUsers: ' . $numberOfUsers[0], 0);

$ret = array(
  'total' => intval($numberOfUsers[0]),
  'content' => []
);
$stmt = $user->getAll($_GET['pageIndex'], $_GET['pageSize']);
$num = $stmt->rowCount();

if ($num > 0) {
  $users = array();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    $user_item = array(
      'id' => $id,
      'username' => $username,
      'firstname' => $firstname,
      'lastname' => $lastname,
      'email' => $email,
      'tosConsent' => boolval($tosConsent),
      'isAdmin' => boolval($isAdmin),
      'isCaiArosio' => boolval($isCaiArosio),
      'updatePassword' => boolval($updatePassword)
    );
    array_push($users, $user_item);
  }
  $ret['content'] = $users;
}
echo json_encode($ret);
