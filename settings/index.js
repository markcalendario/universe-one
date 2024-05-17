const form = document.getElementById("edit-input-fields");

async function displayEditInputFields() {
  const editInputFieldsContainer = document.getElementById("edit-input-fields");

  const response = await fetch("../php/controllers/account-settings.php");
  const result = await response.text();
  editInputFieldsContainer.innerHTML = result;
}

async function handleUpdateAccount() {
  const formResponseContainer = document.getElementById("form-response");

  const response = await fetch("../php/controllers/account-settings.php", {
    method: "POST",
    body: new FormData(form)
  });
  const result = await response.text();
  formResponseContainer.innerHTML = result;
}

displayEditInputFields();
