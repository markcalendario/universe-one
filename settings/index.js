async function displayEditInputFields() {
  const editInputFieldsContainer = document.getElementById("edit-input-fields");

  const response = await fetch("../php/controllers/account-settings.php");
  const result = await response.text();
  editInputFieldsContainer.innerHTML = result;
}

displayEditInputFields();
