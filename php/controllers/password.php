<?php

include_once "../model/user.php";
include_once "../includes/validators.php";
session_start();

if (isEmpty($_POST["current-password"])) {
  echo '<p class="red-highlight">Please provide your current password.</p>';
  return;
}

if (isEmpty($_POST["new-password"])) {
  echo '<p class="red-highlight">Please provide your new password.</p>';
  return;
}

if (isEmpty($_POST["confirm-new-password"])) {
  echo '<p class="red-highlight">Please confirm/retype your new password.</p>';
  return;
}

$currentPassword = $_POST["current-password"];
$newPassword = $_POST["new-password"];
$confirmNewPassword = $_POST["confirm-new-password"];

$user = new User($_SESSION['auth']);

if (!isPasswordCorrect($user->getEmail(), $currentPassword)) {
  echo '<p class="red-highlight">Incorrect old password.</p>';
  return;
}

if ($newPassword != $confirmNewPassword) {
  echo '<p class="red-highlight">New and confirm password fields mismatch.</p>';
  return;
}

if (!isStrongPassword($newPassword)) {
  echo '<p class="red-highlight">Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one digit, and one special character.</p>';
  return;
}

if (isPasswordCorrect($user->getEmail(), $newPassword)) {
  echo '<p class="red-highlight">Old and new passwords cannot not be the same.</p>';
  return;
}

if ($user->updatePassword($newPassword)) {
  echo '<p class="green-highlight">Success! Password changed successfully.</p>';
  return;
}

echo '<p class="red-highlight">Error occured while chaning password.</p>';

?>