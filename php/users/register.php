<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, X-Requested-With, Authorization, Pragma, Cache-Control, Expires');
header('Content-Type: application/json; charset=UTF-8');

require '../config/authorization.php';
require '../config/database.php';
require '../datamodel/user.php';

managePreflight();

$postData = file_get_contents('php://input');

if (isset($postData) && !empty($postData)) {
  $parsedData = json_decode($postData, true);
  $username = $parsedData['username'];
  $firstname = $parsedData['firstname'];
  $lastname = $parsedData['lastname'];
  $email = $parsedData['email'];
  $caiSection = $parsedData['caiSection'];
  $password = $parsedData['password'];
} else {
  http_response_code(400);
  die;
}

try {
  $database = new Database();
  $db = $database->getConnection();

  $user = new User($db);

  $securedPassword = createNewPassword($password);
  $user->register($username, $firstname, $lastname, $email, $caiSection, $securedPassword);

  http_response_code(200);
} catch (Exception $e) {
  error_log('Error in users/save: ' . $e, 0);
  http_response_code(500);
  die;
}
