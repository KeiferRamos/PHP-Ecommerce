const inputs = document.querySelectorAll("input");
const checkbox = document.getElementById("checkbox");
const labels = document.querySelectorAll(".label");
const isUpdating = false;

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

function updateInfo() {
  const { id } = window.event.target.dataset;
  const EltoUpdate = document.getElementById(id);
  const confirm = document.getElementById("confirm");
  const warningText = document.querySelector(".warning-text");
  if (EltoUpdate.readOnly) {
    EltoUpdate.value = "";
    EltoUpdate.readOnly = false;
    EltoUpdate.focus();
    if (id == "password") {
      confirm.value = "";
    }
  } else {
    const xhr = new XMLHttpRequest();

    xhr.open(
      "POST",
      `../includes/update_info.php?update=${EltoUpdate.value}&toUpdate=${id}`,
      true
    );

    xhr.onload = () => {
      if (id == "password") {
        if (confirm.value != EltoUpdate.value) {
          warningText.textContent = "password does not match";
        } else if (EltoUpdate.value.length < 8) {
          warningText.textContent = "password must be atleast 8 char long!";
        } else {
          warningText.textContent = xhr.response;
          EltoUpdate.readOnly = true;
        }
      }

      if (id == "username") {
        if (EltoUpdate.value.length >= 5) {
          warningText.textContent = xhr.response;
          if (xhr.response != "username already in used!") {
            EltoUpdate.readOnly = true;
          }
        } else {
          warningText.textContent = "Username must be atleast 5 char long!";
        }
      }
    };

    xhr.send();
  }
}

checkbox.addEventListener("click", ({ target }) => {
  const password = document.getElementById("password");
  password.type = target.checked ? "text" : "password";
});

(function updateHandler() {
  const inputs = document.querySelectorAll(".update-input > input");
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
