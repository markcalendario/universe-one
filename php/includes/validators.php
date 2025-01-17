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

function isPasswordCorrect($email, $password) {
  $db = connect();

  $sql = "SELECT password FROM users WHERE email = ?";
  $stmt = $db->prepare($sql);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->bind_result($hashedPassword);
  $stmt->fetch();
  $db->close();

  return password_verify($password, $hashedPassword);
}

function isStrongPassword($password) {
  // Password must be at least 8 characters long
  if (strlen($password) < 8) {
      return false;
  }
  
  // Password must contain at least one lowercase letter
  if (!preg_match('/[a-z]/', $password)) {
      return false;
  }
  
  // Password must contain at least one uppercase letter
  if (!preg_match('/[A-Z]/', $password)) {
      return false;
  }
  
  // Password must contain at least one digit
  if (!preg_match('/\d/', $password)) {
      return false;
  }
  
  // Password must contain at least one special character
  if (!preg_match('/[\W_]/', $password)) {
      return false;
  }
  
  return true;
}

?>