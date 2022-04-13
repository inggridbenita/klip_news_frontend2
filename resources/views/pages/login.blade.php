@extends('layouts.login_and_signup')

@section('title')
  Login
@endsection

@section('content')
  @include('includes.header')
  <div id=formContainer>
    <form action="/api/login", method="POST" id="form">
      <div class="left-side">
        @csrf
        <label for="">EMAIL / PHONE NUMBER</label>
        <div class="inputWrapper">
          <img src="/images/icons/user.png" alt="" srcset="" class="left-icon">
          <img src="/images/icons/separator.png" alt="" class="separator">
          <input type="text" id="inputEmail" placeholder="email / phone number" required>
        </div>
        <label for="">PASSWORD</label>
        <div class="inputWrapper">
          <img src="/images/icons/padlock.png" alt="" srcset="" class="left-icon">
          <img src="/images/icons/separator.png" alt="" class="separator">
          <input type="password" id="inputPassword" placeholder="password" required>
          <img src="/images/icons/hide.png" alt="" srcset="" class="right-icon" id="passwordToggle">
        </div>
        <button type="submit">Login</button>
      </div>
      <div class="right-side">
        <p>No Account?</p>
        <a href="{{ route('signup') }}" id="btnSignUp" class="btn">Sign Up</a>
      </div>
    </form>
  </div>
  @push('add-on-script')
    <script src="/js/pages/login.js" type="text/javascript"></script>
  @endpush
@endsection