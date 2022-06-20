console.log('Forgot Password');

const form = document.getElementById('form');
const inputEmail = document.getElementById('inputEmail');
const smallInfo = document.getElementById('info');
const btnBack = document.getElementById('btn-back');

form.addEventListener('submit', async (e) => {
  e.preventDefault();
  const email = inputEmail.value;
  let response = await fetch(`http://127.0.0.1:8000/api/user/check_exist_by_email?email=${email}`);
  response = await response.text();
  const isEmailTrue = await JSON.parse(response);
  if (isEmailTrue) {
    const myHeaders = new Headers();
    myHeaders.append('Content-Type', 'application/json');
    const raw = JSON.stringify({
      _token: getMeta('csrf-token'),
      email,
    });
    const requestOptions = {
      method: 'POST',
      body: raw,
      headers: myHeaders,
    };
    response = await fetch('http://127.0.0.1:8000/api/mail/reset_password_mail', requestOptions);
    smallInfo.innerHTML = 'Check your email!';
  }
  else {
    smallInfo.innerHTML = 'Email not registered!';
  }
  smallInfo.style.display = 'inherit';
});

btnBack.addEventListener('click', (e) => {
  e.preventDefault();
  window.history.go(-1);
});
