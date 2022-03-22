@extends('layouts.login_and_signup')

@section('title')
  Sign Up
@endsection

@section('content')
  @include('includes.header')
  <div id=formContainer>
    <form action="">
      <div class="left-side">
        <h2>CREATE YOUR OWN ACCOUNT</h2>
        <div class="inputWrapper">
          <img src="/images/icons/user.png" alt="" srcset="" class="left-icon">
          <img src="/images/icons/separator.png" alt="" class="separator">
          <input type="text" id="inputName" placeholder="name" required>
        </div>
        <div class="inputWrapper">
          <img src="/images/icons/email.png" alt="" srcset="" class="left-icon">
          <img src="/images/icons/separator.png" alt="" class="separator">
          <input type="email" id="inputEmail" placeholder="email" required>
        </div>
        <div class="inputWrapper">
          <img src="/images/icons/tel.png" alt="" srcset="" class="left-icon">
          <img src="/images/icons/separator.png" alt="" class="separator">
          <input type="tel" id="inputPhoneNumber" placeholder="phone number" required>
        </div>
        <div class="inputWrapper">
          <img src="/images/icons/padlock.png" alt="" srcset="" class="left-icon">
          <img src="/images/icons/separator.png" alt="" class="separator">
          <input type="password" id="inputPassword" placeholder="password">
          <img src="/images/icons/hide.png" alt="" srcset="" class="right-icon" id="passwordToggle" required>
        </div>
        <button type="submit">Sign Up</button>
      </div>
      <div class="right-side">
        <p>Already have an account?</p>
        <a href="/signup" id="btnLogin"><button>Login</button></a>
      </div>
    </form>
  </div>
  @push('add-on-script')
    <script src="/js/pages/signup.js" type="text/javascript"></script>
  @endpush
@endsection