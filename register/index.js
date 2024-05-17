const registerBtn = document.getElementById("register-btn");
const registrationForm = document.getElementById("register-form");

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

registerBtn.addEventListener("click", handleRegister);
