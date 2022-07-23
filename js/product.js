const profile = document.querySelector(".profile");
const settings = document.querySelector(".profile-settings");

profile.addEventListener("click", () => {
  if (!profile.classList.contains("show-settings")) {
    profile.classList.add("show-settings");
  } else {
    profile.classList.remove("show-settings");
  }
});
