async function displayCountries() {
  const countriesSelectInput = document.getElementById("country-select");

  const response = await fetch("../php/controllers/countries-options.php");
  const result = await response.text();
  countriesSelectInput.innerHTML = result;
}

displayCountries();
