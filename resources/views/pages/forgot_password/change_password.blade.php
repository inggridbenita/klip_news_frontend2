<!DOCTYPE html>
<html lang="en">
<head>
  @include('includes.meta')
  <title>Change Password</title>
  @include('includes.style')
  <link rel="stylesheet" href="/css/pages/forgot_password/change_password.css">
</head>
<body>
  @include('includes.header')
  <form action="/api/user/reset_password" method="POST" id="form">
    @csrf
    <input type="hidden" name="user_id" value="" id="inputUserId">
    <label for="inputEmail">New password</label>
    <div class="inputWrapper">
      <input type="password" name="password" id="inputPassword" minlength="8" required>
      <img src="/images/icons/hide.png" alt="" srcset="" class="right-icon" id="passwordToggle1">
    </div>
    <label for="inputEmail">Confirm</label>
    <div class="inputWrapper">
      <input type="password" name="confirmpassword" id="inputConfirmPassword" minlength="8" placeholder="" required>
      <img src="/images/icons/hide.png" alt="" srcset="" class="right-icon" id="passwordToggle2">
    </div>
    <div class="buttonWrapper">
      <button type="submit" class="btn" id="btnSubmit">Change</button>
      <small id="info">Text Small</small>
    </div>
  </form>
  <script src="/js/general.js"></script>
  <script src="/js/pages/forgot_password/change_password.js"></script>
</body>
</html>