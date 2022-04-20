@extends('layouts.app')

@section('title')
  Verofin News
@endsection

@push('add-on-style')
  <link rel="stylesheet" href="/css/elements/breadcrumb.css">
  <link rel="stylesheet" href="/css/pages/user/baca.css">
@endpush

@section('content')
  <div id="breadcrumb">
    <ul>
      <li><a href="/home">Home</a></li>
      <li>/</li>
      <li>Baca</li>
    </ul>
  </div>
  <main id="content">
    <img src="/images/rectangle_placeholder.png" alt="" id="newsHeader">
    <h1 class="title" id="title">Judul Berita</h1>
    <p class="date" id="date">Timestamp</p>
    <div id="newsContent" id="newsContent">Konten</div>
  </main>
@endsection

@push('add-on-script')
  <script src="/js/pages/user/baca.js"></script>
@endpush