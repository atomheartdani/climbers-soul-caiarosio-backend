<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

function managePreflight() {
  // For now, always return 200 OK per preflight request
  if ('OPTIONS' === $_SERVER['REQUEST_METHOD']) {
    http_response_code(200);
    die;
  }
}

function checkAuthorization() {
  require 'include/config.php';
  require '../vendor/autoload.php';

  // Check if Authorization header is present
  if (!preg_match('/Bearer\s(\S+)/', $_SERVER['HTTP_AUTHORIZATION'], $matches)) {
    http_response_code(401);
    die;
  }

  // Check if Authorization header contains data
  $token = $matches[1];
  if (!$token) {
    http_response_code(401);
    die;
  }
  $decoded = JWT::decode($token, new Key($jwt_key, 'HS256'));

  $now = new DateTimeImmutable();
  $serverName = 'climbers-soul-caiarosio-backend';

  // Check if jwt token is valid
  if ($decoded->iss !== $serverName || $decoded->nbf > $now->getTimestamp() || $decoded->exp < $now->getTimestamp()) {
    http_response_code(401);
    die;
  }
}
