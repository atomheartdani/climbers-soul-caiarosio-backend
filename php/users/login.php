<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, X-Requested-With');
header('Content-Type: application/json; charset=UTF-8');

include_once "../config/database.php";
include_once '../datamodel/user.php';
require "../vendor/autoload.php";
require "../config/include/config.php";

use \Firebase\JWT\JWT;

// For now, always return 200 OK per preflight request
if ( "OPTIONS" === $_SERVER['REQUEST_METHOD'] ) {
  http_response_code(200);
  die;
}

$postData = file_get_contents("php://input");

if (isset($postData) && !empty($postData)) {
  $parsedData = json_decode($postData, true);
  $username = $parsedData["username"];
  $password = $parsedData["password"];
} else {
  loginFailed();
}

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$stmt = $user->login($username);
$num = $stmt->rowCount();

if($num > 0) {
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  $savedPassword = $row["password"];

  if(password_verify($password, $savedPassword)) {
    $issuer_claim = "climbers-soul-caiarosio-backend";
    $audience_claim = "climbers-soul-caiarosio";
    $issuedAt_claim = new DateTimeImmutable();
    $expire_claim = $issuedAt_claim->modify("+10 minutes");
    extract($row);
    $token = array(
      "iss" => $issuer_claim,
      "aud" => $audience_claim,
      "iat" => $issuedAt_claim->getTimestamp(),
      "nbf" => $issuedAt_claim->getTimestamp(),
      "exp" => $expire_claim->getTimestamp(),
      "data" => array(
        "id" => $id,
        "username" => $username,
        "firstname" => $firstname,
        "lastname" => $lastname,
        "email" => $email,
        "isAdmin" => $isAdmin
      )
    );

    http_response_code(200);

    $jwt = JWT::encode($token, $jwt_key, "HS256");
    echo json_encode(
      array(
        "message" => "Login effettuato",
        "access_token" => $jwt
      )
    );
  } else {
    loginFailed();
  }
} else {
  loginFailed();
}

function loginFailed() {
  http_response_code(401);
  echo json_encode(array("message" => "Login fallito", "detail" => "Username o password non validi"));
  die();
}
?>
