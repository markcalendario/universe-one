<?php

include_once "../includes/utils.php";

$genders = getGenders();

echo "<option value=''>Select gender.</option>";
foreach ($genders as $genderKey => $genderName) {
  echo "<option value='" . $genderKey . "'>" . $genderName . "</option>";
}

?>