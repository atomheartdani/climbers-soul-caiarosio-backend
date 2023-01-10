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

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$ret = array();
if (isset($_GET['id'])) {
  $user->delete($_GET['id']);
}
http_response_code(200);
