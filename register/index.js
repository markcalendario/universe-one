const countriesSelect = document.getElementById("country-of-residency");
const registerBtn = document.getElementById("register-btn");
const registrationForm = document.getElementById("register-form");

function loadCountries() {
  for (const country of countries) {
    const option = document.createElement("option");
    option.innerText = country;
    option.value = country;
    countriesSelect.appendChild(option);
  }
}

async function handleRegister() {
  const response = await fetch("../php/controllers/register.php", {
    method: "POST",
    body: new FormData(registrationForm)
  });
  const result = await response.text();
  const responseContainer = document.getElementById("response-container");
  responseContainer.style.display = "block";
  responseContainer.innerHTML = result;

  if (result.includes("Success!")) {
    window.location.reload();
  }
}

loadCountries();
registerBtn.addEventListener("click", handleRegister);
