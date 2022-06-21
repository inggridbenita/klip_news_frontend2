const form = document.getElementById('form');
const btnBack = document.getElementById('btn-back');
const small = document.getElementById('small');

const displaySmall = (messsage) => {
  small.innerHTML = messsage;
  small.style.display = 'block';
  small.style.textAlign = 'center';
};

const hideSmall = () => {
  small.innerHTML = '';
  small.style.display = 'none';
};

form.addEventListener('submit', async (e) => {
  e.preventDefault();
  hideSmall();
  const name = document.getElementsByName('name')[0].value;
  const email = document.getElementsByName('email')[0].value;
  const phone_number = document.getElementsByName('phone_number')[0].value;
  const _token = document.getElementsByName('_token')[0].value;

  const headers = new Headers();
  headers.append('Content-Type', 'application/json');
  const raw = JSON.stringify({
    name, email, phone_number, _token,
  });
  const requestOptions = {
    method: 'POST',
    headers,
    body: raw,
    redirect: 'follow',
  };
  let response = await fetch('http://127.0.0.1:8000/api/user/edit', requestOptions);
  response = await response.text();
  if (response == 'Success') {
    window.location.href = '/profile?success_edit_profile=1';
  }
  else {
    displaySmall(response);
  }
});

btnBack.addEventListener('click', (e) => {
  e.preventDefault();
  window.history.go(-1);
});
