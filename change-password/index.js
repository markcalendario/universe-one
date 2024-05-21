const updatePasswordBtn = document.getElementById("update-password");

async function handleUpdatePassword() {
  const formResponseContainer = document.getElementById("form-response");
  const editPasswordForm = document.getElementById("edit-password-form");

  const response = await fetch("../php/controllers/password.php", {
    method: "POST",
    body: new FormData(editPasswordForm)
  });
  const result = await response.text();
  formResponseContainer.innerHTML = result;

  if (result.includes("Success!")) {
    editPasswordForm.reset();
  }
}

updatePasswordBtn.addEventListener("click", handleUpdatePassword);
