let timer;
let isEditing = false;
let commentID;
let limit = 2;

function showSettings() {
  const profileContainer = document.querySelector(".profile");
  if (!profileContainer.classList.contains("show-settings")) {
    profileContainer.classList.add("show-settings");
  } else {
    profileContainer.classList.remove("show-settings");
  }
}

function toggleSettings() {
  if (!document.body.classList.contains("dark-mode")) {
    const toggler = document.getElementById("toggler");
    toggler.innerHTML = `
      <i class="fa-solid fa-sun"></i>
      <p>light mode</p>`;

    document.body.classList.add("dark-mode");
    localStorage.setItem("isDarkmode", true);
  } else {
    document.body.classList.remove("dark-mode");
    localStorage.setItem("isDarkmode", false);

    toggler.innerHTML = `
      <i class="fa-solid fa-moon"></i>
      <p>dark mode</p>`;
  }
}

function productHandler(id) {
  const { classList, id: item_id } = window.event.target;

  if (classList.contains("add-btn") || item_id == "reviews") {
    return;
  } else {
    $base_url = "http://localhost/e-commerce/pages/";
    window.location = `${$base_url}info_page.php?id=${id}`;
  }
}

function likeItem(id) {
  const xhr = new XMLHttpRequest();

  xhr.open("POST", `../includes/likeHandler.php?id=${id}`, true);

  xhr.onload = () => {
    if (xhr.status == 200) {
      const likesContainer = document.getElementById(id);
      const { parentElement: parent } = likesContainer;

      likesContainer.innerText = xhr.response;

      if (!parent.classList.contains("user-liked")) {
        parent.classList.add("user-liked");
      } else {
        parent.classList.remove("user-liked");
      }
    }
  };

  xhr.send();
}

function closeModal() {
  const { classList: m } = document.querySelector(".modal");
  m.remove("show-modal");
}

function scrollback() {
  window.scroll(0, 0);
}

function displaySelected() {
  const {
    target: { id },
  } = window.event;

  $base_url = "http://localhost/e-commerce/pages/";
  window.location = `${$base_url}info_page.php?id=${id}`;
}

function signout() {
  const xhr = new XMLHttpRequest();

  xhr.open("GET", "../includes/signout.php", true);

  xhr.onload = () => {
    if (xhr.status == 200) {
      window.location = xhr.response;
    }
  };

  xhr.send();
}

function addTocart() {
  const {
    dataset: { id, url },
  } = window.event.target;

  const xhr = new XMLHttpRequest();

  xhr.open("POST", `${url}?id=${id}`, true);

  xhr.onload = () => {
    if (xhr.status == 200) {
      const { classList: m } = document.querySelector(".modal");
      const { classList: l } = document.querySelector(".loading");
      document.querySelector(".modal-text").textContent = xhr.response;

      if (!m.contains("show-modal")) {
        m.add("show-modal");
      }

      if (l.contains("start-loading")) {
        l.remove("start-loading");
        setTimeout(() => l.add("start-loading"), 100);
      } else {
        l.add("start-loading");
      }

      clearTimeout(timer);

      timer = setTimeout(() => {
        m.remove("show-modal");
        l.remove("start-loading");
      }, 4000);
    }
  };

  xhr.send();
}

function searchQuery() {
  const { target } = window.event;
  const xhr = new XMLHttpRequest();

  xhr.open("POST", `../includes/search.php?query=${target.value}`, true);

  xhr.onload = () => {
    if (xhr.status == 200) {
      const recommended = document.querySelector(".recommended");
      recommended.innerHTML = xhr.response ? xhr.response : "";
    }
  };

  xhr.send();
}

function filterItem() {
  const c = document.getElementById("categories").value;
  const p = document.getElementById("price-range").value;
  const s = document.getElementById("sort").value;

  const xhr = new XMLHttpRequest();
  xhr.open("POST", `../includes/filter.php?c=${c}&p=${p}&s=${s}`, true);

  xhr.onload = () => {
    if (xhr.status == 200) {
      document.querySelector(".products").innerHTML = xhr.response;
    }
  };

  xhr.send();
}

function addComment() {
  window.event.preventDefault();
  const comment = document.getElementById("comment");

  if (comment.value) {
    const xhr = new XMLHttpRequest();

    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get("id");
    const queryString = `comment=${comment.value}&id=${id}&limit=${limit}&itemID=${id}&commentId=${commentID}`;

    if (isEditing) {
      xhr.open("POST", `../includes/update_comment.php?${queryString}`, true);
    } else {
      limit += 1;
      xhr.open("POST", `../includes/add_comment.php?${queryString}`, true);
    }

    xhr.onload = () => {
      if (xhr.status == 200) {
        document.getElementById("item-comments").innerHTML = xhr.response;
        comment.value = "";
      }
      isEditing = false;
      commentID = "";
    };

    xhr.send();
  } else {
    document.getElementById("error-message").innerHTML = "Enter your comment!";
  }
}

function clearErrorMsg() {
  document.getElementById("error-message").innerHTML = "";
}

function updateComment() {
  const {
    dataset: { comment, cid },
  } = window.event.target;
  isEditing = true;
  commentID = cid;

  document.getElementById("comment").value = comment;
}

function deleteComment(id) {
  const xhr = new XMLHttpRequest();

  const URLParams = new URLSearchParams(window.location.search);
  const itemId = URLParams.get("id");

  xhr.open(
    "POST",
    `../includes/delete_comment.php?id=${id}&itemID=${itemId}&limit=${limit}`,
    true
  );

  xhr.onload = () => {
    if (xhr.status == 200) {
      document.getElementById("item-comments").innerHTML = xhr.response;
    }
  };

  xhr.send();
}

function renderComments() {
  const URLParams = new URLSearchParams(window.location.search);
  const itemId = URLParams.get("id");

  const xhr = new XMLHttpRequest();

  xhr.open(
    "POST",
    `../includes/rendercomment.php?limit=${limit}&itemID=${itemId}`,
    true
  );

  xhr.onload = () => {
    if (xhr.status == 200) {
      document.getElementById("item-comments").innerHTML = xhr.response;
    }
  };

  xhr.send();
}

function viewMore() {
  limit += 2;
  renderComments();
  const comments = document.getElementById("item-comments");
  window.scrollTo(0, comments.scrollHeight);
}

function removeItem() {
  const xhr = new XMLHttpRequest();

  const {
    dataset: { id },
  } = window.event.target;

  xhr.open("POST", `../includes/removeItem.php?item_id=${id}`, true);

  xhr.onload = () => {
    if (xhr.status == 200) {
      document.getElementById("cart-items").innerHTML = xhr.response;
    }
  };

  xhr.send();
}

window.addEventListener("DOMContentLoaded", () => {
  const isDarkmode = localStorage.getItem("isDarkmode");
  const isDark = isDarkmode ? JSON.parse(isDarkmode) : false;
  if (isDark) {
    const toggler = document.getElementById("toggler");
    toggler.innerHTML = `
      <i class="fa-solid fa-sun"></i>
      <p>light mode</p>`;

    document.body.classList.add("dark-mode");
  } else {
    const toggler = document.getElementById("toggler");
    toggler.innerHTML = `
      <i class="fa-solid fa-moon"></i>
      <p>dark mode</p>`;

    document.body.classList.remove("dark-mode");
  }
});

window.addEventListener("click", ({ target: { classList, id } }) => {
  const path = "/e-commerce/pages/product_page.php";
  if (window.location.pathname == path) {
    if (!classList.contains("recommended-item") && id != "searchbar") {
      document.querySelector(".recommended").innerHTML = "";
      document.getElementById("searchbar").value = "";
    }
  }

  if (id != "user-profile" && !classList.contains("settings")) {
    const profileContainer = document.querySelector(".profile");
    profileContainer.classList.remove("show-settings");
  }
});

window.addEventListener("scroll", () => {
  const arrow = document.querySelector(".arrow-up");
  if (window.scrollY >= 400) {
    arrow.classList.add("show-arrow");
  } else {
    arrow.classList.remove("show-arrow");
  }
});
