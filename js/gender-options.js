async function displayCountries() {
  const genderSelectInput = document.getElementById("gender-select");

  const response = await fetch("../php/controllers/genders-options.php");
  const result = await response.text();
  genderSelectInput.innerHTML = result;
}

displayCountries();
