<?php

include_once "../includes/validators.php";
include_once "../includes/connections.php";
include_once "../includes/utils.php";

session_start();

if (isEmpty($_POST["email"])) {
  echo '<p class="red-highlight">Please provide an email address</p>';
  return;
}

if (isEmpty($_POST["password"])) {
  echo '<p class="red-highlight">Please provide a password.</p>';
  return;
}

if (isEmpty($_POST["confirm-password"])) {
  echo '<p class="red-highlight">Please provide a password confirmation.</p>';
  return;
}

if (isEmpty($_POST["first-name"])) {
  echo '<p class="red-highlight">Please provide a first name.</p>';
  return;
}

if (isEmpty($_POST["last-name"])) {
  echo '<p class="red-highlight">Please provide a last name.</p>';
  return;
}

if (isEmpty($_POST["birthday"])) {
  echo '<p class="red-highlight">Please provide your birthday.</p>';
  return;
}

if (isEmpty($_POST["gender"])) {
  echo '<p class="red-highlight">Please provide your gender.</p>';
  return;
}

if (isEmpty($_POST["contact"])) {
  echo '<p class="red-highlight">Please provide your contact number.</p>';
  return;
}

if (isEmpty($_POST["country"])) {
  echo '<p class="red-highlight">Please provide your country of residency.</p>';
  return;
}

if (isEmpty($_POST["short-bio"])) {
  echo '<p class="red-highlight">Please provide your short biography (50 - 150 words).</p>';
  return;
}

$email = $_POST["email"];
$password = $_POST["password"];
$confirmPassword = $_POST["confirm-password"];
$firstName = $_POST["first-name"];
$lastName = $_POST["last-name"];
$birthday = $_POST["birthday"];
$gender = $_POST["gender"];
$contact = $_POST["contact"];
$country = $_POST["country"];
$bio = $_POST["short-bio"];

if (!isEmail($email)) {
  echo '<p class="red-highlight">Invalid email address format.</p>';
  return;
}

if (isEmailExisting($email)) {
  echo '<p class="red-highlight">Email is already registered. Try logging in.</p>';
  return;
}

if ($password != $confirmPassword) {
  echo '<p class="red-highlight">Password mismatch.</p>';
  return;
}

if (!isHTMLDateValid($birthday)) {
  echo '<p class="red-highlight">Invalid birthdate format.</p>';
  return;
}

if (!isValidGender($gender)) {
  echo '<p class="red-highlight">Invalid gender.</p>';
  return; 
}

if (strlen($bio) < 50 || strlen($bio) > 150) {
  echo '<p class="red-highlight">Biography must consist 50 to 150 characters.</p>';
  return;
}

$hashedPassword = hashPassword($password);

$db = connect();
$sql = "INSERT INTO users (first_name, last_name, email, password, birthday, gender, contact, country, biography) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $db->prepare($sql);
$stmt->bind_param("sssssssss", $firstName, $lastName, $email, $hashedPassword, $birthday, $gender, $contact, $country, $bio);
$stmt->execute();

if ($stmt->affected_rows) {
  echo '<p class="green-highlight">Success! You are now registered. </p>';
  $_SESSION["registered"] = true;
  return;
}

echo '<p class="red-highlight">An error occurred. Unable to register your account.</p>';


?>