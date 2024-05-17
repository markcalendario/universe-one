const loginBtn = document.getElementById("login-btn");
const loginForm = document.getElementById("login-form");

async function handleLogin() {
  const response = await fetch("../php/controllers/login.php", {
    method: "POST",
    body: new FormData(loginForm)
  });

  const result = await response.text();
  const responseContainer = document.getElementById("response-container");

  responseContainer.style.display = "block";
  responseContainer.innerHTML = result;

  if (result.includes("Success!")) {
    window.location.reload();
  }
}

loginBtn.addEventListener("click", handleLogin);
