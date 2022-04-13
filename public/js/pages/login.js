console.log("Login");

const form = document.getElementById("form");
const csrf_token = document.getElementsByName("_token")[0].value;
const inputEmail = document.getElementById("inputEmail");
const inputPassword = document.getElementById("inputPassword");
const passwordToggle = document.getElementById("passwordToggle");

passwordToggle.addEventListener("click", () => {
  if (inputPassword.getAttribute("type") === "password") {
    inputPassword.type = "text";
  }
  else {
    inputPassword.type = "password";
  }
});

form.addEventListener("submit", async (e) => {
  e.preventDefault();
  const email = inputEmail.value;
  const password = inputPassword.value;
  const requestOptions = {
    method: 'POST',
  };
  let response = await fetch(`http://127.0.0.1:8000/api/login?email=${email}&password=${password}&_token=${csrf_token}`, requestOptions);
  let isSuccessLogin = await response.text();
  isSuccessLogin = JSON.parse(isSuccessLogin);
  if (isSuccessLogin) {
    window.location.href = "/";
  }
  else {
    alert("Username atau password salah");
  }
});