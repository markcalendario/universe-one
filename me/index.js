const signOutBtn = document.getElementById("sign-out");

async function handleSigOut() {
  await fetch("../php/controllers/sign-out.php");
  window.location.reload();
}

async function getUserData() {
  const userDataContainer = document.getElementById("user-data");

  const response = await fetch("../php/controllers/me.php");
  const result = await response.text();
  userDataContainer.innerHTML = result;
}

signOutBtn.addEventListener("click", handleSigOut);
getUserData();
