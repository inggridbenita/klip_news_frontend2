/* eslint-disable eqeqeq */
console.log('Login');

const form = document.getElementById('form');
const csrf_token = document.getElementsByName('_token')[0].value;
const inputEmail = document.getElementById('inputEmail');
const inputPassword = document.getElementById('inputPassword');
const passwordToggle = document.getElementById('passwordToggle');
const alert_object = document.getElementById('alert');

const checkAlert = () => {
  const alertType = getURLParameter('alert');
  console.log(alertType);
  if (alertType !== null) {
    if (alertType === 'success') {
      alert_object.style.backgroundColor = '#d4edda';
      alert_object.style.color = '#4a653e';
    }
    if (getURLParameter('message_type') == 1) {
      alert_object.innerHTML = 'Pendaftaran berhasil, silakan login';
    }
    else if (getURLParameter('message_type') == 2) {
      alert_object.innerHTML = 'Berhasil ubah password, silakan login';
    }
    alert_object.style.display = 'block';
  }
};

passwordToggle.addEventListener('click', () => {
  if (inputPassword.getAttribute('type') === 'password') {
    inputPassword.type = 'text';
  } else {
    inputPassword.type = 'password';
  }
});

form.addEventListener('submit', async (e) => {
  e.preventDefault();
  const email = inputEmail.value;
  const password = inputPassword.value;
  const requestOptions = {
    method: 'POST',
  };
  const response = await fetch(`http://127.0.0.1:8000/api/login?email=${email}&password=${password}&_token=${csrf_token}`, requestOptions);
  let isSuccessLogin = await response.text();
  isSuccessLogin = JSON.parse(isSuccessLogin);
  if (isSuccessLogin) {
    window.location.href = '/';
  }
  else {
    alert('Username atau password salah');
  }
});

const init = () => {
  checkAlert();
};

init();
