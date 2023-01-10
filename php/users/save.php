<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, X-Requested-With, Authorization');
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
  $isAdmin = $parsedData['isAdmin'];
  $updatePassword = $parsedData['updatePassword'];
} else {
  http_response_code(400);
  die;
}

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

if($id==0) {
  $defaultPassword = password_hash($username, PASSWORD_BCRYPT, ['cost' => 15]);
  $user->insert($username, $firstname, $lastname, $email, $isAdmin, $defaultPassword);
} else {
  $user->update($id, $username, $firstname, $lastname, $email, $isAdmin, $updatePassword);
}
http_response_code(200);