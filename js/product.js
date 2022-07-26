const user_profile = document.getElementById("user-profile");
const profileContainer = document.querySelector(".profile");
const settings = document.querySelector(".profile-settings");
const toggler = document.getElementById("toggle-mode");
const productBtns = document.querySelectorAll(".product-btn");
const searchbar = document.getElementById("searchbar");
const categories = document.getElementById("categories");
const priceRange = document.getElementById("price-range");
const sort = document.getElementById("sort");
const productContainer = document.querySelector(".products");
const singleProduct = document.querySelectorAll(".product");
const addTocartBtns = document.querySelectorAll(".add-btn");
const recommended = document.getElementById("recommended");

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

singleProduct.forEach((item) => {
  item.addEventListener("click", ({ target: { id, classList } }) => {
    if (classList.contains("add-btn")) {
      return;
    } else {
      $base_url = "http://localhost/e-commerce/pages/";
      window.location = `${$base_url}info_page.php?id=${id}`;
    }
  });
});

recommended.addEventListener("click", ({ target: { id } }) => {
  $base_url = "http://localhost/e-commerce/pages/";
  window.location = `${$base_url}info_page.php?id=${id}`;
});

addTocartBtns.forEach((btn) => {
  btn.addEventListener("click", (e) => {
    console.log(e.target.id);
  });
});

searchbar.addEventListener("input", ({ target }) => {
  const xhr = new XMLHttpRequest();

  xhr.open("POST", `../includes/search.php?query=${target.value}`, true);

  xhr.onload = () => {
    if (xhr.status == 200) {
      const recommended = document.getElementById("recommended");
      recommended.innerHTML = xhr.response ? xhr.response : "";
    }
  };

  xhr.send();
});

[sort, priceRange, categories].forEach((selection) => {
  selection.addEventListener("change", () => {
    const c = categories.value;
    const p = priceRange.value;
    const s = sort.value;

    const xhr = new XMLHttpRequest();
    xhr.open("POST", `../includes/filter.php?c=${c}&p=${p}&s=${s}`, true);

    xhr.onload = () => {
      if (xhr.status == 200) {
        productContainer.innerHTML = xhr.response;
      }
    };

    xhr.send();
  });
});

window.addEventListener("click", ({ target: { classList, id } }) => {
  if (!classList.contains("recommended-item") && id != "searchbar") {
    recommended.innerHTML = "";
    searchbar.value = "";
  }
  if (id != "user-profile" && !classList.contains("settings")) {
    profileContainer.classList.remove("show-settings");
  }
});
