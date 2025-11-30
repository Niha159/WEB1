<?php
header('Content-Type: application/json; charset=utf-8');
$response = [
  'method' => $_SERVER['REQUEST_METHOD'],
  'ok' => ($_SERVER['REQUEST_METHOD'] === 'POST'),
  'post' => $_POST,
];
echo json_encode($response);
