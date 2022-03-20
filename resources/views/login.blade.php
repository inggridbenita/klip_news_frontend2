<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Ribeye&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/css/pages/login.css">
</head>
<body>
  <header>
    <p>KLIPNews</p>
  </header>
  <div id=formContainer>
    <form action="">
      <div class="left-side">
        <label for="">EMAIL / PHONE NUMBER</label>
        <div class="inputWrapper">
          <img src="/images/icons/user.png" alt="" srcset="" class="left-icon">
          <input type="text" id="inputEmail">
        </div>
        <label for="">PASSWORD</label>
        <div class="inputWrapper">
          <img src="/images/icons/padlock.png" alt="" srcset="" class="left-icon">
          <input type="password" id="inputPassword">
          <img src="/images/icons/hide.png" alt="" srcset="" class="right-icon" id="passwordToggle">
        </div>
        <button type="submit">Login</button>
      </div>
      <div class="right-side">
        <p>No Account?</p>
        <a href="/signup" id="btnSignUp"><button>Sign Up</button></a>
      </div>
    </form>
  </div>
  <script src="/js/pages/login.js" type="text/javascript"></script>
</body>
</html>