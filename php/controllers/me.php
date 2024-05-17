<?php

  include_once "../model/user.php";
  session_start();

  $user = new User($_SESSION["auth"]);
  echo "<h1>" . $user->getFullName() . "</h1>";

  echo "<div class='field'>";
  echo "<p class='field-name'>Email</p>";
  echo "<p class='data'>" . $user->getEmail() . "</p>";
  echo "</div>";
  
  echo "<div class='field'>";
  echo "<p class='field-name'>Contact</p>";
  echo "<p class='data'>" . $user->getContact() . "</p>";
  echo "</div>";
  
  echo "<div class='field'>";
  echo "<p class='field-name'>Birthday</p>";
  echo "<p class='data'>" . $user->getBirthday() . "</p>";
  echo "</div>";
  
  echo "<div class='field'>";
  echo "<p class='field-name'>Gender</p>";
  echo "<p class='data'>" . $user->getGender() . "</p>";
  echo "</div>";
  
  echo "<div class='field'>";
  echo "<p class='field-name'>Country</p>";
  echo "<p class='data'>" . $user->getCountry() . "</p>";
  echo "</div>";
  
  echo "<div class='field'>";
  echo "<p class='field-name'>Biography</p>";
  echo "<p class='data'>" . $user->getBiography() . "</p>";
  echo "</div>";
  
?>