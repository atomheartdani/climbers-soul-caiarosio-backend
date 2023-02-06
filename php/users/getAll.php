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

$filter = filterToSql($_GET['filter']);

$numberOfUsers = $user->count($filter);

$ret = array(
  'total' => intval($numberOfUsers[0]),
  'content' => []
);
$stmt = $user->getAll($filter, $_GET['pageIndex'], $_GET['pageSize']);
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
      'isCaiArosio' => boolval($isCaiArosio),
      'updatePassword' => boolval($updatePassword),
      'canManageOpenings' => boolval($canManageOpenings),
      'canManageUsers' => boolval($canManageUsers)
    );
    array_push($users, $user_item);
  }
  $ret['content'] = $users;
}
echo json_encode($ret);

function filterToSql($filterJson) {
  $filter = json_decode($filterJson);

  $ret = '1=1';
  if (property_exists($filter, 'username')) {
    $ret = $ret . ' AND username LIKE \'%' . $filter->username . '%\'';
  }
  if (property_exists($filter, 'firstname')) {
    $ret = $ret . ' AND firstname LIKE \'%' . $filter->firstname . '%\'';
  }
  if (property_exists($filter, 'lastname')) {
    $ret = $ret . ' AND lastname LIKE \'%' . $filter->lastname . '%\'';
  }
  if (property_exists($filter, 'email')) {
    $ret = $ret . ' AND email LIKE \'%' . $filter->email . '%\'';
  }
  if (property_exists($filter, 'canManageOpenings')) {
    $ret = $ret . ' AND canManageOpenings = \'' . $filter->canManageOpenings . '\'';
  }
  if (property_exists($filter, 'canManageUsers')) {
    $ret = $ret . ' AND canManageUsers = \'' . $filter->canManageUsers . '\'';
  }
  if (property_exists($filter, 'toVerify')) {
    $ret = $ret . ' AND toVerify = \'' . $filter->toVerify . '\'';
  }

  return $ret;
}
