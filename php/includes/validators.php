<?php

include_once "connections.php";

function isEmpty($var) {
  return !isset($var) || empty(trim($var));
}

function isEmail($var) {
  return filter_var($var, FILTER_VALIDATE_EMAIL);
}

function isEmailExisting($email) {
  $db = connect();
  
  $sql = "SELECT * FROM users WHERE email = ?";
  $stmt = $db->prepare($sql);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->store_result();
  $db->close();

  return $stmt->fetch() > 0; 
}

function isHTMLDateValid($str) {
  return DateTime::createFromFormat('Y-m-d', $str) !== false;
}

function isValidGender($str) {
  return $str == "1" || $str == "2" || $str == "3";
}

?>