document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("form");
  const usernameInput = document.querySelector('input[name="username"]');
  const passwordInput = document.querySelector('input[name="password"]');
  const confirmInput = document.querySelector('input[name="password_confirmation"]');

  form.addEventListener("submit", function (event) {
    let isValid = true;

    if (usernameInput.value.trim() === "") {
      isValid = false;
      usernameInput.classList.add("input-error");
    } else {
      usernameInput.classList.remove("input-error");
    }

    if (passwordInput.value.trim() === "") {
      isValid = false;
      passwordInput.classList.add("input-error");
    } else {
      passwordInput.classList.remove("input-error");
    }

    if (confirmInput.value.trim() === "" || confirmInput.value !== passwordInput.value) {
      isValid = false;
      confirmInput.classList.add("input-error");
    } else {
      confirmInput.classList.remove("input-error");
    }

    if (!isValid) {
      event.preventDefault();
    }
  });
});
