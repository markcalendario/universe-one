const countriesSelect = document.getElementById("country-of-residency");

function loadCountries() {
  for (const country of countries) {
    const option = document.createElement("option");
    option.innerText = country;
    option.value = country;
    countriesSelect.appendChild(option);
  }
}

loadCountries();
