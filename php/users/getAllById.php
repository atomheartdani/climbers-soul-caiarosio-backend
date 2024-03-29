<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, X-Requested-With, Authorization, Pragma, Cache-Control, Expires');
header('Content-Type: application/json; charset=UTF-8');

require '../config/database.php';
require '../datamodel/user.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$ret = array();
if (isset($_GET['id'])) {
  $stmt = $user->getAllById($_GET['id']);
  $num = $stmt->rowCount();

  if ($num > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      $user_item = array(
        'id' => $id,
        'username' => $username,
        'firstname' => $firstname,
        'lastname' => $lastname
      );
      array_push($ret, $user_item);
    }
  }
}
echo json_encode($ret);
