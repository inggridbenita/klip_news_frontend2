@extends('layouts.app')

@section('title')
  Verofin News
@endsection

@push('add-on-style')
  <link rel="stylesheet" href="/css/pages/user/profile.css">
@endpush

@section('content')
  <form action="">
    <section class="form-section">
      <label for="">Name</label>
      <input type="text" value="{{ $user_profile->name }}" readonly="readonly">
      <img src="/images/icons/user.png" alt="" class="img-input">
      <img src="/images/icons/separator.png" alt="" class="img-separator">
    </section>
    <section class="form-section">
      <label for="">Email</label>
      <input type="text" value="{{ $user_profile->email }}" readonly="readonly">
      <img src="/images/icons/email.png" alt="" class="img-input">
      <img src="/images/icons/separator.png" alt="" class="img-separator">
    </section>
    <section class="form-section">
      <label for="">Phone Number</label>
      <input type="tel" value="{{ $user_profile->phone_number }}" readonly="readonly">
      <img src="/images/icons/tel.png" alt="" class="img-input">
      <img src="/images/icons/separator.png" alt="" class="img-separator">
    </section>
  </form>

  <a href="/profile/edit" id="btn-section">
    <button class="btn">Edit</button>
  </a>
@endsection

@push('add-on-script')
  <script src="/js/component/aside.js"></script>
  <script src="/js/pages/user/profile.js"></script>
@endpush