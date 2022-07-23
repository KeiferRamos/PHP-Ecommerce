const user_profile = document.getElementById("user-profile");
const profileContainer = document.querySelector(".profile");
const settings = document.querySelector(".profile-settings");
const toggler = document.getElementById("toggle-mode");
const productBtns = document.querySelectorAll(".product-btn");

user_profile.addEventListener("click", () => {
  if (!profileContainer.classList.contains("show-settings")) {
    profileContainer.classList.add("show-settings");
  } else {
    profileContainer.classList.remove("show-settings");
  }
});

toggler.addEventListener("click", (e) => {
  e.preventDefault();
  if (!document.body.classList.contains("dark-mode")) {
    toggler.innerHTML = `
      <i class="fa-solid fa-sun"></i>
      <p>light mode</p>`;
    document.body.classList.add("dark-mode");
    productBtns.forEach((btn) => {
      btn.classList.add("light-button");
    });
  } else {
    document.body.classList.remove("dark-mode");
    toggler.innerHTML = `
      <i class="fa-solid fa-moon"></i>
      <p>dark mode</p>`;
    productBtns.forEach((btn) => {
      btn.classList.remove("light-button");
    });
  }
});
