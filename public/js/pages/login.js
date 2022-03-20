console.log("Login");

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