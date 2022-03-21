<!DOCTYPE html>
<html lang="en">
<head>
  @include('includes.meta')
  <title>Login</title>
  @include('includes.style')
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
          <img src="/images/icons/separator.png" alt="" class="separator">
          <input type="text" id="inputEmail" placeholder="email / phone number">
        </div>
        <label for="">PASSWORD</label>
        <div class="inputWrapper">
          <img src="/images/icons/padlock.png" alt="" srcset="" class="left-icon">
          <img src="/images/icons/separator.png" alt="" class="separator">
          <input type="password" id="inputPassword" placeholder="password">
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