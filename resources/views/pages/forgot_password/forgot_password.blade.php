<!DOCTYPE html>
<html lang="en">
<head>
  @include('includes.meta')
  <title>Forgot Password?</title>
  @include('includes.style')
  <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="/css/pages/forgot_password/forgot_password.css">
</head>
<body>
  @include('includes.header')
  <form action="/api/mail/reset_password_mail" method="POST" id="form">
    @csrf
    <label for="inputEmail">Input your email</label>
    <div class="inputWrapper">
      <img src="/images/icons/email.png" alt="" srcset="" class="left-icon">
      <img src="/images/icons/separator.png" alt="" class="separator">
      <input type="email" name="email" id="inputEmail" placeholder="email" required>
    </div>
    <div class="buttonWrapper">
      <button type="submit" class="btn" id="btnSubmit">Yes</button>
      <small id="info">Text Small</small>
    </div>
    <div class="buttonWrapper" id="btnBack">
      <button class="btn">Back</button>
    </div>
  </form>
  <script src="/js/general.js"></script>
  <script src="/js/pages/forgot_password/forgot_password.js"></script>
</body>
</html>