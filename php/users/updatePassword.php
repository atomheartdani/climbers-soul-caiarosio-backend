<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, X-Requested-With, Authorization, Pragma, Cache-Control, Expires');
header('Content-Type: application/json; charset=UTF-8');

require '../config/authorization.php';
require '../config/database.php';
require '../config/include/config.php';
require '../datamodel/user.php';

managePreflight();

$postData = file_get_contents('php://input');

if (isset($postData) && !empty($postData)) {
  $parsedData = json_decode($postData, true);
  $username = $parsedData['username'];
  $oldPassword = $parsedData['oldPassword'];
  $newPassword = $parsedData['newPassword'];
} else {
  updatePasswordFailed();
}

try {
  $database = new Database();
  $db = $database->getConnection();

  $user = new User($db);

  $stmt = $user->login($username);
  $num = $stmt->rowCount();

  if($num > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $savedPassword = $row['password'];

    if(password_verify($oldPassword, $savedPassword) && strlen($newPassword) >= 16) {
      $newPasswordHash = password_hash($newPassword, PASSWORD_BCRYPT, ['cost' => 15]);
      $user->updatePassword($row['id'], $newPasswordHash);
      http_response_code(200);
    } else {
      updatePasswordFailed();
    }
  } else {
    updatePasswordFailed();
  }
} catch (Exception $e) {
  error_log('Error in users/updatePassword: ' . $e, 0);
  http_response_code(500);
  die;
}

function updatePasswordFailed() {
  http_response_code(401);
  echo json_encode(array('message' => 'Aggiornamento password fallito', 'detail' => 'Username o password non validi'));
  die();
}
