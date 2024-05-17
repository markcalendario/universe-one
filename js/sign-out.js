async function handleSigOut() {
  await fetch("../php/controllers/sign-out.php");
  window.location.reload();
}

const signOutBtn = document.getElementById("sign-out");
signOutBtn.addEventListener("click", handleSigOut);
