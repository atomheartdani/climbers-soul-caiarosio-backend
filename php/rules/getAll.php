<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, X-Requested-With, Authorization');
header('Content-Type: application/json; charset=UTF-8');

include_once '../config/database.php';
include_once '../datamodel/rule.php';

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
      'content' => $content,
      'parentId' => $parentId
    );
    array_push($ret, $rule_item);
  }
}
echo json_encode($ret);
?>
