@extends('layouts.app')

@section('title')
  Verofin News
@endsection

@push('add-on-style')
  <link rel="stylesheet" href="/css/pages/user/home.css">
@endpush

@section('content')
  <div id="head">
    <div class="left-side">
      <p>Category</p>
      <img src="/images/icons/separator.png" class="separator" alt="ikon separator" srcset="">
      <p>Hiburan</p>
      <p>Gaya Hidup</p>
    </div>
    <div class="right-side">
      <input type="text" name="" id="" placeholder="Search">
      <img src="/images/icons/separator.png" class="separator" alt="ikon separator" srcset="">
      <img src="/images/icons/lup.png" alt="ikon lup" srcset="" class="ic-lup">
    </div>
  </div>
@endsection

@push('add-on-script')
  <script src="/js/pages/user/home.js"></script>
@endpush