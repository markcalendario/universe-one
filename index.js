const closeNavBtn = document.getElementById("toggle-nav-links");
const navLinks = document.getElementById("nav-links");

function handleToggleNavLinks() {
  if (navLinks.style.display !== "flex") {
    return (navLinks.style.display = "flex");
  }

  navLinks.style.display = "none";
}

closeNavBtn.addEventListener("click", handleToggleNavLinks);
