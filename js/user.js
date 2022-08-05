const inputs = document.querySelectorAll("input");
const checkbox = document.getElementById("checkbox");
const labels = document.querySelectorAll(".label");
const updated = "";

inputs.forEach((input) => {
  input.addEventListener("input", ({ target }) => {
    checkInput(target);
  });
});

function checkInput(target) {
  if (target.value) {
    labels.forEach((label) => {
      if (label.classList.contains(target.id)) {
        label.classList.add("hide-label");
      }
    });
  } else {
    labels.forEach((label) => {
      if (label.classList.contains(target.id)) {
        label.classList.remove("hide-label");
      }
    });
  }
}

checkbox.addEventListener("click", ({ target }) => {
  const password = document.getElementById("password");
  password.type = target.checked ? "text" : "password";
});

(function updateHandler() {
  const inputs = document.querySelectorAll(".update-input > input");
  inputs.forEach((input) => {
    console.log(input);
  });
})();

window.addEventListener("DOMContentLoaded", () => {
  inputs.forEach((input) => {
    checkInput(input);
  });
  const Darkmode = localStorage.getItem("isDarkmode");
  const isDark = Darkmode ? JSON.parse(Darkmode) : false;
  if (isDark) {
    document.body.classList.add("dark-mode");
  } else {
    document.body.classList.remove("dark-mode");
  }
});
