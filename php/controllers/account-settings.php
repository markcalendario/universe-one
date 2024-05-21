<?php

include_once "../model/user.php";
include_once "../includes/utils.php";
include_once "../includes/validators.php";
session_start();

function getAccountSettingsDisplay() {
  $user = new User($_SESSION["auth"]);
  echo "<h1>Edit " . $user->getFirstName() . "</h1>";

  echo "<div class='input'>";
  echo "<label for='first-name'>First Name</label>";
  echo "<input id='first-name' name='first-name' type='text' value='" . $user->getFirstName() . "' />";
  echo "</div>";

  echo "<div class='input'>";
  echo "<label for='last-name'>Last Name</label>";
  echo "<input id='last-name' name='last-name' type='text' value='" . $user->getLastName() . "' />";
  echo "</div>";

  echo "<div class='input'>";
  echo "<label for='birthday'>Birthday</label>";
  echo "<input id='birthday' name='birthday' type='date' value='" . $user->getHTMLFormatBirthday() . "' />";
  echo "</div>";

  echo "<div class='input'>";
  echo "<label for='gender'>Gender</label>";
  echo "<select id='gender' name='gender' type='text'>";
  echo "<option value=''>Select your gender.</option>";
  $genders = getGenders();
  foreach ($genders as $key => $value) {
    echo "<option value='$key'" . ($user->getGender() === $value ? ' selected' : '') . ">$value</option>";
  }
  echo "</select>";
  echo "</div>";

  echo "<div class='input'>";
  echo "<label for='contact'>Contact</label>";
  echo "<input id='contact' name='contact' type='text' value='" . $user->getContact() . "' />";
  echo "</div>";

  echo "<div class='input'>";
  echo "<label for='country-of-residency'>Country of Residency</label>";
  echo "<select id='country-of-residency' name='country' type='text'>";
  echo "<option value=''>Select a country.</option>";
  $countries = getCountriesList();
  foreach ($countries as $country) {
      echo "<option value='$country'" .  ($user->getCountry() === $country ? ' selected' : '') . ">$country</option>";
  }
  echo "</select>";
  echo "</div>";

  echo "<div class='input'>";
  echo "<label for='bio'>Short Bio</label>";
  echo "<textarea id='bio' name='short-bio'>" . $user->getBiography() . "</textarea>";
  echo "</div>";

  echo "<div id='form-response'></div>";
  echo "<button onclick='handleUpdateAccount()' class='button'>Update My Account</button>";
}

function updateAccountInformation() {
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

  $firstName = $_POST["first-name"];
  $lastName = $_POST["last-name"];
  $birthday = $_POST["birthday"];
  $gender = $_POST["gender"];
  $contact = $_POST["contact"];
  $country = $_POST["country"];
  $bio = $_POST["short-bio"];

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

  $user = new User($_SESSION['auth']);
  $isUpdated = $user->updateInfo($firstName, $lastName, $birthday, $gender, $contact, $country, $bio);

  if ($isUpdated) {
    echo '<p class="green-highlight">Success! You have successfully edited your info.</p>';
    return;
  }
}

if ($_SERVER['REQUEST_METHOD'] == "GET") {
  getAccountSettingsDisplay();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  updateAccountInformation();
}

?>