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

$postData = file_get_contents('php://input');

if (isset($postData) && !empty($postData)) {
  $parsedData = json_decode($postData, true);
  $id = $parsedData['id'];
  $username = $parsedData['username'];
  $firstname = $parsedData['firstname'];
  $lastname = $parsedData['lastname'];
  $email = $parsedData['email'];
  $tosConsent = intval($parsedData['tosConsent']);
  $isCaiArosio = intval($parsedData['isCaiArosio']);
  $updatePassword = intval($parsedData['updatePassword']);
  $canManageOpenings = intval($parsedData['canManageOpenings']);
  $canManageUsers = intval($parsedData['canManageUsers']);
} else {
  http_response_code(400);
  die;
}

try {
  $database = new Database();
  $db = $database->getConnection();

  $user = new User($db);

  if($id==0) {
    $defaultPassword = password_hash($username, PASSWORD_BCRYPT, ['cost' => 15]);
    $user->insert($username, $firstname, $lastname, $email, $tosConsent, $isCaiArosio, $defaultPassword, $canManageOpenings, $canManageUsers);
  } else {
    $user->update($id, $username, $firstname, $lastname, $email, $tosConsent, $isCaiArosio, $updatePassword, $canManageOpenings, $canManageUsers);
  }
  http_response_code(200);
} catch (Exception $e) {
  error_log('Error in users/save: ' . $e, 0);
  http_response_code(500);
  die;
}
