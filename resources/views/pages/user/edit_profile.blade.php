@extends('layouts.app')

@section('title')
  Edit profile
@endsection

@push('add-on-style')
  <link rel="stylesheet" href="/css/pages/user/edit_profile.css">
@endpush

@section('content')
  <h4>Edit your profile</h4>
  <form action="" id="form">
    @csrf
    <section class="form-section">
      <label for="">Name</label>
      <input type="text" value="{{ $user_profile->name }}" name="name" required>
      <img src="/images/icons/user.png" alt="" class="img-input" >
      <img src="/images/icons/separator.png" alt="" class="img-separator">
    </section>
    <section class="form-section">
      <label for="">Email</label>
      <input type="email" value="{{ $user_profile->email }}" name="email" required>
      <img src="/images/icons/email.png" alt="" class="img-input">
      <img src="/images/icons/separator.png" alt="" class="img-separator">
    </section>
    <section class="form-section">
      <label for="">Phone Number</label>
      <input type="tel" value="{{ $user_profile->phone_number }}" name="phone_number" required>
      <img src="/images/icons/tel.png" alt="" class="img-input">
      <img src="/images/icons/separator.png" alt="" class="img-separator">
    </section>

    <small id="small">Email tidak tersedia</small>

    <section id="btn-section">
      <button class="btn" id="btn-back">Back</button>
      <button class="btn" id="btn-submit">Edit</button>
    </section>
  </form>
@endsection

@push('add-on-script')
  <script src="/js/component/aside.js"></script>
  <script src="/js/pages/user/edit_profile.js"></script>
@endpush