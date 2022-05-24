console.log('Change Password');

const form = document.getElementById('form');

const passwordToggle1 = document.getElementById('passwordToggle1');
const passwordToggle2 = document.getElementById('passwordToggle2');

const inputPassword = document.getElementById('inputPassword');
const inputConfirmPassword = document.getElementById('inputConfirmPassword');

const inputUserId = document.getElementById('inputUserId');

passwordToggle1.addEventListener('click', () => {
  if (inputPassword.getAttribute('type') === 'password') {
    inputPassword.type = 'text';
  }
  else {
    inputPassword.type = 'password';
  }
});

passwordToggle2.addEventListener('click', () => {
  if (inputConfirmPassword.getAttribute('type') === 'password') {
    inputConfirmPassword.type = 'text';
  }
  else {
    inputConfirmPassword.type = 'password';
  }
});

form.addEventListener('submit', async (e) => {
  e.preventDefault();
  const password = inputPassword.value;
  const confirmPassword = inputConfirmPassword.value;
  if (password !== confirmPassword) {
    alert('Password tidak sama');
  }
  else {
    const myHeaders = new Headers();
    myHeaders.append('Content-Type', 'application/json');
    const raw = JSON.stringify({
      _token: getMeta('csrf-token'),
      user_id: inputUserId.value,
      password,
    });
    const requestOptions = {
      method: 'POST',
      body: raw,
      headers: myHeaders,
    };
    console.log(raw);
    response = await fetch('http://127.0.0.1:8000/api/user/reset_password', requestOptions);
    // eslint-disable-next-line no-promise-executor-return
    await new Promise((r) => setTimeout(r, 3000));
    window.location.href = 'http://127.0.0.1:8000/login?alert=success&message_type=2';
  }
});

const init = () => {
  const user_id = getURLParameter('userid');
  inputUserId.value = user_id;
};

init();
