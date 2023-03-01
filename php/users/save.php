<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, X-Requested-With, Authorization, Pragma, Cache-Control, Expires');
header('Content-Type: application/json; charset=UTF-8');

require '../config/authorization.php';
require '../config/database.php';
require '../config/mail.php';
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
  $caiSection = $parsedData['caiSection'];
  $tosConsent = intval($parsedData['tosConsent']);
  $updatePassword = intval($parsedData['updatePassword']);
  $canManageOpenings = intval($parsedData['canManageOpenings']);
  $canManageUsers = intval($parsedData['canManageUsers']);
  $isVerified = intval($parsedData['isVerified']);
} else {
  http_response_code(400);
  die;
}

try {
  $database = new Database();
  $db = $database->getConnection();

  $user = new User($db);

  if ($id == 0) {
    $defaultPassword = createNewPassword($username);
    $user->create($username, $firstname, $lastname, $email, $caiSection, $tosConsent, $defaultPassword, $canManageOpenings, $canManageUsers, $isVerified);
  } else {
    $wasUserVerified = $user->wasUserVerified($id);
    $user->update($id, $username, $firstname, $lastname, $email, $caiSection, $tosConsent, $canManageOpenings, $canManageUsers, $isVerified);

    // create default password when updatePassword field is flagged
    if ($updatePassword == 1) {
      $defaultPassword = createNewPassword($username);
      $user->updatePassword($id, $defaultPassword, 1);
    }

    // send notification to user if isVerified field changes to true
    if ($isVerified == 1 && $wasUserVerified == false) {
      $mail = new Mail();
      $mail->sendAccountVerified($email);
    }
  }
  http_response_code(200);
} catch (Exception $e) {
  error_log('Error in users/save: ' . $e, 0);
  http_response_code(500);
  die;
}
