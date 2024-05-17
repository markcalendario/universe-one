<?php

include_once "../includes/utils.php";

$countries = getCountriesList();

echo "<option value=''>Select a country.</option>";
foreach ($countries as $country) {
  echo "<option value='" . $country . "'>" . $country . "</option>";
}

?>