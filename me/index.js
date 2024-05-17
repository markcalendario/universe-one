async function getUserData() {
  const userDataContainer = document.getElementById("user-data");

  const response = await fetch("../php/controllers/me.php");
  const result = await response.text();
  userDataContainer.innerHTML = result;
}

getUserData();
