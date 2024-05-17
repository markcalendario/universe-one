const signOutBtn = document.getElementById("sign-out");

async function handleSigOut() {
  await fetch("../php/controllers/sign-out.php");
  window.location.reload();
}

signOutBtn.addEventListener("click", handleSigOut);
