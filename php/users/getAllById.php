<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, X-Requested-With');
header('Content-Type: application/json; charset=UTF-8');

include_once '../config/database.php';
include_once '../datamodel/user.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$stmt = $user->getAllById($_GET['id']);
$num = $stmt->rowCount();

$ret = array();
if ($num > 0) {
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    $user_item = array(
      'id' => $id,
      'firstname' => $firstname,
      'lastname' => $lastname
    );
    array_push($ret, $user_item);
  }
}
echo json_encode($ret);
?>
