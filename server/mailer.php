<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
header("Content-Type: application/json; charset=utf-8");
$data = json_decode(file_get_contents('php://input'), true);
$today = date('Y-m-d');
ini_set('display_errors', 1);
error_reporting(E_ALL);
$from = utf8_decode($data['from']);
$to = utf8_decode($data['to']);
$subject = utf8_decode($data['tema']);
$message = utf8_decode($data['mensaje']);
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
$headers .= "From:" . $from;
mail($to, $subject, $message, $headers);
$result = json_encode(array('success' => true));
echo $result;


