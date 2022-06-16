@extends('layouts.app')

@section('title')
  Verofin News
@endsection

@push('add-on-style')
  <link rel="stylesheet" href="/css/elements/news_list.css">
  <link rel="stylesheet" href="/css/elements/news_item.css">
  <link rel="stylesheet" href="/css/pages/user/home.css">
@endpush

@section('content')
  <div id="head">
    <div class="left-side">
      <p>Category</p>
      <img src="/images/icons/separator.png" class="separator" alt="ikon separator" srcset="">
      <p onclick="onCategoryClickListener('hiburan')" class="category-menu" data-category="hiburan">Hiburan</p>
      <p onclick="onCategoryClickListener('gaya_hidup')" class="category-menu" data-category="gaya_hidup">Gaya Hidup</p>
    </div>
    <div class="right-side">
      <input type="text" name="" id="" placeholder="Search">
      <img src="/images/icons/separator.png" class="separator" alt="ikon separator" srcset="">
      <img src="/images/icons/lup.png" alt="ikon lup" srcset="" class="ic-lup">
    </div>
  </div>
  <main id="news-list"></main>
  @include('includes.newsTemplate')
@endsection

@push('add-on-script')
  <script src="/js/pages/user/home.js"></script>
@endpush