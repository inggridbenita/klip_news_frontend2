console.log("home");

const btnLogout = document.getElementById("btnLogout");

btnLogout.addEventListener("click", async () => {
  const csrf_token = getMeta('csrf-token');
  const requestOptions = {
    method: 'POST',
  };
  let response = await fetch(`http://127.0.0.1:8000/api/logout?_token=${csrf_token}`, requestOptions);
  window.location.href = "/login";
});