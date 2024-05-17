<?php

include_once "../includes/validators.php";
include_once "../includes/utils.php";

session_start();

if (isEmpty($_POST["email"])) {
  echo "<p class='red-highlight'>Email address is required.</p>";
  return;
}

if (isEmpty($_POST["password"])) {
  echo "<p class='red-highlight'>Password is required.</p>";
  return;
}

$email = $_POST["email"]; 
$password = $_POST["password"];

if (!isEmailExisting($email)) {
  echo "<p class='red-highlight'>Email is not yet registered.</p>";
  return;
}

if (!isPasswordCorrect($email, $password)) {
  echo "<p class='red-highlight'>Incorrect credentials.</p>";
  return;
}

echo "<p class='green-highlight'>Success! You are now logged in.</p>";
$_SESSION["auth"] = getUserIdFromEmail($email);

?>