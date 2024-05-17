<?php

include_once "../model/user.php";
include_once "../includes/utils.php";
session_start();

$user = new User($_SESSION["auth"]);
echo "<h1>Edit " . $user->getFirstName() . "</h1>";
echo "<div class='input'>";
echo "<label for='email'>Email</label>";
echo "<input id='email' name='email' type='text' value='" . $user->getEmail() . "' />";
echo "</div>";

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

echo "<button class='button'>Update My Account</button>";

?>