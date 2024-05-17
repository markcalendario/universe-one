<?php

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

?>