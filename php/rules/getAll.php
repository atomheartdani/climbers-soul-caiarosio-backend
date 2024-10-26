<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, X-Requested-With, Authorization, Pragma, Cache-Control, Expires');
header('Content-Type: application/json; charset=UTF-8');

require '../config/database.php';
require '../datamodel/rule.php';

$database = new Database();
$db = $database->getConnection();

$rule = new Rule($db);

$stmt = $rule->getAll();
$num = $stmt->rowCount();

$ret = array();
if ($num > 0) {
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    $rule_item = array(
      'id' => $id,
      'order' => $order,
      'parentOrder' => $parentOrder,
      'content' => $content
    );
    array_push($ret, $rule_item);
  }
}
echo json_encode($ret);
