<?php

include_once "connections.php";

function hashPassword($password) {
  return password_hash($password, PASSWORD_BCRYPT);
}

function decodeGender($encodedGender) {
  switch ($encodedGender) {
    case 1:
      return "Male";
    case 2:
      return "Female";
    default:
      return "Other";
  }
}

function getUserIdFromEmail($email) {
  $db = connect();

  $sql = "SELECT id FROM users WHERE email = ?";
  $stmt = $db->prepare($sql);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->bind_result($id);
  $stmt->fetch();

  return $id;
}

?>